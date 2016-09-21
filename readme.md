#  Connectando Mi Escuela Migraciones

[![License](https://poser.pugx.org/conectando-my-school/migrations/license.svg)](http://104.131.140.61)


## Requerimientos

> Instalar

- PHP 7.0+
- MySQL 5.1+
- composer 1.2.0+

> Instalación


```bash
	
	# Instalamos la dependencias
	composer install

	# creamos un archivo de configuraciones
	copy .env.example .env

	# Modificamos los valores para acceso a la base de datos
	vim .env
	
``` 

> Configuraciones .env

```

	# Con el comando php artisan key:generate generas un app key
	APP_KEY=
	
	# Puede utilizar los siguientes manejadores sqlite, mysql, pgsql
	DB_CONNECTION=mysql
	# Modifique los valores de conexión segun sus necesidades
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=homestead
	DB_USERNAME=homestead
	DB_PASSWORD=secret

```

> Creación de migraciones (tablas y registros)

```bash

	# Crea las tablas en la base de datos previamente configurada
	php artisan migrate

	# Crea todos los registros mediante los .csv proporcionados por Retos Jalisco
	php artisan db:seed
    php artisan db:seed --class=EscuelasTableSeeder
    php artisan db:seed --class=DetallesEscuelasTableSeeder
    php artisan db:seed --class=EscuelasAcademicosTableSeeder
    php artisan db:seed --class=EstadisticasTableSeeder
    php artisan db:seed --class=IndicadoresTableSeeder
    php artisan db:seed --class=ResultadosPlaneaTableSeeder
    
``` 

> Despliegue de la aplicación en modo desarrollo

```bash

	# despliega la aplicación en htttp://localhost:8080
	php artisan serve

```

## Servicios RESTfull

> Todos los servicios disponibles

 Method    | URI                                                                    | Name                                      | Middleware   
---------- | ---------------------------------------------------------------------- | ----------------------------------------- | -------------
 GET/HEAD  | api/v0.1/academics                                                     | api.v0.1.academics.index                  | web,api,cors 
 POST      | api/v0.1/academics                                                     | api.v0.1.academics.store                  | web,api 
 GET/HEAD  | api/v0.1/academics/{academic_id}                                       | api.v0.1.academics.show                   | web,api,cors 
 DELETE    | api/v0.1/academics/{academic_id}                                       | api.v0.1.academics.destroy                | web,api 
 PUT/PATCH | api/v0.1/academics/{academic_id}                                       | api.v0.1.academics.update                 | web,api 
 GET/HEAD  | api/v0.1/cct/download/{filename}                                       | api.v0.1.cct.download                     | web,api 
 GET/HEAD  | api/v0.1/educational/levels                                            | api.v0.1.educational.levels.index         | web,api,cors 
 GET/HEAD  | api/v0.1/educational/levels/{level_id}                                 | api.v0.1.educational.levels.show          | web,api,cors 
 GET/HEAD  | api/v0.1/educational/programs                                          | api.v0.1.educational.programs.index       | web,api,cors 
 GET/HEAD  | api/v0.1/educational/programs/{program_id}                             | api.v0.1.educational.programs.show        | web,api,cors 
 GET/HEAD  | api/v0.1/inegi/locations                                               | api.v0.1.inegi.locations.index            | web,api,cors 
 GET/HEAD  | api/v0.1/inegi/locations/{location_id}                                 | api.v0.1.inegi.locations.show             | web,api,cors 
 GET/HEAD  | api/v0.1/inegi/municipalities                                          | api.v0.1.inegi.municipalities.index       | web,api,cors 
 GET/HEAD  | api/v0.1/inegi/municipalities/{municipalitie_id}                       | api.v0.1.inegi.municipalities.show        | web,api,cors 
 GET/HEAD  | api/v0.1/schools                                                       | api.v0.1.schools.index                    | web,api,cors 
 GET/HEAD  | api/v0.1/schools/{school_id}                                           | api.v0.1.schools.show                     | web,api,cors 
 GET/HEAD  | api/v0.1/schools/{school_id}/details                                   | api.v0.1.schools.details.index            | web,api,cors 
 GET/HEAD  | api/v0.1/schools/{school_id}/details/{detail_id}                       | api.v0.1.schools.details.show             | web,api,cors 
 GET/HEAD  | api/v0.1/schools/{school_id}/details/{detail_id}/indicators            | api.v0.1.schools.details.indicators.index | web,api,cors 
 GET/HEAD  | api/v0.1/schools/{school_id}/details/{detail_id}/plans                 | api.v0.1.schools.details.plans.index      | web,api,cors 
 GET/HEAD  | api/v0.1/schools/{school_id}/details/{detail_id}/statistics            | api.v0.1.schools.details.statistics.index | web,api,cors 
 GET/HEAD  | api/v0.1/schools/{school_id}/details/{detail_id}/teachers              | api.v0.1.schools.details.teachers.index   | web,api,cors
 GET/HEAD  | api/v0.1/schools/{school_id}/details/{detail_id}/teachers/{teacher_id} | api.v0.1.schools.details.teachers.show    | web,api,cors 
