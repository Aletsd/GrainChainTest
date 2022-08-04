## Requerimientos

-   PHP 8.1 o superior
-   Composer

## Pasos para hacer el deployment

-   git clone url (para clonar el proyecto)
-   composer install para instalar las dependecias de composer
-   php artisan serve para levantar un servidor localhost

## Formas de hacer la prueba

-   La primer forma es mediante postmant ya que e preparado un microservicio que recibe el archivo y te devuelve la matriz iluminada,
    para esto la url del servicio es http://127.0.0.1:{port}/api/file-light-bulbs, de tipo "post", ocupas enviar con el name file_light,
    te dejo adjunto el postman por si lo necesitas.

-   La segunda forma, prepare un test con html donde puedes acceder a esta url http://127.0.0.1:{port}/test.html y desde aca subir el archivo, el archivo prueba la encontraras en la raiz de este proyecto con el nombre de "file_light.txt", sientete libre de modificar la matriz para generar distintos escenarios.

## Alternativas

Si por alguna razon no logras hacer el deploy de la herramienta, te he dejado las siguientes url donde puedes verificar la funcionalidad de ella.

-   Url test "https://apptechmx.com.mx/grainchain/public/test.html"

-   Url para probar desde postman el servicio de tipo post "https://apptechmx.com.mx/grainchain/public/api/file-light-bulbs"

Con gusto puedo resolver dudas o charlar acerca de la solucion, saludos (:
