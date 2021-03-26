<?php
    include "../connection.php";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>online exam discipleship class information system</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="exam_category.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="active">
                        <a href="exam_category.php"> <i class="menu-icon fa fa-dashboard"></i>View All Exam </a>
                    </li>
                    <li class="active">
                        <a href="view_user.php"> <i class="menu-icon fa fa-dashboard"></i>View All User </a>
                    </li>
                    <li class="active">
                        <a href="add_teacher.php"> <i class="menu-icon fa fa-dashboard"></i>Add Teacher </a>
                    </li>
                    <li class="active">
                        <a href="old_exam_results.php"> <i class="menu-icon fa fa-dashboard"></i>All Exam Result </a>
                    </li>
                    <li class="active">
                        <a href="logout.php"> <i class="menu-icon fa fa-dashboard"></i>Logout </a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
                
            </div>

        </header><!-- /header -->
        <!-- Header-->
        <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="text-center">All Exam Result</strong>
                    </div>
                    <?php
                    $count=0;
                    $res=mysqli_query($con, "select * from exam_results order by id asc");
                    $count=mysqli_num_rows($res);
                    if($count==0)
                    {
                        ?>
                            <h1 class="text-center">No Results Found</h1>
                        <?php
                    }
                    else
                    {
                        echo "<table class='table table-bordered'>";
                        echo "<tr style='background-color:steelblue;color:white;'>";
                        echo "<th>"; echo "Id"; echo "</th>";
                        echo "<th>"; echo "username"; echo "</th>";
                        echo "<th>"; echo "exam type"; echo "</th>"; 
                        echo "<th>"; echo "correct answer"; echo "</th>";
                        echo "<th>"; echo "wrong answer"; echo "</th>";
                        echo "<th>"; echo "total Marks"; echo "</th>";
                        echo "<th>"; echo "exam_time"; echo "</th>";
                        echo "</tr>";
                        while($row=mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td>"; echo $row["id"]; echo "</td>";
                            echo "<td>"; echo $row["username"]; echo "</td>";
                            echo "<td>"; echo $row["exam_type"]; echo "</td>"; 
                            echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                            echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                            echo "<td>"; echo $row["correct_answer"];echo "/";echo $row["total_question"]; echo "</td>";
                            echo "<td>"; echo $row["exam_time"]; echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<br>";
                        echo "<a href='' class='btn btn bg-info'>Download Result</a>";

                    }
                ?>
                </div>
            </div>
        </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php
        if(isset($_POST["submit1"]))
        {
            mysqli_query($con, "insert into exam_category values(NULL, '$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($con));
            ?>
            <script type="text/javascript">
                alert("Exam added Succefully");
                window.location.href=window.location.href;
            </script>
            <?php
        }
    ?>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
