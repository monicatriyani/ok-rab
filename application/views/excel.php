<!DOCTYPE html>
<html lang="en">
<?php  
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-type: application/octet-stream");
    header ("Content-Disposition: attachment; filename=Laporan RAB Pemeliharaan dan Perbaikan Komputer dan Printer.xls");
?>
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
</head>
<body id="printpage">
    <table class="headerexcel">
        <tr>
            <td rowspan="3"><img src="<?= base_url('assets/img/logoprint.png') ?>" height="60"></td>
            <td class="ninept">&emsp; &emsp;PT PLN (PERSERO)</td>
            <td></td>
            <td class="boldsmall">PROGRAM</td>
            <td class="boldsmall" colspan="3">: PEMELIHARAAN FUNGSI TI</td>
        </tr>
        <tr>
            <td class="ninept">&emsp; &emsp;DISTRIBUSI JAWA BARAT DAN BANTEN</td>
            <td></td>
            <td class="boldsmall">PROYEK</td>
            <td class="boldsmall" colspan="3">: PEMELIHARAAN DAN PERBAIKAN KOMPUTER (PC) DAN PRINTER</td>
        </tr>
        <tr>
            <td class="ninept">&emsp; &emsp;AREA BANDUNG</td>
            <td></td>
            <td class="boldsmall">LOKASI</td>
            <td class="boldsmall" colspan="3">: KANTOR AREA BANDUNG DAN RAYON-RAYON</td>
        </tr>
    </table>
    <hr class="line-title">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3 class="text-center" id="judulprint">RENCANA ANGGARAN BIAYA</h3>
                <p class="col-sm-12 text-center" id="norab">NO. RAB : 001/RENEV/AO/TI/08/2019</p>
                <table class="table mt-5 tabelprint" rules="all" border="1">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">NO.</th>
                            <th class="text-center" scope="col">JENIS PEKERJAAN</th>
                            <th class="text-center" scope="col">SATUAN</th>
                            <th class="text-center" scope="col">VOLUME</th>
                            <th class="text-center" scope="col">HARGA JASA PERTAHUN (Rp)</th>
                            <th class="text-center" scope="col">JUMLAH (Rp)</th>
                            <th class="text-center" scope="col">NILAI (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td class="teksprint">PEMELIHARAAN DAN PERBAIKAN</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="teksprint" id="tengah">1</td>
                            <td class="teksprint"><?= $barangpc['nama_barang']; ?></td>
                            <td id="tengah">Unit</td>
                            <td id="kanan"><?= $totalpc['jumlah'] ?></td>
                            <td id="kanan"><?php echo number_format($barangpc['harga_satuan'],0,',','.'); ?></td>
                            <td id="kanan"><?php echo number_format($totalpc['jumlah']*$barangpc['harga_satuan'],0,',','.'); ?></td>
                            <td class="teksprint" id="kanan"><?php echo number_format($totalpc['jumlah']*$barangpc['harga_satuan'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="teksprint" id="tengah">2</td>
                            <td class="teksprint"><?= $barangprinter['nama_barang']; ?></td>
                            <td id="tengah">Unit</td>
                            <td id="kanan"><?= $totalprinter['jml'] ?></td>
                            <td id="kanan"><?php echo number_format($barangprinter['harga_satuan'],0,',','.'); ?></td>
                            <td id="kanan"><?php echo number_format($totalprinter['jml']*$barangprinter['harga_satuan'],0,',','.'); ?></td>
                            <td class="teksprint" id="kanan"><?php echo number_format($totalprinter['jml']*$barangprinter['harga_satuan'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="teksprint" colspan="5" id="tengah">JUMLAH</td> 
                            <td class="teksprint" id="kanan"><?php echo number_format((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan'])),0,',','.'); ?></td>
                            <td class="teksprint" id="kanan"><?php echo number_format((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan'])),0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="teksprint" colspan="5" id="tengah">PPN 10%</td> 
                            <td class="teksprint" id="kanan"><?php echo number_format(((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))*0.1),0,',','.'); ?></td>
                            <td class="teksprint" id="kanan"><?php echo number_format(((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))*0.1),0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="teksprint" colspan="5" id="tengah">TOTAL</td> 
                            <td class="teksprint" id="kanan"><?php echo number_format(((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))+((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))*0.1)),0,',','.'); ?></td>
                            <td class="teksprint" id="kanan"><?php echo number_format(((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))+((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))*0.1)),0,',','.'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <p>Catatan :<br>Jumlah aset mengikuti jumlah aset pada bulan berjalan.</p>
                <br>
                <div class="row">
                    <div class="col-sm-9 text-center">
                        <table>
                            <tr>
                                <td></td>
                                <td class="teksprint" id="tengah">Mengetahui</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="tengah">Bandung, 17 Agustus 2019</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="teksprint" id="tengah">ASMAN PERENCANAAN DAN EVALUASI</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="teksprint" id="tengah">ANALIS TI</td>
                            
                            </tr>
                        </table>
                    </div>
                    </div>
                    <br><br><br><br>
                <div class="row text-center">
                <table><tr>
                    <td></td>
                    <td><div class="col-sm-3 teksprint" id="tengah">DIDIN RUHUDIN</div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  <td><div class="col-sm-2 teksprint" id="tengah">R O H E N D I</div>
                  </td>
                  </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
