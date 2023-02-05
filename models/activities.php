<?php
class ActivitiesModel extends Model{
	public function Index(){
		return;
    }

	public function addActivities(){
		
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
        if(isset($post['submit']))
        {
			$date = date('Y/m/d h:i:s a', time());
			
            $this->query("
            INSERT INTO activities (activity_name, activity_description, activity_dpt, effort_coord, effort_org, effort_volunteer, effort_participant, effort_meeting) 
			VALUES(:activity_name, :activity_description, :activity_dpt, :coord, :org, :volunteer, :participant, :meeting);");
            $this->bind(':activity_name', $post['activity_name']);
            $this->bind(':activity_description', $post['activity_description']);
			$this->bind(':activity_dpt', $post['deptA']);
			$this->bind(':coord', $post['effort_coord']);
			$this->bind(':org', $post['effort_org']);
			$this->bind(':volunteer', $post['effort_volunteer']);
			$this->bind(':participant', $post['effort_participant']);
			$this->bind(':meeting', $post['effort_meeting']);
            $this->execute();
        }
		return;
	}

	public function events(){
		$this->query('SELECT `id_activity`,`activity_name`,`activity_description`,`activity_dpt`,`date_organized`, 
			CASE activity_dpt WHEN "eventsA" THEN "Events" WHEN "projectsA" THEN "Projects" END AS activity_department
			FROM activities WHERE activity_dpt = "eventsA" OR activity_dpt = "projectsA"');
		$rows = $this->resultSet();
		return $rows;
	}

	public function hrActivities(){
		$this->query('SELECT *,CASE activity_dpt WHEN "hrA" THEN "HR" END AS activity_department FROM activities WHERE activity_dpt = "hrA"');
		$rows = $this->resultSet();
		return $rows;
	}

	public function marketingActivities(){
		$this->query('SELECT *,CASE activity_dpt WHEN "mktA" THEN "Marketing" END AS activity_department FROM activities WHERE activity_dpt = "mktA"');
		$rows = $this->resultSet();
		return $rows;
	}

	public function activityProfile(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
		$this->query('SELECT * FROM activities
		LEFT JOIN points_report ON activities.id_activity = points_report.id_activity
		LEFT JOIN applicants ON points_report.id_applicants = applicants.applicant_id
		WHERE activities.id_activity = :activity_id');

        $this->bind(':activity_id', htmlspecialchars($_GET['id']));
		$rows = $this->resultSet();
        return $rows;
	}

	public function editActivityProfile(){
		$this->query('SELECT *,
		CASE activity_dpt 
			WHEN "eventsA" THEN "Events" 
			WHEN "projectsA" THEN "Projects"
			WHEN "hrA" THEN "Human Resources"
			WHEN "mktA" THEN "Marketing"
		END AS activity_department
		FROM activities WHERE id_activity = :activity_id');
        $this->bind(':activity_id', htmlspecialchars($_GET['id']));
		$rows = $this->resultSet();
		

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
        if(isset($post['activityEdit']))
        {	
            $this->query("
            UPDATE `activities` SET 
			`activity_name` = :aname, `activity_description` = :adesc, `location` = :aloc, date_organized = :adate, 
			`link_photos` = :alink, `activity_outcome` = :aout, `total_participants` = :apart, 
			`volunteers` = :avol, `foreign_students` = :afor, `trainers` = :atrain, `local_guests` = :aguest, 
			`activity_cause` = :acause, `activity_dpt` = :dpt
			WHERE `activities`.`id_activity` = :activity_id;");

            $this->bind(':aname', $post['activity_name']);
            $this->bind(':adesc', $post['activity_description']);
			$this->bind(':adate', $post['activity_date']);
			$this->bind(':alink', $post['activity_photos']);
			$this->bind(':aout', $post['activity_outcome']);
			$this->bind(':apart', $post['activity_participantsV'] + $post['activity_participantsF'] + $post['activity_participantsT'] + $post['activity_participantsG']);
			$this->bind(':aloc', $post['activity_location']);
			$this->bind(':avol', $post['activity_participantsV']);
			$this->bind(':afor', $post['activity_participantsF']);
			$this->bind(':atrain', $post['activity_participantsT']);
			$this->bind(':aguest', $post['activity_participantsG']);
			$this->bind(':acause', $post['cause']);
			$this->bind(':dpt', $post['deptA']);
			$this->bind(':activity_id', htmlspecialchars($_GET['id']));

            $this->execute();
        }
		return $rows;	
	} 

	public function activityHRmng() {

		$this->query('
		SELECT * FROM activities, applicants 
		WHERE activities.id_activity = :activity_id AND applicants.onboarding_pass = "yes" AND date_retired IS NULL;
		');
		$this->bind(':activity_id', htmlspecialchars($_GET['id']));
		$rows = $this->resultSet();

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit']))
		{
			$this->query("
			INSERT INTO `points_report` 
		    (`id_applicants`, `id_activity`, `status`, `effort`) VALUES(:applicant_id, :activity_id, :sts, :effort);
			"
		    );
			
			if($post['main']){
			//	foreach ($post['main'] as $value) {
				$this->bind(':applicant_id', $post['main']);
				$this->bind(':activity_id', htmlspecialchars($_GET['id']));
				$this->bind(':sts', 'main_rep');
				$this->bind(':effort', $post['effort_main']);
				$this->execute(); //}
			}

			if($post['organizers']) { 
				foreach ($post['organizers'] as $value) {
				$this->bind(':applicant_id', $value);
				$this->bind(':activity_id', htmlspecialchars($_GET['id']));
				$this->bind(':sts', 'org_team');
				$this->bind(':effort', $post['effort_org']);
				$this->execute(); }
			}

			if($post['volunteers']) { 
				foreach ($post['volunteers'] as $value) {
				$this->bind(':applicant_id', $value);
				$this->bind(':activity_id', htmlspecialchars($_GET['id']));
				$this->bind(':sts', 'volunteer_team');
				$this->bind(':effort', $post['effort_volunteer']);
				$this->execute(); }
			}

			if($post['participants']) { 
				foreach ($post['participants'] as $value) {
				$this->bind(':applicant_id', $value);
				$this->bind(':activity_id', htmlspecialchars($_GET['id']));
				$this->bind(':sts', 'participant');
				$this->bind(':effort', $post['effort_participant']);
				$this->execute(); }
			}
		}
		return $rows;
	}
}