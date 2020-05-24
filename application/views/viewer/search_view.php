<?php include('view_header.php');?>
<div class="container">
	<h1>All articles</h1>
	<table class="table">
		<thead>
			<th>Sr. No</th>
			<th>title</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php if(count($articles)):
			$count=$this->uri->segment(4,0);?>
			  <?php foreach($articles as $article):?>
			<tr>
				<td><?= ++$count ?></td>
			<td><?= $article->title ?></td>
				<td>"Date"</td>
			<?php endforeach; ?>
			<?php else:?>
			<tr>
				<td colspan="3">No record found</td>
			</tr>
			<?php endif;?>
		</tbody>
	</table>
	   <?= $this->pagination->create_links(); ?>
</div>

<?php include('view_footer.php');?>