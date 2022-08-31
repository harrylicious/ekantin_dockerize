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

								<a href="<?= base_url('topup/export'); ?>" class="btn btn-inverse btn-round; text-white"><i class="feather icon-arrow-right"></i> Export Excel</a>
								<a href="<?= base_url('topup/add'); ?>" class="btn btn-success btn-round; text-white"><i class="feather icon-plus"></i> Tambah Topup</a>
								</div>

							</div>
							<div class="card">
								<div class="card-block">
									<h4 class="sub-title">Daftar Riwayat Top Up</h4>
									<div class="dt-responsive table-responsive">
                                        <table id="table1" class="table table-striped table-bordered nowrap">
											<thead>
													<th>No.</th>
													<th>Tgl. Top Up</th>
													<th>Jam Top Up</th>
													<th>Kode</th>
													<th>Nama Lengkap</th>
													<th>Total Top Up</th>
													<th>Saldo Terbaru</th>
													<th>Nama Petugas Melayani</th>
													<th>Aksi</th>
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
</div>



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
                { "data": "tgl_top_up_convert" },  // Tampilkan tgl belanja
                { "data": "jam_top_up" },  // Tampilkan jam belanja
                { "data": "kode" },  // Tampilkan kode siswa
                { "data": "nama_siswa" },  // Tampilkan nama siswa
                { "data": "nominal_top_up" },  // Tampilkan kode
                { "data": "sisa_saldo_terbaru" },  // Tampilkan sisa saldo
                { "data": "nama_admin" },  // Tampilkan nama admin
                { "data": "id", 
                    "render": 
                    function( data, type, row, meta ) {
                        return '<a class="btn btn-danger" href="<?= base_url('belanja/hapus/'); ?>'+data+'"><i class="feather icon-x"></i> Hapus</a>';
                    }
                },
            ],
        });
    });
</script>