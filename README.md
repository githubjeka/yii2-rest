## TEST REST API APPLICATION ON [Yii2](https://github.com/yiisoft/yii2)

[![Build Status](https://travis-ci.org/githubjeka/yii2-rest.svg)](https://travis-ci.org/githubjeka/yii2-rest)

[Demo Server](https://yii2-rest-githubjeka.c9.io/rest/web/)

###INSTALLATION

**Install via Composer**

If you do not have [Composer](http://getcomposer.org/), you may install it by following the
[instructions at getcomposer.org](https://getcomposer.org/doc/00-intro.md).

You can then install the application using the following commands:

```
composer global require "fxp/composer-asset-plugin:~1.0.0"
composer create-project --prefer-dist -s dev "githubjeka/rest-yii2" .
```

###GETTING STARTED

After you install the application, you have to conduct the following steps to initialize the installed application.
You only need to do these once for all.

- Run command `php init --env=Development` to initialize the application with a specific environment.
- Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
- Apply migrations with console command ``php yii migrate``. This will create tables needed for the application to work.
- Set document roots of your Web server:

for rest `/path/to/yii-application/rest/web/` and using the URL `http://localhost/`
for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend-localhost/`

Use `demo/demo` to login into the application on [http://localhost/v1/user/login](http://localhost/v1/user/login). See 
[`/rest/config/main.php`](/rest/config/main.php) for more info by URL

###URL RULE

See [rest/config/main.php](rest/config/main.php)

API available:

```php
// version 1
OPTIONS /index.php?r=v1/user/login
POST /index.php?r=v1/user/login

OPTIONS /index.php?r=v1/posts
GET /index.php?r=v1/posts
GET /index.php?r=v1/posts/ID
POST /index.php?r=v1/posts
PUT /index.php?r=v1/posts/ID
DELETE /index.php?r=v1/posts/ID

OPTIONS /index.php?r=v1/comments
GET /index.php?r=v1/comments
GET /index.php?r=v1/comments/ID
POST /index.php?r=v1/comments
PUT /index.php?r=v1/comments/ID
DELETE /index.php?r=v1/comments/ID

//version 2
OPTIONS /index.php?r=v2/user/login
POST /index.php?r=v2/user/login
```

You can hide `index.php` from URL. For that see [server.md](server.md)

### ADDITIONALLY

[See client on AngularJS](https://github.com/githubjeka/angular-yii2)
