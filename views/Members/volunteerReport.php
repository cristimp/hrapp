<div class="menu-content-container">

<ul class="secondary-menu-ul">

  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>members/">Lista voluntarilor</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>members/pointsSystem">Sistem de punctaje</a></li>

</ul>

</div>

<div class="content-container">
    <?php if (count($viewmodel) != 0) { ?>
    <h3>Detailed report for <?php echo $viewmodel[0]['first_name'] . " " . $viewmodel[0]['last_name']; ?></h3>

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
		<form onsubmit="return true" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <td><?php echo $item['activity_name']; ?></td>
                    <td><?php echo $item['date_organized']; ?></td>
                    <td>
                        <select class="col-md-7" name="position" required>
                            <option value="<?php echo $item['roleName']; ?>"><?php echo $item['status']; ?></option>
                            <option value="main_rep">Coordinator</option>
                            <option value="org_team">OC Member</option>
                            <option value="volunteer_team">Project Management</option>
                            <option value="participant">Participant</option>
                            <option value="internal_meetin">Internal meeting</option>
                        </select>
                    </td>
                    <td>
                        <?php echo $item['rolePoints']; ?>
                    </td>
                    <td>
                    <input type="number" name="report_effort" value="<?php echo $item['effort']; ?>">
                    </td>
                    <td>
                        <input type="hidden" name="report_id" value="<?php echo $item['id']; ?>">
                        <input type="submit" name="update_points" value="Update">
                        <input type="submit" name="delete_points" value="Delete">
                    </td>
		</form>
                </tr>
                <?php endforeach; } else { echo "NO DATA TO SHOW!"; } ?>

</div>

<script>
$(document).ready( function () {
    $('#table_dreports').DataTable();
} );
</script>