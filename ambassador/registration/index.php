<?php
    session_start();
    include 'connectdb.php';
    $con=openConnection();

    if (isset($_POST['acsend']) && isset($_POST['acname']) && isset($_POST['acstate']) && isset($_POST['acexp']) && isset($_POST['acyear']) && isset($_POST['acdist']) && isset($_POST['acmail']) && isset($_POST['acpassword']) ) {

    $msg="";
    $valid=1;
    
   

    include '../../redirection.php';

    if(isset($_POST['acname'])) $acname=$_POST['acname'];
    else{
      redirect('../../');
    }
    $acname=mysqli_real_escape_string($con,$acname);

    if(isset($_POST['acmail']))$acmail=$_POST['acmail'];
    else{
      redirect('../../');
    }
    $acmail=mysqli_real_escape_string($con,$acmail);

    if(isset($_POST['accontact'])) $accontact=$_POST['accontact'];
    else{
      redirect('../../');
    }
    $accontact=mysqli_real_escape_string($con,$accontact);

    if(isset($_POST['acpassword'])) $acpassword=$_POST['acpassword'];
    else{
      redirect('../../');
    }
    $acpassword=mysqli_real_escape_string($con,$acpassword);
    $acpassword=md5($acpassword);

    if(isset($_POST['acwhatsapp'])) $acwhatsapp=$_POST['acwhatsapp'];
    else{
      redirect('../../');
    }
    $acwhatsapp=mysqli_real_escape_string($con,$acwhatsapp);

    if(isset($_POST['acyear']) && isset($_POST['acstate']) && isset($_POST['acexp'])){
      $acyear=$_POST['acyear'];
      $acstate=$_POST['acstate'];
      $acexp=$_POST['acexp'];
    }
    else{
      redirect('../../');
    }

    if(isset($_POST['acwhatsapp'])) $accollege=$_POST['accollege'];
    else{
      redirect('../../');
    }
    $accollege=mysqli_real_escape_string($con,$accollege);

    if(isset($_POST['acwhatsapp'])) $acdist=$_POST['acdist'];
    else{
     redirect('../../');
    }
    $acdist=mysqli_real_escape_string($con,$acdist);


    $selq="SELECT * FROM chickensoup WHERE Email='$acmail';";
    $qry_result=mysqli_query($con, $selq) or die(mysqli_error($con));

    if(mysqli_num_rows($qry_result)>0){
      $valid=0;
      $msg="<h4>This Email is already registered. Please try a different email address</h4>";
    }

    if(""== trim($acname) || ""== trim($acmail) || ""== trim($accontact) || ""== trim($acwhatsapp) || ""== trim($acpassword) || ""== trim($acmail) || ""== trim($accollege) || ""== trim($acdist)){
      $valid=0;
      $msg="<h4>Incomplete Information Provided. Please try again</h4>";
  }   

  if($acyear!="1" && $acyear!="2" && $acyear!="3" && $acyear!="4" && $acyear!="5"){
    $valid=0;
    $msg="<h4>Invalid Academic Year Provided. Please try again</h4>";
  }

  if($acexp!="y" && $acexp!="n"){
    $valid=0;
    $msg="<h4>Unknown Error Occured. Please try again</h4>";
  } 
    if($valid==1){    



      $stmt = $con->prepare("INSERT INTO chickensoup(Pname,mobile,whatsapp, Ayear,College, Pstate,District,Email, Ppassword,Caexperience,People,Prole) VALUES(?,?,?,?,?,?,?,?,?,?,0,1)");
      $stmt->bind_param("ssssssssssss",$file1,$acname,$accontact,$acwhatsapp,$acyear,$accollege,$acstate,$acdist,$acmail,$acpassword,$acexp,$target);
      $stmt->execute();

      $insertQ="SELECT * FROM chickensoup WHERE Email='$acmail'";
      $qry_result=mysqli_query($con, $insertQ) or die(mysqli_error($con));
      $row = mysqli_fetch_array($qry_result);
      
      $rollnumber=$row['idno'];
      $rollnumber2=$rollnumber;
      
      for($i=0; $i<( 5-strlen($rollnumber) ); $i++){
          $rollnumber2='0'.$rollnumber2;  
      } 
      
      //$SUBMIT=mysqli_query($con,$insertQ) or die(mysqli_error($con));
      $msg="<h2><b>Successfully Registered</b></h2><br><br><h4>Name: ".$acname."</h4><h4>College: ".$accollege."</h4><h4>Code: ".$rollnumber2."</h4>";

      $_SESSION['id']=$rollnumber;
      $_SESSION['role']=$row['Prole'];

     // header('../../dashboard');
      redirect("../../dashboard");

    }
    }else{
        //include '../../redirection.php';
        //redirect('../../');
    }
?>