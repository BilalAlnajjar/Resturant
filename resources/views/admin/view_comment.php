<?php require_once 'inc/header.php'; ?>

<!-- PAGE -->
<div class="page">
	<div class="page-main">

		<!-- Sidebar -->
		<?php require_once 'inc/sidebar.php'; ?>
		<!-- /Sidebar -->

		<!-- Top Header Mobile -->
		<?php require_once 'inc/top-mobile.php'; ?>
		<!-- /Top Header Mobile  -->

		<div class="app-content">
			<div class="side-app">
				<!-- Top Header Full -->
				<?php $title_view = 'View Comment'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->
				<!-- ============== START CONTENT ==============  -->
				<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="clearfix">
											
										</div>
										<hr>
										<div class="row">
                                        <div class="col-lg-12">
												<p class="h3">Details Comment</p>
												<address>
                                                    <strong>Name Customer</strong> : Ahmed Yosef<br>
                                                    <hr>
                                                    <strong>Phone</strong> : 05347678787<br>
                                                    <hr>
                                                    <strong>Date</strong> : 2021-01-25 10:30 PM<br>
                                                    <hr>
                                                    <strong>Comment Content</strong>:<br><br>
                                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable
                                                </address>
                                            </div>
                                            
                                            
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="button" class="btn btn-primary mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Edit</button>
										<button type="button" class="btn btn-danger mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Delete</button>
									</div>
								</div>
							</div><!-- COL-END -->
						</div>
						<!-- ROW-1 CLOSED -->
				<!-- ============== END CONTENT ==============  -->

	

	<!-- Copyright -->
	<?php require_once 'inc/copyright.php'; ?>
	<!-- /Copyright -->
</div>
<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>
<!-- /Footer -->