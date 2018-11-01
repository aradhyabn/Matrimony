<p class="text-main text-semibold"><?php echo translate('general_settings')?></p>
<?php $right_option = $this->Crud_model->get_type_name_by_id('general_settings', '85', 'value') ?>

<form class="form-horizontal" id="general_settings_form" method="POST" action="<?=base_url()?>admin/general_settings/update_general_settings">
	<div class="form-group">
		<label class="col-sm-3 control-label" for="system_name"><b><?php echo translate('system_name')?></b></label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="system_name" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '1', 'value')?>" placeholder="Your Site Name" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label" for="system_email"><b><?php echo translate('system_email')?></b></label>
		<div class="col-sm-8">
			<input type="email" class="form-control" name="system_email" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '2', 'value')?>" placeholder="Your Site Email" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label" for="system_title"><b><?php echo translate('system_title')?></b></label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="system_title" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '3', 'value')?>" placeholder="Your Site Title" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label" for="address"><b><?php echo translate('address')?></b></label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="address" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '4', 'value')?>" placeholder="Address">
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label" for="phone"><b><?php echo translate('phone')?></b></label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="phone" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '5', 'value')?>" placeholder="Phone No.">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label" for="cache_time"><b><?php echo translate('homepage_cache_time'); ?> (<?php echo translate('minutes'); ?>)</b></label>
		<div class="col-sm-6">
			<input type="number" min="0" step=".01" class="form-control" name="cache_time" value="<?=$this->Crud_model->get_type_name_by_id('general_settings', '59', 'value')?>">
		</div>
		<div class="col-sm-2 control-label text-left">
            <?php echo translate('minutes'); ?>
        </div>
	</div>
	<div class="form-group">
        <label class="col-sm-3 control-label" ><?php echo translate('language'); ?></label>
        <div class="col-sm-6">
            <select name="language" class="form-control">
                <?php
                $set_lang = $this->db->get_where('general_settings', array('type' => 'language'))->row()->value;
                $fields = $this->db->list_fields('site_language');
                foreach ($fields as $field) {
                    if ($field !== 'word' && $field !== 'word_id') {
                        ?>
                        <option value="<?php echo $field; ?>" <?php
                        if ($set_lang == $field) {
                            echo 'selected';
                        }
                        ?> ><?php echo ucfirst($field); ?></option>
                                <?php
                            }
                        }
                        ?>
            </select>
        </div>
    </div>
    <div class="form-group">
		<label class="col-sm-3 control-label" for="right_option"><b><?php echo translate('mouse_right_click_off')?></b></label>
		<div class="col-sm-8">
			<div class="checkbox">
                <input id="right_option" name="right_option" class="magic-checkbox" type="checkbox" <?php if($right_option == 'on') {?>checked<?php }?>>
                <label for="right_option"></label>
            </div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-8 text-right">
        	<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"><?php echo translate('save')?></button>
		</div>
	</div>
</form>
