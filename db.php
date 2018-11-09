<?php
/**
 * Created by PhpStorm.
 * User: юзер
 * Date: 09.11.2018
 * Time: 21:05
 */
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('mag.db');
    }
}