<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Swoole\Orm\query;

use Swoole\Orm\Adapter;

/**
 * Description of Db
 *
 * @author touch
 */
class Db
{

    protected $db;
    private $pool;
    protected $table;

    public function __construct()
    {
        $this->pool = (new Adapter())->connect();
    }

    final public function db()
    {
        $this->db = $this->pool->get();
    }

    public function create($data)
    {
        if (empty($data)) {
            
        }
    }
}
