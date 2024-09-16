<?php
// session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'projectphpoopcurd_db');

class DB_Conn{
    function __construct() {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbc = $con;
    }

    public function connectionMessage(){
        if(mysqli_connect_errno()){
            $result = "Failed to connect to Mysql:".mysqli_connect_error();
        } else {
            $result = "Welcome Back! Connected to Server Successfully";
        }
        return $result;
    }

    public function insert($name, $phone, $email, $passw, $emailOtp, $emailVerify, $regDate, $lastUpdationDate) {
        $ret = mysqli_query($this->dbc, "INSERT INTO users(name, phone, email, password, emailOtp, isEmailVerify, regDate, lastUpdationDate) 
                                         VALUES('$name', '$phone', '$email', '$passw', '$emailOtp', '$emailVerify', '$regDate', '$lastUpdationDate')");
        return $ret;
    }
}
?>
