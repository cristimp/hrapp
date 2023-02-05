<?php
class FormModel extends Model{
	
	public function Index(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['submit'])){
			/*		if($submit['title'] == '' || $submit['body'] == '' || $submit['link'] == ''){
						Messages::setMsg('Please Fill In All Fields', 'error');
						return;
					}*/
					// Insert into MySQL
					
					$this->query('
					INSERT INTO applicants (first_name, last_name, email, phone_number, city, country, date_birth, fb_profile, university, language, skillwish, facebook, instagram, website, friends, erasmus, iro, esners, poster) 
					VALUES(:first_name, :last_name, :email, :phone_number, :city, :country, :date_birth, :fb_profile, :university, :language, :skills, :facebook, :instagram, :website, :friends, :erasmus, :iro, :esners, :poster)
					');

					$this->bind(':first_name', $post['first_name']);
					$this->bind(':last_name', $post['last_name']);
					$this->bind(':email', $post['email']);
					$this->bind(':phone_number', $post['phone_number']);
					$this->bind(':city', $post['city']);
					$this->bind(':country', $post['country']);
					$this->bind(':date_birth', $post['date_birth']);
					$this->bind(':fb_profile', $post['fb_profile']);
					$this->bind(':university', $post['university']);
					$this->bind(':language', $post['language']);
					$this->bind(':skills', $post['skills']);
			//		$this->bind(':interview', $post['interview']);

					if(isset($post['facebook']))
					$this->bind(':facebook', 1); else $this->bind(':facebook', 0);

					if(isset($post['instagram']))
					$this->bind(':instagram', 1); else $this->bind(':instagram', 0);

					if(isset($post['website']))
					$this->bind(':website', 1); else $this->bind(':website', 0);

					if(isset($post['friends']))
					$this->bind(':friends', 1); else $this->bind(':friends', 0);

					if(isset($post['erasmus']))
					$this->bind(':erasmus', 1); else $this->bind(':erasmus', 0);

					if(isset($post['iro']))
					$this->bind(':iro', 1); else $this->bind(':iro', 0);

					if(isset($post['esners']))
					$this->bind(':esners', 1); else $this->bind(':esners', 0);

					if(isset($post['poster']))
					$this->bind(':poster', 1); else $this->bind(':poster', 0);

					$this->execute();
					
					// Verify
					if($this->lastInsertId()){
					// Redirect
					header('Location: '.ROOT_URL.'forms/thankYou');
			}
		}
		return;
	}

	public function thankYou(){
		return;
	}
}

?>