<?php

class server {

    private $con;

    public function __construct() {

        $this->con = (is_null($this->con)) ? self::connect() : $this->con;
    }

    public function connect() {
        $con = mysqli_connect('localhost', 'phpmyadmin', 'dev5');

        if (!$con) {
            echo "Error: " . mysqli_connect_error();
            exit();
        }
        $db = mysqli_select_db('telegram_bot', $con);
    }

    public function getUser($id_array) {

        $id = $id_array['id'];

        $sql = "SELECT username FROM users WHERE id = '$id'";
        $query = mysqli_query($sql, $this->con);
        //var_dump($query);exit();
        $res = mysqli_fetch_array($query);

        return $res['username'];
    }

}

$params = array('uri' => 'http://192.168.33.11/soap/server.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();




