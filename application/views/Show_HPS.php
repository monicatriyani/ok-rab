    <div class="row mt-5">
        <div class="col mt-5">
        <div class="container">
            <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data HPS <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
        </div>
        <?php endif; ?>
            <h3 class="text-center">Analisa HPS HAR PC dan Printer</h3>
            <table class="table mt-4 tabel">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Nama Barang</th>
                        <th class="text-center" scope="col">Jumlah Barang</th>
                        <th class="text-center" scope="col">Biaya Perbulan</th>
                        <th class="text-center" scope="col">Biaya Pertahun</th>
                        <th class="text-center" scope="col">Harga Satuan</th>
                        <?php if($this->session->login['role_id'] == 1) {?>
                        <th class="text-center" scope="col"></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><?= $barangpc['nama_barang']; ?></td>
                        <td class="text-center"><?= $totalpc['jumlah'] ?></td>
                        <td class="text-center"><?php echo number_format($totalpc['jumlah']*$barangpc['harga_satuan']/12,0,',', '.'); ?></td>
                        <td class="text-center"><?php echo number_format($totalpc['jumlah']*$barangpc['harga_satuan'],0,',','.'); ?></td>
                        <td class="text-center"><?php echo number_format($barangpc['harga_satuan'],0,',','.'); ?></td>
                        <?php if($this->session->login['role_id'] == 1) {?>
                        <td class="text-center">
                            <a href="#modalPC" class="badge badge-success float-center" data-toggle="modal">Ubah</a>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $barangprinter['nama_barang']; ?></td>
                        <td class="text-center"><?= $totalprinter['jml'] ?></td>
                        <td class="text-center"><?php echo number_format($totalprinter['jml']*$barangprinter['harga_satuan']/12,0,',', '.'); ?></td>
                        <td class="text-center"><?php echo number_format($totalprinter['jml']*$barangprinter['harga_satuan'],0,',','.'); ?></td>
                        <td class="text-center"><?php echo number_format($barangprinter['harga_satuan'],0,',','.'); ?></td>
                        <?php if($this->session->login['role_id'] == 1) {?>
                        <td class="text-center">
                            <a href="#modalPrinter" class="badge badge-success float-center" data-toggle="modal">Ubah</a>
                        </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <div class="row mt-4">

            <!-- Modal PC -->
            <div id="modalPC" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Harga Satuan PC</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form action="<?=base_url();?>HPS/ubah_harga/<?=$barangpc['id_barang'] ?>" method="post">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Harga Lama</label>
                            <input type="text" class="form-control" id="harga_satuan1" value="<?php echo number_format($barangpc['harga_satuan'],0,',','.'); ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Harga Baru</label>
                            <input type="number" min="0" value="0" class="form-control" id="harga_satuan" name="harga_satuan" autocomplete="off" onkeypress="return justNumber(event)">
                            <?= form_error('harga_satuan', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Simpan</button>
                      </div>
                        </form>        

                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Printer -->
            <div id="modalPrinter" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Harga Satuan Printer</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form action="<?=base_url();?>HPS/ubah_harga/<?=$barangprinter['id_barang'] ?>" method="post">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Harga Lama</label>
                            <input type="text" class="form-control" id="harga_satuan1" value="<?php echo number_format($barangprinter['harga_satuan'],0,',','.'); ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Harga Baru</label>
                            <input type="number" min="0" value="0" class="form-control" id="harga_satuan" name="harga_satuan" autocomplete="off" onkeypress="return justNumber(event)">
                            <?= form_error('harga_satuan', '<small class="form-text text-danger pl-3">*', '</small>'); ?>
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Simpan</button>
                      </div>
                        </form>        

                        </div>
                    </div>
                </div>
            </div>
                <div class="col md-6 text-right">
                    <a href="<?php echo base_url('HPS/excel') ?>" class="btn btn-success"><i class="fa fa-table"></i> Unduh RAB</a>
                    <a href="<?php echo base_url('HPS/printHPS') ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak RAB</a>
                </div>
            </div>
            <div class="row mt-4">
            </div>
        </div>
    </div>
</div> 