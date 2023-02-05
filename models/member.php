<?php
class MemberModel extends Model{
	public function Index(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if(isset($post['lastmonths'])) {
			//	echo "<script>window.alert('".$_GET['last_months']."')</script>";
			//	header('Location: '.ROOT_URL.'');
			$this->query('
			SELECT *, GetPointsMonths(applicant_id, :month) AS punctajTotal, GetEffortMonth(applicant_id, :month) AS totalEffort FROM applicants 
			LEFT JOIN points_report ON applicants.applicant_id = points_report.id_applicants 
			LEFT JOIN activities ON points_report.id_activity = activities.id_activity 
			WHERE onboarding_pass = "yes" AND date_retired IS NULL
			GROUP BY applicant_id;
			');
			$this->bind(':month', htmlspecialchars($post['last_months']));
			$rows = $this->resultSet();
		
		} elseif(isset($post['to_from'])) {
			$this->query('
			SELECT *, GetPointsBetween(applicant_id, :month_from, :month_to) AS punctajTotal, GetEffortBetween(applicant_id, :month_from, :month_to) AS totalEffort FROM applicants 
			LEFT JOIN points_report ON applicants.applicant_id = points_report.id_applicants 
			LEFT JOIN activities ON points_report.id_activity = activities.id_activity 
			WHERE onboarding_pass = "yes" AND date_retired IS NULL 
			GROUP BY applicant_id;
			');
			$this->bind(':month_from', htmlspecialchars($post['from_month'].'-01'));
			$this->bind(':month_to', htmlspecialchars($post['to_month'].'-01'));
			$rows = $this->resultSet();		
		} else {
			$this->query('
			SELECT *, GetPoints(applicant_id) AS punctajTotal, GetEffort(applicant_id) AS totalEffort FROM applicants 
			LEFT JOIN points_report ON applicants.applicant_id = points_report.id_applicants
			LEFT JOIN activities ON points_report.id_activity = activities.id_activity 
			WHERE onboarding_pass = "yes" AND date_retired IS NULL
			');
			$rows = $this->resultSet();
		}
		return $rows;
	}

	public function volunteerProfile(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
		$this->query('
		SELECT *, GetEffort(:applicant_id) AS totalEffort FROM applicants
        		LEFT JOIN onboarding ON applicants.applicant_id = onboarding.applicant_id
        		LEFT JOIN points_report ON applicants.applicant_id = points_report.id_applicants
				WHERE applicants.applicant_id = :applicant_id
        		GROUP BY applicants.applicant_id;
		');
        $this->bind(':applicant_id', htmlspecialchars($_GET['id']));
		$rows = $this->resultSet();
		
		if(isset($post['retiredDate'])) {
			$this->query('UPDATE applicants SET date_retired = :dateRetired WHERE applicants.applicant_id = :id;');

			$this->bind(':dateRetired', $post['retiredDate']);
			$this->bind(':id', htmlspecialchars($_GET['id']));

			$this->execute();
		}

		$logo1 = "../assets/logo/RO-iasi-logo-colour_black.png";
		if(isset($post['getAdv'])) {
			ob_start();
			$pdf = new CERTIFICATE();
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Times','',12);
			$pdf->addSociete( "Erasmus Student Network Iasi",
                 			  "Str. Titu Maiorescu, nr.7, camera 2, Camin C6,\n" .
                  			  "Mun. Iasi, Jud. Iasi\n".
                  			  "E-mail: esn.iasi@gmail.com\n" .
                  			  "Website: http://iasi.esn.ro/\n". 
							  "CIF: 38737930" );
			// Logo
			$pdf->Image(ROOT_URL.'assets/logo/RO-iasi-logo-colour_black.png',150,8,55);
			$pdf->Ln(25);
			// Title
			$pdf->SetFont('Times','',22);
			$pdf->Cell(0,0,'Adeverinta de voluntariat',0,0,'C');
			$pdf->Ln(8);
	//		$pdf->Cell(0,0,"Nr. 1/2021",0,0,'C');
			// Line break
			$pdf->Ln(20);
			$pdf->SetFont('Times','',14);
	//		$pdf->MultiCell(0,5,);
			foreach( $rows as $row ) :
			$column_width = ($pdf->GetPageWidth()-30);

			$date_joined = date('d/M/Y', strtotime($row['date_approved'])); //date format

			if($row['date_retired'] == null)
			$date_resigned = date("d/M/Y"); else $date_resigned = date('d/M/Y', strtotime($row['date_retired']));

			$pdf->MultiCell(0,8, "Prin prezenta se adevereste ca ".$row['first_name']." ".$row['last_name']." a activat ca voluntar, pentru un numar total de ".$row['totalEffort']." ore, in cadrul ASOCIATIEI ERASMUS STUDENT NETWORK (ESN) IASI, in perioada ".$date_joined." - ".$date_resigned.".", 0, 'J');
			$pdf->MultiCell(0,8, "Printre activitatile desfasurate se numara:", 0, 'J');
			$pdf->Cell(10);
			$pdf->MultiCellBlt($column_width,8,chr(149),"Organizarea si coordonarea de evenimente concepute pentru integrarea studentilor internationali in societatea locala;");
			$pdf->MultiCellBlt($column_width,8,chr(149),"Participarea in activitati legate de cauzele in educatie, aptitudini de munca, incluziune sociala, cultura, mediu si sanatate;");
			$pdf->MultiCellBlt($column_width,8,chr(149),"Indeplinirea unor sarcini specifice in cadrul departamentului de ".$row['dpt'].".");
//			$column_width = ($pdf->GetPageWidth()-30)/2;
			$pdf->MultiCellBlt($column_width, 80, "","Data: " . date("d.m.Y") );
//			$pdf->SetXY($column_width, 176);
			$pdf->SetFont('Times','',10);
			$pdf->MultiCellBlt($column_width, 25,"","Adeverinta generata automat prin HR-App: http://hrapp.esn.ro/ ",0,'C');

			endforeach;
			$pdf->Output();
			ob_end_flush();
		}
        return $rows;	
	}
	
	public function pointsSystem(){
		$this->query('
		CALL `PointsSystem`();
		');
		$rows = $this->resultSet();
        return $rows;
	}

	public function birthdays(){
		$this->query('
		SELECT * FROM (
			select applicant_id, date_retired, first_name, last_name, recruitment_pass, onboarding_pass, date_birth, datediff(DATE_FORMAT(date_birth,concat("%",YEAR(CURDATE()),"-%m-%d")),NOW()) as no_of_days from applicants
		union
			select applicant_id, date_retired,  first_name, last_name, recruitment_pass, onboarding_pass, date_birth,
			datediff(DATE_FORMAT(date_birth,concat("%",(YEAR(CURDATE())+1),"-%m-%d")),NOW()) as no_of_days from applicants
		) AS upcomingbirthday
		WHERE no_of_days>0 AND recruitment_pass="yes" AND onboarding_pass="yes" AND date_retired IS NULL
		GROUP BY applicant_id 
		ORDER BY no_of_days asc;
		');
		$rows = $this->resultSet();
		return $rows;
	}

	public function volunteerReport(){
		$this->query('
		SELECT *, applicants.first_name, applicants.last_name,
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
		LEFT JOIN applicants on points_report.id_applicants = applicants.applicant_id
		WHERE points_report.id_applicants = :id; 
		');

		$this->bind(':id', htmlspecialchars($_GET['id']));
		$rows = $this->resultSet();

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['update_points'])) {
			
			$this->query('
			UPDATE points_report 
			SET status = :status, effort = :effort
			WHERE points_report.id = :r_id;
			');

			$this->bind(':status', $post['position']);
			$this->bind(':effort', $post['report_effort']);
			$this->bind(':r_id', $post['report_id']);

			$this->execute();
			header("Refresh:0");
		}

		if(isset($post['delete_points'])) {
			
			$this->query('
			DELETE FROM points_report WHERE points_report.id = :r_id;
			');
			$this->bind(':r_id', $post['report_id']);

			$this->execute();
			
			header("Refresh:0");
		}
		return $rows;
    }
}