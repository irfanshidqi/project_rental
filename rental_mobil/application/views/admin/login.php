<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="<?php echo base_url(); ?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
  
      <style>
 	<?php $this->load->view('admin/style_login')?>

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="login">
	<h1>Login Admin</h1>
	<br>
	<?php 
	if ($this->session->flashdata('alert')){


		echo '<div class="alert alert-danger alert-message">';
		echo $this->session->flashdata('alert');
		echo '</div>';
	}
	if ($this->session->flashdata('success')){


		echo '<div class="alert alert-success alert-message">';
		echo $this->session->flashdata('success');
		echo '</div>';
	}


	 ?>

    <form action="" method="post">
    	<input type="text"  placeholder="Username" name="username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
    <br>
    <br>
    <p style="color:white;">Lupa password anda ? Silahkan klik <a href=" <?php echo base_url().'lupa_admin/' ?> "> disini.</a></p>
</div>
  
  
<?php $this->load->view('admin/js') ?>
</body>

</html>
