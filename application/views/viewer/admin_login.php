	<?php include('view_header.php');?>
     <div class="container">	
		 <?php echo form_open('login/admin_login')?>
	  <fieldset>
		<legend>Login</legend>
		
	      <?php include('partials/username.php');?>
		  <?php include('partials/password.php');?>
		  <?php include('partials/submit.php');?>
		 

	    </form>
		 		</div> 

<?php include('partials/validation_errors.php');?>

	<?php include('view_footer.php');?>