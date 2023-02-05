<?php
class Settings extends Controller{
	protected function Index(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new SettingsModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function accounts(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new SettingsModel();
		$this->returnView($viewmodel->accounts(), true);
	}
}