<div class="form-group">
		  <label for="Article body"> Body</label>
		<?php echo form_textarea (['name'=>'body', 'class'=>'form-control', 'placeholder'=>' Article body','value'=>set_value('body')]);?>
	<?php echo form_error('body');?>
</div>