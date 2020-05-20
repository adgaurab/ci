<?php require_once('admin_header.php');?>

<div class="container">
	<table class="table">
		<thead>
			<th>sr.no</th>
			<th>title</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php if(count($articles)): ?>
			  <?php foreach($articles as $article):?>
			<tr>
			<td><?php echo $article + 1; ?></td>
			<td><?= $article->title ?></td>
			<td>
				<a href="" class="btn btn-primary">edit</a>
				<a href="" class="btn btn-primary">delete</a>
				
				</td>
			</tr>
			<?php endforeach; ?>
			<?php else:?>
			<tr>
				<td colspan="3">No record found</td>
			</tr>
			<?php endif;?>
		</tbody>
	</table>
</div>
			 
	
	
<?php require_once('admin_footer.php');?>