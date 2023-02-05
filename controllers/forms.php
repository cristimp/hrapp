<?php
class Forms extends Controller{
	protected function Index(){
	/*	if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		} */
		$viewmodel = new FormModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function thankYou(){
		$viewmodel = new FormModel();
		$this->returnView($viewmodel->thankYou(), true);
	}
}