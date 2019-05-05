
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="IDStack">
    <title>Codeigniter · Bootstrap</title>
	<link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/app.css'); ?>" rel="stylesheet">
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">CRUD</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExample07">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#">Post</a>
				</li>
			</ul>
			</div>
		</div>
	</nav>

	<main role="main" class="container">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Default Card
				</div>
				<div class="card-body">
					<h5 class="card-title">Welcome</h5>
					<p class="card-text">This is page from Welcome Controller.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
		</div>
	</div>

	</main><!-- /.container -->
	<script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('/assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
