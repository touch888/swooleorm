<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Swoole\Orm;

/**
 * Description of Database
 *
 * @author touch
 */
interface Database
{

    public function connect($config);

    public function query($sql);
}
