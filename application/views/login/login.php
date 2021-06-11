<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico" type="image/x-icon"> -->
    <link rel="icon" type="image/png" sizes="300x300" href="<?php echo base_url() ?>favicon-96x96.png">
    <title>Pattimura</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #B0BEC5;
            background-repeat: no-repeat;

        }

        .card0 {
            box-shadow: 0px 4px 8px 0px #757575;
            border-radius: 0px
        }

        .card2 {
            margin: 0px 110px 0px 0px;
        }

        .logo {
            width: 200px;
            height: 100px;
            /* margin-top: 20px;
            margin-left: 35px */
        }

        .image {
            width: 450px;
            height: 348px
        }

        .border-line {
            border-right: 1px solid #EEEEEE
        }

        .facebook {
            background-color: #3b5998;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .twitter {
            background-color: #1DA1F2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .linkedin {
            background-color: #2867B2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer
        }

        .line {
            height: 1px;
            width: 45%;
            background-color: #E0E0E0;
            margin-top: 10px
        }

        .or {
            width: 10%;
            font-weight: bold
        }

        .text-sm {
            font-size: 14px !important
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1;
            font-weight: 300
        }

        :-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        ::-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        input,
        textarea {
            padding: 10px 12px 10px 12px;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin-bottom: 5px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #304FFE;
            outline-width: 0
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        a {
            color: inherit;
            cursor: pointer
        }

        .btn-blue {
            background-color: #1A237E;
            width: 150px;
            color: #fff;
            border-radius: 2px
        }

        .btn-blue:hover {
            background-color: #1A237E;
            cursor: pointer;
            color: #fff;
        }

        .bg-blue {
            color: #fff;
            background-color: #1A237E;
            /* height: 50px; */
        }

        #header-text {
            color: #e0b916;
            text-shadow: 3px 2px 2px #000000;
        }

        @media screen and (max-width: 991px) {
            .logo {
                margin-left: 0px
            }

            .image {
                width: 300px;
                height: 220px
            }

            .border-line {
                border-right: none
            }

            .card2 {
                border-top: 1px solid #EEEEEE !important;
                margin: 0px 15px
            }
        }
    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</head>

<!-- <body oncontextmenu='return false' class='snippet-body'> -->

<body class='snippet-body'>
    <!-- <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto"> -->
    <div class="container-fluid px-0 py-2 mx-auto">
        <div class="card card0 border-0">
            <div class="bg-blue py-4">
                <div class="row px-3">
                    <!-- <div class="col-md-3"> -->
                    <!-- <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> -->
                    <!-- </div> -->
                    <div class="col-md-12 text-center">
                        <h2 id="header-text"><b>PEMUSATAN DATA INFORMASI MONITORING CUTI DAN KINERJA</b></h2>
                        <h4><b>PENGADILAN MILITER III-18 AMBON </b></h4>

                    </div>
                </div>
            </div>
            <div class="">
                <?php if ($this->session->flashdata('msg')) { ?>
                    <div class="alert alert-warning alert-dismissible text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong><br> <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="row" style="background-image: url('<?php echo base_url(); ?>/dist/img/background1.jpg'); min-height: 100%;">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <!-- <div class="row">
                            <div class="col-md-3">
                                <img src="https://i.imgur.com/CXQmsmF.png" class="logo">
                            </div>
                            <div class="col-md-9">
                                <h4>Pemusatan Data Informasi </h4>
                                <h4> Monitoring Cuti dan Kinerja </h4>

                            </div>
                        </div> -->
                        <div class="row px-3 justify-content-center mt-4 mb-5"> <img src="<?= base_url() ?>/dist/img/logo1.png" class="image"> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form id="login-form" class="form-vertical" action="<?php echo base_url('login/proses_login') ?>" method="post" role="form">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row px-3 mb-4">
                                <!-- <div class="line"></div> <small class="text-center">Silahkan Login</small>
                            <div class="line"></div> -->
                            </div>
                            <div class="row px-3"> <label class="mb-1">
                                    <h6 class="mb-0 text-sm">NIP/NRP</h6>
                                </label> <input class="mb-4" type="text" name="nip" placeholder="Masukan nip/nrp anda" value="<?php if (isset($_COOKIE["member_nip"])) {
                                                                                                                                    echo $_COOKIE["member_nip"];
                                                                                                                                } ?>"> </div>
                            <div class="row px-3"> <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label> <input type="password" name="password" placeholder="Masukan password" value="<?php if (isset($_COOKIE["member_password"])) {
                                                                                                                            echo $_COOKIE["member_password"];
                                                                                                                        } ?>"> </div>
                            <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="remember" class="custom-control-input" <?php if (isset($_COOKIE["member_nip"])) { ?> checked <?php } ?> /> <label for="chk1" class="custom-control-label text-sm">Ingat akun saya</label> </div>
                                <!-- <a href="#"class="ml-auto mb-0 text-sm">Forgot Password?</a> -->
                            </div>
                            <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                            <!-- <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a
                                    class="text-danger ">Register</a></small> </div> -->
                        </div>
                        <?php if (isset($token_generate)) { ?>
                            <input type="hidden" name="token" value="<?php echo $token_generate ?>">
                        <?php } else {
                            redirect(base_url());
                        } ?>
                    </form>
                </div>
                <!--col-lg-6 -->
            </div>
            <div class="bg-blue py-2 fixed-bottom">
                <div class="row px-3" style="height:55px">
                    <small class="ml-sm-5 mt-3">Copyright &copy; <?php echo date('Y'); ?>.<b> Agent Of Change</b>.</small>
                    <!-- <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span
                            class="fa fa-google-plus mr-4 text-sm"></span> <span
                            class="fa fa-linkedin mr-4 text-sm"></span> <span
                            class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>