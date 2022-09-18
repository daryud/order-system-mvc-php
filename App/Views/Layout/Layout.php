<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOJA COLETEK</title>

    <link rel="stylesheet" href="../../styles/global.css">
</head>

<body>
    <header class="LayoutHeader">
        <nav class="LayoutNav">
            <ul>
                <li class="LayoutLinkLine">
                    <a class="LayoutLink" href="/cliente">Cadastrar Cliente</a>
                </li>
                <li class="LayoutLinkLine">
                    <a class="LayoutLink" href="/produto">Cadastrar Produto</a>
                </li>
                <li class="LayoutLinkLine">
                    <a class="LayoutLink" href="/pedido">Fazer Pedido</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="LayoutMain">
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . $pagePath) ?>
    </main>
</body>

</html>