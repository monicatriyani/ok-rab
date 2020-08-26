<div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Ubah Profil</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('user/editprofile') ?>">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="nama" class="form-control" id="nama" name="nama_user" autocomplete="off" value="<?= $user['nama_user'] ?>">
                                        <?= form_error('nama_user', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?= $user['email'] ?>">
                                        <?= form_error('email', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="alamat" class="form-control" id="alamat" name="alamat" autocomplete="off" value="<?= $user['alamat'] ?>">
                                        <?= form_error('alamat', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="notelepon">No.Telepon</label>
                                        <input type="notelepon" class="form-control" id="notelepon" name="notelepon" autocomplete="off" value="<?= $user['no_telepon'] ?>">
                                        <?= form_error('no_telepon', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>