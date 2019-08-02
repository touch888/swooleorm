<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Swoole\Orm;

use EasySwoole\EasySwoole\Config;
use Swoole\Orm\Drive\MySQLPool;
use Swoole\Orm\MySQLConfiguration;

/**
 * Description of Adapter
 *
 * @author touch
 */
class Adapter
{

    private $adaptee;
    private $configuration;
    private static $instance;

    private function __construct()
    {
        $config = Config::getInstance();
        if (empty($config)) {
            throw new \RuntimeException('Failed to obtain database configuration.');
        }
        $dbConfig = $config->getConf('MYSQL');
        $this->configuration = new MySQLConfiguration(
            $dbConfig['host'],
            intval($dbConfig['port']),
            $dbConfig['user'],
            $dbConfig['password'],
            $dbConfig['database']);
        switch (strtolower($config->getConf('DB_DRIVE'))) {
            case 'mysql':
                $this->adaptee = new MySQLPool();
                break;

            default:
                $this->adaptee = new MySQLPool();
                break;
        }
    }

    private function connect()
    {
        return $this->adaptee->connect($this->configuration);
    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance->connect();
    }
}
