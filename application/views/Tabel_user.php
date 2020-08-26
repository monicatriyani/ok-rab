<div class="container mt-5">
    <div class="row mt-5">
        <div class="col md-6 mt-5">
            <div><?= $this->session->flashdata('message'); ?></div>
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari nama pengguna... " name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <h3 class="text-center" id="judul">Data Pengguna Aplikasi</h3>
            <br>
            <?php if (empty($user)) : ?>
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan
            </div>
            <?php endif; ?>
            <table class="tabel">
                <thead>
                    <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach ($user as $usr) : ?>
                        <td class="text-center"><?= $usr['nip']; ?></td>
                        <td class="text-center"><?= $usr['nama_user']; ?></td>
                        <td class="text-center"><?= $usr['no_telepon']; ?></td>
                        <td class="text-center">
                            <a href="<?= base_url(); ?>User/resetpassword/<?= $usr['nip'] ?>" class="badge badge-success float-center" onclick="return confirm('Apakah Anda yakin melakukan reset password?');" ?>Reset</a>
                            <a href="<?= base_url(); ?>User/hapuspengguna/<?= $usr['nip'] ?>" class="badge badge-danger float-center" onclick="return confirm('Apakah Anda yakin menghapus data ini?');" ?>Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="row mt-4">
                <div class="col md-6 text-center">
                    <a href="<?= base_url(); ?>User/tambah_user " class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah Pengguna</a>
                </div>
            </div>
            <div class="row mt-5"></div>
        </div>
    </div>
</div> 