## mode d'emplois :
> creer un fichier config.php dans /models tel :
```php
<?php

$dbhost = "localhost";
$dbname = "posts";
$dbuser = "root";
$dbpass = "root";
```
> executer les requetes sql dans /req.sql
> lancer le server web via apache/xamp ou ```bash php -S 0.0.0.0:8080 -t .```