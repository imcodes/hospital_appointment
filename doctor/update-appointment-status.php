<?php
    session_start();
    if(isset($_REQUEST['session'])){
        session_decode($_REQUEST['session']);
    }

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" || $_SESSION['usertype']=='p'){
            echo json_encode(['status'=>'error','messsage'=>'Access denied for Patient user']);
            exit;
        }
    }else{
        echo json_encode(['status'=>'error','messsage'=>'you must login to approve an appointment']);
        exit;
        
    }
    
    if($_REQUEST){
        //import database
        include("../connection.php");
        $id=$_REQUEST["id"];
        $status = $_REQUEST['stat'];
        //$result001= $database->query("select * from schedule where scheduleid=$id;");
        //$email=($result001->fetch_assoc())["docemail"];
        $sql= $database->query("update appointment set status='$status' where appoid='$id';");
        // $stmt = $database->prepare($sql);
        // $stmt->bind_param("i",$id);
        // $stmt->execute();
        //$sql= $database->query("delete from doctor where docemail='$email';");
        //print_r($email);
        // header("location: appointment.php");
        if($sql){
            echo json_encode(['status'=>'success', 'message'=>"Appointment status updated successfully" ]);  
        }else{
            echo json_encode(['status'=>'error', 'message'=>"Error in updating the Appointment"]); 
        }
    }


?>