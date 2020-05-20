<div class="form-group">
		  <label for=" Article title"> Title</label>
		<?php echo form_input (['name'=>'title', 'class'=>'form-control', 'placeholder'=>' Article title','value'=>set_value('title')]);?>
	<?php echo form_error('title');?>
</div>