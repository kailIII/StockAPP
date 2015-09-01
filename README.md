# ![logo](https://raw.githubusercontent.com/Qualtiva/StockAPP/master/estatico/img/logo.png)
## Requerimientos

+ Platforma: Windows
+ Processor with SSE2 support
+ PHP ≥ 5.5.1
+ MySQL ≥ 5.1.0
+ Apache HTTP server

## * IIS 8.0:
http://www.iis.net/downloads/microsoft/url-rewrite

## * NGINX:
http://winginx.com/en/htaccess

Ejemplo
```
# nginx configuration
error_page 404 http://localhost/404;
location / {
if (!-e $request_filename){
rewrite ^(.*)$ /$1.php break;
}
}
location /blog {
rewrite ^/blog/(.+)/(.+)$ /article.php?id=$1&title=$2;
}
```
