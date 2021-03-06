<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="/">CRUD</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample07">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('category') ?>">Category</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('article') ?>">Article</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('post') ?>">Post</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('login') ?>">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('register') ?>">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
