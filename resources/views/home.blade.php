<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mi Escuela</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    

    <div class="navbar-fixed">
      <nav class="white">
        <div class="nav-wrapper">
          <a href="/" class="brand-logo">Mi Escuela</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="/">Inicio</a></li>
            <li><a href="#">Datos Públicos</a></li>
            <li><a href="/search-school">Escuelas</a></li>
            <li><a href="#"><i class="material-icons left">perm_identity</i>Iniciar sesión</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="/">Inicio</a></li>
            <li><a href="#">Datos Públicos</a></li>
            <li><a href="/search-schools">Escuelas</a></li>
            <li><a href="#"><i class="material-icons left">perm_identity</i>Iniciar sesión</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <!-- Slider -->
    <div class="slider">
      <ul class="slides">
        <li>
          <img class="sliderimg" src="img/2015_03_9c507b38ddfc.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3>Conoce el ranking de las escuelas</h3>
            <h5 class="light grey-text text-lighten-3">Encuentra y evalúa la escuela de tus hijos</h5>
          </div>
        </li>
        <li>
          <img class="sliderimg" src="img/2015_02_ffeb2192215e.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3>Otra noticia relevante</h3>
            <h5 class="light grey-text text-lighten-3">Descripción de la noticia.</h5>
          </div>
        </li>
      </ul>
    </div>

    <!-- Noticias -->
    <div class="container">
      <div class="row">
        <div class="col s12 m12">
          <h4>Más noticias</h4>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="img/Card1.png">
            </div>
            <div class="card-content">
              <span class="card-title card-news">Título</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua... </p>
            </div>
            <div class="card-action center-align">
              <a class="waves-effect waves-light btn-large purple darken-3 center">Leer Más</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="img/Card2.png">
            </div>
            <div class="card-content">
              <span class="card-title card-news">Título</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua... </p>
            </div>
            <div class="card-action center-align">
              <a class="waves-effect waves-light btn-large purple darken-3 center">Leer Más</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="img/Card3.png">
            </div>
            <div class="card-content">
              <span class="card-title card-news">Título</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua... </p>
            </div>
            <div class="card-action center-align">
              <a class="waves-effect waves-light btn-large purple darken-3 center">Leer Más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer grey lighten-1">
      <div class="footer-copyright">
        <div class="container center-align">
        © 2014 Copyright Text
        </div>
      </div>
    </footer>



    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>