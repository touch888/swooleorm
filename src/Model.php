<?php
namespace Swoole\Orm;

use Swoole\Orm\Adapter;
use Swoole\Orm\query\Db;

/**
 * Description of Model
 *
 * @author touch
 */
class Model extends Db
{

    private $pool;

    public function __construct()
    {
        
    }

    public function getName()
    {
        $db = $this->pool->get();
        var_dump($db->query('select version()'));
        var_dump($this->pool->getCapacity());
//        var_dump($this->pool->get());
        //$this->pool->put($db);
    }
}
