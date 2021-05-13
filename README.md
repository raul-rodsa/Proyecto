# Proyecto final - PHyGinx
## Stack LEMP basado en docker-compose
Este es mi proyecto de fin de grado.  
Consiste en el despliegue de un stack LEMP (Servidor Nginx, MySQL, PHP y PHPMyAdmin para linux) totalmente funcional desde el minuto 1 mediante docker-compose.

### Instrucciones:
1. Clonar el repositorio en tu máquina Linux
2. Ir a la carpeta PHyGinx/imagenes/php y crear la imagen de php con:

         docker build -t nombre_imagen . 
         
3. Ir al directorio **PHyGinx** y ejecutar 
        
        docker-compose up
        #Para levantarlo en segundo plano:
        docker-compose up -d
        
4. En la sección de mysql, configurar con las credenciales que elijas las variables de entorno para poder acceder a la base de datos :

         environment:
             MYSQL_DATABASE: 'base_de_datos'
             MYSQL_USER: 'usuario'
             MYSQL_PASSWORD: 'password'
             MYSQL_ROOT_PASSWORD: 'password'
             
   Por defecto estarán las mías
   
5. Ya estaría levantado todo el servidor.

6. Para pararlo simplemente hay que hacer *Ctrl + C* si no lo hemos iniciado en segundo plano. Si queremos detener el proceso en segundo plano sería desde el directorio **PHyGinx** ejecutando:

                   docker-compose stop 

7. Si queremos eliminar los contenedores que hemos creado al levantar el docker-compose, ejecutaremos:

                  docker-compose stop



### Observaciones: 
- Para cambiar el nombre del servidor:

    1. Ir a la carpeta principal, configurar el archivo *site.conf* y cambiar la directiva servername.
    2. Después ir a /etc/hosts y añadir el nombre que hayas puesto como nombre del servidor.
    
- Para cambiar los puertos por si ya tenemos alguno en uso, se mapean desde el docker-compose.yml en la sección puertos de cada servicio. Por ejemplo:

        web:
          image: nginx:latest
          ports:
              - "8080:80"
            ( - "puerto_host:puerto_contenedor" )



  Hay que tener cuidado con esto, porque si no va a dar un error bastante grave y no funcionará.
  
- Para introducir registros en la base de datos habría que ir a phpmyadmin, cuando cuando levantas PHyGinx por primera vez todo está vacío.
