# Prueba Claro Insurance

Prueba Técnica

## Resumen

  * [Instalación](#instalacion)
  * [Optimizando el proyecto en producción](#optimizando-el-proyecto-en-produccion)
  * [API](#api)
  * [Test](#test)
### Instalación

1. Clonar el repositorio en una carpeta(claroinsurance):

> git clone https://github.com/ShonenPMA/claroinsurance.git  claroinsurance

2. Ir a la carpeta y ejecutar el comando:

> composer install --optimize-autoloader --no-dev

3. Copiar el .env.example para generar tus variables de entorno:

> cp .env.example .env

4. Editar tu archivo .env:

> nano .env

5. Generar la llave de la aplicación:

> php artisan key:generate

6. Ejecutar migraciones

> php artisan migrate

7. Asignar permisos a las carpetas bootstrap/cache y storage

> chmod -R 775 boostrap/cache
>
> chmod -R 775 storage

8. Generar los assets

> npm install && npm run production
> sudo cp -r node_modules/tinymce/skins public/js/skins/

9. Configurar en public_html el acceso a tu app (Opcional según donde se haga el deploy)

    9.1. Si se usara el proyecto como principal
    > ln -s /home/user/claroinsurance/public public_html 

    9.2 Si se usara el proyecto como secundario

    > ln -s /home/user/claroinsurance/public claroinsurance 

10. Una vez creado nuestro hipervinculo en el paso 9 crearemos el hipervinculo para la carpeta storage

>php artisan storage:link (en el path de tu aplicacion)
### Optimizando el proyecto en producción

Cada vez que se actualice el repositorio y para obtener un mejor rendimiento del aplicativo se deberán ejecutar los siguientes comandos:

> php artisan config:cache
>
> php artisan route:cache
>
> php artisan view:cache


Comandos opcionales y se deberan ejecutar cuando:
1. Si se han añadido nuevos paquetes o modificado el archivo composer.sjon

> composer install --optimize-autoloader --no-dev

2. Se actualizaron los assets o cambió el archivo webpack.mix.js

> npm run production

3. Se crearon nuevas migraciones

> php artisan migrate


### API


#### Email

  * **GET**: `api/emails`
    * Parámetros adicionales:
        * size : cantidad de correos a obtener por página
        * receiver : correo del destinatario
        * sender: correo del remitente
        * subject: asunto del correo
    

### Test 
 * Crear archivo /database/test.sqlite
 * Ejecutar el comando `php artisan test --parallel`
 * Para ver cada test en especifico `php artisan test --filter nombreDeLaClase`
 * Para ver una clase repetida con diferente folder padre por ejemplo EmailControllerTest está en Api como en Web
   * `php artisan test --filter 'Api\\EmailControllerTest'` => para api
   * `php artisan test --filter 'Web\\EmailControllerTest'` => para web
 * Para ver cada test a detalle ejecutar `php artisan test`