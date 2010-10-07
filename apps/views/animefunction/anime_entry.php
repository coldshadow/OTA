				<div id="anime_entry_container">
					<div>
						<fieldset id="anime">
							<?= form_open('animes/addanime'); ?>
							<legend>Enter Series Info</legend>
							<hr/>
							<?= form_input('anime_name', '', 'title="Name"'); ?>
							<?= form_input('anime_description', '', 'title="Synopsis"'); ?>
							<?= form_input('anime_episodes', '', 'title="Episodes"'); ?>
							<?= form_input('anime_ova', '', 'title="OVA\'s"'); ?>
							<?= form_input('anime_alt_name', '', 'title="Alternative Name"'); ?>
							<?= form_input('anime_watched_status', '', 'title="Watched status"'); ?>
							<?= form_submit('submit', 'Add Anime'); ?>
							<?= form_close(); ?>
						</fieldset>
					</div>
				</div>