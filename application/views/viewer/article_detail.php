<?php include('view_header.php');?>
<div class="container mt-5">
<div class="row">
	<div class="col md-9">
		<div class="row">
			<div class="col-md-12">
				<?php if (! is_null($article->image_path)):?>
		        <img class="img" src="<?= $article->image_path ?>" alt="card image"style=" width:650px; height:650px;">
		        <?php endif; ?>
			</div>
		</div>
		  <div class="row md-12">
			<div class="col-8">
				<h1><?=$article->title; ?></h1>
				</div>
			<div class="col-4">
				<h4><?= date('d M y H:i:s', strtotime($article->created_at)); ?></h4>
				</div>
		  </div>
		<div class="row">
				<div class="col-md-12">
			
			<p><?= $article->body;?></p>
		  </div>
		</div>
		<div class="row mt-4">
				<div class="col-md-6">
			<form>
				<h3>comment section</h3>
				<?php include('partials/username.php');?>
				<?php include('partials/email.php');?>
				<?php include('partials/comment.php');?>
					</form>
				<?php include('partials/submit.php');?>
					</form>
		  </div>
		</div>
	</div>
		
	<div class="col-md-3">
		<h3>other trending news</h3>
		<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link" href=#>apple</a>
			</li>
		</ul>
	</div>
	
</div>
</div>
<?php include_once('view_footer.php');?>
