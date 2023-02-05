<div class="menu-content-container">

<ul class="secondary-menu-ul">

  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>myrequests">Overview</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>myrequests/dreport">Detailed report</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>myrequests/arequests">Activities</a></li>

</ul>

</div>

<div class="content-container">
    <h3>Detailed report for <?php echo $_SESSION['user_data']['name']; ?></h3>

    <table class="" id="table_dreports">
            <thead>
                <tr>
                    <th>Activity name</th>
                    <th>Date</th>
                    <th>Position</th>
                    <th>Points</th>
                    <th>Effort</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($viewmodel as $item) : ?>
                <tr>
                    <td><?php echo $item['activity_name']; ?></td>
                    <td><?php echo $item['date_organized']; ?></td>
                    <td>
                        <select class="col-md-7" name="position" required>
                            <option value=""><?php echo $item['status']; ?></option>
                            <option value="main_rep">Coordinator</option>
                            <option value="org_team">OC Member</option>
                            <option value="volunteer_team">Project Management</option>
                            <option value="participant">Participant</option>
                            <option value="internal_meetin">Internal meeting</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="rolepoints" value="<?php echo $item['rolePoints']; ?>">
                    </td>
                    <td>
                    <input type="number" name="rolepoints" value="<?php echo $item['effort']; ?>">
                    </td>
                    <td>
                        <input type="hidden" name="aid" value="<?php echo $item['id_activity']; ?>">
                        <input type="submit" name="correct_request" value="Correction N/A">
                    </td>
                </tr>
                <?php endforeach; ?>

</div>

<script>
$(document).ready( function () {
    $('#table_dreports').DataTable();
} );
</script>