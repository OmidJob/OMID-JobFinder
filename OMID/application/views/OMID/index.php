<?php
    $SessionData = $this->session->userdata('LoggedIn');
?>
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Omid Portal Design Admin Template
	Version: 1.0
	Author: Milad Ranaei && Azam Feyznia
	Author URL: http://www.omid.com
================================================================================ -->

<head>

    <!-- توضیحات متا تگ ها -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <!-- پایان توضیحات -->

    <title><?php echo 'امید';?> | <?php echo $PageTitle;?></title>

    <!-- Favicons-->
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>assets/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?php echo base_url() ?>assets/images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->

    <!-- CORE CSS-->
    <link href="<?php echo base_url() ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="<?php echo base_url() ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link href="<?php echo base_url() ?>assets/css/percircle.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?php echo base_url() ?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDE PRELOADER -->
    <link href="<?php echo base_url() ?>assets/css/preloader.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDE TOUR JQUERY -->
    <link href="<?php echo base_url() ?>assets/css/tour/tour.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body>

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START HEADER -->
    <?php include 'Header.php';?>
<!-- END HEADER -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START RIGHT SIDEBAR NAV-->
        <?php include $SessionData['PersonTypeId'].'/Navigation.php';?>
        <!-- END RIGHT SIDEBAR NAV-->


        <!-- START CONTENT -->
        <section id="content">

            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper" style="background-color: #ecf0f5">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <ol class="breadcrumb left">
                                <li><a href="#" style="color:#222"><i class="mdi-action-view-module" style="float: right;margin-left: 5px;margin-top: -3px"></i>خانه</a>
                                </li>
                                <li><a href="index.html" style="color:#428bca">داشبورد </a>
                                </li>
                            </ol>
                            <h5 class="breadcrumbs-title">
                                <i class="mdi-action-home Medium mdi-icon"></i>داشبورد
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->
        <?php include $SessionData['PersonTypeId'].'/'.$PageName.'.php';?>
        <!-- END CONTENT -->

        <!-- //////////////////////////////////////////////////////////////////////////// -->


        <!-- START LEFT SIDEBAR NAV -->
        <?php include $SessionData['PersonTypeId'].'/LeftNavigation.php' ?>
        <!-- END LEFT SIDEBAR NAV-->


    </div>
    <!-- END WRAPPER -->

    <!-- MINISTRANT MODAL -->
    <?php include $SessionData['PersonTypeId'].'/modal.php' ?>
    <!-- END MINISTRANT MODAL -->

    <?php if ( $FirstRunWizard == 0 ){?>
    <ul class="cd-tour-wrapper">
        <li class="cd-single-step">
            <span>Step 1</span>
            <div class="cd-more-info left">
                <h2>درسترسی به ایتم ها و امکانات</h2>
                <p>شما میتوانید از این قسمت به تک تک منو ها از جمله اطلاعات فردی و ساخت رزومه و ... دسترسی داشته باشید</p>
                <img src="img/step-1.png" alt="step 1">
            </div>
        </li> <!-- .cd-single-step -->

        <li class="cd-single-step">
            <span>Step 2</span>

            <div class="cd-more-info bottom">
                <h2>رویداد ها و پیام ها</h2>
                    <ul>
                        <li>
                            <i class="mdi-social-notifications"></i>تمامی رویداد هایتان را اینجا مشاهده کنید
                        </li>
                        <li>
                            <i class="mdi-content-markunread"></i>کلیه پیام های شما اینجا قابل دسترس هستند
                        </li>
                        <li>
                            <i class="mdi-communication-chat"></i>چت های خود را اینجا دنبال کنید
                        </li>
                    </ul>
                <img src="img/step-2.png" alt="step 2">
            </div>
        </li> <!-- .cd-single-step -->

        <li class="cd-single-step">
            <span>Step 3</span>
            <div class="cd-more-info top">
                <h2>تکمیل رزومه خود</h2>
                <ul>
                    <li>
&nbsp;                      با کلیک بر روی <a class="btn-floating btn-small pink accent-3 pulse" ><i class="mdi-content-add"></i></a>&nbsp;میتوانید رزومه خود را تکمیل کنید تا کارفرمایان بهتر شما را پیدا و درخواست همکاری دهند
                    </li>
                </ul>
            </div>
        </li> <!-- .cd-single-step -->
    </ul> <!-- .cd-tour-wrapper -->
    <?php
    $first = array(
        'FirstRunWizard' => 1
    );
    $this->db->db_select('omidframework');
    $this->db->where("Email", $SessionData['Email']);
    $this->db->update("accounts", $first);

    };
    ?>

</div>
    <div class="cd-cover-layer"></div>
</div>

<!-- END MAIN -->


    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/jquery.mobile.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/modernizr.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/materialize.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/percircle/percircle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/tour/main.js"></script>

    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins.js"></script>
    <!-- Toast Notification -->

    <script type="text/javascript">

        $(function(){
            $("[id$='circle']").percircle();

        });

    </script>
</body>

</html>

