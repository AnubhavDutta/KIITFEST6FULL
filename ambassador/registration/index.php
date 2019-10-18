<?php
    session_start();
    include 'connectdb.php';
    $con=openConnection();

    if (isset($_POST['acsend']) && isset($_POST['acname']) && isset($_POST['acstate']) && isset($_POST['acexp']) && isset($_POST['acyear']) && isset($_POST['acdist']) && isset($_POST['acmail']) && isset($_POST['acpassword']) ) {

    $msg="";
    $valid=1;
    
    /*

    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        $valid=0;
       $msg="<h4>Prodile Picture Not Found</h4>";
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
     $valid=0;
     $msg="<h4>File Not Supported</h4>";
    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 1000000)) {
     $valid=0;
     $msg="<h4>Image Size exceeds 1 MB. Please select another image</h4>";
    }    // Validate image file dimension
    else if ($width < "50" || $height < "50") {
     $valid=0;
     $msg="<h4>Image size is too small. Please select another image</h4>";
    } else {
        $target = "profilepic/" .uniqid(). basename($_FILES["file-input"]["name"]);

        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
         $msg="";
        } else {
             $valid=0;
             $msg="<h4>Image Upload Failed. Please try again</h4>";
        }
    }

    */

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



    $file1="";
    if(count($_FILES['file1']['name'])>0){
        for($i=0; $i<count($_FILES['file1']['name']); $i++) {
              //Get the temp file path
                $tmpFilePath = $_FILES['file1']['tmp_name'][$i];
                //Make sure we have a filepath
                if($tmpFilePath != ""){
                    //save the filename
                    $shortname = $_FILES['file1']['name'][$i];
                    //save the url and the file
                    $filePath = "product_images/".$_FILES['file1']['name'][$i];
                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $filePath)) {
                        $files[] = $shortname;
                        $file1=$filePath;
                        //insert into db 
                        //use $shortname for the filename
                        //use $filePath for the relative url to the file
    
                    }
                }
        }
    }


    /*
    if ($file1==""){
        $valid=0;
        $msg="<h4>College ID Not Provided</h4>";
    }
    */

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



      $stmt = $con->prepare("INSERT INTO chickensoup(Collegeid,Pname,mobile,whatsapp, Ayear,College, Pstate,District,Email, Ppassword,Caexperience,People,Picture,Prole) VALUES(?,?,?,?,?,?,?,?,?,?,?,0,?,1)");
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