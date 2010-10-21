<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;utf-8" />
		<title><?php echo $page_title; ?></title>
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>inc/css/main.css" type="text/css" media="all">
		
		<script type="text/javascript" src="<?php echo base_url(); ?>inc/js/jquery-1.4.2.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>inc/js/fn.hint.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('table tr:even td').addClass('sec');
			})
			$(function() {
				$(":input").hint();
				$(":textarea").hint();
			});
		</script>
	</head>

	<body>
		<div id="wrapper">
			<div id="header">
				<div class="left">
					Left Header
				</div>
				<div class="right">
					<?php
					if($this->session->userdata('logged_in') == TRUE) {
						echo "Currently logged in as: ".$this->session->userdata('username');
						echo anchor('users/logout','Logout', 'class="submit"');
					} else {
						echo form_open('users/login', 'id="navlogin"');
						echo form_input('username','','title="Username"');
						echo form_password('password','','title="Password"');
						echo form_submit('','Login');
						echo form_close();
					}
					?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div id="main_conten">
				