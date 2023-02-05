<div class="menu-content-container">

<ul class="secondary-menu-ul">
        <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>members/">Lista voluntarilor</a></li>
        <li class="secondary-menu-list">Cauta un voluntar</a></li>
		<li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>members/pointsSystem">Sistem de punctaje</a></li>
</ul>

</div>
<div class="content-container">

<h1>Points list </h1><br />
<h3>Each volunteer will get the following points:</h3><br />
<?php foreach($viewmodel as $item) :?>
<p class="fs-5">For coordinating an activity: <b><?php echo $item['main_rep']; ?></b> </p>
<p class="fs-5">For being part of an organizing team: <b><?php echo $item['org_team']; ?></b> </p>
<p class="fs-5">For helping out, without having a role or responsability: <b><?php echo $item['volunteer_team']; ?></b> </p>
<p class="fs-5">For participating at an activity: <b><?php echo $item['participant']; ?></b> </p>
<p class="fs-5">For being present at internal meetings: <b><?php echo $item['internal_meetings']; ?></b> </p> 
<?php endforeach; ?>
</div>