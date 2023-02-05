<?php
class Activities extends Controller{
	protected function Index(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function addActivities(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->addActivities(), true);
	}

	protected function hrActivities(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->hrActivities(), true);
	}

	protected function marketingActivities(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->marketingActivities(), true);
	}

	protected function events(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->events(), true);
	}

	protected function activityProfile(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->activityProfile(), true);
	}

	protected function editActivityProfile(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->editActivityProfile(), true);
	}

	protected function editActivityProfileEdit(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->editActivityProfileEdit(), true);
	}
	
	protected function activityHRmng(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new ActivitiesModel();
		$this->returnView($viewmodel->activityHRmng(), true);
	}
}