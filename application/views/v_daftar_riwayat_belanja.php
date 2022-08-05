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


				<!-- Page-body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<!-- HTML5 Export Buttons table start -->
							<div class="card">
								<div class="card-block">

								<a href="<?= base_url('belanja/export'); ?>" class="btn btn-inverse btn-round; text-white"><i class="feather icon-arrow-right"></i> Export Excel</a>
								<a href="<?= base_url('belanja/add'); ?>" class="btn btn-success btn-round; text-white"><i class="feather icon-plus"></i> Tambah Belanja</a>
								</div>

							</div>
							<div class="card">
								<div class="card-block">
									<h4 class="sub-title">Daftar Riwayat Belanja
                               
									</h4>

									<div class="dt-responsive table-responsive">
					
									
                                        <table id="table1" class="table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>No.</th>
													<th>Tgl. Belanja</th>
													<th>Jam Belanja</th>
													<th>Kode</th>
													<th>Nama Lengkap</th>
													<th>Total Belanja</th>
													<th>Sisa Saldo Terakhir</th>
													<th>Nama Petugas Melayani</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
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

<script type="text/javascript" src="<?= base_url(); ?>bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript">
	var url="<?php echo base_url();?>";
    function ConfirmDialog(id) {
		var x=confirm("Are you sure to delete record?")
		if (x) {
          	window.location = url + "belanja/delete/" + id;
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
                "url": "<?= base_url('belanja/get_all_data');?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[10, 50, 100],[10, 50, 100]], // Combobox Limit
            "columns": [
                {"data": 'id',"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { "data": "tgl_belanja" },  // Tampilkan tgl belanja
                { "data": "jam_belanja" },  // Tampilkan jam belanja
                { "data": "kode" },  // Tampilkan kode
                { "data": "nama_siswa" },  // Tampilkan nama siswa
                { "data": "total_belanja" },  // Tampilkan total belanja
                { "data": "sisa_saldo_terakhir" },  // Tampilkan sisa saldo
                { "data": "nama_admin" },  // Tampilkan nama admin
                { "data": "id", 
                    "render": 
                    function( data, type, row, meta ) {
                        return '<a class="btn btn-danger" href="<?= base_url('belanja/hapus/'); ?>'+data+'"><i class="feather icon-x"></i> Hapus</a>';
						// <a class="btn btn-inverse" href="<?= base_url('belanja/edit/'); ?>'+data+'"><i class="feather icon-edit"></i> Edit</a> 
                    }
                },
            ],
        });
    });
</script>