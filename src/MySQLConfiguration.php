<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Swoole\Orm;

/**
 * Description of MySQLConfiguration
 *
 * @author touch
 */
class MySQLConfiguration
{

    private $host;
    private $port;
    private $username;
    private $password;
    private $db_name;

    public function __construct(string $host, int $port, string $username, string $password, string $db_name)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getDbName(): string
    {
        return $this->db_name;
    }
}
