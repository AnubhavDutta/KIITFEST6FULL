<!DOCTYPE html>
<html lang="en">
<?php session_start();
  include 'connectdb.php';
  include 'redirection.php';
  $con=openConnection();

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>KIIT FEST 6.0 Campus Ambasador</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/leaderboard.css">

  <meta name="theme-color" content="#55c736">
  <link rel="icon" href="img/icon.png">
</head>

<body>


<!-- Registration Modal Starts -->
    <div id="id01" class="modal">
        <div class="container"><div class="row">
        <form class="modal-content animate col-lg-6 col-md-7 col-sm-10 col-xs-10" action="ambassador/" method="POST" onsubmit="return checkmodalform(this);" enctype="multipart/form-data>
          <div class="contain">
            <center>
            <p style="margin-bottom: 15px;color: #b5b5b5; font-size:17px">Register as Ambassador Now!</p>
            <input class="form-control form-control-lg" type="email" style="height:35px" placeholder="Enter Email Address" name="acmail"  onkeypress="return blockSpecialChar(event)" required>
            <br>
            <input class="form-control form-control-lg" type="password" style="height:35px" placeholder="Enter Password" name="acpw"  onkeypress="return blockSpecialChar(event)" required>
            <br>
            <input class="form-control form-control-lg" type="password" style="height:35px" placeholder="Confirm Password"  onkeypress="return blockSpecialChar(event)" name="accpw" required>
            <br><br>
      
            <button type="submit" class="btn btn-success" name="proceed">Proceed</button>
            <button type="button" class="btn btn-outline-success waves-effect"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn b1">Cancel</button>
            <br/>
            <br/>
            </center>
      
          </div>
        </form>
      </div></div>
      </div>
<!-- Registration Modal Ends -->
<!-- Login Modal Starts -->
<div id="id02" class="modal">
    <div class="container"><div class="row">
    <form class="modal-content animate col-lg-6 col-md-7 col-sm-10 col-xs-10" action="login/" method="POST">
      <div class="contain">
        <center>
        <p style="margin-bottom: 15px;color: #b5b5b5; font-size:17px">Login as Ambassador</p>
        <input class="form-control form-control-lg" type="email" style="height:35px" onkeypress="return blockSpecialChar(event)" placeholder="Email Address" name="acmail" required>
        <br>
        <input class="form-control form-control-lg" type="password" style="height:35px"  onkeypress="return blockSpecialChar(event)" placeholder="Password" name="acpw" required>
        <br><br>
  
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <button type="button" class="btn btn-outline-primary waves-effect"  onclick="document.getElementById('id02').style.display='none'" class="cancelbtn b1">Cancel</button>
        <br/>
        <br/>
        </center>
  
      </div>
    </form>
  </div></div>
  </div>
<!-- Login Modal Ends -->



<div class="navigation">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
        <label for="navi-toggle" class="navigation__button">
          <span class="navigation__icon">&nbsp;</span>
        </label>
        <div class="navigation__background">&nbsp;</div>
            <nav class="navigation__nav">
                <ul class="navigation__list">
                    <li class="navigation__item"><a href="#" class="navigation__link"><span>01</span>EVENTS</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link"><span>02</span>SPONSORS</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link" data-toggle="modal"  onclick="document.getElementById('id02').style.display='block'"><span>03</span>SIGN IN</a></li>
                    <li class="navigation__item"><a href="#" class="navigation__link"><span>04</span>CONTECT US</a></li>
                    </ul>
            </nav>
        </div>

        <header class="headerc">
            <div  class="cuHeader">
                <p id="cuHeader1">Campus Ambassador Programme</p>
                <p id="cuHeader2">KIIT FEST <sub>6.0</sub></p>

                <div id="buttoncu">   
                <?php if(!isset($_SESSION['id']) && !isset($_SESSION['role'])){ ?> 
                  <button class="btn btn--green register__btn cuButton animation bounceIn"  data-toggle="modal"  onclick="document.getElementById('id01').style.display='block'">Register now</button>
                  <button class="btn btn--green register__btn cuButton animation bounceIn"  data-toggle="modal"  onclick="document.getElementById('id02').style.display='block'">login</button>
                <?php } ?>
                  <a href="#leaderboardsection"><button class="btn btn--green register__btn cuButton animation bounceIn">CU Leaderboard</button></a>
                <?php if(isset($_SESSION['id']) && isset($_SESSION['role'])){ ?> <a href="dashboard/"><button class="btn btn--green register__btn cuButton animation bounceIn">Dashboard</button></a>
                <?php } ?>
                </div>
            </div>                      
         </header>

        
<!-- LOGIN MODAL -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h2 class="modal-title w-100 font-weight-bold heading-secondary">Sign in</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email" style="font-size: 15px;">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass" style="font-size: 15px;">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" style="margin: 0;padding: 10;">Login</button>
      </div>    
          <p class="black-text text-right d-flex justify-content-center mb-3 pt-2" style="font-size: 20px;"> or Sign in
              with:</p>              
              <!-- FACEBOOK -->
              <i class="fab fa-facebook fa-5x" style="color: #3b5998;padding-left: 235px;padding-bottom: 20px;"></i>  
    </div>
  </div>
</div>
<!-- LOGIN MODAL -->


        <main>
            <section class="section-about">
                <div class="u-center-text u-margin-bottom-big">
                    <h2 class="heading-secondary about-section">
                  About Our Campus Ambassador Program
                    </h2>
                </div>

                <div class="row">
                    <div class="col-1-of-2">
                        <h3 class="heading-tertiary u-margin-bottom-small">Lorem Ipsum is simply dummy text </h3>
                        <p class="paragraph">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ipsum sapiente aspernatur libero repellat quis consequatur
                            ducimus quam nisi exercitationem omnis earum qui.
                        </p>

                        <h3 class="heading-tertiary u-margin-bottom-small">Lorem Ipsum is simply dummy text</h3>
                        <p class="paragraph">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores nulla deserunt voluptatum nam.
                        </p>

                        <a href="#" class="btn-text">Learn more &rarr;</a>
                    </div>
                    <div class="col-1-of-2">
                        <div class="composition">
                            <img src="./img/gal-1.jpg" sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px"
                            alt="Photo 1"
                            class="composition__photo composition__photo--p1">
                            <img src="./img/gal-5.jpg" sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px"
                            alt="Photo 1"
                            class="composition__photo composition__photo--p2">
                            <img src="./img/gal-13.jpg" sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px"
                            alt="Photo 1"
                            class="composition__photo composition__photo--p3">

                        </div>
                    </div>
                </div>
            </section>


                 <!-- Roles Section Start -->
                 <section id="leaderboardsection" style="padding-top: 8rem; padding-bottom: 8rem; background-color: indianred; height: 100%;">
                        <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <div class="section-title-header text-center">
                                <h1 class="section-title leaderboard heading-secondary" data-wow-delay="0.2s">LEADERBOARD</h1>
                                <p class="wow fadeInDown heading-secondary" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
                              </div>
                            </div>
                          </div>
                            <!-- Leaderboard Backend -->
                            <?php
                              $selq="SELECT * FROM chickensoup WHERE Prole=1 ORDER BY People DESC;";
                            
                              $qry_result=mysqli_query($con, $selq) or die(mysqli_error($con));
                              $first = mysqli_fetch_array($qry_result);

                              $second = mysqli_fetch_array($qry_result);

                              $third = mysqli_fetch_array($qry_result);

                            ?>
                          <div class="section-fix">
                                <div class="center">
                                    <div class="top3">


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
                                    <?php if(mysqli_num_rows($qry_result)>3){ ?>                                  
                                      <div class="three item">
                                        <div class="pos">
                                          3
                                        </div>
                                        <div class="pic" style="background-image: url(&#39;https://randomuser.me/api/portraits/women/91.jpg&#39;)"></div>
                                        <div class="name">
                                        <?php echo $third['Pname']; ?>
                                        </div>
                                        <div class="score">
                                        <?php echo $third['People']*10; ?>
                                        </div>
                                      </div>
                                    <?php } ?>
                                    </div>
                                    <div class="list">
                                      <?php
                                       if(mysqli_num_rows($qry_result)>3){ 
                                        $rank=3;
                                         while ($crow = mysqli_fetch_array($qry_result) && $rank<11) {
                                           $rank+=1;
                                        
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
                                         } 
                                        }
                                    ?>
                                      
                                    </div>
                                  </div>
                                  </div>
                          
                        </div>
                      </section>
                      <!-- Roles Section End -->



            <section class="section-features">
                    <h2 class="heading-secondary feature-section">ROLES of CA @ KF 6.0</h2>              
                <div class="row">
                    <div class="col-1-of-4">
                        <div class="feature-box">
                            <i class="feature-box__icon icon-basic-world"></i>
                            <h3 class="heading-tertiary u-margin-bottom-small">REGISTRATIONS</h3>
                            <p class="feature-box__text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ipsum sapiente aspernatur.
                            </p>
                        </div>
                    </div>

                    <div class="col-1-of-4">
                        <div class="feature-box">
                            <i class="feature-box__icon icon-basic-compass"></i>
                            <h3 class="heading-tertiary u-margin-bottom-small">COLLEGE PROMOTIONS</h3>
                            <p class="feature-box__text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ipsum sapiente aspernatur.
                            </p>
                        </div>
                    </div>

                    <div class="col-1-of-4">
                        <div class="feature-box">
                            <i class="feature-box__icon icon-basic-map"></i>
                            <h3 class="heading-tertiary u-margin-bottom-small">CONDUCTING WORKSHOPS</h3>
                             <p class="feature-box__text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ipsum sapiente aspernatur.
                            </p>
                        </div>
                    </div>

                    <div class="col-1-of-4">
                        <div class="feature-box">
                            <i class="feature-box__icon icon-basic-heart"></i>
                            <h3 class="heading-tertiary u-margin-bottom-small">ONLINE MARKETING</h3>
                            <p class="feature-box__text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ipsum sapiente aspernatur.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

                 <!-- peek Section Start -->  
    
      <section class="peek__section">
        <h2 class="peek__heading heading-secondary">PEEK SECTION</h2>
            <div class="peek__container">

                    <figure class="peek__img-1">
                             <img src="./img/Accomodation.png" alt="img-1" class="peek__img peek__img-1">
                             <figcaption class="peek__text">Free accommodation</figcaption>
                    </figure>
             
                    <figure class="peek__img-2">
                             <img src="./img/No registration fee.png" alt="img-2" class="peek__img peek__img-2">
                             <figcaption class="peek__text">No participation fee</figcaption>
                     </figure>
             
                     <figure class="peek__img-3">
                             <img src="./img/Cerificates.png" alt="img-3" class="peek__img peek__img-3">
                             <figcaption class="peek__text">Certificates</figcaption>
                     </figure>
             
                     <figure class="peek__img-4">
                             <img src="./img/All Benefits.png" alt="img-4" class="peek__img-sq peek__img-4">                             
                     </figure>
             
                     <figure class="peek__img-5">
                             <img src="./img/Free pass.png" alt="img-5" class="peek__img peek__img-5">
                             <figcaption class="peek__text">Free star night passes</figcaption>
                     </figure>
             
                     <figure class="peek__img-6">
                             <img src="./img/Merchandise (2).png" alt="img-6" class="peek__img peek__img-6">
                             <figcaption class="peek__text">Brand marchandise</figcaption>
                     </figure>

                     <figure class="peek__img-7">
                            <img src="./img/Exciting Goodies.png" alt="img-7" class="peek__img">
                            <figcaption class="peek__text">Exciting Goodies</figcaption>
                    </figure>
             
                     <figure class="peek__img-8">
                             <img src="./img/Meet celebrities.png" alt="img-8" class="peek__img">
                             <figcaption class="peek__text">Meet celebrities</figcaption>
                     </figure>
                     
                 </div>
                </section>
                           
    </section>
          <!-- peek Section End -->

        </main>


        <footer class="footer">

            <div class="footer__logo-box">
                <img src="./img/logo-01.png" alt="KIITFEST" class="footer__logo">
            </div>

            <div class="row">
                <div class="col-1-of-2">
                    <div class="footer__navigation">
                        <ul class="footer__list">
                            <li class="footer__item"><a href="#" class="footer__link">EVENTS</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">SPONSERS</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Carrers</a></li>
                            <li class="footer__item"><a href="#" class="footer__link"   data-toggle="modal"  onclick="document.getElementById('id02').style.display='block'">SIGN IN</a></li>
                            <li class="footer__item" style="margin-top: 10px;"><a href="#" class="footer__link">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-1-of-2">
                    <p class="footer__copyright">
                            &copy;  All rights reserved to <a href="#" class="footer__link"> KIITFEST</a> Web Team <span class="heart">&hearts;</span> || 2019.
                </p>
                </div>
            </div>
        </footer>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script>
    // Get the modal
    var modal = document.getElementById('id01');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>


<!-- JS CODE (ALL SCRIPTS) -->
  

<!-- JS CODE (ALL SCRIPTS) -->

</body>

</html>
