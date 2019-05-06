<div role="main" class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?= $heading ?></h3>
			<hr>
			<div class="card" style="width: 40rem;">
				<div class="card-body">
					<h5 class="card-title"><?= $content->title ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $content->date ?></h6>
					<p class="card-text"><?= $content->body ?></p>
					<a href="#" class="card-link text-danger">Delete</a>
				</div>
			</div>
		</div>
	</div>
</div><!-- /.container -->
