<div role="main" class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3>Create New</h3>
			<hr>
			<?= form_open($form_action, ['method' => 'POST']) ?>
				<?= form_hidden('id', $input->id) ?>
				<div class="form-group">
					<label for="">Title</label>
					<?= form_input('title', $input->title, ['class' => 'form-control', 'placeholder' => 'Input Judul']) ?>
					<?= form_error('title') ?>	
				</div>
				<?= form_button(['content' => 'Publish', 'type' => 'submit', 'class' => 'btn btn-primary']) ?>
			<?= form_close() ?>
		</div>
	</div>
</div><!-- /.container -->
