#  Connectando Mi Escuela Migraciones

[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

## Requerimientos



## Servicios RESTfull

 Method   | URI                                                                | Middleware  
 -------- | ------------------------------------------------------------------ | ------------
 GET      | v0.1/academics                                                     | web,api,cors
 GET      | v0.1/academics/{academic_id}                                       | web,api,cors
 GET      | v0.1/cct/activos                                                   | web,api,cors
 GET      | v0.1/cct/estadisticas                                              | web,api,cors
 GET      | v0.1/cct/indicadores                                               | web,api,cors
 GET      | v0.1/educational/levels                                            | web,api,cors
 GET      | v0.1/educational/levels/{level_id}                                 | web,api,cors
 GET      | v0.1/educational/programs                                          | web,api,cors
 GET      | v0.1/educational/programs/{program_id}                             | web,api,cors
 GET      | v0.1/inegi/locations                                               | web,api,cors
 GET      | v0.1/inegi/locations/{location_id}                                 | web,api,cors
 GET      | v0.1/inegi/municipalities                                          | web,api,cors
 GET      | v0.1/inegi/municipalities/{municipalitie_id}                       | web,api,cors
 GET      | v0.1/schools                                                       | web,api,cors
 GET      | v0.1/schools/{school_id}                                           | web,api,cors
 GET      | v0.1/schools/{school_id}/details                                   | web,api,cors
 GET      | v0.1/schools/{school_id}/details/{detail_id}                       | web,api,cors
 GET      | v0.1/schools/{school_id}/details/{detail_id}/indicators            | web,api,cors
 GET      | v0.1/schools/{school_id}/details/{detail_id}/statistics            | web,api,cors
 GET      | v0.1/schools/{school_id}/details/{detail_id}/teachers              | web,api,cors
 GET      | v0.1/schools/{school_id}/details/{detail_id}/teachers/{teacher_id} | web,api,cors