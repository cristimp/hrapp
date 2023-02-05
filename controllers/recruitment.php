<?php
class Recruitment extends Controller{
	public function Index(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new RecruitmentModel();
		$this->returnView($viewmodel->Index(), true);
	}

    public function applicants(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new RecruitmentModel();
		$this->returnView($viewmodel->applicants(), true);
	}

	public function applicantProfile(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new RecruitmentModel();
		$this->returnView($viewmodel->applicantProfile(), true);
	}
}