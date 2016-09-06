<?php
/**
 * Created by PhpStorm.
 * User: teoria
 * Date: 3/12/14
 * Time: 3:10 AM
 */

class DAO {
    protected  $conex;
    function __construct(){
        $this->conex = Conex::getInstance()->getPDO();
        $this->conex->exec("SET CHARACTER SET utf8");
        $this->conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

} 