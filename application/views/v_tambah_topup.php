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
							<form action="<?= base_url('topup/create')?>" method="post">
								<div class="card">
									<div class="card-header">
										<h5>TOP UP (PENGISIAN SALDO)</h5>
										<span>Pastikan mengkomfirmasi <code>DATA SISWA</code> sebelum pengisian saldo.</span>

									</div>

									<div class="card-block">
										<div class="row">
											<div class="col-sm-12">
												<div class="row">
													<div class="col-sm-12">

														<div class="input-group input-group-warning input-group-lg">
															<span class="input-group-addon" style="width: 220px" id="basic-addon6">NO.
																KARTU</span>
															<input type="text" class="form-control" oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    maxlength="16" name="kode" id="kode" required
																onkeyup="get_kode()"
																placeholder="Scan atau masukkan no. kartu siswa.."
																autofocus>
														</div>
														<div class="input-group input-group-success input-group-lg">
															<span class="input-group-addon" style="width: 220px" id="basic-addon6">NOMINAL TOPUP
															</span>
															<input type="text" class="form-control" oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" name="topup" id="topup" required onkeyup="hitung()" placeholder="Top Up Minimal 1.000..">
															<span class="input-group-addon bg-black" style="width: 220px" id="span_nominal_topup"></span>
														</div>
														<div class="input-group input-group-secondary input-group-lg">
															<span class="input-group-addon" style="width: 220px" id="basic-addon6">SALDO SEBELUMNYA
															</span>
															<input type="text" class="form-control" name="saldo_sebelumnya" id="saldo_sebelumnya" required placeholder="Kalkulasi Saldo Sebelum Top Up" readonly>
															<span class="input-group-addon bg-black" style="width: 220px" id="span_saldo_sebelumnya"></span>
														</div>
														<div class="input-group input-group-secondary input-group-lg">
															<span class="input-group-addon" style="width: 220px" id="basic-addon6">SALDO TERBARU
															</span>
															<input type="text" class="form-control" name="saldo_terbaru" id="saldo_terbaru" required placeholder="Kalkulasi Saldo Setelah Top Up" readonly>
															<span class="input-group-addon bg-black" style="width: 220px" id="span_saldo_terbaru"></span>
														</div>

														

													</div>
												</div>

											</div>

										</div>
									</div>
								</div>



								<div class="row">
									<div class="col-xl-5">
										<!-- user contact card left side start -->

										<div class="card">

											<div class="card-block">
												<h4 class="sub-title">Informasi Pembeli</h4>
												<div class="row">
													<div class="col-sm-12">
														<div class="row">
															<div class="col-sm-12">

																<div class="form-group row">
																	<label class="col-sm-3 col-form-label">Nama
																		Lengkap</label>
																	<div class="col-sm-9">
																		<input type="text"
																			class="form-control form-control-round"
																			name="nama_lengkap" id="nama_lengkap"
																			placeholder="Terisi otomatis.." readonly>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-sm-3 col-form-label">Jenis
																		Kelamin</label>
																	<div class="col-sm-9">
																		<input type="text"
																			class="form-control form-control-round"
																			name="jenis_kelamin" id="jenis_kelamin"
																			placeholder="Terisi otomatis.." readonly>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-3 col-form-label">Alamat</label>
																	<div class="col-sm-9">
																		<input type="text"
																			class="form-control form-control-round autonumber"
																			name="alamat" id="alamat"
																			placeholder="Terisi otomatis.." readonly>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-3 col-form-label">Nama Ayah</label>
																	<div class="col-sm-9">
																		<input type="text"
																			class="form-control form-control-round autonumber"
																			name="nama_ayah" id="nama_ayah"
																			placeholder="Terisi otomatis.." readonly>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-3 col-form-label">Nama Ibu</label>
																	<div class="col-sm-9">
																		<input type="text"
																			class="form-control form-control-round autonumber"
																			name="nama_ibu" id="nama_ibu"
																			placeholder="Terisi otomatis.." readonly>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-3 col-form-label"></label>
																	<div class="col-sm-9">
																		<button type="submit"
																			class="btn btn-info btn-round"><i
																				class="icofont icofont-plus"></i>Proses Top
																			Up</button>
																	</div>
																</div>
															</div>
														</div>

													</div>

												</div>
											</div>
										</div>
										<!-- user contact card left side end -->
									</div>

									<div class="col-xl-7">
										<!-- Input Alignment card start -->

										<div class="card">



											<div class="card-block">
												<h4 class="sub-title">Riwayat Top Up</h4>


												<div class="dt-responsive table-responsive">
													<table id="table1" class="table table-striped table-bordered nowrap">
														<thead>
															<tr>
																<th>No.</th>
																<th>Ko. Kartu</th>
																<th>Tgl. Top Up</th>
																<th>Jam Top Up</th>
																<th>Nama Lengkap</th>
																<th>Total Top Up</th>
																<th>Saldo Terakhir</th>
																<th>Saldo Terbaru</th>
																<th>Nama Admin</th>
															</tr>
														</thead>
														<tbody>
														</tbody>
														
													</table>
												</div>
											</div>


										</div>
									</div>
									<!-- Input Alignment card end -->
								</div>
							</form>
						</div>
					</div>
					<!-- Page body end -->
				</div>
			</div>
			<!-- Main-body end -->

		</div>
	</div>

	<script type="text/javascript">
		function numberOnly(id) {
			// Get element by id which passed as parameter within HTML element event
			var element = document.getElementById(id);
			// This removes any other character but numbers as entered by user
			element.value = element.value.replace(/[^0-9]/gi, "");
		}

		var temp_saldo;

		

		function get_kode() {
			//autocomplete
			$("#kode").autocomplete({
				source: "<?php echo base_url() ?>index.php/belanja/get_kode",
				minLength: 1
			});
			get_detail_autofill();
			get_record();
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
						$('#alamat').val(obj.alamat);
						$('#nama_ayah').val(obj.nama_ayah);
						$('#nama_ibu').val(obj.nama_ibu);
						$('#saldo').val(obj.saldo);

						

						if (obj.jenis_kelamin == "L" || obj.jenis_kelamin == "Laki-laki") {
							$('#jenis_kelamin').val("Laki-laki");
						}
						else {
							$('#jenis_kelamin').val("Perempuan");
						};
						$('#saldo_sebelumnya').val(obj.saldo);

						temp_saldo = obj.saldo;

						var numb = obj.saldo;
						const format = numb.toString().split('').reverse().join('');
						const convert = format.match(/\d{1,3}/g);
						const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')

						document.getElementById('span_saldo_sebelumnya').innerHTML = rupiah;



					}
				});
			} else {
				$('#nama_lengkap').val("");
				$('#jenis_kelamin').val("");
				$('#alamat').val("");
				$('#nama_ayah').val("");
				$('#nama_ibu').val("");
				$('#saldo_sebelumnya').val("");

				document.getElementById('span_saldo_sebelumnya').innerHTML = "";
				document.getElementById('span_nominal_topup').innerHTML = "";
				document.getElementById('span_saldo_terbaru').innerHTML = "";

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

			var a = parseInt($("#topup").val());
			var b = parseInt($("#saldo_sebelumnya").val());
			c = parseInt(a) + parseInt(b);

			document.getElementById('span_nominal_topup').innerHTML = get_rupiah(a);
			document.getElementById('span_saldo_terbaru').innerHTML = get_rupiah(c);
	

			if (!isNaN(c) && (c) >= 0) {
				$("#saldo_terbaru").val(c);
			}
			else {
				$("#saldo_terbaru").val(temp_saldo);
			}

				console.log(c);
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

	<script>
	function get_record() {
	// Declare variables
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("kode");
	filter = input.value.toUpperCase();
	table = document.getElementById("basic-btn");
	tr = table.getElementsByTagName("tr");

	// Loop through all table rows, and hide those who don't match the search query
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[1];
		if (td) {
		txtValue = td.textContent || td.innerText;
		if (txtValue.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		} else {
			tr[i].style.display = "none";
		}
		}
	}
	}
	</script>



<script type="text/javascript" src="<?= base_url(); ?>bower_components\jquery\js\jquery.min.js"></script>

<script type="text/javascript">
	var url="<?php echo base_url();?>";
    function ConfirmDialog(id) {
		var x=confirm("Are you sure to delete record?")
		if (x) {
          	window.location = url + "topup/delete/" + id;
		} else {
			return false;
		}
	}

</script>
<script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#table1').DataTable({ 
            "processing": true,
            "language": {
              processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            "responsive":true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "<?= base_url('topup/get_all_data');?>", // URL file untuk proses select datanya
                "type": "POST",
				
            },
            "deferRender": true,
            "aLengthMenu": [[10, 50, 100],[10, 50, 100]], // Combobox Limit
            "columns": [
                {"data": 'id',"sortable": true, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { "data": "kode" },  // Tampilkan tgl belanja
                { "data": "tgl_top_up" },  // Tampilkan tgl belanja
                { "data": "jam_top_up" },  // Tampilkan jam belanja
                { "data": "nama_siswa" },  // Tampilkan nama siswa
                { "data": "nominal_top_up" },  // Tampilkan kode
                { "data": "sisa_saldo_terakhir" },  // Tampilkan total belanja
                { "data": "sisa_saldo_terbaru" },  // Tampilkan sisa saldo
                { "data": "nama_admin" },  // Tampilkan nama admin
            
            ],
        });

		$('#kode').on('keyup change', function () {
			tabel.search($('#nama_lengkap').val()).draw();
		});

	

    });
</script>
