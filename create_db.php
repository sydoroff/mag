<?php

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('mag.db');
    }
}

$db = new MyDB();
$result=$db->query("select * from product");

var_dump($result->fetchArray());
//$db->
//$db->exec("CREATE TABLE product ( id SERIAL, 'name' VARCHAR, 'price' REAL)");
$db->exec("delete from product");
$db->exec("INSERT INTO `product` (`id`, `name`, `price`) VALUES (1, 'Product 1', '23.40')");
$db->exec("INSERT INTO `product` (`id`, `name`, `price`) VALUES (2, 'Product 2', '14.20')");
$db->exec("INSERT INTO `product` (`id`, `name`, `price`) VALUES (3, 'Product 3', '18.20')");
$db->exec("INSERT INTO `product` (`id`, `name`, `price`) VALUES (4, 'Product 4', '21.60')");
$db->exec("INSERT INTO `product` (`id`, `name`, `price`) VALUES (5, 'Product 5', '31.90')");


//$db = SQLite3("mag.db");
//$db->close();
?>