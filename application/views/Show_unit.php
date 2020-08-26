<div class="container mt-5">
    <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-5">
        <div class="col-md-6 mt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Aset <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col md-6 mt-5">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari unit..." name="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <h3 class="text-center" id="judul">Data Aset PLN Area Bandung</h3>
            <br>
            <?php if (empty($unit)) : ?>
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan
            </div>
            <?php endif; ?>
            <table class="tabel">
                <thead>
                <tr>
                    <th scope="col">Unit / Bagian</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">PC</th>
                    <th scope="col">Printer</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach ($unit as $unt) : ?>
                        <td class="text-center"><?= $unt['nama_unit']; ?></td>
                        <td class="text-center"><?= $unt['alamat']; ?></td>
                        <td class="text-center"><?= $unt['no_telepon']; ?></td>
                        <td class="text-center"><?= $unt['pc']; ?></td>
                        <td class="text-center"><?= $unt['printer']; ?></td>
                        <td class="text-center">
                            <a href="<?= base_url(); ?>unit/hapus/<?= $unt['id_unit'] ?>" class="badge badge-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?');" ?>Hapus</a>
                            <a href="<?= base_url(); ?>unit/ubah/<?= $unt['id_unit'] ?>" class="badge badge-success float-center" ?>Ubah</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <tr style="font-weight:bold;">
                        <td colspan="3" class="text-center">Total</td>
                        <td class="text-center"><?= $hitungTotal['jumlah']?></td>
                        <td class="text-center"><?= $hitungTotalPrinter['jml'] ?></td>
                        <td></td>
                    </tr>
            </table>
            <div class="row mt-4">
                <div class="col md-6 text-center">
                    <a href="<?= base_url(); ?>unit/tambah " class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah Data Aset</a>
                </div>
            </div>
            <div class="row mt-4">
            </div>
        </div>
    </div>
</div> 