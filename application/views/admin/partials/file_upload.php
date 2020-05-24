<div class="form-group">
		  <label for="Article body"> Select Image</label>
		<?php echo form_upload (['name'=>'userfile', 'class'=>'form-control']);?>
	<?php if(isset($upload_error)) echo $upload_error ?>
</div>