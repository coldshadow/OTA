<?php echo $data_table; ?>
<hr/>
<div id="anime_entry_container">
	<div>
		<fieldset id="anime">
			<?= form_open('animes/addanime'); ?>
			<legend>Enter Series Info</legend>
			<hr/>
			<?= form_label('Name', 'anime_name') ?>
			<?= form_input('anime_name', '', 'title="Name"'); ?>
			<?= form_label('Description', 'anime_description') ?>
			<?= form_textarea('anime_description', '', 'title="Synopsis"'); ?>
			<?= form_label('Episodes', 'anime_episodes') ?>
			<?= form_input('anime_episodes', '', 'title="Episodes"'); ?>
			<?= form_label('OVAs', 'anime_ova') ?>
			<?= form_input('anime_ova', '', 'title="OVA\'s"'); ?>
			<?= form_label('Alt Name', 'anime_alt_name') ?>
			<?= form_input('anime_alt_name', '', 'title="Alternative Name"'); ?>
			<?php
				$data = array(
					'0' => 'Not Watched',
					'1' => 'Part Watched',
					'2' => 'All Watched'
				);
				echo form_dropdown('anime_watched_status', $data, '0');
			?><br/><br/>
			<?= form_submit('submit', 'Add Anime'); ?>
			<?= form_close(); ?>
		</fieldset>
	</div>
</div>