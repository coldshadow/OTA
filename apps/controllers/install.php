<?php

/**
 * Installation Controller
 * 
 * MySQL installation scripts for creating and dropping all
 * required tables.
 * 
 * @author Dale Emasiri & Phil Hutchinson
 * @version 1.0
 */
class Install extends Controller {
	
	function index() {
		$template['page_view'] = 'install/index';
		$template['page_title'] = 'Installation';
		$this->load->view('main/index', $template);
	}
	
	function super_create() {
		$this->create_user();
		$this->create_anime();
		$this->create_permission();
		$this->create_admin_permission();
		$this->create_user_permission();
		redirect('install');
	}
	
	function create_user() {
		$data = 'CREATE TABLE IF NOT EXISTS users (
			id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			first_name varchar(25) NOT NULL,
			surname varchar(25) NOT NULL,
			username varchar(25) NOT NULL,
			password varchar(50) NOT NULL,
			email varchar(100) NOT NULL,
			salt varchar(50) NOT NULL,
			pid int(11) NOT NULL
		)';
		return $this->db->query($data);
	}
	
	function create_permission() {
		$data = 'CREATE TABLE IF NOT EXISTS permissions (
			id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			pmod int(11) NOT NULL,
			pname varchar(25) NOT NULL
		)';
		return $this->db->query($data);
	}
	
	function create_admin_permission() {
		$data = "INSERT INTO permissions (pmod, pname) VALUES ('9', 'Site Admin')";
		return $this->db->query($data);
	}
	
	function create_user_permission() {
		$data = "INSERT INTO permissions (pmod, pname) VALUES ('1', 'Registered User')";
		return $this->db->query($data);
	}
	
	function create_anime() {
		$data = 'CREATE TABLE IF NOT EXISTS animes (
			id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			anime_name varchar(50) NOT NULL,
			anime_description text NOT NULL,
			anime_episodes int(11) NOT NULL,
			anime_ova int(11) NOT NULL,
			anime_alt_name varchar(50) NOT NULL,
			anime_watched_status int(11) NOT NULL
		)';
		return $this->db->query($data);
	}
	
	function super_drop() {
		$this->drop_user();
		$this->drop_anime();
		$this->drop_permission();
		redirect('install');
	}
	
	function drop_user() {
		return $this->db->query('DROP TABLE IF EXISTS users');
	}
	
	function drop_permission() {
		return $this->db->query('DROP TABLE IF EXISTS permissions');
	}
	
	function drop_anime() {
		return $this->db->query('DROP TABLE IF EXISTS animes');
	}
	
	function register_admin() {
		$u = new User();
		$u->username = $this->input->post('username');
		$u->password = $this->input->post('password');
		$u->email = $this->input->post('email');
		$u->first_name = $this->input->post('first_name');
		$u->surname = $this->input->post('surname');
		
		// Get the PID of registered users...
		$p = new Permission();
		$p->where('pname', 'Site Admin')->get();
		$u->pid = $p->id;
		
		$u->save();
		redirect('install');
	}
	
}
/* End of file: install.php */
/* Located: ./apps/controllers/ */