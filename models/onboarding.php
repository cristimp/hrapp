<?php
class OnboardingModel extends Model{
	public function Index(){
		return;
	}

    public function onboardingList(){
        $this->query('SELECT * FROM applicants WHERE recruitment_pass = "yes" AND onboarding_pass = "tbc"');
		$rows = $this->resultSet();

		$post_rejected = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $post_accepted = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post_accepted['accepted_submit']))
        {
            $this->query("
            UPDATE `applicants` SET `onboarding_pass` = 'yes', `dpt` = :dpt WHERE `applicants`.`applicant_id` = :applicant_id;
            UPDATE `onboarding` SET `observatii_onb` = :feedback WHERE `onboarding`.`applicant_id` = :applicant_id2;
            INSERT INTO `users` (`applicant_id`, `name`, `email`, `password`) VALUES (:applicant_id, :name, :email, :password);
            INSERT INTO `user_permission` (`applicant_id`) VALUES (:applicant_id);
            ");
            $this->bind(':applicant_id', $post_accepted['idid']);
			$this->bind(':dpt', $post_accepted['department']);
            $this->bind(':applicant_id2', $post_accepted['idid']);
            $this->bind(':feedback', $post_accepted['reason']);
            $this->bind(':name', $post_accepted['first_name']);
            $this->bind(':email', $post_accepted['email']);

            // Parola este formata din primele doua litere din numele mic, apoi primele cifre din anul nasterii, apoi primele doua litere din numele de familie si ziua nasterii(de forma 01 sau 11); 
            $password = md5(substr($post_accepted['first_name'], 0, 2) . substr($post_accepted['bdate'], 0, 2) . substr($post_accepted['last_name'], 0, 2) . substr($post_accepted['bdate'], -2));
            $this->bind(':password', $password);

            $this->execute();
        }

		if(isset($post_accepted['rejected_submit']))
        {
            $this->query("
            UPDATE `applicants` SET `onboarding_pass` = 'no' WHERE `applicants`.`applicant_id` = :applicant_id;
            UPDATE `onboarding` SET `observatii_onb` = :feedback WHERE `onboarding`.`applicant_id` = :applicant_id2;");
            $this->bind(':applicant_id', $post_rejected['idid']);
            $this->bind(':applicant_id2', $post_rejected['idid']);
            $this->bind(':feedback', $post_rejected['reason']);
            $this->execute();
        }
		return $rows;
	}

    public function onboardingTasks(){
		return;
	}
}