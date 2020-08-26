<div class="container mt-5">
    <div class="row mt-5">
        <div class="col md-6 mt-5">
            <div class="card">
                <div class="card-header text-center" id="cardheader">
                    Ubah Data Aset
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $unit['id_unit'] ?>">
                        <div class="form-group">
                            <label for="nama">Unit / Bagian</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $unit['nama_unit']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('nama') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $unit['alamat']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('alamat') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $unit['no_telepon']; ?>" autocomplete="off" onkeypress="return justNumber(event)">
                            <small class="form-text text-danger"><?= form_error('no_telepon') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="pc">PC</label>
                            <input type="text" class="form-control" id="pc" name="pc" value="<?= $unit['pc']; ?>" autocomplete="off" onkeypress="return justNumber(event)">
                            <small class="form-text text-danger"><?= form_error('pc') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="printer">Printer</label>
                            <input type="text" class="form-control" id="printer" name="printer" value="<?= $unit['printer']; ?>" autocomplete="off" onkeypress="return justNumber(event)">
                            <small class="form-text text-danger"><?= form_error('printer') ?>.</small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="mt-3"></div>