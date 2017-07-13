<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>پنل ورود پورتال امید</title>

    <!-- Favicons-->
    <link rel="icon" href="<?php echo base_url() ?>/assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>/assets/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?php echo base_url() ?>/assets/images/favicon/mstile-144x144.png">


    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/jquery-1.11.2.min.js"></script>

    <!-- CORE CSS-->
    <link href="<?php echo base_url() ?>/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="<?php echo base_url() ?>/assets/css/login.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- **************************************** -->


</head>

<body class="white">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
            <nav class="z-depth-0 white">
                    <h1 style="margin: 60px">
                        <a href="index.html" class="brand-logo darken-1"><img src="<?php echo base_url() ?>/assets/images/omid.svg" style="width: 200px" alt="materialize logo"></a>
                        <span class="logo-text">امید</span>
                        <a href="<?php echo base_url()  ?>/index.php"><i class="mdi-content-clear left grey-text"></i></a>
                    </h1>

            </nav>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">
            <!-- START CONTAINER -->
            <div class="container">
                <div class="row">
                    <h2 class="center-align" style="font-size: 35px">ورود</h2>
                    <p class="center-align" style="font-size: 18px"> ثبت نام نکرده ام ؟ <a href="<?php base_url() ?>register" class="btn-flat waves-effect waves-gray" style="padding: 4px;
}"><span class="blue-text text-darken-1">ثبت نام کنید</span></a></p>
                    <?php echo form_error('AccountType','<p class="login-error center-align">', '</p>'); ?>
                </div>
                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="row">
                        <?php
                        //echo validation_errors();
                        echo form_open('Login/CheckInfo', 'class="col s12 diver-form"');
                        ?>
                            <div class="row">
                                <div class="input-field col s12">
                                    <?php echo form_input(array('id'=>'email','type'=>'email','class'=>'validate','name'=>'Email','autofocus'=>'autofocus', 'value'=> set_value('Email'),'required'=>"" ,'aria-required'=>"true")); ?>
                                    <label for="email" class="align-lable-form">ایمیل</label>

                                </div>
                                <div class="input-field col s12">
                                    <?php echo form_password(array('id'=>'pass','class'=>'validate','name'=>'Password')) ?>
                                    <label for="pass" class="align-lable-form">رمز عبور</label>
                                </div>
                                <div class="col s12">
                                    <select name='AccountType' >
                                        <option value='MINISTRANT' <?php  set_select('AccountType', 'MINISTRANT', TRUE) ?> >کارجو</option>
                                        <option value='EMPLOYER' <?php set_select('AccountType', 'EMPLOYER') ?> >کارفرما</option>
                                    </select>
                                </div>
                                <div class="col s6">
                                    <p class="right-align">
                                        <?php echo form_checkbox('remember_me', 'accept', TRUE,'id="remember"');?>
                                        <label for="remember" style="font-size: 14px !important;">مرا به خاطر بسپار</label>
                                    </p>
                                </div>
                                <div class="col s6">
                                    <p class="left-align">
                                        <a href="<?php echo base_url() ?>index.php/login/forgot">فراموشی رمزعبور</a>
                                    </p>
                                </div>
                            </div>
<!--                                <div class="divider"></div>-->
                                <div class="row">
                                    <div class="col m12">
                                        <p class="right-align">
                                            <?php echo form_submit(array('class'=>'btn blue lighten-8 login-btn','value'=>'ورود'))?>
<!--                                            <button class="btn waves-effect waves-light blue lighten-8" style="border-radius: 999px;padding: 0 4rem;" type="button" name="action">ورود</button>-->
                                        </p>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class=row></div>
                        <div class=row></div>
                        <div class=row></div>
                        <div class="collection">
                            <a href="#!" class="collection-item" style="border: 1px solid #d34836;border-radius: 0px;color: #d34836;"><i class="socialbox-omid2" style="background-color: #d34836"></i>ورود با گوگل</a>
                        </div>
                        <div class="collection" >
                            <a href="#!" class="collection-item"  style="border: 1px solid #3b5998;border-radius: 0px;color: #3b5998;"><i class="socialbox-omid" style="background-color: #3b5998"></i>ورود با فیسبوک</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN -->


    <!-- ================================================
    Scripts
    ================================================ -->
    

    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/materialize.js"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins.js"></script>

</body>

</html>