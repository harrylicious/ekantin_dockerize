<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<!-- Main-body start -->
		<div class="main-body">
			<div class="page-wrapper">

				<div class="page-body">
					<div class="row">
						<!-- task, page, download counter  start -->
						<div class="col-xl-3 col-md-6">
							<div class="card bg-c-yellow update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-8">
											<h4 class="text-white"><?= number_format($total_pendapatan_belanja); ?></h4>
											<h6 class="text-white m-b-0"><strong>Total Belanja</strong></h6>
										</div>
										<div class="col-4 text-right">
											<canvas id="update-chart-1" height="50"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<p class="text-white m-b-0"><i
											class="feather icon-file-text text-white f-14 m-r-10"></i>Total :
										<?= rupiah($total_pendapatan_belanja); ?></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-c-green update-card">
								<div class="card-block">
									<div class="row align-items-end">
										<div class="col-8">
											<h4 class="text-white"><?= number_format($total_pendapatan_topup); ?></h4>
											<h6 class="text-white m-b-0"><strong>Total Topup</strong></h6>
										</div>
										<div class="col-4 text-right">
											<canvas id="update-chart-2" height="50"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<p class="text-white m-b-0"><i
											class="feather icon-file-text text-white f-14 m-r-10"></i>Total :
										<?= rupiah($total_pendapatan_topup); ?></p>
								</div>
							</div>
						</div>

					</div>
				</div>


				<!-- Page-body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<!-- HTML5 Export Buttons table start -->
							<div class="card">
								<div class="card-block">
									<!-- Row start -->
									<div class="row">
										<div class="col-lg-12 col-xl-12">
											<div class="sub-title">Laporan </div>
											<!-- Nav tabs -->
											<ul class="nav nav-tabs  tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#home1"
														role="tab">Pemasukkan Belanja</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#profile1"
														role="tab">Pemasukkan Topup</a>
												</li>
											</ul>
											<!-- Tab panes -->
											<div class="tab-content tabs card-block">
												<div class="tab-pane active" id="home1" role="tabpanel">
													<div class="col-md-12">
														<div class="box box-info">

															<div class="box-body">
																<form
																	action="<?= base_url('laporan/pemasukkan_pencarian_bertingkat'); ?>"
																	method="post"> 

																	<div class="row">
																		<div class="col-sm-3">
																			<div class="form-group">
																				<label>Pilih Tanggal Awal</label>
																				<input class="form-control"
																					name="tanggal1" id="tanggal1"
																					type="date">

																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="form-group">
																				<label>Pilih Tanggal Akhir</label>
																				<input class="form-control"
																					name="tanggal2" id="tanggal2"
																					type="date">
																			</div>
																		</div>

																		<div class="col-sm-12">
																			<div class="form-group">
																				<a href="<?= base_url('laporan/pemasukkan_pencarian_semua'); ?>" class="btn btn-round btn-info">LIHAT SEMUA DATA</a>
																				<button type="submit"
																					class="btn btn-round btn-success">CARI
																					DATA</button>
																			</div>
																		</div>

																	</div>

																</form>

															</div>
														</div>
														<h4 class="sub-title">Daftar Riwayat Belanja</h4>
														<div class="dt-responsive table-responsive">
															<table id="cbtn-selectors"
																class="table table-striped table-bordered nowrap">
																<thead>
																	<tr>
																		<th>No.</th>
																		<th>Tgl. Belanja</th>
																		<th>Total Belanja</th>
																		<th>Nama Admin</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	$no = 1;
																	foreach ($data_belanja as $data) {
																		$hari = tgl_dan_hari(substr($data->tgl_belanja, 0, 11));
																		?>
																	<tr>
																		<td><?= $no++; ?></td>
																		<td><?= $hari.", ".tgl_default(substr($data->tgl_belanja, 0, 11)); ?></td>
																		<td><strong><?= rupiah($data->total_belanja); ?></strong></td>
																		<td><strong><?= $data->nama_admin; ?></strong></td>

																	</tr>
																		<?php
																		}

																		?>
																<tr class="btn-gray">
																	<td colspan="3">TOTAL</td>
																
																	<td><strong><?php if(isset($data->total)) { echo rupiah($data->total); } ; ?></strong></td>
																</tr>
																</tbody>
																<tfoot>
																	<tr>
																		<th>No.</th>
																		<th>Tgl. Belanja</th>
																		<th>Total Belanja</th>
																		<th>Nama Admin</th>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="profile1" role="tabpanel">
													<div class="col-md-12">
														<div class="box box-info">

															<div class="box-body">
																<form
																	action="<?= base_url('laporan/pemasukkan_pencarian_bertingkat'); ?>"
																	method="post">

																	<div class="row">
																		<div class="col-sm-3">
																			<div class="form-group">
																				<label>Pilih Tanggal Awal</label>
																				<input class="form-control"
																					name="tanggal1" id="tanggal1"
																					type="date">

																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="form-group">
																				<label>Pilih Tanggal Akhir</label>
																				<input class="form-control"
																					name="tanggal2" id="tanggal2"
																					type="date">
																			</div>
																		</div>

																		<div class="col-sm-12">
																			<div class="form-group">
																			<a href="<?= base_url('laporan/pemasukkan_pencarian_semua'); ?>" class="btn btn-round btn-info">LIHAT SEMUA DATA</a>
																			<button type="submit"
																					class="btn btn-round btn-success">CARI
																					DATA</button>
																			</div>
																		</div>

																	</div>

																</form>

															</div>
														</div>
														<h4 class="sub-title">Daftar Riwayat Top Up</h4>
														<div class="dt-responsive table-responsive">
															<table id="cbtn-selectors"
																class="table table-striped table-bordered nowrap">
																<thead>
																	<tr>
																		<th>No.</th>
																		<th>Tgl. Topup</th>
																		<th>Total Topup</th>
																		<th>* Total Topup</th>
																		<th>Nama Admin</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
                                                                    $no = 1;
                                                                    foreach ($data_topup as $data) {
																		$hari = tgl_dan_hari(substr($data->tgl_top_up, 0, 11));
                                                                        ?>
																	<tr>
																		<td><?= $no++; ?></td>
																		<td><?= $hari.", ".tgl_default(substr($data->tgl_top_up, 0, 11)); ?></td>
																		<td><strong><?= rupiah($data->nominal_top_up); ?></strong></td>
																		<td><strong><?= ($data->nominal_top_up); ?></strong></td>

																	</tr>
																		<?php
																		}

																		?>
																<tr class="btn-gray">
																	<td colspan="2">TOTAL</td>
																
																	<td><strong><?php if(isset($data->total)) { echo rupiah($data->total); } ; ?></strong></td>
																	<td><strong><?= $data->nama_admin; ?></strong></td>
																</tr>
																</tbody>
																<tfoot>
																	<tr>
																		<th>No.</th>
																		<th>Tgl. Topup</th>
																		<th>Total Topup</th>
																		<th>* Total Topup</th>
																		<th>Nama Admin</th>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
									<!-- Row end -->
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
	
	</div>

	<script>
  $(document).ready(function () {
    $('#cbtn-selectors tfoot th').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="'+title+' Search" />' );
	} );

  $('#cbtn-selectors').DataTable({
    
    dom: 'Bfrtip',
    buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                  columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19 ],
                    
                },
                filename: function(){
                  
                var today = new Date();
                var dd = today.getDate();

                var mm = today.getMonth()+1; 
                var yyyy = today.getFullYear();
                if(dd<10) 
                {
                    dd='0'+dd;
                } 

                if(mm<10) 
                {
                    mm='0'+mm;
                } 
                today = dd+'-'+mm+'-'+yyyy;

                return 'Daftar_Arsip_'+'<?= $wilayah; ?>' + '_' + today;
              },
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19 ]
                },
                filename: function(){
                  
                var today = new Date();
                var dd = today.getDate();

                var mm = today.getMonth()+1; 
                var yyyy = today.getFullYear();
                if(dd<10) 
                {
                    dd='0'+dd;
                } 

                if(mm<10) 
                {
                    mm='0'+mm;
                } 
                today = dd+'-'+mm+'-'+yyyy;

                return 'Daftar_Arsip_'+'<?= $wilayah; ?>' + '_' + today;
              },
            },
            'colvis'
        ],
  "scrollX": true,
  "deferRender": true,
  "responsive": true,
   
  
  });
  
  
  $('.dataTables_length').addClass('bs-select');
  });
</script>