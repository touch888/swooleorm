<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Swoole\Orm;

use EasySwoole\EasySwoole\Config;
use Swoole\Orm\DbObject;

/**
 * Description of DBTrait
 *
 * @author touch
 */
trait DBTrait
{

    private $dbConfig = null;
    private $dbDrive = 'MYSQL';
    private $db;

    public function __construct()
    {
        $this->initialize();
    }

    public function initialize(): void
    {
        if (is_null($this->dbConfig)) {
            $config = Config::getInstance();
            $this->dbDrive = $config->getConf('DB_DRIVE') ?? $this->dbDrive;
            $this->dbConfig = $config->getConf($this->dbDrive);
            $this->getDb($this->dbDrive, $this->dbConfig);
        }
    }

    public function getDb($dbDrive, $dbConfig)
    {
        if (empty($dbConfig) || empty($dbDrive)) {
            return false;
        }
        $dbObject = new DbObject();
        $dbObject->getDb($dbDrive, $dbConfig);
        $this->db = $dbObject;
    }
}
