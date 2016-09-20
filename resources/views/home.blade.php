<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Mi Escuela - API</title>

    <link rel="stylesheet" href="css/style.css" />
    <script src="js/all.js"></script>


          <script>
        $(function() {
            setupLanguages(["cURL","CSharp","Java","Javascript","PHP"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <!--img src="images/logo.png" /-->
                    <div class="lang-selector">
                                  <a href="#" data-language-name="cURL">cURL</a>
                                  <a href="#" data-language-name="CSharp">CSharp</a>
                                  <a href="#" data-language-name="Java">Java</a>
                                  <a href="#" data-language-name="Javascript">Javascript</a>
                                  <a href="#" data-language-name="PHP">PHP</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='#'>Regístrese para obtener una clave de desarrollador</a></li>
                                  <li><a href='http://github.com/mpociot/whiteboard'>Documentation Powered by Whiteboard</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <h1>API v0.1 Introducción</h1>
<blockquote>
<p>Estamos trabajando duro en crear un api increible. <br/><br/> <a href="https://github.com/Conectando/connect-my-school-api-docs">Encuentra el codigo funte aqui...</a>.</p>
</blockquote>
<p>Bienvenido a la documentación oficial de &quot;Conectando Mi Escuela&quot; <br/> </p>
<h2>Requests</h2>
<table>
<thead>
<tr>
<th>Metodo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>GET</td>
<td>Descripción de metodo HTTP GET</td>
</tr>
<tr>
<td>HEAD</td>
<td>Descripción de metodo HTTP HEAD</td>
</tr>
<tr>
<td>POST</td>
<td>Descripción de metodo HTTP POST</td>
</tr>
<tr>
<td>DELETE</td>
<td>Descripción de metodo HTTP DELETE</td>
</tr>
<tr>
<td>PUT</td>
<td>Descripción de metodo HTTP PUT</td>
</tr>
<tr>
<td>PATCH</td>
<td>Descripción de metodo HTTP PATCH</td>
</tr>
</tbody>
</table>
<h2>HTTP Status</h2>
<table>
<thead>
<tr>
<th>Estado</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>200</td>
<td>Descripción del estado 200</td>
</tr>
<tr>
<td>201</td>
<td>Descripción del estado 201</td>
</tr>
<tr>
<td>204</td>
<td>Descripción del estado 204</td>
</tr>
<tr>
<td>403</td>
<td>Descripción del estado 403</td>
</tr>
<tr>
<td>404</td>
<td>Descripción del estado 404</td>
</tr>
<tr>
<td>500</td>
<td>Descripción del estado 500</td>
</tr>
</tbody>
</table>
<h2>Response</h2>
<blockquote>
<p>Response de un unico objeto</p>
</blockquote>
<pre><code class="language-json">
    {
        "data": {
            "id": 6567,
            "name": "Cristian Jaramillo"
            ...
        }
    }
</code></pre>
<blockquote>
<p>Response de una collección de objetos</p>
</blockquote>
<pre><code class="language-json">
    {
        "data": [
            {
                "id": 6567,
                "name": "Cristian Jaramillo"
                ...
            },
            {
                "id": 6787,
                "name": "Mitztli Melgoza"
                ...
            }
        ]
    }
</code></pre>
<h2>Meta</h2>
<blockquote>
<p>Ejemplo de meta</p>
</blockquote>
<pre><code class="language-json">
    {
        "meta": {
            "pagination": {
                "total": 12324,
                "count": 30,
                "per_page": 30,
                "current_page": 1,
                "total_pages": 411,
                "links": {
                    "next": "/api/v0.1/schools?page=2"
                }
            }
        }
    }   
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>total</td>
<td>number</td>
<td>sin descripción</td>
</tr>
<tr>
<td>count</td>
<td>number</td>
<td>sin descripción</td>
</tr>
<tr>
<td>per_page</td>
<td>number</td>
<td>sin descripción</td>
</tr>
<tr>
<td>current_page</td>
<td>number</td>
<td>sin descripción</td>
</tr>
<tr>
<td>total_pages</td>
<td>number</td>
<td>sin descripción</td>
</tr>
</tbody>
</table>
<h2>Links</h2>
<blockquote>
<p>Ejemplo de links</p>
</blockquote>
<pre><code class="language-json">
    "links": {
        "self": "/api/v0.1/schools/1",
        "details": "/api/v0.1/schools/1/details",
        "location": "/api/v0.1/inegi/locations/1",
        "municipality": "/api/v0.1/inegi/municipalities/39"
    }
</code></pre>
<h2>Rate Limit</h2>
<blockquote>
<p>Ejemplo de RateLimit Headers</p>
</blockquote>
<pre><code>
    X-RateLimit-Limit: 60
    X-RateLimit-Remaining: 58
    X-RateLimit-Reset: 678672
</code></pre>
<blockquote>
<p>Ejemplo de respuesta al superar RateLimit</p>
</blockquote>
<pre><code>
    Too Many Requests
</code></pre>
<h2>Ejemplo Curl</h2>
<pre><code class="language-cURL">
    curl -I -H "Accept: aplication/json" -GET "http://api.school.dev/v0.1/schools"
</code></pre>
<blockquote>
<p>Request Headers</p>
</blockquote>
<pre><code class="language-curl">
    HEAD /v0.1/schools HTTP/1.1
    Host: api.school.dev
    User-Agent: curl/7.46.0
    Accept: aplication/json
</code></pre>
<blockquote>
<p>Response Headers</p>
</blockquote>
<pre><code class="language-curl">
    HTTP/1.1 200 OK
    Host: api.school.dev
    Connection: close
    X-Powered-By: PHP/7.0.9
    Cache-Control: no-cache
    Content-Type: application/json
    X-RateLimit-Limit: 60
    X-RateLimit-Remaining: 58
    Date: Mon, 29 Aug 2016 19:33:15 GMT
</code></pre>
<h2>Cross Origin Resource Sharing</h2>
<p>CORS introduce un mecanismo estándar que pueda ser utilizado por todos los navegadores para la implementación de las solicitudes entre dominios. La especificación define un conjunto de cabeceras que permiten la comunicación entre el navegador y el servidor sobre las solicitudes que son y no son permitidas. CORS sigue el espíritu de la web abierta trayendo acceso a la API para todos.</p><h1>Académicos</h1>
<blockquote>
<p>Ejemplo</p>
</blockquote>
<pre><code class="language-cURL">
    curl -X GET "http://api.school.dev/v0.1/schools" 
</code></pre>
<pre><code class="language-CSharp">
    var client = new RestClient("http://api.school.dev/v0.1/schools");
    var request = new RestRequest(Method.GET);
    request.AddHeader("Accept", "application/json");
    IRestResponse response = client.Execute(request);
</code></pre>
<pre><code class="language-Java">
    OkHttpClient client = new OkHttpClient();

    Request request = new Request.Builder()
        .url("http://api.school.dev/v0.1/schools")
        .get()
        .addHeader("Accept", "application/json")
        .build();

    Response response = client.newCall(request).execute();
</code></pre>
<pre><code class="language-Javascript">
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://api.school.dev/v0.1/schools",
        "method": "GET",
        "headers": {
            "Accept": "application/json"
        }
    }

    $.ajax(settings).done(function (response) {
      console.log(response);
    });
</code></pre>
<pre><code class="language-PHP">
    &lt;?php

        $request = new HttpRequest();
        $request-&gt;setUrl('http://api.school.dev/v0.1/schools');
        $request-&gt;setMethod(HTTP_METH_GET);

        $request-&gt;setHeaders(array(
          'Accept'-&gt; 'application/json'
        ));

        try {
          $response = $request-&gt;send();

          echo $response-&gt;getBody();
        } catch (HttpException $ex) {
          echo $ex;
        }
</code></pre>
<blockquote>
<p>Request Headers</p>
</blockquote>
<pre><code>
    Accept: application/json
</code></pre>
<blockquote>
<p>Response Headers</p>
</blockquote>
<pre><code>
    Content-Type: application/json
</code></pre>
<blockquote>
<p>Response Body</p>
</blockquote>
<pre><code class="language-json">
    {
        "data": [
            {
                "id": 1,
                "rfc": "4666468869335",
                "name": "OLGA LILIA GARCIA LOPEZ",
                "last_name": "",
                "second_last_name": "",
                "email": "giovani51@gmail.com",
                "telephone": "+205618421578",
                "mobile_phone": "+8449985841798",
                "links": {
                    "self": "/api/v0.1/academics/1"
                }
            },
            ...
        ],
        "meta": {
            "pagination": {
                "total": 10520,
                "count": 30,
                "per_page": 30,
                "current_page": 1,
                "total_pages": 351,
                "links": {
                    "next": "/api/v0.1/academics?page=2"
                }
            }
        }
    }
</code></pre>
<p>Son los registros de los académicos que funge como directores y/ó maestros de los centros de trabajo.</p>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>number</td>
<td>Identificador universal para este académico</td>
</tr>
<tr>
<td>rfc</td>
<td>string (alphanumeric)</td>
<td>El Registro Federal de Contribuyentes (RFC) es una clave alfanumérica compuesta por 13 caracteres (para Personas Físicas) y es utilizada cuando un individuo ejerce actividades económicas por las cuales esté obligado a pagar impuestos.</td>
</tr>
<tr>
<td>name</td>
<td>string</td>
<td>Nombre del académico</td>
</tr>
<tr>
<td>last_name</td>
<td>nullable string</td>
<td>Apellido paterno del académico</td>
</tr>
<tr>
<td>second_last_name</td>
<td>nullable string</td>
<td>Apellido materno del académico</td>
</tr>
<tr>
<td>email</td>
<td>nullable string</td>
<td>Correo electronico del académico</td>
</tr>
<tr>
<td>telephone</td>
<td>nullable string</td>
<td>Teléfono local del académico en formato internacional</td>
</tr>
<tr>
<td>mobile_phone</td>
<td>nullable string</td>
<td>Teléfono celular del académico en formato internacional</td>
</tr>
</tbody>
</table>
<h2>Recuperar un académico</h2>
<pre><code class="language-json">
    {
        "data": {
            "id": 1,
            "rfc": "4666468869335",
            "name": "OLGA LILIA GARCIA LOPEZ",
            "last_name": "",
            "second_last_name": "",
            "email": "giovani51@gmail.com",
            "telephone": "+205618421578",
            "mobile_phone": "+8449985841798",
            "links": {
                "self": "/api/v0.1/academics/1"
            }
        }
    }
</code></pre><h1>Niveles Educativos</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "id": 1,
                "name": "PREESCOLAR",
                "links": [
                    {
                        "rel": "self",
                        "href": "/api/v0.1/educational/levels/1"
                    }
                ]
            },
            ...
        ],
        "meta": {
            "pagination": {
                "total": 5,
                "count": 5,
                "per_page": 15,
                "current_page": 1,
                "total_pages": 1,
                "links": []
            }
        }
    }
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>number</td>
<td>Identificador universal para este nivel educativo</td>
</tr>
<tr>
<td>nombre</td>
<td>string</td>
<td>Nombre del nivel educativo</td>
</tr>
</tbody>
</table>
<h2>Recuperar un nivel educativo</h2>
<pre><code class="language-json">
    {
        "data": {
            "id": 1,
            "name": "PREESCOLAR",
            "links": [
                {
                    "rel": "self",
                    "href": "/api/v0.1/educational/levels/1"
                }
            ]
        }
    }
</code></pre><h1>Programas Educativos</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "id": 1,
                "name": "GENERAL",
                "links": [
                    {
                        "rel": "self",
                        "href": "/api/v0.1/educational/programs/1"
                    }
                ]
            },
            ...
        ],
        "meta": {
            "pagination": {
                "total": 10,
                "count": 10,
                "per_page": 15,
                "current_page": 1,
                "total_pages": 1,
                "links": []
            }
        }
    }
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>number</td>
<td>Identificador universal para este programa educativo</td>
</tr>
<tr>
<td>nombre</td>
<td>string</td>
<td>Nombre del programa educativo</td>
</tr>
</tbody>
</table>
<h2>Recuperar un programa educativo</h2>
<pre><code class="language-json">
    {
        "data": {
            "id": 1,
            "name": "GENERAL",
            "links": [
                {
                    "rel": "self",
                    "href": "/api/v0.1/educational/programs/1"
                }
            ]
        }
    }
</code></pre><h1>Localidades Inegi</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "id": 1,
                "name": "GUADALAJARA",
                "links": [
                    {
                        "rel": "self",
                        "href": "/api/v0.1/inegi/locations/1"
                    }
                ]
            },
            ...
        ],
        "meta": {
            "pagination": {
                "total": 501,
                "count": 15,
                "per_page": 15,
                "current_page": 1,
                "total_pages": 34,
                "links": {
                    "next": "/api/v0.1/inegi/locations?page=2"
                }
            }
        }
    }
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>number</td>
<td>Identificador universal para esta localidad</td>
</tr>
<tr>
<td>nombre</td>
<td>string</td>
<td>Nombre de la localidad</td>
</tr>
</tbody>
</table>
<h2>Recuperar una localidad</h2>
<pre><code class="language-json">
    {
        "data": {
            "id": 1,
            "name": "GUADALAJARA",
            "links": [
                {
                    "rel": "self",
                    "href": "/api/v0.1/inegi/locations/1"
                }
            ]
        }
    }
</code></pre><h1>Municipios Inegi</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "id": 1,
                "name": "ACATIC",
                "links": [
                    {
                        "rel": "self",
                        "href": "/api/v0.1/inegi/municipalities/1"
                    }
                ]
            },
            ...
        ],
        "meta": {
            "pagination": {
                "total": 125,
                "count": 15,
                "per_page": 15,
                "current_page": 1,
                "total_pages": 9,
                "links": {
                    "next": "/api/v0.1/inegi/municipalities?page=2"
                }
            }
        }
    }</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>number</td>
<td>Identificador universal para este municipio</td>
</tr>
<tr>
<td>nombre</td>
<td>string</td>
<td>Nombre del municipio</td>
</tr>
</tbody>
</table>
<h2>Recuperar un municipio</h2>
<pre><code class="language-json">
    {
        "data": {
            "id": 1,
            "name": "ACATIC",
            "links": [
                {
                    "rel": "self",
                    "href": "/api/v0.1/inegi/municipalities/1"
                }
            ]
        }
    }
</code></pre><h1>Escuelas</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "id": 1,
                "name": "JUAN DE LA BARRERA",
                "address": "ARQUIMEDES 723",
                "colony": "HERMOSA PROVINCIA",
                "postal_code": 44770,
                "location": "GUADALAJARA",
                "municipality": "GUADALAJARA",
                "state": "JALISCO",
                "latitude": 20.6708361,
                "longitude": -103.2864634,
                "links": {
                    "self": "/api/v0.1/schools/1",
                    "details": "/api/v0.1/schools/1/details",
                    "location": "/api/v0.1/inegi/locations/1",
                    "municipality": "/api/v0.1/inegi/municipalities/39"
                }
            },
            ...
        ],
        "meta": {
            "pagination": {
                "total": 12324,
                "count": 30,
                "per_page": 30,
                "current_page": 1,
                "total_pages": 411,
                "links": {
                    "next": "/api/v0.1/schools?page=2"
                }
            }
        }
    }
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>number</td>
<td>Identificador universal para esta escuela</td>
</tr>
<tr>
<td>name</td>
<td>string</td>
<td>Nombre del centro de trabajo</td>
</tr>
<tr>
<td>address</td>
<td>string</td>
<td>Dirección del centro de trabajo</td>
</tr>
<tr>
<td>colony</td>
<td>string</td>
<td>Colonia en la que se encuentra el centro de trabajo</td>
</tr>
<tr>
<td>postal_code</td>
<td>nullable number</td>
<td>Código postal</td>
</tr>
<tr>
<td>latitude</td>
<td>double</td>
<td>Latitud donde se encuentra el centro de trabajo</td>
</tr>
<tr>
<td>longitude</td>
<td>double</td>
<td>Longitud donde se encuentra el centro de trabajo</td>
</tr>
</tbody>
</table>
<h2>Recupera una escuela</h2>
<pre><code class="language-json">
    {
        "data": {
            "id": 1,
            "name": "JUAN DE LA BARRERA",
            "address": "ARQUIMEDES 723",
            "colony": "HERMOSA PROVINCIA",
            "postal_code": 44770,
            "location": "GUADALAJARA",
            "municipality": "GUADALAJARA",
            "state": "JALISCO",
            "latitude": 20.6708361,
            "longitude": -103.2864634,
            "links": {
              "self": "/api/v0.1/schools/1",
              "details": "/api/v0.1/schools/1/details",
              "location": "/api/v0.1/inegi/locations/1",
              "municipality": "/api/v0.1/inegi/municipalities/39"
            }
        }
    }
</code></pre><h1>Detalles de Escuela</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "id": 1,
                "cct": "14DJN0128O",
                "turn": "MATUTINO",
                "email": "olgalilly62@hotmail.com",
                "telephone": "36080845",
                "zone": 175,
                "sector": 2,
                "level": "PREESCOLAR",
                "program": "GENERAL",
                "sustenance": "FEDERALIZADO",
                "links": {
                    "self": "/api/v0.1/schools/1/details/1",
                    "indicators": "/api/v0.1/schools/1/details/1/indicators",
                    "statistics": "/api/v0.1/schools/1/details/1/statistics",
                    "plans": null,
                    "teachers": "/api/v0.1/schools/1/details/1/teachers",
                    "director": "/api/v0.1/academics/1"
                }
            },
            {
                "id": 557,
                "cct": "14DJN1483L",
                "turn": "VESPERTINO",
                "email": "m.aeta@hotmail.com",
                "telephone": "36081429",
                "zone": 175,
                "sector": 2,
                "level": "PREESCOLAR",
                "program": "GENERAL",
                "sustenance": "FEDERALIZADO",
                "links": {
                    "self": "/api/v0.1/schools/1/details/557",
                    "indicators": "/api/v0.1/schools/1/details/557/indicators",
                    "statistics": "/api/v0.1/schools/1/details/557/statistics",
                    "plans": null,
                    "teachers": "/api/v0.1/schools/1/details/557/teachers",
                    "director": "/api/v0.1/academics/582"
                }
            }
        ]
    }
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>number</td>
<td>Identificador universal para este detalle de escuela</td>
</tr>
<tr>
<td>cct</td>
<td>string</td>
<td>Clave de centro de trabajo</td>
</tr>
<tr>
<td>turn</td>
<td>string</td>
<td>El tipo de <a href="#turno">turno</a></td>
</tr>
<tr>
<td>email</td>
<td>nullable string</td>
<td>Correo electrónico de este detalle de escuela</td>
</tr>
<tr>
<td>telephone</td>
<td>nullable string</td>
<td>Telefono de este detalle de escuela</td>
</tr>
<tr>
<td>zone</td>
<td>number</td>
<td>Zona escolar a la que pertenece el centro de trabajo</td>
</tr>
<tr>
<td>sector</td>
<td>number</td>
<td>Sector al que pertenece el centro de trabajo</td>
</tr>
<tr>
<td>level</td>
<td>string</td>
<td>Nivel educativo que imparte el centro de trabajo</td>
</tr>
<tr>
<td>program</td>
<td>string</td>
<td>programa educativo que imparte el centro de trabajo</td>
</tr>
<tr>
<td>sustenance</td>
<td>number</td>
<td>Fuente de sostenimiento</td>
</tr>
</tbody>
</table>
<h3>Turno</h3>
<table>
<thead>
<tr>
<th>Turnos</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>CONTINUO (JORNADA AMPLIADA)</td>
<td>Sin descripción</td>
</tr>
<tr>
<td>CONTINUO (TIEMPO COMPLETO)</td>
<td>Sin descripción</td>
</tr>
<tr>
<td>DISCONTINUO</td>
<td>Sin descripción</td>
</tr>
<tr>
<td>MATUTINO</td>
<td>Sin descripción</td>
</tr>
<tr>
<td>NOCTURNO</td>
<td>Sin descripción</td>
</tr>
<tr>
<td>VESPERTINO</td>
<td>Sin descripción</td>
</tr>
</tbody>
</table>
<h2>Recupera un solo de detalle de una escuela</h2>
<pre><code class="language-json">
    {
        "data": {
            "id": 1,
            "cct": "14DJN0128O",
            "turn": "MATUTINO",
            "email": "olgalilly62@hotmail.com",
            "telephone": "36080845",
            "zone": 175,
            "sector": 2,
            "level": "PREESCOLAR",
            "program": "GENERAL",
            "sustenance": "FEDERALIZADO",
            "links": {
                "self": "/api/v0.1/schools/1/details/1",
                "indicators": "/api/v0.1/schools/1/details/1/indicators",
                "statistics": "/api/v0.1/schools/1/details/1/statistics",
                "plans": null,
                "teachers": "/api/v0.1/schools/1/details/1/teachers",
                "director": "/api/v0.1/academics/1"
            }
        }
    }
</code></pre><h1>Indicadores</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "desercion": 0,
                "reprobacion": {
                    "ordinaria": 0,
                    "regularizados": 0
                },
                "eficiencia": 0,
                "links": [
                    {
                        "rel": "self",
                        "href": "/api/v0.1/schools/1/details/1/indicators"
                    }
                ]
            }
        ]
    }
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>desercion</td>
<td>double</td>
<td>Porsentaje de deserción</td>
</tr>
<tr>
<td>reprobacion</td>
<td>object</td>
<td>Porsentajes de reprobación</td>
</tr>
<tr>
<td>eficiencia</td>
<td>double</td>
<td>Porsentaje de eficiencia</td>
</tr>
</tbody>
</table>
<h2>reprobacion (object)</h2>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>ordinaria</td>
<td>double</td>
<td>Porsentaje alumnos reprobados en periodo ordinario</td>
</tr>
<tr>
<td>regularizados</td>
<td>double</td>
<td>Porsentaje alumnos reprobados tras una regularización</td>
</tr>
</tbody>
</table><h1>Estadisticas</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "students": {
                    "first": {
                        "mens": 0,
                        "women": 0,
                        "tatal": 0
                    },
                    "second": {
                        "mens": 42,
                        "women": 53,
                        "tatal": 95
                    },
                    "third": {
                        "mens": 50,
                        "women": 47,
                        "tatal": 97
                    },
                    "fourth": {
                        "mens": 0,
                        "women": 0,
                        "tatal": 0
                    },
                    "fifth": {
                        "mens": 0,
                        "women": 0,
                        "tatal": 0
                    },
                    "sixth": {
                        "mens": 0,
                        "women": 0,
                        "tatal": 0
                    },
                    "total_men": 0,
                    "total_women": 0,
                    "total": 192
                },
                "employees": {
                    "teachers": {
                        "general": 6,
                        "physical_education": 1,
                        "artistic_activities": 1,
                        "technological_activities": 0,
                        "language": 0
                    },
                    "administrative": 2,
                    "total": 11
                },
                "groups": 6,
                "links": [
                    {
                        "rel": "self",
                        "href": "/api/v0.1/schools/1/details/1/statistics"
                    }
                ]
            }
        ]
    }
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>students</td>
<td>object</td>
<td>Información de estudiantes</td>
</tr>
<tr>
<td>employees</td>
<td>object</td>
<td>Información de empleados</td>
</tr>
<tr>
<td>groups</td>
<td>number</td>
<td>Total de grupos</td>
</tr>
</tbody>
</table>
<h2>students (objetc)</h2>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>first</td>
<td>object</td>
<td>Información de alumnos en primer grado/semestre</td>
</tr>
<tr>
<td>second</td>
<td>object</td>
<td>Información de alumnos en segundo grado/semestre</td>
</tr>
<tr>
<td>third</td>
<td>object</td>
<td>Información de alumnos en tercer grado/semestre</td>
</tr>
<tr>
<td>fourth</td>
<td>object</td>
<td>Información de alumnos en cuarto grado/semestre</td>
</tr>
<tr>
<td>fifth</td>
<td>object</td>
<td>Información de alumnos en quinto grado/semestre</td>
</tr>
<tr>
<td>sixth</td>
<td>object</td>
<td>Información de alumnos en sexto grado/semestre</td>
</tr>
<tr>
<td>total_men</td>
<td>number</td>
<td>Total de alumnos hombres en todos los grados ó semestres</td>
</tr>
<tr>
<td>total_women</td>
<td>number</td>
<td>Total de alumnas mujeres en todos los grados ó semestres</td>
</tr>
<tr>
<td>total</td>
<td>number</td>
<td>Total de alumnos de todos los grados ó semestres</td>
</tr>
</tbody>
</table>
<h3>first, second, third, fourth, fifth, sixth</h3>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>mens</td>
<td>number</td>
<td>Total de alumnos hombres de este grado/semestre</td>
</tr>
<tr>
<td>women</td>
<td>number</td>
<td>Total de alumnas mujeres de este grado/semestre</td>
</tr>
<tr>
<td>total</td>
<td>number</td>
<td>Total de alumnos de todo el grado/semestre</td>
</tr>
</tbody>
</table>
<h2>employees (objetc)</h2>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>teachers</td>
<td>object</td>
<td>Información de profesores</td>
</tr>
<tr>
<td>administrative</td>
<td>number</td>
<td>Total de empleados adminisrativos</td>
</tr>
<tr>
<td>total</td>
<td>number</td>
<td>Total de empleados</td>
</tr>
</tbody>
</table>
<h3>teachers (object)</h3>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>general</td>
<td>number</td>
<td>Total de profesores generales</td>
</tr>
<tr>
<td>physical_education</td>
<td>number</td>
<td>Total de profesores de educación fisica</td>
</tr>
<tr>
<td>artistic_activities</td>
<td>number</td>
<td>Total de profesores de actividades artisticas</td>
</tr>
<tr>
<td>technological_activities</td>
<td>number</td>
<td>Total de profesores de actividades tecnologicas</td>
</tr>
<tr>
<td>language</td>
<td>number</td>
<td>Total de profesores de idiomas</td>
</tr>
</tbody>
</table><h1>Resultados Planea</h1>
<pre><code class="language-json">
    {
        "data": [
            {
                "size": 4,
                "subjects_evaluated": {
                    "mathematics": [
                        {
                            "grade": "i",
                            "percentage": 25
                        },
                        {
                            "grade": "ii",
                            "percentage": 50
                        },
                        {
                            "grade": "iii",
                            "percentage": 0
                        },
                        {
                            "grade": "iv",
                            "percentage": 25
                        }
                    ],
                    "literature": [
                        {
                            "grade": "i",
                            "percentage": 50
                        },
                        {
                            "grade": "ii",
                            "percentage": 50
                        },
                        {
                            "grade": "iii",
                            "percentage": 0
                        },
                        {
                            "grade": "iv",
                            "percentage": 0
                        }
                    ]
                },
                "evaluated": {
                    "mathematics": 100,
                    "literature": 100
                },
                "reliability": {
                    "mathematics": false,
                    "literature": false
                },
                "representation": {
                    "mathematics": true,
                    "literature": true
                }
            }
        ]
    }
</code></pre>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>size</td>
<td>number</td>
<td>sin descripción</td>
</tr>
<tr>
<td>subjects_evaluated</td>
<td>object</td>
<td>sin descripción</td>
</tr>
<tr>
<td>evaluated</td>
<td>object</td>
<td>sin descripción</td>
</tr>
<tr>
<td>reliability</td>
<td>object</td>
<td>sin descripción</td>
</tr>
<tr>
<td>representation</td>
<td>object</td>
<td>sin descripción</td>
</tr>
</tbody>
</table>
<h2>subjects_evaluated (object)</h2>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>mathematics</td>
<td>array</td>
<td>sin descripción</td>
</tr>
<tr>
<td>literature</td>
<td>array</td>
<td>sin descripción</td>
</tr>
</tbody>
</table>
<h2>evaluated (object)</h2>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>mathematics</td>
<td>number</td>
<td>sin descripción</td>
</tr>
<tr>
<td>literature</td>
<td>number</td>
<td>sin descripción</td>
</tr>
</tbody>
</table>
<h2>reliability (object)</h2>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>mathematics</td>
<td>boolean</td>
<td>sin descripción</td>
</tr>
<tr>
<td>literature</td>
<td>boolean</td>
<td>sin descripción</td>
</tr>
</tbody>
</table>
<h2>representation (object)</h2>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Tipo</th>
<th>Descripción</th>
</tr>
</thead>
<tbody>
<tr>
<td>mathematics</td>
<td>boolean</td>
<td>sin descripción</td>
</tr>
<tr>
<td>literature</td>
<td>boolean</td>
<td>sin descripción</td>
</tr>
</tbody>
</table>
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="cURL">cURL</a>
                                    <a href="#" data-language-name="CSharp">CSharp</a>
                                    <a href="#" data-language-name="Java">Java</a>
                                    <a href="#" data-language-name="Javascript">Javascript</a>
                                    <a href="#" data-language-name="PHP">PHP</a>
                              </div>
                </div>
    </div>
  </body>
</html>