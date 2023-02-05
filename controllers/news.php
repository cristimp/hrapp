<?php
class News extends Controller{
	protected function Index(){
	/*	if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		} */
		$viewmodel = new NewsModel();
		$this->returnView($viewmodel->Index(), true);
	}

    protected function addPost(){
		if(!isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new NewsModel();
		$this->returnView($viewmodel->addPost(), true);
	}

    protected function boardMembers(){
		if(!isset($_SESSION['is_logged_in'])) {
			header('Location: '.ROOT_URL.'');
		}
		$viewmodel = new NewsModel();
		$this->returnView($viewmodel->boardMembers(), true);
	}
}