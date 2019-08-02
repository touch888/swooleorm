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
        //$this->pool = Adapter::getInstance();
        $this->pool = (new Adapter())->connect();
    }

    public function getName()
    {
//        for ($i = 0; $i <= 20; $i++) {
//            $db = $this->pool->get();
//            var_dump($this->pool->channelLenth());
//            $this->pool->put($db);
//        }
        $db = $this->pool->get();
        var_dump($db->query('select version()'));
        var_dump($this->pool->poolLenth());
//        var_dump($this->pool->get());
        //$this->pool->put($db);
    }
}
