<?php require('../common/functions.php'); 

if(!isset($_SESSION['userData'])){
    header("location:login.php");
}elseif($_SESSION['userData']['role']!= 1){
    header("location:index.php");
}else{
    $id = $_GET['id'];
        $res=array();
        global $con;
        $query=mysqli_query($con,"DELETE FROM reports WHERE id='$id'");
        if(mysqli_affected_rows($con)>0){
            $res['bool']=true;
        }else{
            $res['bool']=false;
        }
    header("location:../reports.php");
}