<div role="main" class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?= $heading ?></h3>
			<hr>
			<?php foreach($content as $row) : ?>
			<div class="card" style="width: 40rem;">
				<div class="card-body">
					<h5 class="card-title"><?= $row->title ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $row->date ?></h6>
					<p class="card-text"><?= $row->body ?></p>
					<a href="<?= base_url('/post/show/' . $row->id) ?>" class="card-link">Show</a>
					<a href="#" class="card-link text-danger">Delete</a>
				</div>
			</div>
			<?php endforeach ?>
			<p>Total: <?= $total_content ?></p>

			<div id="pagination">
				<?= $pagination ?>
			</div>
		</div>
	</div>
</div><!-- /.container -->
