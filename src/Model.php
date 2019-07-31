<?php
namespace Swoole\Orm;

/**
 * Description of Model
 *
 * @author touch
 */
class Model
{

    use DBTrait;

    public function __construct()
    {
        $this->initialize();
    }
}
