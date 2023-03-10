<?php
class Users extends Controller{
	protected function register(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function login(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}

	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
	}
}