<?php
namespace Swoole\Orm\Drive;

use Swoole\Orm\Database;
use Swoole\Orm\Drive\MySQLTrait;
use Swoole\Coroutine\MySQL as CoroutineMySQL;

/**
 * Description of MySQL
 *
 * @author touch
 */
class MySQL
{

    //use MySQLTrait;

    public function connect($config)
    {
        $coroutineMySQL = new CoroutineMySQL();
        $coroutineMySQL->connect($config);
        return $coroutineMySQL;
    }

    public function __wakeup()
    {
        $this->connect();
    }
}
