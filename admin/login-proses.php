<?php
    include('../koneksi.php');
    function simpanlogin(){
        $ip = "";
        $id_user = $_POST['id_user'];
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = @$_SERVER['REMOTE_ADDR'];
        if (filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }elseif (filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }else{
            $ip = $remote;
        }
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $browser = $_SERVER['HTTP_USER_AGENT'];
        
        
        $sql = mysql_query("insert INTO tblogin(id_user, ip_address, device, "
                . " browser) VALUES ('$id_user', '$ip', '$hostname', '$browser')" ) 
            or die("Query failed with error: ".mysql_error());
    }
    
    
    $id_user = $_POST['id_user'];
    $pass=md5($_POST['pass']);
    $query = "select * from tbuser where id_user='$id_user' and pass='$pass'";
    $execute = mysql_query($query);
    $result = mysql_num_rows($execute);
    $data = mysql_fetch_array($execute);
    if ($result==0){
        header("location:login.php?user=wrong");
    }else{
        session_start(); //memulai session
        
        $_SESSION['adminid'] = $data['id_user'];
        $_SESSION['adminname'] = $data['nama_user'];
        $_SESSION['adminlevel'] = $data['lev_user'];
        simpanlogin();
        header("location:index.php");
    }
?>

