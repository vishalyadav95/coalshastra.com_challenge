<div id="form_login">
	<h1>Please login</h1>
	<?php
		echo form_open('login/validate_credentials');

		$data_username = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => '',
              'placeholder' => 'Enter Username',
              'class'       => 'login_input'              
            );

		$data_password = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => '',
              'placeholder' => 'Enter Password',        
              'class'       => 'login_input',
            );

		echo form_input($data_username);
		echo form_password($data_password);
		echo form_submit('submit','Login');
		echo anchor('login/signup', 'Create Account');
	?>
</div>