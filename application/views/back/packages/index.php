<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow"><?php echo translate('premium_plans')?></h1>

		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->
		<!--Breadcrumb-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<ol class="breadcrumb">
			<li><a href="#"><?php echo translate('home')?></a></li>
			<li class="active"><a href="#"><?php echo translate('premium_plans')?></a></li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->
	</div>
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<!-- Basic Data Tables -->
		<!--===================================================-->
		<div class="panel">
			<?php if (!empty($success_alert)): ?>
				<div class="alert alert-success" id="success_alert" style="display: block">
	                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
	                <?=$success_alert?>
	            </div>
			<?php endif ?>
			<?php if (!empty($danger_alert)): ?>
				<div class="alert alert-danger" id="danger_alert" style="display: block">
	                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
	                <?=$danger_alert?>
	            </div>
			<?php endif ?>
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo translate('packages_list')?></h3>
			</div>
			<div class="panel-body">
				
				<?php foreach ($all_plans as $value): ?>
					<?php if ($value->plan_id == 1): ?>
						<div class="col-sm-4 col-lg-3">
					        <!--Dark Panel-->
					        <!--===================================================-->
					        <div class="panel panel-colorful panel-dark">
					            <div class="panel-body">
									<div class="text-center">
										<?php
											$image = $value->image;
											$images = json_decode($image, true);
											//print_r($images);
											if (file_exists('uploads/plan_image/'.$images[0]['thumb'])) {
			                                ?>
												<img src="<?=base_url()?>uploads/plan_image/<?=$images[0]['thumb']?>" height="100">
											<?php
											}
											else {
											?>
												<img src="<?=base_url()?>uploads/plan_image/default_image.png" height="100">
											<?php
											}
										?>
										<h3 class="panel-title"><?=$value->name?></h3>
										<p style="font-size: 25px"><b><?=currency('','def').$value->amount?></b></p>
										<p><?php echo translate('express_interest:')?> <?=$value->express_interest?> <?php echo translate('times')?></p>
										<p><?php echo translate('direct_messages:')?> <?=$value->direct_messages?> <?php echo translate('times')?></p>
										<p><?php echo translate('photo_gallery:')?> <?=$value->photo_gallery?> <?php echo translate('images')?></p>
									</div>
									<div class="col-sm-12">
						            	<a href="<?=base_url()?>admin/packages/edit_package/<?=$value->plan_id?>" id="demo-dt-view-btn" class="btn btn-mint add-tooltip" style="width: 100%" ><i class="fa fa-edit"></i> <?php echo translate('edit')?></a>
						            </div>
					            </div>
					        </div>
					        <!--===================================================-->
					        <!--End Dark Panel-->
					    </div>
					<?php endif ?>
					<?php if ($value->plan_id != 1): ?>
						<div class="col-sm-4 col-lg-3">
					        <!--Primary Panel-->
					        <!--===================================================-->
					        <div class="panel panel-bordered-primary">
					            <div class="panel-body">
					            	<div class="text-center">
					            		<?php
											$image = $value->image;
											$images = json_decode($image, true);
											//print_r($images);
											if (file_exists('uploads/plan_image/'.$images[0]['thumb'])) {
			                                ?>
												<img src="<?=base_url()?>uploads/plan_image/<?=$images[0]['thumb']?>" height="100">
											<?php
											}
											else {
											?>
												<img src="<?=base_url()?>uploads/plan_image/default_image.png" height="100">
											<?php
											}
										?>
										<h3 class="panel-title"><?=$value->name?></h3>
										<p style="font-size: 25px"><b><?=currency('', 'def')?><?=$value->amount?></b></p>
										<p><?php echo translate('express_interest:')?> <?=$value->express_interest?> <?php echo translate('times')?></p>
										<p><?php echo translate('direct_messages:')?> <?=$value->direct_messages?> <?php echo translate('times')?></p>
										<p><?php echo translate('photo_gallery:')?> <?=$value->photo_gallery?> <?php echo translate('images')?></p>
					            	</div>
					            	<div class="col-sm-12">
						            	<a href="<?=base_url()?>admin/packages/edit_package/<?=$value->plan_id?>" id="demo-dt-view-btn" class="btn btn-primary add-tooltip" style="width: 100%" ><i class="fa fa-edit"></i> <?php echo translate('edit')?></a>
						            </div>
					            </div>
					        </div>
					        <!--===================================================-->
					        <!--End Primary Panel-->
					    </div>

					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
		<!--===================================================-->
		<!-- End Striped Table -->
	</div>
	<!--===================================================-->
	<!--End page content-->
</div>
<script>
	setTimeout(function() {
	    $('#success_alert').fadeOut('fast');
	    $('#danger_alert').fadeOut('fast');
	}, 5000); // <-- time in milliseconds
</script>