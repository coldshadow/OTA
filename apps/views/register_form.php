				<div id="users_page_container">
					<div>
						<fieldset id="login">
							<?= form_open('users/register'); ?>
							<legend>Register</legend>
							<hr/>
							<?= form_input('username', '', 'title="Username"'); ?>
							<?= form_password('password', '', 'title="Password"'); ?>
							<?= form_input('email', '', 'title="E-mail"'); ?>
							<legend>Personal Info</legend>
							<hr/>
							<?= form_input('first_name', '', 'title="First Name"'); ?>
							<?= form_input('surname', '', 'title="Surname"'); ?>
							<?= form_submit('submit', 'Register'); ?>
							<?= anchor('users/index', 'Already have an Account?'); ?>
							<?= form_close(); ?>
						</fieldset>
					</div>
				</div>