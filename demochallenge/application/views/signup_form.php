<div id="container">
	<?php echo validation_errors('<p class="error">'); ?>
	<h1>Create an Account</h1>

	<fieldset>
			<legend>Personal information</legend>			
			<?php 
				echo form_open('login/create_member');

				$data_firstname = array(
	              'name'        => 'first_name',
	              'id'          => 'first_name',
	              'value'       => '',
	              'placeholder' => 'Enter First Name',
	              'class'       => 'signup_input',
	            );

				echo form_input($data_firstname);
				
				$data_lastname = array(
	              'name'        => 'last_name',
	              'id'          => 'last_name',
	              'value'       => '',
	              'placeholder' => 'Enter Last Name',
	              'class'       => 'signup_input',              
	            );

				echo form_input($data_lastname);

			 ?>
	</fieldset>

	<fieldset>
			<legend>Login Info</legend>
			<?php
				$data_username = array(
	              'name'        => 'username',
	              'id'          => 'username',
	              'value'       => '',
	              'placeholder' => 'Enter username',
	              'class'       => 'signup_input',             
	            );

				$data_password = array(
		              'name'        => 'password',
		              'id'          => 'password',
		              'placeholder' => 'Enter password',
		              'value'       => '',
		              'class'       => 'signup_input',           
		            );

				$data_password2 = array(
		              'name'        => 'password2',
		              'id'          => 'password2',
		              'placeholder' => 'confirm password',
		              'value'       => '',
		              'class'       => 'signup_input',             
		            );

				echo form_input($data_username);
				echo form_password($data_password);
				echo form_password($data_password2);

				echo form_submit('submit', 'Create Account');
			 ?>			 
	</fieldset>	
</div>	 