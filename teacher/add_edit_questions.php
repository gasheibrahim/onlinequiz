<?php
    include "../connection.php";
    $id=$_GET["id"];
    $exam_category = '';
    $res=mysqli_query($con, "select * from exam_category where id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $exam_category=$row["category"];
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
                        <a href="add_edit_exam_questions.php"> <i class="menu-icon fa fa-dashboard"></i>Add & Edit questions </a>
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

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Question inside <?php echo "<font color='red'>" .$exam_category. "</font>"; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-header">
                            <strong>Add New Question</strong>
                            </div>
                            <form name="form1" action="" method="post">
                            <div class="card-body card-block">
                                <div class="form-group">
                                <label for="">Question</label>
                                <input type="text" name="question" value="" class="form-control" placeholder="Add Question" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">Add Option 1</label>
                                <input type="text" name="opt1" value="" class="form-control" placeholder="Add Option 1" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">Add Option 2</label>
                                <input type="text" name="opt2" value="" class="form-control" placeholder="Add Option 2" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">Add Option 3</label>
                                <input type="text" name="opt3" value="" class="form-control" placeholder="Add Option 3" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">Add Option 4</label>
                                <input type="text" name="opt4" value="" class="form-control" placeholder="Add Option 4" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">Add Option 5</label>
                                <input type="text" name="opt5" value="" class="form-control" placeholder="Add Option 5" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="">Add Answer</label>
                                <input type="text" name="answer" value="" class="form-control" placeholder="Add Right Answer" aria-describedby="helpId">
                                </div>
                                
                                <div class="form-group">
                                <input type="submit" name="submit1" id="submit" value="Add Question" class="btn btn-primary" placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div><!-- /#right-panel -->

    <?php
        if(isset($_POST["submit1"]))
        {
            $loop=0;
            $count=0;
            $res=mysqli_query($con, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($con));
            $count=mysqli_num_rows($res);
            if($count==0){

            }
            else{
                while($row=mysqli_fetch_array($res)){
                    $loop=$loop+1;
                    mysqli_query($con, "update questions set question_no='$loop' where id=$row[id]");
                }
            }
            $loop=$loop+1;
            mysqli_query($con, "insert into questions values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[opt5]','$_POST[answer]', '$exam_category')") or die(mysqli_error($con));
            ?>
            <script type="text/javascript">
                alert("Question added Succefully");
                window.location.href=window.location.href;
            </script>
            <?php
        }
    ?>

    <!-- Right Panel -->

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
