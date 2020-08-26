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
</head>
<body id="printpage">
    <div class="row mt-4">
        <div class="col-sm-5">
            <table>
                <tr>
                    <td>
                        <img src="<?= base_url('assets/img/logoprint.png') ?>" class="logoPLNprinter">
                    </td>
                    <td>
                        PT PLN (PERSERO)
                        <br>DISTRIBUSI JAWA BARAT DAN BANTEN
                        <br>AREA BANDUNG
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-7 teksprint">
            <table>
                <tr>
                    <td>PROGRAM</td>
                    <td></td>
                    <td> : </td>
                    <td>PEMELIHARAAN FUNGSI TI</td>
                </tr>
                <tr>
                    <td>PROYEK</td>
                    <td></td>
                    <td> : </td>
                    <td>PEMELIHARAAN DAN PERBAIKAN KOMPUTER (PC) DAN PRINTER</td>
                </tr>
                <tr>
                    <td>LOKASI</td>
                    <td></td>
                    <td> : </td>
                    <td>KANTOR AREA BANDUNG DAN RAYON-RAYON</td>
                </tr>
            </table>
        </div>
    </div>
    <br><hr class="line-title">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3 class="text-center" id="judulprint">RENCANA ANGGARAN BIAYA</h3>
                <p class="col-sm-12 text-center" id="norab">NO. RAB : 001/RENEV/AO/TI/08/2019</p>
                <table class="table mt-5 tabelprint">
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
                            <td class="text-center teksprint">1</td>
                            <td class="teksprint"><?= $barangpc['nama_barang']; ?></td>
                            <td class="text-center">Unit</td>
                            <td class="text-center"><?= $totalpc['jumlah'] ?></td>
                            <td class="text-right"><?php echo number_format($barangpc['harga_satuan'],0,',','.'); ?></td>
                            <td class="text-right"><?php echo number_format($totalpc['jumlah']*$barangpc['harga_satuan'],0,',','.'); ?></td>
                            <td class="text-right teksprint"><?php echo number_format($totalpc['jumlah']*$barangpc['harga_satuan'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="text-center teksprint">2</td>
                            <td class="teksprint"><?= $barangprinter['nama_barang']; ?></td>
                            <td class="text-center">Unit</td>
                            <td class="text-center"><?= $totalprinter['jml'] ?></td>
                            <td class="text-right"><?php echo number_format($barangprinter['harga_satuan'],0,',','.'); ?></td>
                            <td class="text-right"><?php echo number_format($totalprinter['jml']*$barangprinter['harga_satuan'],0,',','.'); ?></td>
                            <td class="text-right teksprint"><?php echo number_format($totalprinter['jml']*$barangprinter['harga_satuan'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="text-center teksprint" colspan="5">JUMLAH</td> 
                            <td class="text-right teksprint"><?php echo number_format((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan'])),0,',','.'); ?></td>
                            <td class="text-right teksprint"><?php echo number_format((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan'])),0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="text-center teksprint" colspan="5">PPN 10%</td> 
                            <td class="text-right teksprint"><?php echo number_format(((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))*0.1),0,',','.'); ?></td>
                            <td class="text-right teksprint"><?php echo number_format(((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))*0.1),0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td class="text-center teksprint" colspan="5">TOTAL</td> 
                            <td class="text-right teksprint"><?php echo number_format(((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))+((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))*0.1)),0,',','.'); ?></td>
                            <td class="text-right teksprint"><?php echo number_format(((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))+((($totalpc['jumlah']*$barangpc['harga_satuan'])+($totalprinter['jml']*$barangprinter['harga_satuan']))*0.1)),0,',','.'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <p>Catatan :<br>Jumlah aset mengikuti jumlah aset pada bulan berjalan.</p>
                <br>
                <div class="row">
                    <div class="col-sm-9 text-center">
                        <table>
                            <tr>
                                <td class="teksprint">Mengetahui</td>
                            </tr>
                            <tr>
                                <td class="teksprint">ASMAN PERENCANAAN DAN EVALUASI</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-3 text-center">
                        <table>
                            <tr>
                                <td>Bandung, 17 Agustus 2019</td>
                            </tr>
                            <tr>
                                <td class="teksprint">ANALIS TI</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br><br><br><br>
                <div class="row text-center">
                    <div class="col-sm-3 teksprint">&emsp; &emsp; DIDIN RUHUDIN</div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-2 teksprint">&emsp; &emsp; R O H E N D I</div>
                </div>
                <script type="text/javascript">
                    window.print();
                </script>
            </div>
        </div>
    </div>
    <div class="mt-5"></div>
</body>
</html>
