<?php

/**
 * User controller
 * 
 * @author Dale Emasiri & Phil Hutchinson
 * @version 1.0
 */
class Users extends Controller {
	
	function index($errors = array()) {
		$template['page_view'] = 'login_page';
		$template['page_title'] = 'Login Page';
		$template['errors'] = $errors;
		$this->load->view('main/index', $template);
	}
	
	function regindex($errors = array()) {
		$template['page_view'] = 'register_form';
		$template['page_title'] = 'Registration Page';
		$template['errors'] = $errors;
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
		
		if(!$u->save()) {
			$this->regindex($u->error->all);
		}
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
		} else {
			$this->index($u->error->all);
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('users');
	}
}

/* End of file users.php */
/* Located: ./apps/controllers/ */