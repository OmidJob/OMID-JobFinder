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
        <div class="container-reg">
            <div class="row">
                <h2 class="center-align" style="font-size: 35px">ثبت نام در پورتال امید</h2>
                <p class="center-align" style="font-size: 18px"> ثبت نام کرده ام ؟ <a href="<?php base_url(); ?>login" class="btn-flat waves-effect waves-gray" style="padding: 4px;
}"><span class="blue-text text-darken-1">ورود</span></a></p>
                <?php echo validation_errors('<p class="login-error center-align">', '</p>'); ?>
            </div>
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="row">
                        <?php
                        //echo validation_errors();
                        echo form_open('Register/CheckInfo', 'class="col s12 diver-form"');
                        ?>
                        <div class="row">
                            <div class="input-field col s12">
                                <?php echo form_input(array('id'=>'Email','type'=>'email','class'=>'validate','name'=>'Email','autofocus'=>'autofocus', 'value'=> set_value('Email'),'required'=>"" ,'aria-required'=>"true")); ?>
                                <label for="Email" class="align-lable-form">ایمیل</label>
                            </div>
                            <div class="input-field col s12">
                                <?php echo form_input(array('id'=>'Mobile','class'=>'validate','name'=>'Mobile','value'=> set_value('Mobile'),'required'=>"" ,'aria-required'=>"true")) ?>
                                <label for="Mobile" class="align-lable-form">شماره مبایل</label>
                            </div>
                            <div class="input-field col s12">
                                <?php echo form_password(array('id'=>'Password','class'=>'validate','name'=>'Password','required'=>"" ,'aria-required'=>"true")) ?>
                                <label for="Password" class="align-lable-form">رمز عبور</label>
                            </div>
                            <div class="input-field col s12">
                                <?php echo form_password(array('id'=>'RepeatedPassword','class'=>'validate','name'=>'RepeatedPassword','required'=>"" ,'aria-required'=>"true")) ?>
                                <label for="RepeatedPassword" class="align-lable-form">تکرار رمز عبور</label>
                            </div>
                            <div class="col s12">
                                <select name='AccountType' >
                                    <option value='MINISTRANT' <?php  set_select('AccountType', 'MINISTRANT', TRUE) ?> >کارجو</option>
                                    <option value='EMPLOYER' <?php set_select('AccountType', 'EMPLOYER') ?> >کارفرما</option>
                                </select>
                            </div>
                        </div>
                        <!--<div class="divider"></div>-->
                        <div class="row">
                            <div class="col m12">
                                <p class="right-align">
                                    <?php echo form_submit(array('class'=>'btn blue lighten-8 login-btn','value'=>'ثبت نام'))?>
                                    <!--                                            <button class="btn waves-effect waves-light blue lighten-8" style="border-radius: 999px;padding: 0 4rem;" type="button" name="action">ورود</button>-->
                                </p>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <div class="col s12 m12 l6">
                    <div class=row></div>
                    <div class="valign-wrapper">
                        <img src="<?php echo base_url() ?>/assets/images/user.png" width="50px" height="50px" class="socialbox-omid2-register" >
                        <p>به اسانی در پورتال یکپارچه امید ثبت نام کنید</p>
                    </div>
                    <div class="valign-wrapper">
                        <img src="<?php echo base_url() ?>/assets/images/handshake1.png" width="50px" height="50px" class="socialbox-omid2-register" >
                        <p>کارفرمای خود را بشناسید و کار مناسب با توانایی هایتان را پیدا کنید</p>
                    </div>
                    <div class="valign-wrapper">
                        <img src="<?php echo base_url() ?>/assets/images/stopwatch.png" width="50px" height="50px" class="socialbox-omid2-register" >
                        <p>در زمان خود صرفه جویی کرده و کار مناسب خود را پیدا کرده</p>
                    </div>
                    <div class="valign-wrapper">
                        <img src="<?php echo base_url() ?>/assets/images/contract.png" width="50px" height="50px" class="socialbox-omid2-register" >
                        <p>رزومه خود را به دیگران نشان دهید و به اشتراک بگذارید</p>
                    </div>
                    <div class="valign-wrapper">
                        <img src="<?php echo base_url() ?>/assets/images/meeting.png" width="50px" height="50px" class="socialbox-omid2-register" >
                        <p>کارفرما ها و کارجوها را بهتر و با یک جستجو پیدا کنید</p>
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


<!--         --><?php
//            //echo validation_errors();
//            echo form_open('Register/CheckInfo');
//            echo "<table border = '0'>";
//            echo "<tr>";
//            echo "<td>ایمیل:</td>";
//            echo "<td>". form_input(array('id'=>'Email','name'=>'Email', 'value'=> set_value('Email')))."</td>";
//            echo "<td>". form_error('Email')."</td>";
//            echo "</tr>";
//
//            echo "<tr>";
//            echo "<td>شماره موبایل:</td>";
//            echo "<td>". form_input(array('id'=>'Mobile','name'=>'Mobile', 'value'=> set_value('Mobile')))."</td>";
//            echo "<td>". form_error('Mobile')."</td>";
//            echo "</tr>";
//
//
//            echo "<tr>";
//            echo "<td>کلمه عبور</td>";
//            echo "<td>". form_password(array('id'=>'Password','name'=>'Password'))."</td>";
//            echo "<td>". form_error('Password')."</td>";
//            echo "</tr>";
//
//            echo "<tr>";
//            echo "<td>تکرار کلمه عبور</td>";
//            echo "<td>". form_password(array('id'=>'RepeatedPassword','name'=>'RepeatedPassword'))."</td>";
//            echo "<td>". form_error('RepeatedPassword')."</td>";
//            echo "</tr>";
//
//
//            echo "<tr>";
//            echo "<td>ثبت نام به عنوان:</td>";
//            echo "<td><select name='AccountType'>
//            <option value='MINISTRANT'".  set_select('AccountType', 'MINISTRANT', TRUE)." >کارجو</option>
//            <option value='EMPLOYER' ". set_select('AccountType', 'EMPLOYER')." >کارفرما</option>
//
//            </select></td>";
//            echo "<td> </td>";
//             echo "</tr>";
//
//            echo "<tr>";
//            echo "<td> </td>";
//            echo "<td> </td>";
//            echo "<td>". form_submit(array('id'=>'Register','value'=>'ثبت نام'))."</td>";
//            echo "</tr>";
//
//            echo "</table>";
//            echo form_close();
//
//         ?>
<!---->
<!---->
<!--   </body>-->
<!---->
<!--</html>-->
