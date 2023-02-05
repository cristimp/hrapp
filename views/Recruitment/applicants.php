<div class="menu-content-container">

<ul class="secondary-menu-ul">
  <li class="secondary-menu-list">Applicants</li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>forms">Recruitment Form</a></li>
</ul>

</div>
<div class="content-container">
            <div class="content-container-header">
				<table>
					<tr>
						<th><div class="content-container-header-th1">Applicants list</div></th>
						<th><div class="content-container-header-th2"><a href="#"><img class="button-icon" src="<?php echo ROOT_PATH; ?>assets/icons/bell.png">Sort</a></div></th>
						<th><div class="content-container-header-th3"><a href="#"><img class="button-icon" src="<?php echo ROOT_PATH; ?>assets/icons/bell.png">Filter</div></th>
					</tr>
				</table>
			</div>
            
				<table class="table">
					<theader>
					<tr>
                        <th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Date applied</th>
						<th>Interview feedback</th>
						<th>...</th>
					</tr>
					</theader>
					<tbody>
					<?php foreach($viewmodel as $item) : ?>
					<tr>
                        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <td class="members-content-data"><?php echo $item['applicant_id']; ?></td>
						<td class="members-content-data"><a href="<?php echo ROOT_URL; ?>recruitment/applicantProfile/?id=<?php echo $item['applicant_id']; ?>"><?php echo $item['first_name']; ?></td>
						<td class="members-content-data"><?php echo $item['last_name']; ?></td>
						<td class="members-content-data"><?php echo $item['date_applied']; ?></td>
						<td class="members-content-data"><input type="text" name="reason"></td>
						<td class="members-content-data">
                            <input type="hidden" name="idid" value="<?php echo $item['applicant_id']; ?>">
                            <input type="submit" name="accepted_submit" value="Accepted"> / 
                            <input type="submit" name="rejected_submit" value="Rejected">
                        </td>
                        </form>
                    </tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>

</div>