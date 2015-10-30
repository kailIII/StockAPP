# ![logo](https://raw.githubusercontent.com/Qualtiva/StockAPP/master/estatico/img/logo.png)
## StockApp v1.0.5 Estable
StockApp es el mejor software para Puntos de Venta, Ferreterías, Bodegas, Farmacias y muchos otros negocios podrán gestionarse fácilmente con StockApp, controle fácilmente su Stock de Productos agrupe sus productos por Categorías, Marcas, controle las Unidades de Medida de cada uno de ellos , Registre sus Ventas las cuales disminuirán automáticamente el stock de sus productos al igual que las Compras adicionarán el stock de ellos, sepa cuánto gana que artículos vende más, cuanto artículos tiene en su Stock cual es el precio de sus artículos, sepa cuanto compró este mes , cuanto gastó, obtenga el inventario valorizado de su negocio con un solo click, StockApp es muy fácil de usar y lo mejor de todo es que es GRATIS.

StockApp es muy fácil de utilizar y no requiere de conocimientos de Contabilidad u otros términos complejos para las PYMES y MYPES, es ideal para pequeños y medianos negocios. Controle su Stock fácilmente ya que al realizar una venta, el Stock disminuirá automáticamente , y al realizar una compra aumentará. Así de Fácil, no se complique con terminos contables y operaciones en sistemas Grandes que no se adaptan a su negocio, y si no se adapta StockApp lo adaptamos completamente a tu negocio, solamente tienes que [Contáctanos](http://www.qualtivacr.com/contacto/)

StockApp va dirigido a pequeñas y medianas empresas que quieren controlar el Stock de sus productos fácilmente así como registrar sus compras y ventas de una manera sencilla y rápida sin tener muchos conocimientos de computación.

## Requerimientos

+ Platforma: Windows / Linux
+ Procesador con soporte SSE2
+ PHP ≥ 5.5.1
+ MySQL ≥ 5.1.0
+ Servidor HTTP Apache

## Instalación
Puede instalar y acceder a él StockAPP súper fácil. Recuerde que debe eliminar la carpeta "instalar" después de terminada la instalación. (Instalación "Paso a Paso" se encuentra desactualizada, intalación manual )

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
- [x] Módulo Multi-Caja
- [x] Módulo Multi-establecimiento
- [x] Módulo de Productos
- [x] Módulo de Ventas
- [x] Módulo de Clientes
- [x] Módulo de Proveedores
- [x] Módulo de Categorías (Departamentos)
- [x] Módulo de Kardex (General/Productos)
- [x] Módulo de Notificaciones
- [x] Módulo de Inventario
- [x] Módulo de Entradas y Salidas de Dinero
- [x] Módulo de Caja Chica
- [x] Módulo de Cortes de Caja
- [ ] Módulo de Multi-Tabs Caja Temporal(Multiples clientes, Bares, Restaurantes, entre otros)
- [ ] Generación de reportes por rango de fecha
- [ ] Impresión de reportes en Word, Excel & PDF
