<div role="main" class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?= $heading ?></h3>
			<hr>
			<form method="POST" action="<?= $form_action ?>">
				<div class="form-group">
					<label for="">Tanggal</label>
					<input name="date" type="text" class="form-control" id="" placeholder="Tanggal">				
				</div>
				<div class="form-group">
					<label for="">Title</label>
					<input name="title" type="text" class="form-control" id="" placeholder="Title">
					<small class="form-text text-danger">
					Your title must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
					</small>
				</div>
				<div class="form-group">
					<label for="">Body</label>
					<textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Publish</button>
			</form>
		</div>
	</div>
</div><!-- /.container -->
