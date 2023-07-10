<?php
include('Db.php');
$uid=$_POST['odi'];
$uname=$_POST['uname'];
$rvw=$_POST['review'];
$d=date("Y/m/d");
$sqlyr = mysqli_query($con,"INSERT INTO Note(note,date,uname,oid)VALUES('".$rvw."','".$d."','".$uname."','".$uid."')");
if($sqlyr){ 
         header("location: https://www.recyclepro.co.uk/wr-m6/manageorders.php?index=view&id=$uid");
    }else{ 
        return false; 
    } 
    ?>

           