<!-- Meg Fryling -->
<!-- October 2019 -->

<?php
//Connect to Database
//This is the older method but works for PHP version installed on oraserv. 
define('DB_SERVER','localhost');
define('DB_PORT','3306');
define('DB_USERNAME','your-username'); //need to update
define('DB_PASSWORD','your-password'); //need to update
define('DB_NAME','your-db-name'); //need to update
 
$dbh = mysql_connect(DB_SERVER.':'.DB_PORT,DB_USERNAME,DB_PASSWORD);
if (!$dbh) {
    echo "Oops! Something went horribly wrong.";
    exit();
}

mysql_selectdb(DB_NAME,$dbh);
