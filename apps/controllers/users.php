<?php

/**
 * User controller
 * 
 * @author Dale Emasiri & Phil Hutchinson
 * @version 1.0
 */
class Users extends Controller {
	
	function index() {
		$template['page_view'] = 'login_page';
		$template['page_title'] = 'Login Page';
		$this->load->view('main/index', $template);
	}
	
	function regindex() {
		$template['page_view'] = 'register_form';
		$template['page_title'] = 'Registration Page';
		$this->load->view('main/index', $template);
	}
	
	function register() {
		$u = new User();
		$u->username = $this->input->post('username');
		$u->password = $this->input->post('password');
		$u->email = $this->input->post('email');
		$u->first_name = $this->input->post('first_name');
		$u->surname = $this->input->post('surname');
		
		// Get the PID of registered users...
		$p = new Permission();
		$p->where('pname', 'Registered User')->get();
		$u->pid = $p->id;
		
		$u->save();
	}
	
	function login() {
		$u = new User();
		$u->username = $this->input->post('username');
		$u->password = $this->input->post('password');
		
		if($u->login()) {
			$p = new Permission();
			$p->where('id', $u->pid)->get();
			
			$data = array(
				'username' => $this->input->post('username'),
				'permission' => $p->pmod,
				'session_id' => md5($this->input->post('username').'_'.$p->pmod),
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);
			redirect('ucp');
			
			/*echo "Welcome ".$u->username;
			echo "You are logged in with the email address ".$u->email;
			echo "Your permissions are ". $p->pname;
			echo "<br />";
			echo "The current session id is ".$this->session->userdata('session_id');
			if($this->session->userdata('permission') == '9') {
				echo 'You are an ADMIN!';
			} else {
				echo 'Shut up you cunt';
			}
			echo "<br />";
			echo anchor("users/logout", "Logout");*/
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('users');
	}
}

/* End of file users.php */
/* Located: ./apps/controllers/ */