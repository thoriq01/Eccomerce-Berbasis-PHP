<?php
class Database{
    var $host       ="localhost";
    var $dbname     ="TokoOnline";
    var $password   ="";
    var $username   ="root";
    var $koneksi    =" ";
    
    public function __construct()
    {
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname,

        );
        
    }
    function view($sql){
        $data = mysqli_query($this->koneksi,$sql);
        if($data->num_rows == 0){
            return false;
        }
        else {
            while ($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
        }
        return $hasil;
    }
    function insert($sql){
        $data = mysqli_query($this->koneksi,$sql);
        if($data){
            return true;
        }
        return false;
    }
}
