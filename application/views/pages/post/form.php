<div role="main" class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3><?= $heading ?></h3>
			<hr>
			<?= form_open($form_action, ['method' => 'POST']) ?>
				<?= form_hidden('id', $input->id) ?>
				<div class="form-group">
					<label for="">Tanggal</label>
					<?= form_input('date', $input->date, ['class' => 'form-control', 'placeholder' => 'Input Tanggal YYYY-MM-DD']) ?>
					<?= form_error('date') ?>				
				</div>
				<div class="form-group">
					<label for="">Title</label>
					<?= form_input('title', $input->title, ['class' => 'form-control', 'placeholder' => 'Input Judul']) ?>
					<?= form_error('title') ?>	
				</div>
				<div class="form-group">
					<label for="">Body</label>
					<?= form_textarea('body', $input->body, ['class' => 'form-control']) ?>
					<?= form_error('body') ?>	
				</div>
				<?= form_button(['content' => 'Publish', 'type' => 'submit', 'class' => 'btn btn-primary']) ?>
			<?= form_close() ?>
		</div>
	</div>
</div><!-- /.container -->
