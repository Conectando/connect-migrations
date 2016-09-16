<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mi Escuela</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    

    <div class="navbar-fixed">
      <nav class="white">
        <div class="nav-wrapper">
          <a href="index.html" class="brand-logo">Mi Escuela</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="/">Inicio</a></li>
            <li><a href="#!">Datos Públicos</a></li>
            <li><a href="/schools/search">Escuelas</a></li>
            <li><a href="#!"><i class="material-icons left">perm_identity</i>Iniciar sesión</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="/">Inicio</a></li>
            <li><a href="#!">Datos Públicos</a></li>
            <li><a href="/schools/search">Escuelas</a></li>
            <li><a href="#!"><i class="material-icons left">perm_identity</i>Iniciar sesión</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <!-- Slider -->
    
    <div class="container">
      <div class="row">
        <div class="col s12 center-align">
          <h4>Escuela Primaria Pública Juan de la Barrera</h4>
        </div> 
      </div>
      <div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="card horizontal">
              <div class="card-image">
                <img src="/img/map.png">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <div class="pt-10">
                    <i class="small material-icons school-direction">room</i>
                    <span>Arquímides 723, Colonia Hermosa, Provincia, C.P. 44770</span>
                  </div>
                  <div class="pt-10">
                    <i class="small material-icons school-phone">phone</i>
                    <span>55555555 </span>
                    <i class="small material-icons school-email">email</i>
                    <span>email: escuela@jalisco.gob.mx</span>
                  </div>
                  <div class="pt-10 teach">
                    <span><b>Enseñanza:</b></span>
                    <span class="rating">
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                    </span>
                  </div>
                  <div class="pt-10 inst">
                    <span><b>Instalaciones:</b></span>
                    <span class="rating">
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action center-align">
              <span class="info-gen"><b>Alumnos: </b> 784</span>
              <span class="info-gen"><b>Personal: </b> 43</span>
              <span class="info-gen"><b>Salones: </b> 25</span>
              <span class="info-gen"><b>Grupos: </b> 18</span>
            </div>
          </div>
        </div>
      </div>


      <!-- <div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="col s12 m6">
              
                <div class="card-image">
                  <img src="img/map.png">
                </div>
              
            </div>  
            <div class="col s12 m6">
              
                <div class="card-content">
                  <div class="pt-10">
                    <i class="small material-icons school-direction">room</i>
                    <span>Arquímides 723, Colonia Hermosa, Provincia, C.P. 44770</span>
                  </div>
                  <div class="pt-10">
                    <i class="small material-icons school-phone">phone</i>
                    <span>55555555 </span>
                    <i class="small material-icons school-email">email</i>
                    <span>email: escuela@jalisco.gob.mx</span>
                  </div>
                  <div class="pt-10 teach">
                    <span><b>Enseñanza:</b></span>
                    <span class="rating">
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                    </span>
                  </div>
                  <div class="pt-10 inst">
                    <span><b>Instalaciones:</b></span>
                    <span class="rating">
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                    </span>
                  </div>
                </div>
              
            </div>
            
            <div class="card-action center-align">
              <span class="info-gen"><b>Alumnos: </b> 784</span>
              <span class="info-gen"><b>Personal: </b> 43</span>
              <span class="info-gen"><b>Salones: </b> 25</span>
              <span class="info-gen"><b>Grupos: </b> 18</span>
            </div>
          </div>
        </div>
      </div> -->
    </div>



    </div>

    <!-- More info -->
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="z-depth-1">
            <table class="bordered highlight">
              <thead class="purple darken-3">
                <tr>
                    <th data-field="id">Instalaciones</th>
                    <th data-field="name"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Salones</td>
                  <td>20</td>
                </tr>
                <tr>
                  <td>Laboratorios</td>
                  <td>5</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="z-depth-1">
            <table class="bordered highlight">
              <thead class="purple darken-3">
                <tr>
                    <th data-field="id">Servicios</th>
                    <th data-field="name"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Luz eléctrica</td>
                  <td>Si</td>
                </tr>
                <tr>
                  <td>Internet</td>
                  <td>No</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m6">
          <div class="z-depth-1">
            <table class="bordered highlight">
              <thead class="purple darken-3">
                <tr>
                    <th data-field="id">Enseñanza</th>
                    <th data-field="name"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Docentes</td>
                  <td>25</td>
                </tr>
                <tr>
                  <td>Preparación</td>
                  <td>8.5</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="z-depth-1">
            <table class="bordered highlight">
              <thead class="purple darken-3">
                <tr>
                    <th data-field="id">Población estudiantil</th>
                    <th data-field="name"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Promedio general</td>
                  <td>8.7</td>
                </tr>
                <tr>
                  <td>Mujeres (%)</td>
                  <td>55</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12">
          <div class="z-depth-1">
            <table class="bordered highlight">
              <thead class="purple darken-3">
                <tr>
                    <th data-field="id">Objetivos y logros de la escuela</th>
                    <th data-field="name"></th>
                    <th></th>
                </tr>
              </thead>
              <thead class="grey lighten-1">
                <tr>
                    <th data-field="id">Objetivo</th>
                    <th data-field="name">Estatus</th>
                    <th data-field="name">Progreso</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Programa de capacitación a maestros</td>
                  <td>Activa</td>
                  <td>85%</td>
                </tr>
                <tr>
                  <td>Incrementar las becas para los alumnos</td>
                  <td>Activa</td>
                  <td>79%</td>
                </tr>
                <tr>
                  <td>Restauración del patio</td>
                  <td>Pendiente</td>
                  <td>15%</td>
                </tr>
              </tbody>
            </table>
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



    <script src="/js/jquery-3.1.0.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>