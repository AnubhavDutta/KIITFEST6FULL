<!DOCTYPE html>
<?php
  session_start();
  
  include '../connectdb.php';
  include '../redirection.php';
  $con=openConnection();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="KIITFEST 6.0 is here register now">

        <meta name="theme-color" content="#598f29">
        <link rel="icon" href="images/icon.png">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/leaderboard.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

        <link rel="stylesheet" href="css/icon-font.css">
        <link rel="stylesheet" href="css/maps/style.css.map">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png">
        
        <title>CA Dashboard</title>
    </head>

    <body>
    <?php 

    if(isset($_SESSION['id']) && isset($_SESSION['role'])){
      if ($_SESSION['role']==1){
        $myid=$_SESSION['id'];
        $selq="SELECT * FROM chickensoup WHERE idno=$myid;";
        $qry_result=mysqli_query($con, $selq) or die(mysqli_error($con));
        if(mysqli_num_rows($qry_result)>0){
          $row = mysqli_fetch_array($qry_result);
    ?>

    <a href="logout/"><button style="float:right;font-size:20px;padding:5px;border:0;background-color:rgba(0,0,0,0); color:#eb3b81;"> Logout </button></a>
        <section style="padding-top: 40px; padding-bottom: 30px; background-color: blanchedalmond;">
            <div class="row d-flex justify-content-center">    
                <div class="text-center">
                    <img style="border-radius: 50%;" src="https://mdbootstrap.com/img/logo/mdb192x192.jpg" class="img-fluid" alt="">
                    <br><br><br><br>
                    <h1><?php echo $row['Pname'];  ?></h1>
                    <h3><?php echo $row['College'];  ?></h3>
                    <h3><?php echo $row['District'];  ?></h3>
                </div>
            </div>    
        </section> 
         
        <?php
        
          $selq="SELECT * FROM chickensoup WHERE code=$myid AND Prole=2;";
          $qry_result=mysqli_query($con, $selq) or die(mysqli_error($con));
          if(mysqli_num_rows($qry_result)>0){
              
        ?>

        <section style="padding-top: 40px; padding-bottom: 30px; background-color: burlywood;">
            <div class="row d-flex justify-content-center"> 
                    <h1>Your Referred Status</h1> <br>  
                <table class="table table-bordered" style="width: 80%; margin-top: 2rem;">
                    <thead style="background-color: rgb(240, 240, 240);">
                        <tr style="text-align: center;">
                        <th style="width: 10%;">Sl. No.</th>
                        <th style="width: 30%;">Name</th>
                        <th  style="width: 10%;">PAID / NOT PAID</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                    <?php
                      $sno=0;
                        while ($crow = mysqli_fetch_array($qry_result) ) {
                          $sno+=1;
                    ?>
                        <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $crow['Pname']; ?></td>
                        <?php
                          $pay=$crow['Paid'];
                          if ($pay==0) $pay="YES";
                          else $pay="NO";
                        ?>
                        <td><?php echo $pay; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>    
        </section>
        <?php
          } 
        ?>
        
                         <!-- Roles Section Start -->
                         <section style="padding-top: 40px; padding-bottom: 30px; background-color: rgb(238, 138, 138);">
                            <div class="container">
                              <div class="row">
                                <div class="col-12">
                                  <div class="section-title-header text-center">
                                    <h1 class="section-title leaderboard wow fadeInUp" data-wow-delay="0.2s">LEADERBOARD</h1>
                                    <p class="wow fadeInDown" data-wow-delay="0.2s">You can Netflix and Chill while I Hustle and Build</p>
                                  </div>
                                </div>
                              </div>
                              <!-- Leaderboard Backend -->
                            <?php
                              $selq="SELECT * FROM chickensoup WHERE Prole=1 ORDER BY People DESC;";
                              $foundself=0;
                              $qry_result=mysqli_query($con, $selq) or die(mysqli_error($con));
                              $first = mysqli_fetch_array($qry_result);
                              if($first['idno']==$_SESSION['id']) $foundself=1;

                              $second = mysqli_fetch_array($qry_result);
                              if($second['idno']==$_SESSION['id']) $foundself=1;

                              $third = mysqli_fetch_array($qry_result);
                              if($third['idno']==$_SESSION['id']) $foundself=1;

                             
                            ?>

                              <div class="section-fix">
                                    <div class="center">
                                        <div class="top3">

                                        <?php if(mysqli_num_rows($qry_result)>1){ ?>
                                          <div class="two item">
                                            <div class="pos">
                                              2
                                            </div>
                                            <div class="pic" style="background-image: url(&#39;https://randomuser.me/api/portraits/men/44.jpg&#39;)"></div>
                                            <div class="name">
                                              <?php echo $second['Pname']; ?>
                                            </div>
                                            <div class="score">
                                            <?php echo $second['People']*10; ?>
                                            </div>
                                          </div>
                                        <?php } ?>

                                        <?php if(mysqli_num_rows($qry_result)>0){ ?>
                                          <div class="one item">
                                            <div class="pos">
                                              1
                                            </div>
                                            <div class="pic" style="background-image: url(&#39;https://randomuser.me/api/portraits/men/31.jpg&#39;)"></div>
                                            <div class="name">
                                            <?php echo $first['Pname']; ?>
                                            </div>
                                            <div class="score">
                                            <?php echo $first['People']*10; ?>
                                            </div>
                                          </div>
                                        <?php } ?>

                                        <?php if(mysqli_num_rows($qry_result)>2){ ?>
                                          <div class="three item">
                                            <div class="pos">
                                              3
                                            </div>
                                            <div class="pic" style="background-image: url(&#39;https://randomuser.me/api/portraits/women/91.jpg&#39;)"></div>
                                            <div class="name">
                                            <?php echo $third['Pname']; ?>
                                            </div>
                                            <div class="score">
                                            <?php echo $second['People']*10; ?>
                                            </div>
                                          </div>

                                        <?php } ?>  
                                        </div>
                                        <div class="list">
                                        <?php if(mysqli_num_rows($qry_result)>3){ 
                                          $rank=3;
                                           while ($crow = mysqli_fetch_array($qry_result) ) {
                                             $rank+=1;
                                             if($crow['idno']==$_SESSION['id']) $foundself=1;
                                          ?>
                                        
                                          <div class="item">
                                            <div class="pos">
                                            <?php echo $rank; ?>
                                            </div>
                                            <div class="pic" style="background-image: url(&#39;https://randomuser.me/api/portraits/men/88.jpg&#39;)"></div>
                                            <div class="name">
                                            <?php echo $crow['Pname']; ?>
                                            </div>
                                            <div class="score">
                                            <?php echo $crow['People']*10; ?>
                                            </div>
                                          </div>
                                          <?php
                                          if($foundself==0){}
                                          ?>
                                        
                                        <?php } } ?>
                                        </div>
                                      </div>
                                      </div>
                              
                            </div>
                          </section>
                          <!-- Roles Section End -->
    <?php
      }else{
        redirect('../');
      }}else{
       redirect('../');
       }
  }else{
     redirect('../');
  }
  ?>

    </body>
    <script src="./js/script.js"></script>
</html>