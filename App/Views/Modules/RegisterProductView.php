<div class="container">
    <form class="form" action="/produto/registrar" method="post" autocomplete="off">
        <div>
            <label class="label" for="description">Descrição do Produto</label>
            <input class="input" type="text" id="description" name="description" required>
        </div>
        <div>
            <label class="label" for="price">Preço do Produto</label>
            <input class="input" type="number" id="price" name="price" required>
        </div>
        <div>
            <label class="label" for="unity">Unidade</label>
            <input class="input" type="text" id="unity" name="unity" required>
        </div>
        <button class="button">Cadastrar Produto</button>
    </form>
</div>