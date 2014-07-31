## Test REST API application on [Yii2](https://github.com/yiisoft/yii2)

###INSTALLATION###

**Install via Composer**

If you do not have [Composer](http://getcomposer.org/), you may install it by following the
[instructions at getcomposer.org](https://getcomposer.org/doc/00-intro.md).

You can then install the application using the following command:
`composer create-project --prefer-dist -s dev "githubjeka/rest-yii2" .`

###GETTING STARTED###

After you install the application, you have to conduct the following steps to initialize the installed application.
You only need to do these once for all.

- Create a new database and adjust the components['db'] configuration in `environments/dev/common/config/main-local.php` accordingly.
- Run command `php init` to initialize the application with a specific environment. Choose **dev**.
- Apply migrations with console command ``php yii migrate``. This will create tables needed for the application to work.
- Set document roots of your Web server:

for frontend /path/to/yii-application/rest/web/ and using the URL http://rest-localhost/
for backend /path/to/yii-application/backend/web/ and using the URL http://backend-localhost/

To login into the application is `demo/demo`.

[More information ... ](https://github.com/githubjeka/angular-yii2)

**TBD..**
