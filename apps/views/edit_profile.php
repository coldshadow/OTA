<div id="profile_edit_container">
	<div>
		<fieldset id="profile">
			<?= form_open('ucp/updateprofile'); ?>
			<legend>Enter You're Info</legend>
			<hr/>
			<?= form_input('id', $row->id, 'disabled="disabled"'); ?>
			<?php
			$field_array = array(
				'first_name' => 'First Name: ',
				'surname' => 'Second Name: ',
				'username' => 'Username: ',
				'email' => 'e-mail: '
			);
			
			foreach($field_array as $field_name => $name) {
				echo '<p>';
				echo form_label($name, $field_name);
				echo '<br>';
				if($field_name == 'email' | $field_name == 'username') {
					echo form_input($field_name, $row->$field_name, 'disabled="disabled"');
				} else {
					echo form_input($field_name, $row->$field_name);
				}
				echo '</p>';
			}
			?>
			<?= form_submit('submit', 'Update'); ?>
			<?= form_close(); ?>
		</fieldset>
	</div>
</div>