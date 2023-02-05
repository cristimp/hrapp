<?php
class RecruitmentModel extends Model{
	public function Index(){
		return;
	}

    public function applicantProfile(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
		$this->query('SELECT * FROM applicants WHERE applicant_id = :applicant_id');
        $this->bind(':applicant_id', htmlspecialchars($_GET['id']));
		$rows = $this->resultSet();
        return $rows;
	}

    public function applicants(){
		$this->query('SELECT * FROM applicants WHERE recruitment_pass = "tbc"');
		$rows = $this->resultSet();
		
        

        $post_rejected = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $post_accepted = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($post_rejected['rejected_submit']))
        {
            $this->query("
            UPDATE `applicants` SET `recruitment_pass` = 'no' WHERE `applicants`.`applicant_id` = :applicant_id;
            INSERT INTO `onboarding` (`onboarding_id`, `applicant_id`, `feedback`) VALUES (NULL, :applicant_id2, :feedback );");
            $this->bind(':applicant_id', $post_rejected['idid']);
            $this->bind(':applicant_id2', $post_rejected['idid']);
            $this->bind(':feedback', $post_rejected['reason']);
            $this->execute();
        }

        if(isset($post_accepted['accepted_submit']))
        {
            $this->query("
            UPDATE `applicants` SET `recruitment_pass` = 'yes' WHERE `applicants`.`applicant_id` = :applicant_id;
            INSERT INTO `onboarding` (`onboarding_id`, `applicant_id`, `feedback`) VALUES (NULL, :applicant_id2, :feedback );");
            $this->bind(':applicant_id', $post_accepted['idid']);
            $this->bind(':applicant_id2', $post_accepted['idid']);
            $this->bind(':feedback', $post_accepted['reason']);
            $this->execute();
        }
        return $rows;
	}
}