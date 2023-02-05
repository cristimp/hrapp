<div class="menu-content-container">

<ul class="secondary-menu-ul">

  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/events">Events</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/hrActivities">HR</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/marketingActivities">Marketing</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/addActivities">Add activities</a></li>

</ul>

</div>
<div class="content-container">

<h1>Events list:</h1><br />

  <table class="table">
    <thead>
      <tr>
        <th>Event Name</th>
        <th>Event description</th>
        <th>Department </th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($viewmodel as $item) : ?>
    <tr>
      <td><a href="<?php echo ROOT_URL; ?>activities/activityProfile/?id=<?php echo $item['id_activity']; ?>"><?php echo $item['activity_name']; ?></td>
      <td><?php echo $item['activity_description']; ?></td>
      <td><?php echo $item['activity_department']; ?></td>
      <td><?php echo $item['date_organized']; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  
</div>