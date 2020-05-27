<?php include('view_header.php');?>
<div class="row">
  <div class="col-md-12">
     <div class="jumbotron">
		 <h2 class="display-4">Breaaking News</h2>
     </div>
  </div>
 </div>
			<?php if(count($articles)):
			$count=$this->uri->segment(3,0);?>
			  <?php foreach($articles as $article):?>
		<hr class="w-25 mx-auto pt-5">
		<div class="row mb-5">
			<div class="col-md-4">
				<?php if (! is_null($article->image_path)):?>
		<img class="card-img-top" src="<?= $article->image_path ?>" alt="card image"style="width:70%">
		<?php endif; ?>
			</div>
			<div class="col-md-8">
				<div class="row">
		<div class="col-md-6">
			<h1>
		<?= anchor("viewer/article/{$article->id}",$article->title) ?>
	</h1>
		</div>
		<div class="col-md-6">
			<span class="pull-right">
		<?= date('d M y H:i:s', strtotime($article->created_at)); ?>
	</div>
		</div>
			<?=".substr( $article->body, 0,1 ).";?>
				<button class="btn bg-primary text-white">more about me</button>
			</div>
		</div>


			
<?php endforeach; ?>
			<?php endif;?>
			  
		<?= $this->pagination->create_links(); ?>

<?php include('view_footer.php');?>