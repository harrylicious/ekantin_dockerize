<?php
 
$dataPoints_belanja = array();
foreach ($data_belanja_bulanan as $data) {
    array_push($dataPoints_belanja, array("y"=> $data->total_belanja, "label"=> $data->bulan));
}

$dataPoints_topup = array();
foreach ($data_topup_bulanan as $data) {
    array_push($dataPoints_topup, array("y"=> $data->total_topup, "label"=> $data->bulan));
}
	
?>

<!DOCTYPE html>
<html lang="en">

<?php
// Load header_view
    $this->load->view('partials/v_header.php');
?>

<!-- Sidebar inner chat end-->
<div class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<?php
                    $this->load->view('partials/v_sidebar.php');
                ?>
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
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
													<h4 class="text-white"><?= number_format($total_siswa); ?></h4>
													<h6 class="text-white m-b-0">Total Siswa</h6>
												</div>
												<div class="col-4 text-right">
													<canvas id="update-chart-1" height="50"></canvas>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<p class="text-white m-b-0"><i
													class="feather icon-file-text text-white f-14 m-r-10"></i>Total
												Saldo : <?= rupiah($total_saldo_siswa); ?></p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card bg-c-green update-card">
										<div class="card-block">
											<div class="row align-items-end">
												<div class="col-8">
													<h4 class="text-white"><?= number_format($total_belanja); ?>
													</h4>
													<h6 class="text-white m-b-0">Total Transaksi Belanja</h6>
												</div>
												<div class="col-4 text-right">
													<canvas id="update-chart-2" height="50"></canvas>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<p class="text-white m-b-0"><i
													class="feather icon-file-text text-white f-14 m-r-10"></i>Total
												: <?= rupiah($total_pendapatan_belanja); ?></p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card bg-c-pink update-card">
										<div class="card-block">
											<div class="row align-items-end">
												<div class="col-8">
													<h4 class="text-white"><?= number_format($total_topup); ?></h4>
													<h6 class="text-white m-b-0">Total Transaksi Topup</h6>
												</div>
												<div class="col-4 text-right">
													<canvas id="update-chart-3" height="50"></canvas>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<p class="text-white m-b-0"><i
													class="feather icon-file-text text-white f-14 m-r-10"></i>Total
												: <?= rupiah($total_pendapatan_topup); ?></p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									<div class="card bg-c-lite-green update-card">
										<div class="card-block">
											<div class="row align-items-end">
												<div class="col-8">
													<h4 class="text-white"><?= $total_admin; ?></h4>
													<h6 class="text-white m-b-0">Total Petugas</h6>
												</div>
												<div class="col-4 text-right">
													<canvas id="update-chart-4" height="50"></canvas>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<p class="text-white m-b-0"><i
													class="feather icon-user text-white f-14 m-r-10"></i>Superadmin
												& Admin</p>
										</div>
									</div>
								</div>
								<!-- task, page, download counter  end -->



							</div>
						</div>


						<!-- <div>
							<img src="<?= base_url('assets/images/bg.jpg'); ?>" alt="img" width="100%">
						</div> -->

                        						<!-- Page-body start -->
						<div class="page-body">
							<div class="row">
								<div class=" col-md-6 col-sm-6">
									<!-- HTML5 Export Buttons table start -->
									<div class="card">
										<div class="card-block">

											<div id="chartContainer" style="height: 370px; width: 100%;"></div>
										</div>
									</div>
									<!-- HTML5 Export Buttons end -->
								</div>
                                <div class="col-md-6 col-sm-6">
									<!-- HTML5 Export Buttons table start -->
                                    <div class="card">
										<div class="card-block">

                                        <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
										</div>
										</div>
									<!-- HTML5 Export Buttons end -->
								</div>


                               
							</div>
						</div>
						<!-- Page-body end -->
					</div>

					<div id="styleSelector">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<?php
    $this->load->view('partials/v_footer.php');
?>
</body>

</html>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Laporan Belanja Perbulan"
	},
	axisY: {
		title: "Total Belanja"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints_belanja, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Laporan Topup Perbulan"
	},
	axisY: {
		title: "Total Topup"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints_topup, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
 
}
</script>