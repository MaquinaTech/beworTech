## IMPORTANTE
Este proyecto dispone de una rama adicional llamada "Employee", donde se implementa el ejercicio opcional que sugiere añadir una nueva entidad de dominio.

#### DOCUMENTACIÓN
https://docs.google.com/document/d/1-e_aLZzNSFUCaJeaCFWBZRqZb-rswCAysgrNuP_YDAc/edit?usp=sharing

#### INSTALACIÓN

 - Clonar el repositorio.
 - Crear el archivo `.env` (ejemplo en `.env.example`).
 - Instalar las dependencias `composer install`.
 - Ejecutar las migraciones `php artisan migrate`.
 - Ejecutar `php artisan key:generate`.
 - Validar instalación con los test `php artisan test`.
----

#### REQUISISTOS

 - PHP 7.3
 - Mysql o MariaDB

----

#### EJERCICIOS

 - Agregar las propiedades `email` y `address` a las compañías.
 - Crear un nuevo caso de uso para actualizar el estado de una compañía de `inactive` a `active`.
 - Crear un nuevo endpoint de API que actualice el estado usando el caso de uso del punto anterior.
 - Crear nuevo caso de uso que liste todas las compañías.
 - Crear un nuevo endpoint de API que liste las compañías en base al caso de uso del punto anterior.
 - Los test deben pasar después de realizar los cambios.
 - Opcional: Implementa cualquier otra entidad de dominio.


#### ENTREGAR PRUEBA

 - Hacer fork del repositorio.
 - Antes de realizar ningún cambio, suba el código a un repositorio público de su propiedad indicando como comentario del commit "Initial commit".
 - Realizar los ejercicios y subir los cambios a su repositorio.
 - Cuando la finalice, envie un email a pbodelon@vocces.com indicando el link de su repositorio.
