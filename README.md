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



Llicència
-------
    Aquesta obra està subjecta a:
    Llicència de Reconeixement-NoComercial-SenseObraDerivada 3.0 Espanya de Creative Commons
