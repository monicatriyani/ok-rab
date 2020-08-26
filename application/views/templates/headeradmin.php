<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="icon" href="<?= base_url('assets/img/okrabyellow.png') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/style/style.css'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
		function justNumber(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark backgroundheader fixed-top">
        <a class="navbar-brand" href="<?=base_url('User/home')?>"><img src="<?= base_url('assets/img/okrabyellow.png') ?>" alt="Logo OKRAB" class="logoPLNheader"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(1)=="HPS"){echo "active";}?>" href="<?=base_url('HPS/index')?>">Analisa HPS PC dan Printer<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(1)=="Unit" or $this->uri->segment(2)=="ubah" or $this->uri->segment(2)=="tambah"){echo "active";}?>" href="<?=base_url('Unit/index')?>">Aset</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="Kelolapengguna" or $this->uri->segment(2)=="tambah_user"){echo "active";}?>" href="<?=base_url('User/Kelolapengguna')?>">Kelola Pengguna</a>
                </li>
            </ul>
            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg-right">
                    <button class="dropdown-item" type="button" onclick="window.location.href='<?=base_url('user/editprofile')?>'">Ubah Profil</button>
                    <button class="dropdown-item" type="button" onclick="window.location.href='<?=base_url('user/ubahpassword')?>'">Ubah Password</button>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" type="button" onclick="window.location.href='<?=base_url('user/Signout')?>'">Keluar</button></a>
                </div>
            </div>
        </div>
    </nav>