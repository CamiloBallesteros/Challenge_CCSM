# Challenge CCSM
Proyecto de prueba desarrollado usando HTML,CSS,PHP en un servidor apache y una Base de Datos MySQL todo esto bajo el modelo Vista Controlador (MVC).
Dicho proyecto consiste en la creacion de una pagina web para registrar eventos, asi como las personas que asisten al mismo, CRUD de los objetos siempre manteniendo la jerarquia de carpetas MVC, creacion de paneles de estadistica y consulta de datos, asi como un panel de administracion para actualizacion y eliminacion de datos.

## Comenzando 🚀

Este proyecto utiliza una Base de Datos MySQL que corre localmente, el schema utilizado se encuentra bajo la carpeta Database_schema es un script Dump.sql el cual se ejecuta a traves de mysql y carga el schema utilizado por la aplicacion. ADemas de este debe tener en cuenta el archivo config.php que se encuentra bajo la carpeta config/config.php, en este archivo estan las configuraciones de conexion a la base de datos, aca se deben colocar las configuraciones propias de cada usuario.

Mira **Deployment** para conocer como desplegar el proyecto.


### Pre-requisitos 📋

Debe estar instalado el servidor de apache , asi como el mysql_server.
Anbos deben estar corriendo como servicios al momento de ejecutar la aplicacion en la direccion deseada, (por defecto: http/localhost/)


### Instalación 🔧

Instalar mysql y php usando la configuracion de apache.
Verificar que los servicios de mysql y apache esten ejecutandose, asi como sus puertos de configuracion(*:3306 y *:80, respectivamente) esten disponibles.
Verificar las rutas en las que se ejecutan los archivos .php, (En caso de linux los proyectos deben colocarse en rutas como '/var/www/html') a no ser que se mapeen estas rutas usando los archivos de configuracion de apache.

## Despliegue 📦

El archivo inicial seria (index.php) que se encuentra en la carpeta /root del proyecto, esta es la que carga la aplicacion asi como los controladores para iniciar.

## Construido con 🛠️


* [MySQL](https://dev.mysql.com/doc/) - La base de datos utilizada


## Autores ✒️


* **Camilo Ballesteros** - *Development* - 

