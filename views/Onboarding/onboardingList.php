<div class="menu-content-container">

    <ul class="secondary-menu-ul">
        <li class="secondary-menu-list"><a href="#Onboarding List">Onboarding list</a></li>
        <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>onboarding/onboardingTasks">Onboarding Tasks</a>
        </li>
    </ul>

</div>

<div class="content-container">
    <div class="content-container-header">
        <table>
            <tr>
                <th>
                    <div class="content-container-header-th1">Applicants list</div>
                </th>
                <th>
                    <div class="content-container-header-th2"><a href="#"><img class="button-icon"
                                src="<?php echo ROOT_PATH; ?>assets/icons/bell.png">Sort</a></div>
                </th>
                <th>
                    <div class="content-container-header-th3"><a href="#"><img class="button-icon"
                                src="<?php echo ROOT_PATH; ?>assets/icons/bell.png">Filter</div>
                </th>
            </tr>
        </table>
    </div><br />
    

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Chosen Department</th>
                    <th>Participation</th>
                    <th>Observations</th>
                    <th>Decision</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($viewmodel as $item) : ?>
            <tr>
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <td class="members-content-data"><?php echo $item['applicant_id']; ?></td>
                    <td class="members-content-data"><a
                            href="<?php echo ROOT_URL; ?>recruitment/applicantProfile/?id=<?php echo $item['applicant_id']; ?>"><?php echo $item['first_name']; ?>
                            <input type="hidden" name="first_name" value="<?php echo $item['first_name']; ?>">
                    </td>
                    <td class="members-content-data"><?php echo $item['last_name']; ?>
                        <input type="hidden" name="last_name" value="<?php echo $item['last_name']; ?>">
                    </td>
                    <td class="members-content-data">
                        <select class="col-md-7" name="department" required>
                            <option value="">Open this select menu</option>
                            <option value="Events">Events</option>
                            <option value="Human Resources">Human Resources</option>
                            <option value="Project Management">Project Management</option>
                            <option value="Photography">Photography</option>
                            <option value="PR/Marketing">PR/Marketing</option>
                            <option value="Copywriting">Copywriting</option>
                        </select></td>
                    <td class="members-content-data">75%</td>
                    <td class="members-content-data"><input type="text" name="reason"></td>
                    <td class="members-content-data">
                        <input type="hidden" name="idid" value="<?php echo $item['applicant_id']; ?>">
                        <input type="hidden" name="email" value="<?php echo $item['email']; ?>">
                        <input type="hidden" name="bdate" value="<?php echo $item['date_birth']; ?>">
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

<script>
</script>