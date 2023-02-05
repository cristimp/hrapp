<?php
class Onboarding extends Controller{
	protected function Index(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new OnboardingModel();
		$this->returnView($viewmodel->Index(), true);
	}

    protected function onboardingList(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new OnboardingModel();
		$this->returnView($viewmodel->onboardingList(), true);
	}

    protected function onboardingTasks(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new OnboardingModel();
		$this->returnView($viewmodel->onboardingTasks(), true);
	}
}