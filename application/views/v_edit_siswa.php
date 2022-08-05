<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<!-- Main-body start -->
		<div class="main-body">
			<div class="page-wrapper">


				<!-- Page body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
                            


							<!-- Input Alignment card start -->
							<div class="card">

								<div class="card-header">

									<h5>Pendaftaran Kartu</h5>
									<span>Registrasi pembuatan kartu, isikan data pendaftar dengan baik dan benar.</span>


								</div>


								<div class="card-block">

									<form action="<?php echo base_url('siswa/update/'.$data['id']); ?>" method="post" enctype="multipart/form-data">
										<div class="form-group row">
													<label class="col-sm-2 col-form-label">Jenis Pendaftar</label>
													<div class="col-sm-10">
														<select name="jenis_pendaftar" class="form-control-round" value="<?php echo $data['jenis_pendaftar'] ?>" required>
															<option value="">- PILIH -</option>
															<option value="Siswa">Siswa</option>
															<option value="Guru">Guru</option>
														</select>
													</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Kode Kartu <code>(Scan Via Barcode Scanner)</code></label>
											<div class="col-sm-9">
												<input type="text" name="kode" required class="form-control form-control-round"
													placeholder="Kode Kartu" value="<?php echo $data['kode'] ?>" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Nama Lengkap</label>
											<div class="col-sm-9">
												<input type="text" name="nama_lengkap" required class="form-control form-control-round"
													placeholder="Nama Lengkap" value="<?php echo $data['nama_lengkap'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
											<div class="col-sm-9">
												<select name="jenis_kelamin" class="form-control-round" required>
													<option value="<?php echo $data['jenis_kelamin'] ?>"><?php if($data['jenis_kelamin'] == "L") { echo "Laki-laki";} else { echo "Perempuan"; } ?></option>
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Alamat</label>
											<div class="col-sm-9">
												<input type="text" name="alamat" required class="form-control form-control-round"
													placeholder="Alamat" value="<?php echo $data['alamat'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Tempat Lahir</label>
											<div class="col-sm-9">
												<input type="text" name="tempat_lahir" required class="form-control form-control-round"
													placeholder="Tempat Lahir" value="<?php echo $data['tempat_lahir'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
											<div class="col-sm-9">
												<input type="date" name="tanggal_lahir" required class="form-control form-control-round"
													placeholder="Tanggal Lahir" value="<?php echo $data['tanggal_lahir'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Photo</label>
											<div class="col-sm-9">
												<input type="file" name="avatar" id="avatar" class="form-control form-control-round">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Nama Ayah</label>
											<div class="col-sm-9">
												<input type="text" name="nama_ayah" required class="form-control form-control-round"
													placeholder="Nama Ayah" value="<?php echo $data['nama_ayah'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Nama Ibu</label>
											<div class="col-sm-9">
												<input type="text" name="nama_ibu" required class="form-control form-control-round"
													placeholder="Nama Ibu" value="<?php echo $data['nama_ibu'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Saldo Pertama</label>
											<div class="col-sm-9">
												<input type="number" name="saldo" min="0" class="form-control form-control-round"
													placeholder="0" value="<?php echo $data['saldo'] ?>">
											</div>
										</div>
										<div class="j-footer">
											<button type="submit" class="btn btn-success btn-round"><i
													class="icofont icofont-plus"></i>Simpan Data</button>
										</div>

									</form>

								</div>
							</div>
							<!-- Input Alignment card end -->
						</div>
					</div>
				</div>
				<!-- Page body end -->
			</div>
		</div>
		<!-- Main-body end -->
		<div id="styleSelector">

		</div>
	</div>
</div>
