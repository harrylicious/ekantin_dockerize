<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<!-- Main-body start -->
		<div class="main-body">
			<div class="page-wrapper">


				<!-- Page-body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<!-- HTML5 Export Buttons table start -->
							<div class="card">
                                <div class="card-block">
                                            <div class="card-header table-card-header">
                                                <h5>Filter Data Belanja</h5>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="box box-info">

                                                    <div class="box-body">
                                                        <form
                                                            action="<?= base_url('laporan/belanja_pencarian_bertingkat'); ?>"
                                                            method="post">

                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label>Pilih Bulan/Tahun</label>
                                                                        <select class="form-control" name="bulan_tahun"
                                                                            id="bulan_tahun">
                                            
                                                                            <option value="">- Pilih -</option>
                                                                            <?php
                                                                                    foreach ($data_bulan_tahun as $row) : 
                                                                                    ?>
                                                                            <option value="<?= $row->bulan; ?>">
                                                                                <?= get_bulan(substr($row->bulan, 5, 2))." ".substr($row->bulan, 0, 4)." - [Total: ".$row->total."]"; ?>
                                                                            </option>
                                                                            <?php
                                                                                    endforeach;
                                                                                ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label>Pilih Petugas</label>
                                                                        <select class="form-control" name="nama_admin"
                                                                            id="nama_admin">

                                                                            <option value="">- Pilih -</option>
                                                                            <?php
                                                                                    foreach ($data_petugas as $row) : 
                                                                                    ?>
                                                                            <option value="<?= $row->nama_admin; ?>">
                                                                                <?= $row->nama_admin." - [Total: ".$row->total."]"; ?>
                                                                            </option>
                                                                            <?php
                                                                                    endforeach;
                                                                                ?>
                                        
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label>Pilih Pembeli</label>
                                                                        
                                                                        <select class="form-control" name="nama_siswa"
                                                                            id="nama_siswa">

                                                                            <option value="">- Pilih -</option>
                                                                            <?php
                                                                                    foreach ($data_siswa as $row) : 
                                                                                    ?>
                                                                            <option value="<?= $row->nama_siswa; ?>">
                                                                                <?= $row->nama_siswa." - [Total: ".$row->total."]"; ?>
                                                                            </option>
                                                                            <?php
                                                                                    endforeach;
                                                                                ?>
                                        
                                                                        </select>
                                                                    </div>
                                                                </div>
                                            

                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-round btn-success">CARI
                                                                            DATA</button>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                    <div class="card-block">
                                        <h4 class="sub-title">Daftar Riwayat Belanja</h4>
                                        <div class="dt-responsive table-responsive">
                                            <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tgl. Belanja</th>
                                                        <th>Jam Belanja</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Total Belanja</th>
                                                        <th>Sisa Saldo Terakhir</th>
                                                        <th>Nama Petugas Melayani</th>
                                                        <th>* Total Belanja</th>
                                                        <th>* Sisa Saldo Terakhir</th>
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
                                                                        <td><?= $data->nama_siswa; ?></td>
                                                                        <td><strong><?= rupiah($data->total_belanja); ?></strong></td>
                                                                        <td><strong><?= rupiah($data->sisa_saldo_terakhir); ?></strong></td>
                                                                        <td><?= $data->nama_admin; ?></td>
                                                                        <td><strong><?= ($data->total_belanja); ?></strong></td>
                                                                        <td><strong><?= ($data->sisa_saldo_terakhir); ?></strong></td>
                                                                        
                                                                    </tr>
                                                                    <?php
                                                        }

                                                        ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tgl. Belanja</th>
                                                        <th>Jam Belanja</th>
                                                        <th>Total Belanja</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Sisa Saldo Terakhir</th>
                                                        <th>Nama Petugas Melayani</th>
                                                        <th>* Total Belanja</th>
                                                        <th>* Sisa Saldo Terakhir</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
							<!-- HTML5 Export Buttons end -->
						</div>
					</div>
				</div>
				<!-- Page-body end -->
			</div>
		</div>
	</div>
	<!-- Main-body end -->
	<div id="styleSelector">

	</div>
</div>


