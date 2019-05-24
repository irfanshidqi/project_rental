<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Form reset Password</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="<?php echo base_url(); ?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
  
      <style>
	<?php $this->load->view('admin/style_login')?>

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="login">
	<h1>Reset Password</h1>
	<br>
	<br>
	<?php if ($this->session->flashdata('alert')){

		echo '<div class="alert alert-danger alert-message">';
		echo $this->session->flashdata('alert');
		echo '</div>';

	}

	 ?>
	 <?php echo validation_errors('<p style="color:white">','</p>'); ?>


    <form class="form" action="" method="post">

    	<input type="password"  placeholder="Password Baru" name="pass1" required="required" />
    	<input type="password"  placeholder="Konfirmasi Password" name="pass2" required="required" />

		 <em class="help-text " style="color:white;">* Masukkan password lagi untuk konfirmasi</em>

    	<br>
    	<br>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-large">Submit</button>
        <br>
        <a href="<?php echo base_url().'login' ?>" class="btn btn-default btn-block btn-large">Log-in</a>
    </form>
</div>
  
  



</body>
<?php 
    $this->load->view('admin/js');
 ?>
</html>
