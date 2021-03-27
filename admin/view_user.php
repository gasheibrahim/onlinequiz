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

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
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
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All User</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table my-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">username</th>
                                            <th scope="col">email</th>
                                            <th scope="col">contact</th>
                                            <th scope="col">password</th>
                                            <th scope="col">Delete</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $res=mysqli_query($con, "select * from registration");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row["id"]; ?></th>
                                                    <td><?php echo $row["firstname"]; ?></td>
                                                    <td><?php echo $row["lastname"]; ?></td>
                                                    <td><?php echo $row["username"]; ?></td>
                                                    <td><?php echo $row["email"]; ?></td>
                                                    <td><?php echo $row["contact"]; ?></td>
                                                    <td><?php echo $row["password"]; ?></td>
                                                    <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div id="elementH"></div>
        <button type="button" id="btn-download" onclick="generatePdf()" class="btn btn-success" style="margin-left:25rem;">Download All Users</button>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="./vendor/jspdf/dist/jspdf.min.js"></script>
    <script src="./vendor/jspdf-autotable/dist/jspdf.plugin.autotable.min.js"></script>
    <script>
        function generatePdf(){
            var doc = new jsPDF();
            // doc.setFont("helvetica");
            // doc.setFontType("bold");
            // doc.text(20, 50, 'Thank You For Attending Exam.');
            doc.autoTable({ html: '.my-table' })
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
            doc.save('user-document.pdf');
        }
    </script>
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
