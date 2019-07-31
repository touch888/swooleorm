<?php
namespace Swoole\Orm\Drive;

use Swoole\Orm\Database;
use Swoole\Coroutine\MySQL as CoroutineMySQL;

/**
 * Description of MySQL
 *
 * @author touch
 */
class MySQL implements Database
{

    private $coroutineMySQL = null;

    public function connect($config)
    {
        $dbConfig = [
            'host' => $config['host'],
            'port' => $config['port'],
            'user' => $config['user'],
            'password' => $config['password'],
            'database' => $config['database'],
        ];
        $this->coroutineMySQL->connect($dbConfig);
    }

    public function query()
    {
        
    }

    private function initCoroutineMySQL()
    {
        $this->coroutineMySQL = new CoroutineMySQL();
    }
}
