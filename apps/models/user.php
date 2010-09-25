<?php

class User extends DataMapper {
	
	// Create an array variable for each of the relationship type
	// Many to Many, One to One, Many to One
	public $has_many = array('anime');
	public $has_one = array('permission');
	// Validation array variable
	public $validation = array(
		/**
		 * An array with keys and values to define the field information and rules
		 * Rules are used for validation
		 */
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => array('required','trim')
		),
		array(
			'field' => 'surname',
			'label' => 'Surname',
			'rules' => array('required','trim')
		),
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => array('required','trim','unique','min_length'=>4)
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => array('required','trim','alpha_dash','min_length'=>6,'encrypt')
		),
		array(
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => array('required','trim','valid_email')
		)
	);
	
	function User() {
		parent::DataMapper();
	}
	
	function login() {
		// Create a new temp User() object
		$u = new User();
		// Get the user's stored records
		$u->where('username', $this->username)->get();
		// Retrieve the stored salt key for the user
		$this->salt = $u->salt;
		// Validate and get the user by their property value
		// this will run the encrypt command with the salt above
		$this->validate()->get();
		// If both the username and encrypted passwords match the records
		// then all of this user's details will populate the $u object.
		// If there isn't a match then the $u object is cleared of all data
		// including the ID, making it empty.
		if(empty($this->id)) {
			// Print a custom error message.
			$this->error_message('login', 'Username or password does not match our records.');
			return FALSE; // return a nil value
		} else {
			return TRUE; // login success!
		}
	}
	
	// Validation function to encrypt the password.
	// If you look at the $validation array you will see that encrypt is called in
	// one of the rules. This method will run in place of that.
	function _encrypt($field) {
		// Don't encrypt string if empty/
		if(!empty($this->{$field})) {
			// If salt does not already exist
			if(empty($this->salt)) {
				// Generate a salt key
				$this->salt = md5(uniqid(rand(), true));
			}
			$this->{$field} = sha1($this->salt.$this->{$field});
		}
	}
}

/* End of file: user.php */
/* Location: ./apps/models/ */