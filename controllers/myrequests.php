<?php
class Myrequests extends Controller{
	protected function Index(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new myRequestsModel();
		$this->returnView($viewmodel->Index(), true);
	}

    protected function dReport(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new myRequestsModel();
		$this->returnView($viewmodel->dReport(), true);
	}

    protected function aRequests(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new myRequestsModel();
		$this->returnView($viewmodel->aRequests(), true);
	}
}