				<div id="anime_edit_container">
					<div>
						<fieldset id="anime">
							<?= form_open('animes/updateanime'); ?>
							<legend>Enter Series Info</legend>
							<hr/>
							<?= form_input('id', $row->id); ?>
							<?php
							$field_array = array(
								'anime_name' => 'Name: ',
								'anime_description' => 'Description: ',
								'anime_episodes' => 'No. of Episodes: ',
								'anime_ova' => 'No. of OVA\'s: ',
								'anime_alt_name' => 'Alternative Name: ',
								'anime_watched_status' => 'Watched Status: '
							);
							
							foreach($field_array as $field_name => $name) {
								echo '<p>';
								echo form_label($name, $field_name);
								echo '<br>';
								echo form_input($field_name, $row->$field_name);
								echo '</p>';
							}
							?>
							<?= form_submit('submit', 'Update'); ?>
							<?= form_close(); ?>
						</fieldset>
					</div>
				</div>