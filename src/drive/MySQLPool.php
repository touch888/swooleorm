<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Swoole\Orm\Drive;

use Swoole\Orm\Drive\MySQL;
use Swoole\Coroutine\Channel;
use Swoole\Orm\MySQLConfiguration;

/**
 * Description of MySQLPool
 *
 * @author touch
 */
class MySQLPool
{

    protected $pool;
    private $poolSize = 20;

    public function __construct(int $size = 20)
    {
        $this->pool = new Channel($size);
    }

    public function connect(MySQLConfiguration $config): MySQLPool
    {
        $dbConf = [
            'host' => $config->getHost(),
            'port' => $config->getPort(),
            'user' => $config->getUsername(),
            'password' => $config->getPassword(),
            'database' => $config->getDbName(),
        ];

        for ($i = 0; $i < $this->poolSize; $i++) {
            $mysql = new MySQL();
            $db = $mysql->connect($dbConf);
            if ($db === false) {
                throw new \RuntimeException("failed to connect mysql server.");
            }
            $this->put($db);
        }
        return $this;
    }

    /**
     * 连接池压入
     * @param type $db
     * @return bool
     */
    final public function put($db): bool
    {
        return $this->pool->push($db);
    }

    /**
     * 连接池弹出
     * @return type
     */
    final public function get()
    {
        return $this->pool->pop();
    }

    /**
     * 获取连接池长度
     * @return int
     */
    final public function poolLenth(): int
    {
        return $this->pool->length();
    }

    /**
     * 判断连接池是否为空
     * @return bool
     */
    final public function isEmpty(): bool
    {
        return $this->pool->isEmpty();
    }

    /**
     * 判断连接池是否已满
     * @return bool
     */
    final public function isFull(): bool
    {
        return $this->pool->isFull();
    }
}
