# slimphp-twitter-api
Proyecto para conectar a la api de Twitter y obtener los últimos 10 tweets de un usuario con SlimPHP

Para este proyecto instalé:

#Composer 
https://getcomposer.org/download/

#Slim  
https://www.slimframework.com/

Utilicé LAMP (apache2) de forma local en una notebook con Ubuntu 14.04 y 
PHP V 5.6. Por lo tanto este instructivo se realiza conforme a estas herramientas.

Para instalar dependencias correr el comando "composer install" dentro del directorio del proyecto.

Quitamos el index.php mediante htaccess ubicado en la carpeta public del proyecto para los endpoint de la siguiente manera: 

        RewriteEngine on
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule . index.php [L]

En caso de que siga solicientando el "index.php" en la ruta, revisar si en la configuración de apache tiene la opción 
AllowOverride del directorio /var/www/ en None y modificarla de la siguiente manera:

<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride None  --> Pasar a AllowOverride All
        Require all granted
</Directory>


Procurar tener instalado curl, para poder conectarse con la api de Twitter     
(Instalar la versión de curl correspondiente a la versión de php)

Comando para instalar curl en esta versión: sudo apt-get install php5.6-curl

Una vez que hayamos finalizado con las configuraciones, frenar los servicios de apache y volver a inicializarlos, ya que
con reiniciarlos no siempre funciona correctamente.


