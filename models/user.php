<?php
class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}

			// Insert into MySQL
			$this->query('INSERT INTO users (name, username, email, password) VALUES(:name, :username,:email, :password)');
			$this->bind(':username', $post['username']);
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			// Compare Login
			$this->query('
			SELECT * FROM users 
			LEFT JOIN user_permission ON users.applicant_id = user_permission.applicant_id
			WHERE email = :email AND password = :password'
		);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['applicant_id'],
					"name"	=> $row['name'],
					"email"	=> $row['email']
				);
				if($row['isAdmin'] == 1) {
					$_SESSION['isAdmin'] = true;
				}
				
				header('Location: '.ROOT_URL.'members');
			} else {
				Messages::setMsg('Incorrect Login', 'error');
			}
		}
		return;
	}
}