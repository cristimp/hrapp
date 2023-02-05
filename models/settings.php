<?php
class SettingsModel extends Model{
	public function Index(){
        return;
	}

	public function accounts(){
		$this->query(' 
		SELECT * FROM applicants WHERE applicants.onboarding_pass = "yes"; 
		');
		$rows = $this->resultSet();

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['assign']))
		{
			$this->query("
			UPDATE `user_permission` SET 
			`isAdmin` = :admin, `isModerator` = :moderator, `isEditor` = :editor 
			 WHERE `applicant_id` = :id;
			");

			if(isset($post['admins'])){
				foreach ($post['admins'] as $value) {
				$this->bind(':admin', "1");
				$this->bind(':moderator', "1");
				$this->bind(':editor', "1");
				$this->bind(':id', $value);
				$this->execute(); }
			}

			if(isset($post['moderator'])){
				foreach ($post['moderator'] as $value) {
				$this->bind(':admin', '0');
				$this->bind(':moderator', '1');
				$this->bind(':editor', '1');
				$this->bind(':id', $value); 
				$this->execute(); }
			}

			if(isset($post['editor'])){
				foreach ($post['editor'] as $value) {
				$this->bind(':admin', '0');
				$this->bind(':moderator', '0');
				$this->bind(':editor', '1');
				$this->bind(':id', $value); 
				$this->execute(); }
			}
		}

		if(isset($post['revoke']))
		{
			$this->query("
			UPDATE `user_permission` SET 
			`isAdmin` = :admin, `isModerator` = :moderator, `isEditor` = :editor 
			 WHERE `applicant_id` = :id;
			");

			if(isset($post['rightsoff'])){
				foreach ($post['rightsoff'] as $value) {
				$this->bind(':admin', "0");
				$this->bind(':moderator', "0");
				$this->bind(':editor', "0");
				$this->bind(':id', $value);
				$this->execute(); }
			}
		}

/*		if(isset($post['create_accounts'])) {
			for($i=0; $i < count($rows); $i++) {
				$this->query("
				INSERT INTO users (applicant_id, username, name, email, password) 
				VALUES (:id, :username, :name, :email, :pass);
				INSERT INTO user_permission (applicant_id, isAdmin, isModerator, isEditor, isDefault)
				VALUES (:id, 0, 0, 0, 1);
				");

				$this->bind(':id', $rows[$i]['applicant_id']);
				$this->bind(':username', $rows[$i]['email']);
				$this->bind(':name', $rows[$i]['first_name']);
				$this->bind(':email', $rows[$i]['email']);

				$password = md5(substr($rows[$i]['first_name'], 0, 2) . substr($rows[$i]['date_birth'], 0, 2) . substr($rows[$i]['last_name'], 0, 2) . substr($rows[$i]['date_birth'], -2));
				$this->bind(':pass', $password);
				$password1 = substr($rows[$i]['first_name'], 0, 2) . substr($rows[$i]['date_birth'], 0, 2) . substr($rows[$i]['last_name'], 0, 2) . substr($rows[$i]['date_birth'], -2);

				$this->execute();

				echo "Created the user: " . $rows[$i]['email'] . " password: " . $password1 . " name: " . $rows[$i]['first_name'] . " " . $rows[$i]['last_name'] . PHP_EOL;
				}
		} */
        return $rows;
	}
}
