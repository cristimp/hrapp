<div class="menu-content-container">

    <ul class="secondary-menu-ul">

     <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/events">Events</a></li>
     <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/hrActivities">HR</a></li>
     <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/marketingActivities">Marketing</a></li>
     <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/addActivities">Add activities</a></li>


    </ul>

</div>

<div class="content-container" style="overflow: scroll">
<?php foreach($viewmodel as $item) :?>
 <h1>Edit the <?php echo $item['activity_name'];?> activity</h1>
 <?php endforeach; ?>
 <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="activityName">Activity name:</label>
                <textarea type="text" id="activityName" class="form-control" placeholder="Activity name" 
                          name="activity_name" rows="1"><?php echo $item['activity_name']; ?></textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label for="activityDescription">Activity Description:</label>
                <textarea type="text" class="form-control" id="activityDescription" placeholder="Activity Description" name="activity_description" rows="2"><?php echo $item['activity_description']; ?></textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label for="activityDate">When was the activity held:</label>
                <input type="date" id="activityDate" class="form-control" placeholder="Activity date" name="activity_date" value="<?php echo $item['date_organized']; ?>">
            </div>

            <div class="col-md-4 mb-3">
                <label for="activityLocation">Where was the activity held:</label>
                <textarea type="text" id="activityLocation" class="form-control" placeholder="Activity location" name="activity_location"><?php echo $item['location']; ?></textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label for="activityPhotos">Provide the link to the activity photos:</label>
                <textarea type="text" id="activityPhotos" class="form-control" placeholder="Link to photos (ex: Facebook)" name="activity_photos"><?php echo $item['link_photos']; ?></textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label for="activityOutcome">What was the impact of the activity over the participants:</label>
                <textarea type="text" class="form-control" id="activityOutcome" placeholder="Activity Outcome" name="activity_outcome" rows="2"><?php echo $item['activity_outcome']; ?></textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label for="activityParticipants">How many participants attended the activity:</label>
                <input type="number" class="form-control" id="activityParticipants" placeholder="Number of volunteers" name="activity_participantsV" value="<?php echo $item['volunteers']; ?>">
                <input type="number" class="form-control" id="activityParticipantsF" placeholder="Number of Erasmus Students" name="activity_participantsF" value="<?php echo $item['foreign_students']; ?>">
                <input type="number" class="form-control" id="activityParticipantsF" placeholder="Number of trainers" name="activity_participantsT" value="<?php echo $item['trainers']; ?>">
                <input type="number" class="form-control" id="activityParticipantsF" placeholder="Number of guests" name="activity_participantsG" value="<?php echo $item['local_guests']; ?>">
            </div>

            <div class="form-row">
            <label for="cause">Cause:</label><br />
                <select class="col-md-4 mb-3" name="cause" >
                    <option value=""><?php echo $item['activity_cause']; ?></option>
                    <option value='Culture'>Culture</option>
                    <option value='Education & Youth'>Education & Youth</option>
                    <option value='Environmental Sustainability'>Environmental Sustainability</option>
                    <option value='Health & Well-being'>Health & Well-being</option>
                    <option value='Skills & Employability'>Skills & Employability</option>
                    <option value='Social inclusion'>Social inclusion</option>
                </select>
            </div>

            <div class="form-row">
            <label for="deptA">Department:</label><br />
                <select class="col-md-4 mb-3" name="deptA" >
                    <option value="<?php echo $item['activity_dpt']; ?>"><?php echo $item['activity_department']; ?></option>
                    <option value='hrA'>Human Resources</option>
                    <option value='mktA'>Marketing</option>
                    <option value='eventsA'>Casual Events</option>
                    <option value='projectsA'>Projects</option>
                </select>
            </div>

            <input class="btn btn-primary" name ="activityEdit" type="submit" value="Submit">
    </form>
 
</div>