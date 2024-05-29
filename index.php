<?php
    session_start ();
    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="stunting";
    $koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if($_GET['lval']){
        $_GET['lval'] = 0;
        $Type = $_SESSION['Type'];
        if($Type != "Guest"){
            $Name = $_SESSION['Name'];
            $Id = $_SESSION['Id'];
            if(($Type == "Admin") or ($Type == "Superadmin")){
                header('Location:admin/index.php');
            } else if($Type == "User"){
                header('Location:user/index.php');
            }
            $_SESSION["Name"] = $Name;
            $_SESSION["Type"] = $Type;
            $_SESSION["Id"] = $Id;
        } else if($Type == "Guest"){
            header('Location:user/index.php');
            $_SESSION["Type"] = $Type;
        }
    } else {
        $Type = "Guest";
        header('Location:user/index.php');
        $_SESSION["Type"] = $Type;
    }
?>