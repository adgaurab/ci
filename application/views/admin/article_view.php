<?php include_once('admin_header.php')?>
<div class="container">	
		 <?php echo form_open_multipart('admin/store_article')?>
	<?php echo form_hidden('user_id', $this->session->userdata('user_id'));?>
	<?=form_hidden('created_at',date('Y-m-d H:i:s')) ?>
<fieldset>
		<legend>Add article</legend>
		  <?php include('partials/article_title.php');?>
		  <?php include('partials/article_body.php');?>
	       <?php include('partials/file_upload.php');?>
	<?php include('partials/article_submit.php');?>
		  
	</fieldset>
</div>
</form>
	
<?php include_once('admin_footer.php')?>