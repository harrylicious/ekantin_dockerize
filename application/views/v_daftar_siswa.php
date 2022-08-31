
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

									
									<table id="table1" class="table table-striped table-bordered nowrap">
										<thead>
											<tr>
												<th>No.</th>
												<th>Kode</th>
												<th>Tgl. Daftar</th>
												<th>Jenis Pendaftar</th>
												<th>Nama Lengkap</th>
												<th>Jenis Kelamin</th>
												<th>Alamat</th>
												<th>Tempat Lahir</th>
												<th>Tanggal Lahir</th>
												<th>Saldo</th>
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
                "url": "<?= base_url('siswa/get_all_data');?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[10, 50, 100],[10, 50, 100]], // Combobox Limit
            "columns": [
                {"data": 'kode',"sortable": true, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { "data": "kode" },  
                { "data": "tgl_daftar" },  
                { "data": "jenis_pendaftar" },  
                { "data": "nama_lengkap" }, 
                { "data": "jenis_kelamin" },  
                { "data": "alamat" },  
                { "data": "tempat_lahir" }, 
                { "data": "tanggal_lahir" },  
                { "data": "saldo" },  
                { "data": "id", 
                    "render": 
                    function( data, type, row, meta ) {
                        return '<a class="btn btn-success" href="<?= base_url('siswa/barcode_print/'); ?>'+data+'"><i class="feather icon-eye"></i> Lihat Kartu</a>';
                    }
                },
            ],
        });
    });
</script>