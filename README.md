# Transpdroid-Server-API
Laravel API REST for Transpdroid App

## Instalation Laravel Core

```
php composer.phar install
```

```
php composer.phar update
```

## Change permision

```
chown -R www-data:www-data storage/
```

```
chown -R www-data:www-data bootstrap/cache/
```

## VirtualHost del Apache Example

```
<VirtualHost *:80>
        ServerName transpdroid.tresipunt.com
        ServerAlias transpdroid.tresipunt.com
        DocumentRoot /var/www/html/Transpdroid-Server-API/public
        SetEnv APPLICATION_ENV "development"
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
        <Directory /var/www/html/Transpdroid-Server-API/public>
                DirectoryIndex index.php
                AllowOverride All
                Order allow,deny
                Allow from all
        </Directory>
</VirtualHost>
```

## Create .env 

```
cp .env.example .env
```

To finish Restart Apache Server



License
-------

    Copyright 2018 Carlos Bonache Casado

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
