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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
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
                                        <a href="#" class="flex justify-content-center align-items-center"></a>
                                    </div><!-- .header-bar-search -->
                                </nav><!-- .site-navigation -->
                </nav>
            </header><!-- .site-header -->
        </header><!-- .site-header -->

    </div><!-- .page-header --><br><br><br><br><br><br><br>

<div class="container">
<div class="row">
<div class="col-md-12">
    <div id="countdowntimer" class="row" style="margin-left:50rem;display:block;color:#19c880;font-size:20px;"></div>
<div class="card" style="margin-left:10rem;">
  <div class="card-body">
    <br>
    <div class="row">
      <br>
      <div class="col-lg-2 col-lg-push-10">
          <div id="current_que" style="float:left;">0</div>
          <div style="float:left;">/</div>
          <div id="total_que" style="float:left;">0</div>
      </div>

      <div class="row">
          <div class="row">
            <div class="col-lg-10 col-lg-push-1" style="min-height:300px;background-color:white;" id="load_questions">
          
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-lg-push-3" style="min-height:50px;">
          <div class="col-lg-12 text-center">
            <input type="button" value="Previous" class="btn btn-warning" onclick="load_previous();">&nbsp;&nbsp;
            <input type="button" value="Next" class="btn btn-success" onclick="load_next();">
          </div>  
        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>
</div><br><br> 
<script type="text/javascript">
        setInterval(function(){
            timer();
        },1000);
        function timer()
        {
            var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        if(xmlhttp.responseText=="00:00:01")
                        {
                            window.location="result.php";
                        }
                        document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
                    }
            };
            xmlhttp.open("GET","forajax/load_timer.php",true);
            xmlhttp.send(null);
        }
  function load_total_que()
  {
      var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
      };
      xmlhttp.open("GET","forajax/load_total_que.php",true);
      xmlhttp.send(null);
  }
  var questionno="1";
  load_questions(questionno);

  function load_questions(questionno)
  {
      document.getElementById("current_que").innerHTML=questionno;
      var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                if(xmlhttp.responseText=="over")
                {
                  window.location="result.php";
                }
                else
                {
                  document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                  load_total_que();
                }
            }
      };
      xmlhttp.open("GET","forajax/load_questions.php?questionno="+ questionno,true);
      xmlhttp.send(null);
  }

  function radioclick(radiovalue,questionno)
  {
    var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                
            }
      };
      xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+radiovalue,true);
      xmlhttp.send(null);
  }

  function load_previous() 
  {
    if(questionno=="1")
    {
      load_questions(questionno);
    }
    else
    {
      questionno=eval(questionno)-1;
      load_questions(questionno);
    }
  }
  function load_next()
  {
    questionno=eval(questionno)+1;
    load_questions(questionno);
  }

</script>
<footer class="site-footer bg-dark">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about">
                            <h2 style="color:#19c880;">Online Exam Portal</h2>

                            <p>online exam Evangelical Restoration church Rwanda. </p>

                            <p class="footer-copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Webiste is made by Emmanuel</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div><!-- .foot-about -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                        <div class="foot-contact">
                            <h2 style="color:#19c880;">Contact Us</h2>

                            <ul>
                                <li>Email: emaje02@gmail.com</li>
                                <li>Phone: (+250) 7832 45797</li>
                                <li>Address:Gasabo,Ndera,Masoro </li>
                            </ul>
                        </div><!-- .foot-contact -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                        <div class="quick-links flex flex-wrap">
                            <h2 class="w-100" style="color:#19c880;">DEPARTMENTS</h2>

                            <ul class="w-50">
                                <li>Family care</li>
                                <li>Fellowship</li>
                                <li>Discipleship </li>
                                <li>Support Service</li>
                            </ul>

                        </div><!-- .quick-links -->
                    </div><!-- .col -->

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-widgets -->
    </footer><!-- .site-footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
