<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LOGIN</title>
	<!-- core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/mainungu.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <style type="text/css">
        .col-md-offset-4
        {
            padding-top: 2%;
            padding-bottom: 2%;
            border-radius: 2vw;
            background-color: rgba(33,33,33,0.6);

        }
        .form-group
        {
            margin-top: 5%;
        }
        .btn
        {
            width:100%;
        }
        body
        {
            padding:0;
        }
        html
        {
            padding-top: 16%;
            background: black;
            background: -webkit-radial-gradient(#E0E0E0,#BDBDBD,#616161, #424242, #212121, #212121, #212121); /* Safari 5.1 to 6.0 */
            background: -o-radial-gradient(#E0E0E0,#BDBDBD,#616161, #424242, #212121, #212121, #212121); /* For Opera 11.6 to 12.0 */
            background: -moz-radial-gradient(#E0E0E0,#BDBDBD,#616161, #424242, #212121, #212121, #212121); /* For Firefox 3.6 to 15 */
            background: radial-gradient(#E0E0E0,#BDBDBD,#616161, #424242, #212121, #212121, #212121); /* Standard syntax */
            width:100%;
            height:100%;
            background-repeat: no-repeat;
        }
    </style>
</head><!--/head-->

<body id="home" class="homepage">

    <div class="col-md-offset-4 col-md-4 box">
        <form id="login-form" name="login-form" method="post" action="<?php echo base_url(); ?>Auth/checkLogin">
            <h2 style="color:white;"><center>LOGIN</center></h2>
            <div class="form-group top">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group top">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <?php if(isset($err)){ ?>
            <div class="form-group top red">
                <p><?php echo $err; ?></p>
            </div>
            <?php } ?>
            <center><button type="submit" class="btn btn-primary">Login</button></center>
        </form>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>