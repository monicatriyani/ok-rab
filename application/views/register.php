<div class="container mt-5">
    <div class="row mt-5">
        <div class="col md-6 mt-5">
			<div class="card">
				<div class="card-header text-center" id="cardheader">
					Tambah Pengguna
				</div>
				<div class="card-body">
					<form action="" method="POST">
							<div class="form-group">
								<label for="nip">NIP</label>
								<input class="form-control" id="nip" type="text" name="nip" autocomplete="off" onkeypress="return justNumber(event)">
								<?= form_error('nip', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input class="form-control" id="namauser" type="text" name="nama" autocomplete="off">
								<?= form_error('nama', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control" id="pass" type="password" name="password" autocomplete="off">
								<?= form_error('password', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control" id="email" type="email" name="email" autocomplete="off">
								<?= form_error('email', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input class="form-control" id="alamat" type="text" name="alamat" autocomplete="off">
								<?= form_error('alamat', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="nomortelepon">Nomor Telepon</label>
								<input class="form-control" id="no_telepon" type="no-telepon" name="no_telepon" autocomplete="off" onkeypress="return justNumber(event)">
								<?= form_error('no_telepon', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
							</div>
							<button type="submit" name="daftar" class="btn btn-primary float-right">Selesai</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mt-3"></div>