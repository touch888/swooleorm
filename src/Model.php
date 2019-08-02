<?php
namespace Swoole\Orm;

use Swoole\Orm\Adapter;

/**
 * Description of Model
 *
 * @author touch
 */
class Model
{

    private $pool;

    public function __construct()
    {
        $this->pool = Adapter::getInstance();
    }

    public function getName()
    {
//        for ($i = 0; $i <= 20; $i++) {
//            $db = $this->pool->get();
//            var_dump($this->pool->channelLenth());
//            $this->pool->put($db);
//        }
        var_dump($this->pool->isFull());
        var_dump($this->pool->get());
        $this->pool;
    }
}
