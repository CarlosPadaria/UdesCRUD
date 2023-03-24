<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login UdesCRUD</title>
  <link href="indexstyle.css?<?= filemtime("indexstyle.css") ?>" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="https://encrypted-tbn2.gstatic.com/faviconV2?url=https://www1.udesc.br&client=VFE&size=64&type=FAVICON&fallback_opts=TYPE,SIZE,URL&nfrp=2">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body onload="CarregarPagina()">
  <div id="loader"></div>
  <section id="container" class="container">

    <div class="hero">
      <a href="index.html" class="logo">UDESC</a>
      <div class="hero-middle-text">
        <h1 class="welcome">Bem vindo</h1>
        <p><strong>Preencha seus dados</strong> para ter acesso ao sistema</p>
      </div>
      <div class="website-link">
        <p>www.udesc.br</p>
      </div>
    </div>
    <div class="login-screen">
      <img src='logo.png' class="login-logo">
      <h1 class="login-text">Logar-se</h1>
      <?php include 'services/logarService.php'; ?>
      <form action="index.php" method="post" class="login-screen">
        <input type="hidden" name="acao" value="logar">
        <input type="email" class="input" name="email" placeholder="Endereço de email">
        <input type="password" name="senha" class="input" placeholder="Senha">
        <button class="submit">Fazer Login</button>
      </form>
    </div>
    <script>
      function CarregarPagina() {
        myVar = setTimeout(showPage, 1500);
      }

      function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("container").style.display = "flex";
      }
    </script>
  </section>

</body>

</html>