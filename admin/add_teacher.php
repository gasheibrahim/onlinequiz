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
                <div class="col-sm-5">

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        <div class="container">
            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Teacher</strong>
                            </div>
                            <form name="form1" action="" method="post">
                            <div class="card-body card-block">
                                <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" value="" class="form-control" placeholder="Add First Name" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" value="" class="form-control" placeholder="Add Last Name" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" value="" class="form-control" placeholder="Add Username" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">email</label>
                                <input type="email" name="email" value="" class="form-control" placeholder="Add email" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">contact</label>
                                <input type="text" name="contact" value="" class="form-control" placeholder="Add Phone Number" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">password</label>
                                <input type="password" name="password" value="" class="form-control" placeholder="Add Password" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <input type="submit" name="submit1" id="submit" value="Add Teacher" class="btn btn-primary" placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
        </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php
        if(isset($_POST["submit1"]))
        {
            mysqli_query($con, "insert into teacher values(NULL, '$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[email]','$_POST[contact]','$_POST[password]')") or die(mysqli_error($con));
            ?>
            <script type="text/javascript">
                alert("Teacher added Succefully");
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
