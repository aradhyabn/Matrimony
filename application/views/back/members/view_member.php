<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow"><?php echo translate('members')?></h1>
			<!--Searchbox-->
			<div class="searchbox">
				<div class="pull-right">
					<a href="<?=base_url()?>admin/members/<?=$parameter?>" class="btn btn-danger btn-sm btn-labeled fa fa-step-backward" type="submit"><?php echo translate('go_back')?></a>
				</div>
			</div>
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->
		<!--Breadcrumb-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<ol class="breadcrumb">
			<li><a href="#"><?php echo translate('home')?></a></li>
			<li><a href="#"><?php echo translate('members')?></a></li>
			<li><a href="#"><?=translate($member_type)?> <?php echo translate('members')?></a></li>
			<li class="active"><?php echo translate('member_details')?></li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->
	</div>
	<!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<div class="fixed-fluid">
					<?php 
						$members = array();
						if ($member_type == "Free") {
							$member = $get_free_member_by_id;
						}
						elseif ($member_type == "Premium") {
							$member = $get_premium_member_by_id;
						}
					?>
						<?php
							foreach ($member as $value) {
								$image = json_decode($value->profile_image, true);
								$education_and_career = json_decode($value->education_and_career, true);
								$basic_info = json_decode($value->basic_info, true);
								$present_address = json_decode($value->present_address, true);
								$education_and_career = json_decode($value->education_and_career, true);
								$physical_attributes = json_decode($value->physical_attributes, true);
								$language = json_decode($value->language, true);
								$hobbies_and_interest = json_decode($value->hobbies_and_interest, true);
								$personal_attitude_and_behavior = json_decode($value->personal_attitude_and_behavior, true);
								$residency_information = json_decode($value->residency_information, true);
								$spiritual_and_social_background = json_decode($value->spiritual_and_social_background, true);
								$life_style = json_decode($value->life_style, true);
								$astronomic_information = json_decode($value->astronomic_information, true);
								$permanent_address = json_decode($value->permanent_address, true);
								$family_info = json_decode($value->family_info, true);
								$additional_personal_details = json_decode($value->additional_personal_details, true);
								$partner_expectation = json_decode($value->partner_expectation, true);
							}
							include_once "left_panel.php";
							include_once "member_info.php";
						?>
					</div>					
                </div>
                <!--===================================================-->
                <!--End page content-->
</div>

<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="package_modal" role="dialog" tabindex="-1" aria-labelledby="package_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('package_information')?></h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body" id="package_modal_body">
            	
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="block_modal" role="dialog" tabindex="-1" aria-labelledby="block_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_your_action')?></h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
            	<p><?php echo translate('are_you_sure_you_want_to')?> "<b id="block_type"></b>" <?php echo translate('this_user?')?>?</p>
            	<div class="text-right">
            		<input type="hidden" id="member_id" name="member_id" value="">
            		<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close')?></button>
                	<button class="btn btn-primary btn-sm" id="block_status" value=""><?php echo translate('confirm')?></button>
            	</div>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal-->
<script>
	function view_package(id){
		$.ajax({
		    url: "<?=base_url()?>admin/member_package_modal/"+id,
		    success: function(response) {
				$("#package_modal_body").html(response);
		    },
			fail: function (error) {
			    alert(error);
			}
		});
	}
</script>
<script>
	function block(status, member_id){
	    $("#block_status").val(status);
	    if (status == 'yes') {
	    	$("#block_type").html("<?php echo translate('unblock')?>");
	    }
	    if (status == 'no') {
			$("#block_type").html("<?php echo translate('block')?>");
	    }
	    $("#member_id").val(member_id);
	}

	$("#block_status").click(function(){
    	$.ajax({
		    url: "<?=base_url()?>admin/member_block/"+$("#block_status").val()+"/"+$("#member_id").val(),
		    success: function(response) {
		    	// alert(response);
				window.location.href = "<?=base_url()?>admin/members/<?=$parameter?>";
		    },
			fail: function (error) {
			    alert(error);
			}
		});
    })
</script>