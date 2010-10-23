				<div id="ucp_container">
					<p><?php echo $this->session->userdata('username'); ?>'s Profile.</p>
					<p>
						<?php
							$u = new User();
							$u->get();
							echo 'this is the id: ' . $u->id;
							echo anchor('ucp/editprofile/' . $u->id, 'Edit Profile');
						?>
					</p>
				</div>