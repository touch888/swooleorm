<?php
namespace Swoole\Orm;

use Swoole\Orm\Drive\MySQL;

/**
 * Description of DbObject
 *
 * @author touch
 */
class DbObject
{

    private $db;

    public function setDb($dbDrive, $dbConfig)
    {
        if (empty($dbDrive) || empty($dbConfig)) {
            return;
        }
        switch (strtolower($dbDrive)) {
            case 'MYSQL':
                $this->db = new MySQL();
                $this->db->connect($dbConfig);
                break;

            default:
                $this->db = new MySQL();
                $this->db->connect($dbConfig);
                break;
        }
    }

    public function getDb($dbDrive, $dbConfig)
    {
        if (empty($dbDrive) || empty($dbConfig)) {
            return false;
        }
        if (empty($this->db[$dbDrive])) {
            $this->setDb($dbDrive, $dbConfig);
        }
    }
}
