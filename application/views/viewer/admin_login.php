	<?php include('view_header.php');?>
     <div class="container">	
		 <?php echo form_open('login/admin_login')?>
	  <fieldset>
		<legend>Login</legend>
		  <?php if($error=$this->session->flashdata('login_failed')):?>
		  <div class="alert alert-dismissible alert-danger">
			  <?= $error ?>
			  
          <div>
		  <?php endif; ?>
		
	      <?php include('partials/username.php');?>
		  <?php include('partials/password.php');?>
		  <?php include('partials/submit.php');?>
		 

	    </form>
		 		</div> 

<?php include('partials/validation_errors.php');?>

	<?php include('view_footer.php');?>