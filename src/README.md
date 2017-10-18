# Drupal Facultad de Medicina


## Requerimientos previos

1. Servidor Linux
2. PHP 5.6 o superior
3. Apache 2, mod rewrite
4. MySQL o PosgreeSQL
5. Tener instalado composer



## Pasos para instalar

1. Clonar el repositorio
2. Ejecutar el comando composer install
3. Crear una base de datos y volcar el contenido del .sql que esta en la carpeta de db_backups
4. Acceder al navegador a la url comnfigurada por apache. EL instalador de drupal conezara a consultarle por los datos de instalación.
5. Completar con usuario y pass de DB
6. Acceder al sitio. User: admin Pass:1234


## Notas de Desarrollo Drupal

Se creo una taxonomía para carreras y otra para cátedreas.

A partir de esas taxonomías se les creo a los usuarios un campo de "Publicar en", relacionado con las taxonomias.

Se crearon 2 tipos de contenidos: Pagina de Carrera y Página de Catedre. Ambos tambien se relacionan con las taxonomías

Se crearon 2 vistas para filtrar las taxonomías del usuario actual. de modo que el sistema le permite publicar solo en aquellas que fue dado de alta.


### Parches
Se aplico el parche 
https://www.drupal.org/files/issues/2910501-10.patch

Dado este issue
https://www.drupal.org/node/2910501

Si se experimenta problemas con las relaciones entre las vistas y el campo, aplicar el patch.



