<?php
/**********************************************************************
As Database is hosted in azure on Virtual Machine the host port may change
Below code pulls host, username and password from an environment variable
*/
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    
    $dbserver = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $dbuser = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $dbpass = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
    /* $dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value); */
}
//*********************************************************************	
?>
