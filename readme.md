#  Connectando Mi Escuela Migraciones

[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

## Servicios RESTfull
 Method   | uri                                                                | route name                            | middleware   |
 -------- | ------------------------------------------------------------------ | ------------------------------------- | ------------ |
 GET HEAD | v0.1/academics                                                     | v0.1.academics.index                  | web,api,cors |
 GET HEAD | v0.1/academics/{academic_id}                                       | v0.1.academics.show                   | web,api,cors |
 GET HEAD | v0.1/cct/activos                                                   |                                       | web,api,cors |
 GET HEAD | v0.1/cct/estadisticas                                              |                                       | web,api,cors |
 GET HEAD | v0.1/cct/indicadores                                               |                                       | web,api,cors |
 GET HEAD | v0.1/educational/levels                                            | v0.1.educational.levels.index         | web,api,cors |
 GET HEAD | v0.1/educational/levels/{level_id}                                 | v0.1.educational.levels.show          | web,api,cors |
 GET HEAD | v0.1/educational/programs                                          | v0.1.educational.programs.index       | web,api,cors |
 GET HEAD | v0.1/educational/programs/{program_id}                             | v0.1.educational.programs.show        | web,api,cors |
 GET HEAD | v0.1/inegi/locations                                               | v0.1.inegi.locations.index            | web,api,cors |
 GET HEAD | v0.1/inegi/locations/{location_id}                                 | v0.1.inegi.locations.show             | web,api,cors |
 GET HEAD | v0.1/inegi/municipalities                                          | v0.1.inegi.municipalities.index       | web,api,cors |
 GET HEAD | v0.1/inegi/municipalities/{municipalitie_id}                       | v0.1.inegi.municipalities.show        | web,api,cors |
 GET HEAD | v0.1/schools                                                       | v0.1.schools.index                    | web,api,cors |
 GET HEAD | v0.1/schools/{school_id}                                           | v0.1.schools.show                     | web,api,cors |
 GET HEAD | v0.1/schools/{school_id}/details                                   | v0.1.schools.details.index            | web,api,cors |
 GET HEAD | v0.1/schools/{school_id}/details/{detail_id}                       | v0.1.schools.details.show             | web,api,cors |
 GET HEAD | v0.1/schools/{school_id}/details/{detail_id}/indicators            | v0.1.schools.details.indicators.index | web,api,cors |
 GET HEAD | v0.1/schools/{school_id}/details/{detail_id}/statistics            | v0.1.schools.details.statistics.index | web,api,cors |
 GET HEAD | v0.1/schools/{school_id}/details/{detail_id}/teachers              | v0.1.schools.details.teachers.index   | web,api,cors |
 GET HEAD | v0.1/schools/{school_id}/details/{detail_id}/teachers/{teacher_id} | v0.1.schools.details.teachers.show    | web,api,cors |