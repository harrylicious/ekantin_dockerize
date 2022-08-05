<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=daftar_belanja_".date('d-m-yy').".xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data Belanja</title>
</head>
<body>

<div class="col-sm-12">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tgl. Belanja</th>
                                                        <th>Jam Belanja</th>
                                                        <th>Kode</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Jenis Pendaftar</th>
                                                        <th>Total Belanja</th>
                                                        <th>Sisa Saldo Terakhir</th>
                                                        <th>Nama Petugas Melayani</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no = 1;
                                                        foreach ($data as $data) {
                                                            $hari = tgl_dan_hari(substr($data->tgl_belanja, 0, 11));
                                                            ?>
                                                                    <tr>
                                                                        <td><?= $no++; ?></td>
                                                                        <td><?= $hari.", ".tgl_default(substr($data->tgl_belanja, 0, 11)); ?></td>
                                                                        <td><?= $data->jam_belanja; ?></td>
													                    <td><?= $data->kode; ?></td>
                                                                        <td><?= $data->nama_siswa; ?></td>
                                                                        <td><?= $data->jenis_pendaftar; ?></td>
                                                                        <td><strong><?= ($data->total_belanja); ?></strong></td>
                                                                        <td><strong><?= ($data->sisa_saldo_terakhir); ?></strong></td>
                                                                        <td><?= $data->nama_admin; ?></td>
                                                                        
                                                                    </tr>
                                                                    <?php
                                                        }

                                                        ?>
                                                </tbody>
                        
                                            </table>
                                        </div>
                                    </div>
                                </div>
    
</body>
</html>