
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
				<?php } ?>


				<!-- Page-body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<!-- HTML5 Export Buttons table start -->
							<div class="card">
								<div class="card-header table-card-header">
									<h5>Daftar Siswa</h5> <br>
									<span>Daftar siswa yang sudah melakukan registrasi pembuatan kartu.</span>
								</div>
								<div class="card-block">
									<div class="dt-responsive table-responsive">
                                        <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>No.</th>
													<th>Tgl. Daftar</th>
													<th>Photo</th>
													<th>No. Kartu</th>
													<th>Jenis Pendaftar</th>
													<th>Nama Lengkap</th>
													<th>Jenis Kelamin</th>
													<th>Alamat</th>
													<th>Nama Ayah</th>
													<th>Nama Ibu</th>
													<th>Saldo Saat Ini</th>
													<th>* Saldo</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($data_siswa as $data) {
													$hari = tgl_dan_hari(substr($data->created_at, 0, 11));
													if ($data->photo == "" || $data->photo == "-") {
														$path_photo = "no_image.png";
													}
													else {
														$path_photo = $data->photo;
													}
													?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $hari.", ".tgl_default(substr($data->created_at, 0, 11)); ?></td>
													<td><img src="<?= base_url('uploads/'.$path_photo); ?>" alt="<?= $path_photo; ?>" width="60px"></td>
													<td><strong><?= $data->kode; ?></strong></td>
													<td><?= $data->jenis_pendaftar; ?></td>
													<td><?= $data->nama_lengkap; ?></td>
													<td><?php if ($data->jenis_kelamin == "L") { echo "Laki-laki"; } else { echo "Perempuan"; }; ?></td>
													<td><?= $data->alamat; ?></td>
													<td><?= $data->nama_ayah; ?></td>
													<td><?= $data->nama_ibu; ?></td>
													<td><strong><?= rupiah($data->saldo); ?></strong></td>
													<td><strong><?= $data->saldo; ?></strong></td>
													<td><a class="btn btn-inverse btn-round text-white f-12"
															href="<?= base_url('siswa/barcode_print/'.$data->id); ?>"><i class="feather icon-file"></i> Cetak Kartu</a>
            											<?php if ($this->session->userdata('level') == "SUPERADMIN") { ?>
															<a class="btn btn-success btn-round text-white f-12"
															href="<?= base_url('siswa/edit/'.$data->id); ?>"><i class="feather icon-edit-2"></i> Edit</a> <?php } ?>
														<button class="btn btn-danger btn-round text-white f-12" onclick="ConfirmDialog(<?= $data->id; ?>)">
														<i class="feather icon-trash"></i> Hapus</button>
													</td>
												</tr>
												<?php
                                                                    }

                                                                    ?>
											</tbody>
											<tfoot>
												<tr>
													<th>No.</th>
													<th>Tgl. Daftar</th>
													<th>No. Kartu</th>
													<th>Photo</th>
													<th>No. Kartu</th>
													<th>Jenis Pendaftar</th>
													<th>Nama Lengkap</th>
													<th>Jenis Kelamin</th>
													<th>Alamat</th>
													<th>Nama Ayah</th>
													<th>Nama Ibu</th>
													<th>Saldo Saat Ini</th>
													<th>* Saldo</th>
													<th>Aksi</th>
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

<script type="text/javascript">
	var url="<?php echo base_url();?>";
    function ConfirmDialog(id) {
		var x=confirm("Are you sure to delete record?")
		if (x) {
          	window.location = url + "siswa/delete/" + id;
		} else {
			return false;
		}
	}


</script>

<script>
$(document).ready(function() {
  $("#success-alert").hide();
  $("#myWish").click(function showAlert() {
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });
  });
});
</script>

<script src="text/javascript">
  $(document).ready(function() {
    $('#cbtn-selectors').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
       
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                }
            },
            'colvis'
        ]
    } );
} );
</script>