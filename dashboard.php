<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else { ?>
    <!DOCTYPE html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <title>Online Library Management System | Admin Dash Board</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <!-- GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">ADMIN DASHBOARD</h4>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
                            <?php
                            $sql = "SELECT id from tblbooks ";
                            $result = $conn->query($sql);

                            $listdbooks = $result->num_rows;
                            ?>


                            <h3>
                                <?php echo htmlentities($listdbooks); ?>
                            </h3>
                            Books Listed
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
                            <?php
                            $sql1 = "SELECT id from tblissuedbookdetails ";
                            $result1 = $conn->query($sql1);

                            $issuedbooks = $result1->num_rows;
                            ?>

                            <h3>
                                <?php echo htmlentities($issuedbooks); ?>
                            </h3>
                            Times Book Issued
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
                            <?php
                            $status = 1;
                            $sql2 = "SELECT id from tblissuedbookdetails where RetrunStatus='{$status}'";
                            $result2 = $conn->query($sql2);
                            $returnedbooks = $result2->num_rows;
                            ?>

                            <h3>
                                <?php echo htmlentities($returnedbooks); ?>
                            </h3>
                            Times Books Returned
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <?php
                            $sql3 = "SELECT id from tblstudents ";
                            $result3 = $conn->query($sql3);
                            $regstds = $result3->num_rows;
                            ?>
                            <h3>
                                <?php echo htmlentities($regstds); ?>
                            </h3>
                            Registered Users
                        </div>
                    </div>

                </div>



                <div class="row">

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-user fa-5x"></i>
                            <?php
                            $sql4 = "SELECT id from tblauthors ";
                            $result4 = $conn->query($sql4);

                            $listdathrs = $result4->num_rows;
                            ?>


                            <h3>
                                <?php echo htmlentities($listdathrs); ?>
                            </h3>
                            Authors Listed
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-3 rscol-xs-6">
                        <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-file-archive-o fa-5x"></i>
                            <?php
                            $sql5 = "SELECT id from tblcategory ";
                            $result5 = $conn->query($sql5);

                            $listdcats = $result5->num_rows;
                            ?>

                            <h3>
                                <?php echo htmlentities($listdcats); ?>
                            </h3>
                            Listed Categories
                        </div>
                    </div>


                </div>





















                <div class="row">

                    <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
                        <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">

                            <div class="carousel-inner">
                                <div class="item active">

                                    <img src="assets/img/1.jpg" alt="" />

                                </div>
                                <div class="item">
                                    <img src="assets/img/2.jpg" alt="" />

                                </div>
                                <div class="item">
                                    <img src="assets/img/3.jpg" alt="" />

                                </div>
                            </div>
                            <!--INDICATORS-->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example" data-slide-to="1"></li>
                                <li data-target="#carousel-example" data-slide-to="2"></li>
                            </ol>
                            <!--PREVIUS-NEXT BUTTONS-->
                            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>





                </div>

            </div>
        </div>
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>

<?php } ?>