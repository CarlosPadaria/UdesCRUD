<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link href="listarStyle.css?<?= filemtime("listarStyle.css") ?>" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="https://encrypted-tbn2.gstatic.com/faviconV2?url=https://www1.udesc.br&client=VFE&size=64&type=FAVICON&fallback_opts=TYPE,SIZE,URL&nfrp=2">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body onload="CarregarPagina()">
    <?php include 'protect.php'; ?>
    <div id="loader"></div>

    <div class="main" id="main">
        <div class="header sticky" id="header">
            <div class="logo-wrapper">
                <a href="listar.php" class="logo">UdesCRUD</a>
            </div>
            <div class="pages-wrapper" id="pages-wrapper">
                <a class="item-pages " href="listar.php">Listar</a>
                <a class="item-pages active" href="cadastrar.php">Cadastrar</a>
                <a class="item-pages" href="logout.php">Sair</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            </div>
        </div>
        <div class="register">
            <?php
            include 'services/cadastrarService.php'; ?>
            <h1>Cadastrar Usuário</h1>
            <form method="post" action="">
                <input type="hidden" name="acao" value="cadastrar">
                <input class="input" name="nome" type="text" placeholder="Nome" maxlength="100">
                <input class="input" name="email" type="email" placeholder="Email" maxlength="100">
                <input class="input" name="senha" type="password" placeholder="Senha" maxlength="32">
                <br>
                <input type="submit" value="Cadastrar" class="submit">
            </form>
        </div>

        <script>
            function myFunction() {
                var x = document.getElementById("pages-wrapper");
                if (x.className === "pages-wrapper") {
                    x.className += " responsive";
                } else {
                    x.className = "pages-wrapper";
                }
            }

            function CarregarPagina() {
                myVar = setTimeout(showPage, 1500);
            }

            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("main").style.display = "block";
            }
        </script>
</body>

</html>l