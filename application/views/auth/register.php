<div role="main" class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3>Register</h3>
			<hr>
			<?php $this->load->view('layouts/_flash'); ?>
			<?= form_open('register', ['method' => 'POST']) ?>
				<div class="form-group">
					<label for="">Name</label>
					<?= form_input('name', $input->name, ['class' => 'form-control', 'placeholder' => 'Input Name']) ?>
					<?= form_error('name') ?>	
				</div>
				<div class="form-group">
					<label for="">Username</label>
					<?= form_input('username', $input->username, ['class' => 'form-control', 'placeholder' => 'Input Username']) ?>
					<?= form_error('username') ?>	
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
					<?= form_error('password') ?>	
				</div>
				<div class="form-group">
					<label for="">Confirm Password</label>
					<?= form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) ?>
					<?= form_error('password_confirmation') ?>	
				</div>
				<?= form_button(['content' => 'Publish', 'type' => 'submit', 'class' => 'btn btn-primary']) ?>
			<?= form_close() ?>
		</div>
	</div>
</div><!-- /.container -->
