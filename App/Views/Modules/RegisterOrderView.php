<div class="container">
    <form class="form" action="/pedido/registrar" method="post">
        <input style="display: none;" type="text" id="items" name="items" required>
        <input style="display: none;" type="number" id="total" name="total">

        <div>
            <label class="label" for="clientId">Cliente</label>
            <select class="select" name="clientId" id="clientId">
                <?php foreach ($clients as $value) : ?>
                    <option value="<?= $value->codigo ?>"><?= $value->nome ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="RegisterOrderProductContainer">
            <div>
                <div>
                    <label class="label" for="product">Produto</label>
                    <select class="select" name="product" id="product">
                        <?php foreach ($products as $value) : ?>
                            <option value="<?= $value->codigo ?>"><?= $value->descricao ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <label class="label" for="quantity">Quantidade</label>
                    <input class="input RegisterOrderQuantityInput" type="number" name="quantity" id="quantity">
                </div>
                <button class="button" id="sendToCartButton" type="button">Adicionar ao carrinho</button>
            </div>
            <fieldset class="RegisterOrderCartContainer">
                <legend align="center">Produtos no Carrinho</legend>
                <table id="cartTable" class="d-none RegisterOrderCartTable">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody data-cart></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <p>Total do Pedido</p>
                                <p id="totalOrder"></p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <p id="cartMessage" class="RegisterOrderCartMessage">Não há produtos no carrinho</p>
            </fieldset>
        </div>
        <div class="RegisterOrderButtonSubmitContainer">
            <button class="button ">Concluir Pedido</button>
        </div>
    </form>
</div>

<script>
    const products = <?= json_encode($products) ?>;
    const itemsOnCart = [];

    const itemsInput = document.querySelector('#items');
    const totalInput = document.querySelector('#total');

    // Function to update total
    function updateTotal() {
        let total = 0;

        itemsOnCart.forEach(item => {
            const price = Number(item.product.preco) * Number(item.quantity);
            total += price;
        })

        totalInput.setAttribute('value', total);

        document.querySelector('#totalOrder').innerHTML = total.toLocaleString("pt-BR", {
            currency: "BRL",
            style: "currency"
        })
    }

    // Function to render the list of items on cart
    function renderCart() {
        const cart = document.querySelector("[data-cart]");
        cart.innerHTML = "";

        const arrayItems = [];
        itemsOnCart.forEach((item, index) => {
            arrayItems.push(`
                    <tr>
                        <td>
                            ${item.product.descricao}
                        </td>
                        <td>
                            ${item.quantity}
                        </td>
                        <td>
                            ${Number(item.product.preco) * Number(item.quantity)}
                        </td>
                        <td>
                            <button class="button" type="button" onclick="removeFromCart(${index})">Remover</button>
                        </td>
                    </tr>
                `)
        })

        cart.innerHTML = arrayItems.join('');

        if (!itemsOnCart.length) {
            document.querySelector("#cartTable").classList.add("d-none");
            document.querySelector("#cartMessage").classList.remove("d-none");
        } else {
            document.querySelector("#cartTable").classList.remove("d-none");
            document.querySelector("#cartMessage").classList.add("d-none");
        }
    }

    // Function to add a new product on cart
    function addToCart() {

        const selectedProduct = document.querySelector('#product');
        const quantity = document.querySelector('#quantity');

        if (!quantity.value.length) {
            alert("Defina uma quantidade!");
            return;
        }

        if (itemsOnCart.find(item => Number(item.product.codigo) === Number(selectedProduct.value))) {
            alert("Este produto já foi adicionado ao carrinho!");
            return;
        }

        itemsOnCart.push({
            product: products.find(item => Number(item.codigo) === Number(selectedProduct.value)),
            quantity: quantity.value
        });

        itemsInput.setAttribute('value', JSON.stringify(itemsOnCart));
        updateTotal();

        quantity.value = "";

        renderCart();
    }

    // Function to remove product from cart
    function removeFromCart(index) {
        itemsOnCart.splice(index, 1);

        itemsInput.setAttribute('value', JSON.stringify(itemsOnCart));
        updateTotal();

        renderCart();
    }

    // Event to add a new product on cart
    const sendToCartButton = document.querySelector('#sendToCartButton');
    sendToCartButton.addEventListener('click', addToCart);
</script>