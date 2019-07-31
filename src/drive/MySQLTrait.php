<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Swoole\Orm\Drive;

/**
 * Description of MySQLTrait
 *
 * @author touch
 */
Trait MySQLTrait
{

    private static $instance = null;

    public static function getInstance($config)
    {
        if (empty($config)) {
            return null;
        }
        if (!(self::$instance instanceof self)) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }
}
