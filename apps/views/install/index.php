				<fieldset id="generic">
					<legend>Super Create</legend>
					<small>This command is a single-click button that automatically creates the necessary tables for the project</small>
					<?php
						echo form_open('install/super_create', 'class="center"');
						echo form_submit('submit', 'Super Create');
						echo form_close();
					?>
				</fieldset>
				<fieldset id="generic">
					<legend>Super Drop</legend>
					<small>This command is a single-click button that automatically drops the tables related to the project</small>
					<?php
						echo form_open('install/super_drop', 'class="center"');
						echo form_submit('submit', 'Super Drop');
						echo form_close();
					?>
				</fieldset>
				<fieldset id="register">
					<?= form_open('install/register_admin'); ?>
					<legend>Register Admin</legend>
					<hr/>
					<?= form_input('username', '', 'title="Username"'); ?>
					<?= form_password('password', '', 'title="Password"'); ?>
					<?= form_input('email', '', 'title="E-mail"'); ?>
					<legend>Personal Info</legend>
					<hr/>
					<?= form_input('first_name', '', 'title="First Name"'); ?>
					<?= form_input('surname', '', 'title="Surname"'); ?>
					<?= form_submit('submit', 'Create Admin'); ?>
					<?= form_close(); ?>
				</fieldset>