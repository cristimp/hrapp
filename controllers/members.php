<?php
class Members extends Controller{

	protected function Index(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new MemberModel();
		$this->returnView($viewmodel->Index(), true);
	} 

	protected function volunteerProfile(){
		if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['id'] == $_GET['id']) {
			$viewmodel = new MemberModel();
			$this->returnView($viewmodel->volunteerProfile(), true);
		}

		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new MemberModel();
		$this->returnView($viewmodel->volunteerProfile(), true);
	}
	
	protected function pointsSystem(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new MemberModel();
		$this->returnView($viewmodel->pointsSystem(), true);
	}

	protected function birthdays(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new MemberModel();
		$this->returnView($viewmodel->birthdays(), true);
	}

	protected function volunteerReport(){

		if(isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['id'] == $_GET['id']) {
			$viewmodel = new MemberModel();
			$this->returnView($viewmodel->volunteerProfile(), true);
		}

		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new MemberModel();
		$this->returnView($viewmodel->volunteerReport(), true);
	}
}