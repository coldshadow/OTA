				<div id="users_page_container">
					<div>
						<fieldset id="login">
							<?= form_open('users/login'); ?>
							<legend>Login</legend>
							<hr/>
							<?= form_input('username', '', 'title="Username"'); ?>
							<?= form_password('password', '', 'title="Password"'); ?>
							<?= form_submit('', 'Login'); ?>
							<?= anchor('users/regindex', 'Don\'t have an Account?'); ?>
							<?= form_close(); ?>
						</fieldset>
					</div>
				</div>