<?php
/**
 * Created by PhpStorm.
 * User: юзер
 * Date: 28.10.2018
 * Time: 20:52
 */

abstract class abstractPage
{
    protected $Title = "";
    protected $MapMenu= "";

    function abstractPage($Title="Супер пупуер магазин",$MapMenu="")
    {
        $this->Title = $Title;
        $this->MapMenu = $MapMenu;
    }

    function headHTML(){}

    function bodyHTML(){}

    function beforeProg(){}

    function afterProg(){}

    function writeHTML()
    {
        echo "<!DOCTYPE HTML>\n<html>\n<head>";
        $this->headHTML();
        echo "</head>\n<body>";
        $this->bodyHTML();
        echo "</body>\n</html>";
    }
    function Run()
    {
        $this->BeforeProg();
        $this->writeHTML();
        $this->AfterProg();
    }
}


?>