## Test REST API application on [Yii2](https://github.com/yiisoft/yii2)

[![Build Status](https://travis-ci.org/githubjeka/yii2-rest.svg)](https://travis-ci.org/githubjeka/yii2-rest)

[Demo Server](https://yii2-rest-githubjeka.c9.io/rest/web/)

###INSTALLATION###

**Install via Composer**

If you do not have [Composer](http://getcomposer.org/), you may install it by following the
[instructions at getcomposer.org](https://getcomposer.org/doc/00-intro.md).

You can then install the application using the following commands:

```
composer global require "fxp/composer-asset-plugin:~1.0.0"
composer create-project --prefer-dist -s dev "githubjeka/rest-yii2" .
```

###GETTING STARTED###

After you install the application, you have to conduct the following steps to initialize the installed application.
You only need to do these once for all.

- Create a new database and adjust the components['db'] configuration in `environments/dev/common/config/main-local.php` accordingly.
- Run command `php init --env=Development` to initialize the application with a specific environment.
- Apply migrations with console command ``php yii migrate``. This will create tables needed for the application to work.
- Set document roots of your Web server:

for rest `/path/to/yii-application/rest/web/` and using the URL `http://localhost/`
for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend-localhost/`

Use `demo/demo` to login into the application on `http://localhost/v1/user/login`. See `/rest/config/main.php` for more info by URL

###Configuration for Apache###
Add `.htaccess` to `\rest\web`
```
RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule (.*) index.php [L]
```

###Configuration for Nginx###
```
include common/upstream;

server {
    charset utf-8;
    client_max_body_size 128M;

    listen 80; ## listen for ipv4
    #listen [::]:80 default_server ipv6only=on; ## listen for ipv6

    server_name localhost;
    root        /var/www/rest/rest/web;
    index       index.php;

    #access_log  /var/www/log/rest-access.log main;
    #error_log   /var/www/log/rest-error.log;

    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php?$args;
    }

    # uncomment to avoid processing of calls to non-existing static files by Yii
    location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
        try_files $uri =404;
    }
    #error_page 404 /404.html;

    location ~ \.php$ {
        include common/php-fpm;
        try_files $uri =404;
    }

    location ~ /\.(ht|svn|git) {
        deny all;
    }
}
```
[More information ... ](https://github.com/githubjeka/angular-yii2)

**TBD..**
