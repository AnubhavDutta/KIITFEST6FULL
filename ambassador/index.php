<!DOCTYPE html>
<html>
<?php
    include '../connectdb.php';
    $con=openConnection();
?>
<head>
    <title>KIIT FEST 6.0 - Complete Your Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/aceef044d2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/registration_form.css">
    <meta name="theme-color" content="#55c736">
  <link rel="icon" href="../img/icon.png">

</head>

<body style="background-image: url('../img/CA-cover.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
<?php

    if(isset($_POST['acmail']) && isset($_POST['proceed']) && isset($_POST['acpw'])  ){

        $mypw=$_POST['acpw'];
        $email=mysqli_real_escape_string($con,$_POST['acmail']);

        $selq="SELECT * FROM chickensoup WHERE Email='$email';";
        $qry_result=mysqli_query($con, $selq) or die(mysqli_error($con));

        if(mysqli_num_rows($qry_result)>0){
            include '../redirection.php';
            echo"<script> alert('This Email is already registered. Please try a different email address'); </script>";
            redirect('../');
        }
?>

    <div class="container h-100" style="padding-top: 1rem; padding-bottom: 1rem;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xs-12 col-mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-heading">Complete Your Registration</h1>
                    </div>
                    <div class=" card-body">
                        <form  action="registration/" method="POST" onsubmit="return checkfullform(this);" enctype="multipart/form-data">

                            <input type="hidden" name="acmail" value="<?php echo $_POST['acmail']; ?>">
                            <input type="hidden" name="acpassword" value="<?php echo$mypw; ?>">
                            <div class="col-md-6 col-xs-12" style="float:left; padding-top: 5px;">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="Name" aria-describedby="nameHelp"
                                        placeholder="Enter your name" name="acname" required>
                                    <div class="invalid-feedback">
                                        Please enter your name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number</label>
                                    <input  onkeypress="isInputNumber(event)" type="text" class="form-control" id="contactNumber"
                                        aria-describedby="contactHelp" placeholder="Enter contact number here"  name="accontact">
                                        <div class="invalid-feedback" required>
                                            Please enter your contact number
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="whatsappNumber">Whatsapp Number</label>
                                    <input  onkeypress="isInputNumber(event)" type="text" class="form-control" id="whatsappNumber"
                                        aria-describedby="whatsappNumber" name="acwhatsapp" placeholder="Enter your whatsapp number" required>
                                        <div class="invalid-feedback">
                                                Please enter your whatsapp number
                                            </div>
                                </div>
                                <div class="form-group">
                                    <label for="college">College</label>
                                    <input type="text" class="form-control" id="college" aria-describedby="college"
                                        placeholder="Enter your college name"  name="accollege" required>
                                        <div class="invalid-feedback">
                                                Please enter your college
                                            </div>
                                </div>
                                 
                                
                            </div>
                            <div class="col-md-6 col-xs-12" style="float: right; padding-top: 5px;">
                                <div class="form-group">


                                    <label for="state">State</label>
                                    <select class="form-control" id="state" aria-describedby="stateHelp" name="acstate" required>
                                    </select>

                                    <div class="invalid-feedback">
                                            Please select your state
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select class="form-control" id="city" aria-describedby="cityHelp" name="acdist" required>
                                        <option value="" selected disabled>Please select a state</option>
                                    </select>
                                    <div class="invalid-feedback">
                                            Please select your city
                                        </div>

                                </div>
                                <div class="form-group">

                                    <label for="year">Studying Year</label>
                                    <select class="form-control" id="year" aria-describedby="yearHelp" name="acyear" required>
                                        <option value=1>First</option>
                                        <option value=2>Second</option>
                                        <option value=3>Third</option>
                                        <option value=4>Fourth</option>
                                        <option value=5>Fifth</option>
                                    </select>
                                    <div class="invalid-feedback">
                                            Please enter your study year
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="previousExperience">Any previous experience as campus ambassador</label>
                                    <select class="form-control" id="previousExperience"  name="acexp" required>
                                        <option value="n">No</option>
                                        <option value="y">Yes</option>
                                    </select>
                                </div>
                            </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="acsend" class="btn btn-block btn-success col-md-6 align-center">Register</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
echo $msg;
    }else{
        include '../redirection.php';
        redirect('../../dashboard');
    }
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/registration_form.js"></script>
    <script type="text/javascript" src="../script.js"></script>
</body>

</html>