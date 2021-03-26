<?php
    session_start();
    require('connection.php');
    if(empty($_SESSION['username']) && empty($_SESSION['password']))
    {
    header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>online exam discipleship class information system</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="about-page">
    <div class="page-header">
        <header class="site-header">
            <header class="site-header">
                <div class="top-header-bar">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                                <div class="header-bar-email d-flex align-items-center">
                                    <i class="fa fa-envelope"></i><a href="#">emaje02@gmail.com</a>
                                </div><!-- .header-bar-email -->

                                <div class="header-bar-text lg-flex align-items-center">
                                    <p><i class="fa fa-phone"></i>+250-7832-45797 </p>
                                </div><!-- .header-bar-text -->
                            </div><!-- .col -->

                            <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                                <div class="header-bar-search">
                                    <h4 style="color:#19c880;">Welcome <?php echo($_SESSION['username']) ?></h4>
                                </div><!-- .header-bar-search -->

                                <div class="header-bar-menu">
                                    <ul class="flex justify-content-center align-items-center py-2 pt-md-0">
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </div><!-- .header-bar-menu -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container-fluid -->
                </div><!-- .top-header-bar -->

                <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <a class="navbar-brand" href="#"><h3 class="site-title"><a href="index.php" rel="home">Online<span>Exam</span>Discipleship<span>Portal</span></a></h3></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <nav class="site-navigation flex justify-content-end align-items-center">
                                    <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                        <li class="current-menu-item"><a href="select_exam.php">exams</a></li>
                                        <li><a href="old_exam_results.php">Results</a></li>
                                    </ul>

                                    <div class="hamburger-menu d-lg-none">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div><!-- .hamburger-menu -->

                                    <div class="header-bar-cart">
                                        <a href="#" class="flex justify-content-center align-items-center"><span aria-hidden="true" class="icon_bag_alt"></span></a>
                                    </div><!-- .header-bar-search -->
                                </nav><!-- .site-navigation -->
                </nav>
            </header><!-- .site-header -->
        </header><!-- .site-header -->

    </div><!-- .page-header --><br><br><br><br><br>

        <div class="container">
        <div class="row">
        <div class="col-md-8">
        <div class="card" style="margin-top:150px;margin-left:15rem;">
        <div class="card-header text-center">Please Select Exam You Want To Do</div>
        <div class="card-body">
            <?php
                $res=mysqli_query($con, "select * from exam_category");
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                        <input type="button" class="btn btn-success form-control" value="<?php echo $row["category"]; ?>" style="margin-top: 10px; background-color:#19c880;color:white;" onclick="set_exam_type_session(this.value);">
                    <?php
                }
            ?>
        </div>
        </div>
        </div>
        </div>
        </div><br><br><br><br><br>
        <script type="text/javascript">
            function set_exam_type_session(exam_category)
            {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        window.location = "dashboard.php";
                    }
                };
                xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+ exam_category, true);
                xmlhttp.send(null); 
            }
        </script>



<footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about">
                            <h2>Online Exam Portal</h2>

                            <p>online exam port for restoration church located at Masoro industries zone for church member. </p>

                            <p class="footer-copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Webiste is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by Emmy</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div><!-- .foot-about -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                        <div class="foot-contact">
                            <h2>Contact Us</h2>

                            <ul>
                                <li>Email: emaje02@gmail.com</li>
                                <li>Phone: (+250) 7832 45797</li>
                                <li>Address: Masoro Church</li>
                            </ul>
                        </div><!-- .foot-contact -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                        <div class="quick-links flex flex-wrap">
                            <h2 class="w-100">Quick Links</h2>

                            <ul class="w-50">
                                <li><a href="#">About </a></li>
                                <li><a href="#">Terms of Use </a></li>
                                <li><a href="#">Privacy Policy </a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>

                            <ul class="w-50">
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Forums</a></li>
                                <li><a href="#">Language Packs</a></li>
                                <li><a href="#">Release Status</a></li>
                            </ul>
                        </div><!-- .quick-links -->
                    </div><!-- .col -->

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-widgets -->
    </footer><!-- .site-footer -->
    <!-- <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form>
            <div class="form-group">
              <input type="email" class="form-control" id="email1"placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password1" placeholder="Your password...">
            </div>
            <button type="button" class="btn btn-info btn-block btn-round">Login</button>
          </form>
          
          <div class="text-center text-muted delimiter">or use a social network</div>
          <div class="d-flex justify-content-center social-buttons">
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
              <i class="fab fa-twitter"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="fab fa-facebook"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
              <i class="fab fa-linkedin"></i>
            </button>
          </di>
        </div>
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="register.php" class="text-info"> Sign Up</a>.</div>
      </div>
  </div>
</div> -->
<script>
    $(document).ready(function() {$('#loginModal').modal('show');
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
});
</script>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
  <!-- Popper JS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
  <!-- Bootstrap JS -->
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
</body>
</html>