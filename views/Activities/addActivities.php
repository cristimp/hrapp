<div class="menu-content-container">

<ul class="secondary-menu-ul">

  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/events">Events</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/hrActivities">HR</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/marketingActivities">Marketing</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/addActivities">Add activities</a></li>

</ul>

</div>
<div class="content-container" style="overflow: scroll;">

 <h1>Add an activity</h1>

 <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="activityName">Activity name:</label>
                <input type="text" id="activityName" class="form-control" placeholder="Activity name" name="activity_name">
            </div>

            <div class="col-md-4 mb-3">
                <label for="activityDescription">Activity Description:</label>
                <textarea type="text" class="form-control" id="activityDescription" placeholder="Activity Description" name="activity_description" rows="3"></textarea>
            </div>

            <div class="form-row">
            <label for="deptA">Department:</label><br />
                <select class="col-md-4 mb-3" name="deptA" >
                    <option value="">Open this select menu</option>
                    <option value='hrA'>Human Resources</option>
                    <option value='mktA'>Marketing</option>
                    <option value='eventsA'>Casual Events</option>
                    <option value='projectsA'>Projects</option>
                </select>
            </div>

            <h3>Effort in hours for the organizing team and participants (if applicable): </h3>
            <div class="col-md-4 mb-3">
                <label for="activityName">Effort of the coordinator: </label>
                <input type="number" id="effort_coord" class="form-control" placeholder="Effort of the coordinator" name="effort_coord">
            </div>
            <div class="col-md-4 mb-3">
                <label for="effort_org">Effort of the organizing team: </label>
                <input type="number" id="effort_org" class="form-control" placeholder="Effort of the organizers" name="effort_org">
            </div>
            <div class="col-md-4 mb-3">
                <label for="effort_volunteer">Effort of the volunteers: </label>
                <input type="number" id="effort_volunteer" class="form-control" placeholder="Effort of the volunteers" name="effort_volunteer">
            </div>
            <div class="col-md-4 mb-3">
                <label for="effort_participant">Effort of the participants: </label>
                <input type="number" id="effort_participant" class="form-control" placeholder="Effort of the participant" name="effort_participant">
            </div>
            <div class="col-md-4 mb-3">
                <label for="effort_meeting">Effort for participating at the internal meetings: </label>
                <input type="number" id="effort_meeting" class="form-control" placeholder="Effort of the participant" name="effort_meeting">
            </div>

            <input class="btn btn-primary" name ="submit" type="submit" value="Submit">
    </form>

</div>