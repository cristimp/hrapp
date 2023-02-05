<?php
class myRequestsModel extends Model{
	public function Index(){
		return;
	}

    public function dReport(){
		$this->query('
		SELECT *,
		CASE points_report.status 
		WHEN "main_rep" THEN "Coordinator" 
		WHEN "org_team" THEN "OC Member" 
		WHEN "volunteer_team" THEN "Volunteer"
		WHEN "participant" THEN "Participant"
		WHEN "internal_meetings" THEN "Org. Meetings" 
		END AS status
		FROM points_report
		LEFT JOIN activities ON points_report.id_activity = activities.id_activity
        LEFT JOIN pointssystem on points_report.status = pointssystem.roleName
		WHERE points_report.id_applicants = :id; 
		');

		$this->bind(':id', $_SESSION['user_data']['id']);
		$rows = $this->resultSet();
		return $rows;
	}

    public function aRequests(){
		return;
	}
}