<?php

/**
 * Created by PhpStorm.
 * User: IgorTokman
 * Date: 11.02.2016
 * Time: 22:48
 */
class Core
{
    protected $db;
    protected $result;
    /**
     * Core constructor.
     * @param array $connection_params
     */
    public function __construct($connection_params = array())
    {
        $this->db = new PDO('mysql: host:localhost; dbname:ajaxchat', 'root', '');
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function query($sql)
    {
        $this->result = $this->db->query($sql) or die('core query error ');
    }

    public function result()
    {
        //$rows = array();
        while($row = $this->result->fetch())
            $rows[] = $row;
        return $rows;
    }
}