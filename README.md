## mode d'emploi :
> creer un fichier config.php selon votre configuration dans /models tel :
```php
<?php

$dbhost = "localhost";
$dbname = "posts";
$dbuser = "root";
$dbpass = "root";
```
> executer les requetes sql dans /req.sql
> lancer le server web via apache/xamp ou
```bash
php -S 0.0.0.0:8080 -t .
```
