<!DOCTYPE html>
<html lang="en" class="htmllogin">
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
<body class="bodylogin">
	<a href="<?= base_url('user'); ?>"><img src="<?= base_url('assets/img/okrabyellow.png') ?>" alt="Logo OKRAB" class="logologinregister"></a>
	<form action="<?=base_url('User/log_in')?>" method="POST" class="formlogin">
        <h2 class="formtitle">Masuk</h2>
        <?= $this->session->flashdata('message'); ?>
        <div>
		    <input class="inputlogin" id="nip" type="nip" name="nip" placeholder="NIP" autocomplete="off" onkeypress="return justNumber(event)">
        <?= form_error('nip', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
        </div>
        <div>
		    <input class="inputlogin" id="pass" type="password" name="password" placeholder="Password">
        <?= form_error('password', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
        </div>
		<button type="submit" class="buttonlogin">Masuk</button>
	</form>
</body>