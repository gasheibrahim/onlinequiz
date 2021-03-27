<?php
session_start();
include "connection.php";
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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
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
                                        <li><a href="select_exam.php">exams</a></li>
                                        <li class="current-menu-item"><a href="old_exam_results.php">Results</a></li>
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

    </div><!-- .page-header --><br><br><br><br><br><br><br><br><br>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-body">
    <br>
    <div class="row">

      <div class="row">
          <div class="row">
            <div class="col-lg-12 col-lg-push-3" id="content">
                <h1 class="text-center">Old Exam Result</h1>
                <table class='table table-bordered' id="my-table">
                <tr style='background-color:#19c880;color:white;'>
                <th>Id</th>
                <th>Username</th>
                <th>Exam Type</th>
                <th>Total Question</th>
                <th>Correct Answer</th>
                <th>Wrong Answer</th>
                <th>Total Marks</th>
                <th>Exam Time</th>
                </tr>
                <?php
                    $count=0;
                    $res=mysqli_query($con, "select * from exam_results where username='$_SESSION[username]' order by id asc");
                    $count=mysqli_num_rows($res);
                    if($count==0)
                    {
                        ?>
                            <h1 class="text-center">No Results Found</h1>
                        <?php
                    }
                    else
                    {
                        while($row=mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td>"; echo $row["id"]; echo "</td>";
                            echo "<td>"; echo $row["username"]; echo "</td>";
                            echo "<td>"; echo $row["exam_type"]; echo "</td>"; 
                            echo "<td>"; echo $row["total_question"]; echo "</td>";
                            echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                            echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                            echo "<td>"; echo $row["correct_answer"];echo "/";echo $row["total_question"]; echo "</td>";
                            echo "<td>"; echo $row["exam_time"]; echo "</td>";
                            echo "</tr>";
                        }

                    }
                ?>
            </table>
            </div>
          </div>
        </div>
        
    </div>
    <div id="elementH"></div>
    <button type="button" id="btn-download" onclick="generatePdf()" class="btn btn-success" style="margin-left:25rem;">Download All Result</button>
  </div>
</div>
</div>
</div>
</div><br><br>
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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
    <script src="./vendor/jspdf/dist/jspdf.min.js"></script>
    <script src="./vendor/jspdf-autotable/dist/jspdf.plugin.autotable.min.js"></script>
    <script>
        function generatePdf(){
            var doc = new jsPDF();
            // doc.setFont("helvetica");
            // doc.setFontType("bold");
            // doc.text(20, 50, 'Thank You For Attending Exam.');
            doc.autoTable({ html: '#my-table' })
            // var elementHTML = $('#content').html();
            // var specialElementHandlers = {
            //     '#elementH': function (element, renderer) {
            //         return true;
            //     }
            // };
            // doc.fromHTML(elementHTML, 15, 15, {
            //     'width': 170,
            //     'elementHandlers': specialElementHandlers
            // });
            // Save the PDF
            doc.save('result-document.pdf');
        }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>