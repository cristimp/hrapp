<div class="menu-content-container">

    <ul class="secondary-menu-ul">

     <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/events">Events</a></li>
     <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/hrActivities">HR</a></li>
    <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/marketingActivities">Marketing</a></li>
    <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/addActivities">Add activities</a></li>


    </ul>

</div>
<div class="content-container"><br />

<?php foreach($viewmodel as $item) :?>
    <a href="<?php echo ROOT_URL; ?>activities/editActivityProfile/?id=<?php echo $_GET['id']; ?>" type="button" class="btn btn-outline-dark">Edit activity</a> 
    <a href="<?php echo ROOT_URL; ?>activities/activityHRmng/?id=<?php echo $_GET['id']; ?>" type="button" class="btn btn-outline-dark">HR Management</a>
    <h1><?php echo $item['activity_name'];?> activity</h1>
<b>Date of the activity:</b> <?php echo $item['date_organized'];?><br>
<b>Location:</b> <?php echo $item['location'];?><br>
<b>Link to photos:</b> <?php echo $item['link_photos'];?><br>
<b>Outcomes of the activity:</b> <?php echo $item['activity_outcome'];?><br>
<b>Approached causes:</b> <?php echo $item['activity_cause'];?><br>
<b>Number of participants:</b> <?php echo $item['total_participants'];?> out of which <?php echo $item['volunteers'];?> volunteers, <?php echo $item['foreign_students'];?> Erasmus Students, <?php echo $item['trainers'];?> trainers, <?php echo $item['local_guests'];?> local guests.<br>
<b>Main responsible: </b> <?php 
foreach($viewmodel as $item) : 
    if($item['status'] == 'main_rep') { 
        $temp = $item['first_name']." ".$item['last_name'].",";
        echo $temp;
    }
endforeach;?><br>

<b>Organizers: </b> 
<?php $temp = "";
foreach($viewmodel as $item) : 
    if($item['status'] == 'org_team') {
        $temp = $temp.$item['first_name']." ".$item['last_name'].", "; 
    } 
endforeach; $temp = substr($temp,0,-2); echo $temp; ?><br>
<?php break; endforeach; ?>

</div>