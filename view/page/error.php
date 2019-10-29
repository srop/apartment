<?php require ('../layout/header.blade.php'); ?>

 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>




  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
  

    <!-- Main content -->
      <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
          </p>

         
            <form method="post" action="">
  <select name="name">
   <option value="a" <?php selected( isset($_POST['name']) ? $_POST['name'] : '', 'a' ); ?>>a</option>
   <option value="b" <?php selected( isset($_POST['name']) ? $_POST['name'] : '', 'b' ); ?>>b</option>
 </select>
 <select name="location">
   <option value="x" <?php selected( isset($_POST['location']) ? $_POST['location'] : '', 'x' ); ?>>x</option>
   <option value="y" <?php selected( isset($_POST['location']) ? $_POST['location'] : '', 'y' ); ?>>y</option>
 </select>
 <input type="submit" value="Submit" class="submit" />
</form>
            <!-- /.input-group -->
         
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); ?>



  <?php require ('../layout/script.blade.php'); ?>


