<?php
    include "../connection.php";
    $id=$_GET["id"];
    $res=mysqli_query($con, "select * from exam_category where id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $exam_category=$row["category"];
        $exam_time=$row["exam_time_in_minutes"];
    }
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

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="exam_category.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="active">
                        <a href="exam_category.php"> <i class="menu-icon fa fa-dashboard"></i>Add & Edit Exam </a>
                    </li>
                    <li class="active">
                        <a href="old_exam_results.php"> <i class="menu-icon fa fa-dashboard"></i>All Result </a>
                    </li>
                    <li class="active">
                        <a href="add_edit_exam_questions.php"> <i class="menu-icon fa fa-dashboard"></i>Add & Edit Questions </a>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Exam Categories</strong>
                    </div>
                    <form name="form1" action="" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                        <label for="">New exam Category</label>
                        <input type="text" name="examname" id="category" value="<?php echo $exam_category;?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                        <label for="">Exam Time In Minutes</label>
                        <input type="text" name="examtime" value="<?php echo $exam_time;?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                        <input type="submit" name="submit1" id="submit" value="Update Exam" class="btn btn-primary" placeholder="" aria-describedby="helpId">
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
            mysqli_query($con, "update exam_category set category='$_POST[examname]', exam_time_in_minutes='$_POST[examtime]' where id=$id") or die(mysqli_error($con));
            ?>
            <script type="text/javascript">
                window.location="exam_category.php"
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
