<?php include_once('admin_header.php')?>
<div class="container">	
		 <?php echo form_open("admin/update_article/{$article->id}")?>
	
<fieldset>
		<legend>Edit Article</legend>
		  <div class="form-group">
		  <label for=" Article title"> Title</label>
		<?php echo form_input (['name'=>'title', 'class'=>'form-control', 'placeholder'=>' Article title','value'=>set_value('title', $article->title)]);?>
	<?php echo form_error('title');?>
</div>
	<div class="form-group">
		  <label for="Article body"> Body</label>
		<?php echo form_textarea (['name'=>'body', 'class'=>'form-control', 'placeholder'=>' Article body','value'=>set_value('body', $article->body)]);?>
	<?php echo form_error('body');?>
</div>	  <?php include('partials/article_submit.php');?>
		  
	</fieldset>
</div>
</form>
	
<?php include_once('admin_footer.php')?>