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
                                            if ($this->session->userdata('photo') == "" || $this->session->userdata('photo') == "-") { ?>
                                                <img class="img-radius img-40"
                                                    src="<?= base_url('uploads/no_image.png'); ?>" alt="contact-user">

                                            <?php
                                            }
                                            else { ?>
                                                <img class="img-radius img-40"
                                                    src="<?= base_url('uploads/'.$this->session->userdata('photo')); ?>" alt="contact-user">

                                            <?php
                                            }

                                            ?>
											<h5 class="m-l-10"><?= $this->session->userdata('nama_lengkap'); ?></h5>
                                            <span class="badge badge-default badge-pill"><?= $this->session->userdata('level'); ?></span>
										</div>
										<div class="card-block">
											<ul class="list-group list-contacts">
												<li class="list-group-item active"><a href="#">Informasi Siswa</a></li>
												<li class="list-group-item"><span id="kd">No. Kartu: <strong>
														<?php if (isset($data_siswa['kode'])) { echo $data_siswa['kode']; }; ?></strong></span>
												</li>
												<li class="list-group-item"><span id="jk">Jenis Kelamin:
														<?php if (isset($data_siswa['jenis_kelamin'])) { if ($data_siswa['jenis_kelamin'] == "L") { echo "Laki-laki"; } else { echo "Perempuan"; } }; ?></a>
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
														<?php if (isset($data_siswa['saldo'])) { echo rupiah($data_siswa['saldo']); }; ?></span>
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


											<form action="<?php echo base_url('belanja/update'); ?>" method="post">
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Waktu Sekarang</label>
													<div class="col-sm-10">
														<input type="text" class="form-control form-control-round"
															placeholder="Kode Kartu"
															value="<?= $data['tgl_belanja']; ?>"
															readonly>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Kode Kartu</label>
													<div class="col-sm-10">
														<input type="text" class="form-control form-control-round"
															name="kode" id="kode" placeholder="Kode Kartu"
															onkeyup="get_kode()" value="<?= $data['kode']; ?>" autofocus>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Nama Lengkap</label>
													<div class="col-sm-10">
														<input type="text" class="form-control form-control-round"
															name="nama_lengkap" id="nama_lengkap"
															placeholder="Terisi otomatis.." value="<?= $data['nama_siswa']; ?>" readonly>
													</div>
												</div>
										
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Total Belanja</label>
													<div class="col-sm-10">
														<input type="text"
															class="form-control form-control-round autonumber"
															name="total_belanja" id="total_belanja"
															placeholder="Total Belanja" value="<?= $data['total_belanja']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Sisa Saldo</label>
													<div class="col-sm-10">
														<input type="text" class="form-control form-control-round"
															name="sisa_saldo" id="sisa_saldo" required
															placeholder="Terisi otomatis.." value="<?= $data['sisa_saldo_terakhir']; ?>">
													</div>
												</div>

												<div class="j-footer">
													<button type="submit" class="btn btn-success btn-round"><i
															class="icofont icofont-plus"></i>Simpan Data</button>
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
					if ($('#jenis_kelamin').val("L")) {
						document.getElementById('jk').innerHTML = "Jenis kelamin: Laki-laki";
					} else {
						document.getElementById('jk').innerHTML = "Jenis kelamin: Perempuan";
					}
					document.getElementById('kd').innerHTML = "Kode Kartu: " + "<strong>" + obj.kode +
						"</strong>";
					document.getElementById('alamat').innerHTML = "Alamat: " + obj.alamat;
					document.getElementById('ayah').innerHTML = "Ayah: " + obj.nama_ayah;
					document.getElementById('ibu').innerHTML = "Ibu: " + obj.nama_ibu;

					var numb = obj.saldo;
					const format = numb.toString().split('').reverse().join('');
					const convert = format.match(/\d{1,3}/g);
					const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')

					document.getElementById('sld').innerHTML = "Saldo: " + "<strong>" + rupiah + "</strong>";
					$('#saldo').val(rupiah);

					temp_saldo = obj.saldo;


				}
			});
		} else {
			$('#nama_lengkap').val("");
			$('#saldo').val("");
			document.getElementById('kd').innerHTML = "Kode Kartu: ";
			document.getElementById('jk').innerHTML = "Jenis kelamin: ";
			document.getElementById('alamat').innerHTML = "Alamat: ";
			document.getElementById('ayah').innerHTML = "Ayah: ";
			document.getElementById('ibu').innerHTML = "Ibu: ";
			document.getElementById('saldo').innerHTML = "Saldo: ";

		}

	}

</script>

<script type="text/javascript">
	var rupiah = document.getElementById('total_belanja');

	rupiah.addEventListener('keyup', function (e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		var sisa = temp_saldo - total_belanja.value;
		document.getElementById('sisa_saldo').innerHTML = "TEXT";


	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		console.log(angka);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

</script>
