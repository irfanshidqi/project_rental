<!DOCTYPE html>
<html lang="en">
  <head>
<?php
   $this->load->view('admin/head');
 ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


<?php echo $nav; ?>

        <!-- page content -->
        <div class="right_col" role="main">
           <div class="">

<?php  echo $content; ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
<?php 
    $this->load->view('admin/footer');
 ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    
<?php 
    $this->load->view('admin/js');
 ?>


  </body>
</html>