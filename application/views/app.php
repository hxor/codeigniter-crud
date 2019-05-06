
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="IDStack">
    <title>Codeigniter · Bootstrap</title>
		<?php $this->load->view('layouts/_head'); ?>
  </head>
  <body>
		<?php $this->load->view('layouts/_navbar'); ?>
		<?php $this->load->view($main_view); ?>		
		<?php $this->load->view('layouts/_footer'); ?>
</body>
</html>
