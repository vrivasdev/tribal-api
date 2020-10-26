Instrucciones para implementación de la API:

1) Instalar PHP 7.4 

2) Clonar el proyecto en el ambiente:
$git clone git@github.com:vrivasdev/tribal-api.git

3) Instalar Laravel:
$composer global require laravel/installer

4) Ejecutar el servidor interno de Laravel con Artisan:
$php artisan serve

5) Una vez que ha ejecutado el servicio podrá ejecutar las pruebas web. Clonar el siguiente repositorio:
$git clone git@github.com:vrivasdev/tribal-web.git

6) Una vez descargado el proyecto deberá configurar apache o su servicio de preferencia.

7) Abrir el proyecto web de pruebas en el navegador.

8) Realice las búsquedas.

9) Si desea ejectuar pruebas de los servicios con postman agregar el siguiente servicio a su colección:
GET: http://127.0.0.1:8000/resource?key=jackson&type=music
