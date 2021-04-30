

<!DOCTYPE html>
<html lang="id-ID">

<head>
    <link rel="shortcut icon" href="/images/favicon.ico?v=1589275692" type="image/x-icon" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url()?>/assets/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body class="login-page">

    
    
    <header class="jumbotron subhead" id="overview" style="margin-bottom: 0px">
        <div class="container-logo">
            <img alt="Logo Mahkamah Agung RI" class="logo-ma" src="<?= base_url()?>/dist/img/logo2.png">
            <div style="text-align: left">
                <h2 class="logo-text">Sistem Informasi Manajemen Pegawai Elektronik</h2>
                <p class="logo-sub-text">Pengadilan Militer III-18 Ambon</p>
            </div>
        </div>
    </header>

    <div id="cssmenu" style="height:5px;"></div>

    <div class="wrapper" style="overflow: hidden;">
    <?php if($this->session->flashdata('msg')){ ?>
  <div class="alert alert-warning alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Warning!</strong><br> <?php echo $this->session->flashdata('msg');?>
 </div>
<?php } ?>
        
<div class="login-box">
    <div class="login-box-body">
        <p class="login-box-msg">Masuk untuk menggunakan SIMPEL</p>
    
        <form id="login-form" class="form-vertical" action="<?php echo base_url('login/proses_login')?>" method="post" role="form">
        <?php if(isset($token_generate)){ ?>
<input type="hidden" name="token" value="<?php echo $token_generate ?>">
<?php }else {
  redirect(base_url());
}?>        <div class="row">
            <div class="form-group has-feedback">
                <div class="form-group highlight-addon field-loginform-username required">
<input type="text" id="loginform-username" class="form-control" name="username" placeholder="Pengguna" aria-required="true"><span class="fa fa-user-o form-control-feedback"></span><div class="help-block"></div>
</div>            </div>

            <div class="form-group has-feedback">
                <div class="form-group highlight-addon field-loginform-password required">
<input type="password" id="loginform-password" class="form-control" name="password" value="" placeholder="Kata Sandi" aria-required="true"><span class="fa fa-lock form-control-feedback"></span><div class="help-block"></div>
</div>            </div>

            <div class="form-group">
                            </div>

            <div class="form-group form-bottom">
                <div class="checkbox icheck" style="margin-top: 0px; margin-bottom: 0px; float: left;">
                    <div class="form-group highlight-addon field-loginform-rememberme">
<!-- <div class="checkbox"><label class="has-star" for="loginform-rememberme">
<input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked>
Ingat akun Saya
</label> -->
<div class="help-block"></div>
</div>
</div>                </div>
                <div class="pull-right">
                    <!-- <a class="text-forgot-password hidden-xs" href="/aplikasi/user/form-reset" title="Lupa Kata Sandi" role="modal-remote" oncontextmenu="return false;" style="color:white;">Lupa Kata Sandi?</a>       -->             <div class="btn-group">
                        <button type="submit" class="btn btn-default btn-block" name="login-button"><i class='fa fa-sign-in' aria-hidden='true'></i> Masuk</button>                    </div>
                </div>
            </div>

        </div>
        <div class="row form-group form-bottom visible-xs">
            <a class="text-forgot-password pull-right" href="/aplikasi/user/form-reset" title="Lupa Kata Sandi" role="modal-remote" oncontextmenu="return false;" style="color:white;">Lupa Kata Sandi?</a>        </div>
        </form>    </div>
</div>


<div id="ajaxCrudModal" class="fade modal" role="dialog" tabindex="-1">
<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

</div>
<div class="modal-body">

</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>
        <footer class="footer-login-user" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
    <strong>SIKEP v.3.1.0. Hak Cipta &copy; 2021 <a href="https://mahkamahagung.go.id" target="_blank">Mahkamah Agung Republik Indonesia</a></strong>
</footer>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163838281-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-163838281-1');
    </script>


    
    </div>

</body>

</html>
