<?php

    session_start();

    include '../connectdb.php';
    include '../redirection.php';
    $con=openConnection();

    if(isset($_POST['login']) && isset($_POST['acmail']) && isset($_POST['acpw']) ){

        $acmail=$_POST['acmail'];
        $acmail=mysqli_real_escape_string($con,$acmail);

        $acpw=$_POST['acpw'];
        $acpw=mysqli_real_escape_string($con,$acpw);
        $acpw=md5($acpw);

        $selq="SELECT * FROM chickensoup WHERE Email='$acmail';";
        $qry_result=mysqli_query($con, $selq) or die(mysqli_error($con));
        $valid=0;

        if(mysqli_num_rows($qry_result)>0){
            $row = mysqli_fetch_array($qry_result);
            if($row['Ppassword']==$acpw){
                $valid=1;
                $_SESSION['id']=$row['idno'];
                $_SESSION['role']=$row['Prole'];
                redirect('../dashboard');
               // echo"<script>window.location.href = '../dashboard/';</script>";
                //header("Location: products.php");
            }
        }
        if($valid==0){
            echo"<script>alert('Incorrect Email Address or Password')</script>";
            redirect('../');
            //header("Location: products.php");
        }
    }
        mysqli_close($con);
?>