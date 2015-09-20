# ![logo](https://raw.githubusercontent.com/Qualtiva/StockAPP/master/estatico/img/logo.png) v1.0.5 Estable
## Requerimientos

+ Platforma: Windows
+ Processor with SSE2 support
+ PHP ≥ 5.5.1
+ MySQL ≥ 5.1.0
+ Apache HTTP server

## Instalación
Puede instalar y acceder a él StockAPP súper fácil. Recuerde que debe eliminar la carpeta "instalar" después de terminada la instalación.

## Desarrolladores StockAPP
Para desarrollar "StockAPP" recomendamos activar la opción de  [ENTORNO_DESARROLLO](https://github.com/Qualtiva/StockAPP/blob/master/sistema/Qualtiva.php#L28)

## Temas de Información
Los problemas pueden ser reportados a través del [seguimiento de incidencias de Github] (https://github.com/Qualtiva/StockAPP/issues).

## * IIS 8.0:
http://www.iis.net/downloads/microsoft/url-rewrite

## * NGINX:
http://winginx.com/en/htaccess

Ejemplo
```
# Copyright (C) 2015 StockApp <http://qualtivacr.com>
# nginx configuration
location / {
if (!-e $request_filename){
rewrite ^(.*)$ /$1.php break;
}
}
location /reimprimir {
rewrite ^/reimprimir/(.+)$ /re-imprimir.php?id=$1;
}
location /estado {
rewrite ^/estado-de-cuenta/(.+)/(.+)$ /estadodecuenta.php?id=$1&title=$2;
}
```
## Lista Desarrollo :octocat:
- [x] Módulo Multi-usuario 
- [x] Módulo Multi-establecimiento
- [x] Módulo de Productos
- [x] Módulo de Ventas
- [x] Módulo de Clientes
- [x] Módulo de Proveedores
- [x] Módulo de Categorías (Departamentos)
- [x] Kardex
- [x] Módulo de Inventario
- [ ] Módulo de Cortes de Caja
- [ ] Generación de reportes por rango de fecha
- [ ] Impresión de reportes en Word, Excel & PDF
