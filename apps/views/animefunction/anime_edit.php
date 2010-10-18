				<div id="anime_edit_container">
					<div>
						<fieldset id="anime">
							<?= form_open('animes/updateanime'); ?>
							<legend>Enter Series Info</legend>
							<hr/>
							<?= form_input('id', $row->id, 'disabled="disabled"'); ?>
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
								if($field_name == 'anime_description') {
									echo form_textarea($field_name, $row->$field_name);
								} elseif($field_name == 'anime_watched_status') {
									$data = array(
										'0' => 'Not Watched',
										'1' => 'Part Watched',
										'2' => 'All Watched'
									);
									echo form_dropdown($field_name, $data, $row->$field_name);
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