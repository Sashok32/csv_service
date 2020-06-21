<?php

class MVC
{
    /**
     *
     * @var MVC
     */
    private static $base;
    public $defaultController;
    public $defaultAction;
    public $layout;
    public $db;



    private function __construct(array $params)
    {
        $this->defaultController = $params['defaultController'];
        $this->defaultAction = $params['defaultAction'];
        $this->layout = $params['layout'];
        $this->db = $params['db'];
    }

    public static function getBase(array $param = [])
    {
        if ( is_null( self::$base ) )
        {
            self::$base = new self($param);
        }
        return self::$base;
    }

    public function connection() {
        try {
            $conn = new PDO($this->db['dsn'], $this->db['user'], $this->db['pass'], $this->db['opt']);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
       return $conn;
    }
}