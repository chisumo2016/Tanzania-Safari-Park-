<?php session_start();
 error_reporting(0);
 //define site constant
$site_name = 'Tanzania Safari Park';   
$home = 'Home';
$about = 'About';
$booking = 'Booking';
$register = 'Register';
$login = 'Login';
$contact = 'Contact';
$gallery = 'What We Offer';

//class to connet database and perform database action
    class dbo
    {
        private $host = "localhost";
        private $user = "20098042";
        private $pwd = "20098042";
        private $db = "20098042";
        
        //this functin add/update/delete record as per query
        function dml($q)
        {
            $link = mysqli_connect($this->host, $this->user, $this->pwd, $this->db);
            mysqli_query($link, $q) or die(mysqli_error());
        }
        
        //this functin fetch data from DB and return data array 
        function get($q)
        {
            $link = mysqli_connect($this->host, $this->user, $this->pwd, $this->db);
            $res = mysqli_query($link,$q)or die(mysqli_error());
            $ret = array();
            while ($row = mysqli_fetch_assoc($res)) {
                $ret[] = $row;
            }
            return $ret;
        }
        
        //this function check if user is loggedin ot not for page access
        function chk_login()
        {
            if((!isset($_SESSION['uid'])) and (!isset($_SESSION['admin_id'])))
            {
              header("location: index.php");exit; 
            }
        }
    }
    //define object of this class
    $db = new dbo();
?>