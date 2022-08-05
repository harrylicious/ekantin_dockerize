<style>
	.ui-autocomplete {
		top: 10px;
		right: 10px;
		z-index: 2147483647;
		float: right;
		min-width: 100px;
		padding: 4px 0;
		margin: 0 0 10px 25px;
		list-style: none;
		background-color: #ffffff;
		border-color: #ccc;
		border-color: rgba(0, 0, 0, 0.2);
		border-style: solid;
		border-width: 1px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		-moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		-webkit-background-clip: padding-box;
		-moz-background-clip: padding;
		background-clip: padding-box;
		*border-right-width: 2px;
		*border-bottom-width: 2px;
	}

	.ui-menu-item>a.ui-corner-all {
		display: block;
		padding: 3px 15px;
		clear: both;
		font-weight: normal;
		line-height: 18px;
		color: #555555;
		white-space: nowrap;
		text-decoration: none;
	}

	.ui-state-hover,
	.ui-state-active {
		color: #ffffff;
		text-decoration: none;
		background-color: #0088cc;
		border-radius: 0px;
		-webkit-border-radius: 0px;
		-moz-border-radius: 0px;
		background-image: none;
	}

</style>
<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<!-- Main-body start -->
		<div class="main-body">
			<div class="page-wrapper">
			<?php if ($this->session->flashdata('success') != "") { ?>
				<div class="alert alert-success" id="success-alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled"></i>
					</button>
					<strong>Success!</strong> <?= $this->session->flashdata('success'); ?></code>
				</div>
				<?php } 
				else if ($this->session->flashdata('failed') != "") {?>
					<div class="alert alert-danger" id="success-alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="icofont icofont-close-line-circled"></i>
						</button>
						<strong>Saldo tidak mencukupi.</strong> <?= $this->session->flashdata('success'); ?></code>
					</div>
				<?php } 
				else if ($this->session->flashdata('limited') != "") {?>
					<div class="alert alert-warning" id="success-alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="icofont icofont-close-line-circled"></i>
						</button>
						<strong>Maaf, total belanja sudah melebihi batas.</strong> <?= $this->session->flashdata('success'); ?></code>
					</div>
				<?php } ?>



				<!-- Page body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">



							<div class="row">
								<div class="col-xl-3">
									<!-- user contact card left side start -->
									<div class="card">
										<div class="card-header contact-user">
											
												<?php
												if ($this->session->userdata('photo') == "") { ?>
													<img class="img-radius img-40" src="<?= base_url('uploads/no_image.png'); ?>" alt="contact-user">

												<?php
													
												}
												else { ?>

													<img class="img-radius img-40" src="<?= base_url('uploads/admin/'.$this->session->userdata('photo')); ?>" alt="contact-user">

												<?php

												}
												?>
												
											<h5 class="m-l-10">Nama Petugas</h5>
										</div>
										<div class="card-block">
											<ul class="list-group list-contacts">
												<li class="list-group-item active"><a href="#">Informasi Pembeli</a></li>
												<li class="list-group-item"><span id="kd">No. Kartu:
														<?php if (isset($data_siswa['kode'])) { echo $data_siswa['kode']; }; ?></span>
												</li>
												<li class="list-group-item"><span id="jp">Jenis Pendaftar:
														<?php if (isset($data_siswa['jenis_pendaftar'])) { echo $data_siswa['jenis_pendaftar']; }; ?></span>
												</li>
												<li class="list-group-item"><span id="jk">Jenis Kelamin:
														<?php if (isset($data_siswa['jenis_kelamin'])) { echo $data_siswa['jenis_kelamin']; }; ?></a>
												</li>
												<li class="list-group-item"><span id="alamat">Alamat:
														<?php if (isset($data_siswa['alamat'])) { echo $data_siswa['alamat']; }; ?></span>
												</li>
												<li class="list-group-item"><span id="ayah">Nama Ayah:
														<?php if (isset($data_siswa['nama_ayah'])) { echo $data_siswa['nama_ayah']; }; ?></span>
												</li>
												<li class="list-group-item"><span id="ibu">Nama Ibu:
														<?php if (isset($data_siswa['nama_ibu'])) { echo $data_siswa['nama_ibu']; }; ?></span>
												</li>
												<li class="list-group-item"><span id="sld">Saldo:
														<?php if (isset($data_siswa['saldo'])) { echo $data_siswa['saldo']; }; ?></span>
												</li>
												</li>
											</ul>
										</div>
									</div>
									<!-- user contact card left side end -->
								</div>

								<div class="col-xl-9">
									<!-- Input Alignment card start -->
									<div class="card">

										<div class="card-header">

											<h5>Tambah Belanja Baru</h5>


										</div>


										<div class="card-block">


											<form action="<?php echo base_url('belanja/create'); ?>" method="post">
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Waktu Sekarang</label>
													<div class="col-sm-10">
														<input type="text" class="form-control form-control-round"
															placeholder="Kode Kartu"
															value="<?= tgl_dan_hari(date("d-m-Y")).", ".date("d-m-Y")." | ".jam_sekarang() ?>"
															readonly>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Kode Kartu</label>
													<div class="col-sm-10">
														<input type="number" class="form-control form-control-round" required
															name="kode" id="kode" placeholder="Kode Kartu"
															onkeyup="get_kode()" autofocus>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Nama Lengkap</label>
													<div class="col-sm-10">
														<input type="text" class="form-control form-control-round"
															name="nama_lengkap" id="nama_lengkap"
															placeholder="Terisi otomatis.." readonly>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Saldo</label>
													<div class="col-sm-10">
														<div class="input-group input-group-secondary input-group">
															<input type="number" class="form-control form-control-round" name="saldo" id="saldo" readonly required placeholder="Minimal Rp 1.000" onkeyup="hitung()">
															<span class="input-group-addon bg-black" style="width: 220px" id="span_saldo"></span>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Total Belanja</label>
													<div class="col-sm-10">
														<div class="input-group input-group-secondary input-group">
															<input type="number" class="form-control form-control-round" name="total_belanja" id="total_belanja" required placeholder="Minimal Rp 1.000" onkeyup="hitung()">
															<span class="input-group-addon bg-black" style="width: 220px" id="span_total_belanja" min="1000"></span>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Sisa Saldo</label>
													<div class="col-sm-10">
														<div class="input-group input-group-secondary input-group">
															<input type="text" class="form-control form-control-round" name="sisa_saldo" id="sisa_saldo" required placeholder="Terisi otomatis.." readonly>
															<span class="input-group-addon bg-black" style="width: 220px" id="span_sisa_saldo"></span>
														</div>
														<span class="col-sm-6 col-form-label" style="margin-left: -15px;" id="error_sisa_saldo"></span>
													</div>
												</div>
														

												<div class="j-footer">
													<button type="submit" class="btn btn-success btn-round"><i
															class="feather icon-plus-circle"></i>Simpan Data</button>
												</div>

										</div>
										</form>
									</div>


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

	</div>
</div>

<script type="text/javascript">
	var temp_saldo;

	function get_kode() {
		//autocomplete
		$("#kode").autocomplete({
			source: "<?php echo base_url() ?>index.php/belanja/get_kode",  
			minLength: 1
		});
		get_detail_autofill()
	}

	function get_detail_autofill() {
		var kode = $("#kode").val();
		if (kode != "") {
			$.ajax({
				url: "<?php echo base_url()?>index.php/belanja/get_detail_siswa",
				data: "kode=" + kode,
				success: function (data) {
					var json = data,
						obj = JSON.parse(json);
					$('#nama_lengkap').val(obj.nama_lengkap);
					
					if (obj.jenis_kelamin == "L" || obj.jenis_kelamin == "Laki-laki") {
							//$('#jk').val("Laki-laki");
							document.getElementById('jk').innerHTML = "Jenis kelamin: Laki-laki";
						}
						else {
							//$('#jk').val("Perempuan");
							document.getElementById('jk').innerHTML = "Jenis kelamin: Perempuan";
						};
						
					document.getElementById('kd').innerHTML = "Kode Kartu: " + "<strong>" + obj.kode +
						"</strong>";
					document.getElementById('jp').innerHTML = "Jenis Pendaftar: " + obj.jenis_pendaftar;
					document.getElementById('alamat').innerHTML = "Alamat: " + obj.alamat;
					document.getElementById('ayah').innerHTML = "Ayah: " + obj.nama_ayah;
					document.getElementById('ibu').innerHTML = "Ibu: " + obj.nama_ibu;

					var numb = obj.saldo;
					const format = numb.toString().split('').reverse().join('');
					const convert = format.match(/\d{1,3}/g);
					const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')

					document.getElementById('span_saldo').innerHTML =  rupiah;
					$('#saldo').val(obj.saldo);

					temp_saldo = obj.saldo;


				}
			});
		} else {
			$('#nama_lengkap').val("");
			$('#saldo').val("");
			document.getElementById('kd').innerHTML = "Kode Kartu: ";
			document.getElementById('jp').innerHTML = "Jenis Pendaftar: ";
			document.getElementById('jk').innerHTML = "Jenis kelamin: ";
			document.getElementById('alamat').innerHTML = "Alamat: ";
			document.getElementById('ayah').innerHTML = "Ayah: ";
			document.getElementById('ibu').innerHTML = "Ibu: ";
			document.getElementById('saldo').innerHTML = "Saldo: ";

		}

	}

	function get_rupiah(val) {
			var numb = val;
			const format = numb.toString().split('').reverse().join('');
			const convert = format.match(/\d{1,3}/g);
			const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
			return rupiah;
		}

		function hitung() {

			var a = parseInt($("#total_belanja").val());
			var b = parseInt($("#saldo").val());
			
			c = parseInt(b) - parseInt(a);

			if (!isNaN(c) && (c) >= 0) {
				$("#sisa_saldo").val(c);
			}
			else {
				$("#sisa_saldo").val(temp_saldo);
			}
			document.getElementById('span_total_belanja').innerHTML = get_rupiah(a);
			document.getElementById('span_sisa_saldo').innerHTML = get_rupiah(c);

			if (!isNaN(a) && (a) > 7000) {
				document.getElementById('error_sisa_saldo').innerHTML = "<code>Maaf, total belanja sudah melebihi limit.</code>";
				$("#sisa_saldo").val("Limited..");
			}
			else if (!isNaN(a) && (a) < 1000) {
				document.getElementById('error_sisa_saldo').innerHTML = "<code>Maaf, total belanja minimal <strong>Rp. 1.000</strong> .</code>";
			}
			else if (!isNaN(c) && (c) < 0) {
				document.getElementById('error_sisa_saldo').innerHTML = "<code>Maaf, saldo <strong>tidak mencukupi</strong> .</code>";
			}
			else if (a == "") {
				document.getElementById('error_sisa_saldo').innerHTML = "";
				$("#sisa_saldo").val("");
			}
			else {
			
				console.log(temp_saldo);
				document.getElementById('error_sisa_saldo').innerHTML = "";
			}

			
		

			}

</script>
