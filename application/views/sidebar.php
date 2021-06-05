<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js" charset="utf-8"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script> -->
    <title>MANAGEMENT</title>

<link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet"> -->


    <!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-te-1.4.0.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    <!-- <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">   -->

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/new.css" rel="stylesheet">
    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    tbody tr:nth-child(even)
    {
        background-color: #BBDEFB;
    }
    tbody tr:nth-child(odd)
    {
        background-color: #E3F2FD;
    }
    thead
    {
        background-color: white;
    }   
    td{
        padding-right: 2em !important;
    } 
    .table-rule{
        margin-top: 0 !important;
        margin-bottom: 3em !important;
    }
    .btn-maximize
    {
        margin-top:5%;
        width:100%;
    }
    #menu-toggle
    {
        position:fixed;
    }/*
    table{
        margin-top:100px;
    }*/
    .table,th
    {
        text-align:center;        
    }
    .dropdown-container {
      display: none;
      background-color: #262626;
      padding-left: 8px;
    }
    .dropdown-parent{
        background: #212121;
        color: #FAFAFA;
        width: 100%;
        text-align: left;
        padding: 0;
        border: none;
    }
    .dropdown-parent:focus{
        outline: none;
    }
    .dropdown-parent:hover{
        color: #f5f5f5;
        background: rgba(255,255,255,0.2);
    }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Welcome, <?php echo $this->session->userdata('userID'); ?>
                    </a>
                </li>  
                <li>
                    <button class="dropdown-btn dropdown-parent">Sewa<i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Sewa/viewAll">List Sewa</a></li>
                            <li><a href="<?php echo base_url(); ?>Sewa">Sewa Baru</a></li>
                            <li><a href="<?php echo base_url(); ?>Sewa/pay">Bayar Sewa</a></li>
                        </ul>
                    </div>
                    <!-- detail,bayar,tarik/tebus,apus -->
                </li>             
                <li>
                    <button class="dropdown-btn dropdown-parent">Kendaraan <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Kendaraan">List Kendaraan</a></li>
                            <li><a href="<?php echo base_url(); ?>Kendaraan/Tarik">List Kendaraan Ditarik</a></li>
                        </ul>
                    </div>                    
                    <!-- tebus -->
                </li> 
                <li>
                    <button class="dropdown-btn dropdown-parent">Nasabah <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Nasabah">List Nasabah</a></li>
                            <li><a href="<?php echo base_url(); ?>Nasabah/histori">Histori Nasabah</a></li>
                        </ul>
                    </div>
                    <!-- detail,bayar,tarik/tebus,apus -->
                </li>
                <li>
                    <button class="dropdown-btn dropdown-parent">List Kuitansi <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/view/L">Pengeluaran Apalis</a></li>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/view/M">Pemasukan Apalis</a></li>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/view/KL">Pengeluaran Kas BJM</a></li>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/view/KM">Pemasukan Kas BJM</a></li>
                        </ul>
                    </div>
                    <!-- histori -->
                </li> 
                <li>
                    <button class="dropdown-btn dropdown-parent">Buat Kuitansi <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/create/L">Pengeluaran Apalis</a></li>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/create/M">Pemasukan Apalis</a></li>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/create/KL">Pengeluaran Kas BJM</a></li>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/create/KM">Pemasukan Kas BJM</a></li>
                        </ul>
                    </div>
                    <!-- masuk,keluar,kas bjm masuk, kas bjm keluar -->
                </li>  
                <li>
                    <button class="dropdown-btn dropdown-parent">Laporan <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/laporan/Sewa">Sewa</a></li>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/laporan/Apalis">Kas Apalis</a></li>
                            <li><a href="<?php echo base_url(); ?>Kuitansi/laporan/BJM">Kas BJM</a></li>                            
                        </ul>
                    </div>
                    <!-- kas apalis, kas bjm -->
                </li>  
                <li>
                    <a href="<?php echo base_url(); ?>Auth/logout">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <?= $content ?>
        </div>


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!-- datatable -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script> -->




    <!-- Menu Toggle Script -->
    <script>
    

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $('.fa').toggleClass('fa-angle-double-right');
        $('.fa').toggleClass('fa-angle-double-left');
    });

    $(document).ready(function() {
        $('#tblShow').DataTable();

        var dropdown = document.getElementsByClassName("dropdown-btn");
        for (var i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
              this.classList.toggle("active");
              var dropdownContent = this.nextElementSibling;
              if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
              }else{
                dropdownContent.style.display = "block";
              }
          });
        }

    } );

    </script>

</body>

</html>