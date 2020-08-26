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
                                    <h1 class="h4 text-gray-900">Ubah Password</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('user/ubahpassword') ?>">
                                    <div class="form-group">
                                        <label for="password">Password Lama</label>
                                        <input type="password" class="form-control" id="passwordlama" name="passwordlama" autocomplete="off">
                                        <?= form_error('passwordlama', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" autocomplete="off">
                                        <?= form_error('passwordbaru', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" id="konfirmasipasswordbaru" name="konfirmasipasswordbaru" autocomplete="off">
                                        <?= form_error('konfirmasipasswordbaru', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
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