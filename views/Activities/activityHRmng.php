<div class="menu-content-container">

<ul class="secondary-menu-ul">

  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/events">Events</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/hrActivities">HR</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/marketingActivities">Marketing</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>activities/addActivities">Add activities</a></li>

</ul>

</div>

<div class="content-container">
<?php foreach($viewmodel as $item) : ?>
 <h1>Staff Management for <?php echo $item['activity_name']; ?> activity</h1> <?php break; ?>
 <?php endforeach; ?><br />

 <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >

  <div class="form-row" style="column-count: 2;">
  <div><label for="main">Select the main responsible: </label></div>
 <!--    <input type="text" list="members" class="col-md-8 mb-3" placeholder="Click to select" name="main"/> -->
    <select class="js-example-basic-multiple col-md-8 mb-3" name="main" multiple="" placeholder="Select the main responsible">
 <!--     <datalist id="members"> -->
        <?php foreach($viewmodel as $item) :?>
        <option value='<?php echo $item['applicant_id']?>'><?php echo $item['first_name']." ".$item['last_name'];?></option>
        <?php endforeach; ?>
<!--       </datalist> -->
      </select>
      <div class="col-md-5">
      <?php foreach($viewmodel as $item) : ?>
        <label for="effort_main">Effort of the main responsible: </label>
        <input type="number" id="effort_main" class="form-control" placeholder="Effort of the main responsible" name="effort_main" value="<?php echo $item['effort_coord']?>">
      <?php break; endforeach; ?>
      </div>        
  </div>

  <div class="form-row" style="column-count: 2;">
    <div><label for="organizers">Select the organizers: </label></div>
      <div>
      <select class="js-example-basic-multiple col-md-8 mb-3" name="organizers[]" multiple="" placeholder="Select the organizers">
        <?php foreach($viewmodel as $item) :?>
        <option value='<?php echo $item['applicant_id']?>'><?php echo $item['first_name']." ".$item['last_name'];?></option>
        <?php endforeach; ?>
      </select>
      <div class="col-md-5">
      <?php foreach($viewmodel as $item) : ?>
        <label for="effort_org">Effort of the organizer: </label>
        <input type="number" id="effort_org" class="form-control" placeholder="Effort of the organizer" name="effort_org" value="<?php echo $item['effort_org']?>">
      <?php break; endforeach; ?>
      </div> 
      </div>        
  </div><br>

  <div class="form-row" style="column-count: 2;">
    <div><label for="organizers">Select the volunteers team: </label></div>
      <div>
      <select class="js-example-basic-multiple col-md-8 mb-3" name="volunteers[]" multiple="" placeholder="Select the volunteers">
        <?php foreach($viewmodel as $item) :?>
        <option value='<?php echo $item['applicant_id']?>'><?php echo $item['first_name']." ".$item['last_name'];?></option>
        <?php endforeach; ?>
      </select>
      <div class="col-md-5">
      <?php foreach($viewmodel as $item) : ?>
        <label for="effort_volunteer">Effort of the volunteer: </label>
        <input type="number" id="effort_volunteer" class="form-control" placeholder="Effort of the organizer" name="effort_volunteer" value="<?php echo $item['effort_volunteer']?>">
      <?php break; endforeach; ?>
      </div>
      </div>        
  </div><br>

  <div class="form-now" style="column-count: 1;"><br>
  <div>Select the participants:</div>
    <?php foreach($viewmodel as $item) :?>
    <input type="checkbox" name="participants[]" value='<?php echo $item['applicant_id']?>' class="form-check-input">
    <label class="form-check-label" for="participants[]"><?php echo $item['first_name']." ".$item['last_name'];?></label>
    <?php endforeach; ?>
      <div class="col-md-5"><br>
      <?php foreach($viewmodel as $item) : ?>
        <label for="effort_participant">Effort of the participant: </label>
        <input type="number" id="effort_participant" class="form-control" placeholder="Effort of the organizer" name="effort_participant" value="<?php echo $item['effort_participant']?>">
      <?php break; endforeach; ?> 
      </div>
  </div><br>

 <input class="btn btn-primary" name ="submit" type="submit" value="Submit">
 </form>
</div>

<script>
    $(document).ready(
        function () {
            $('.js-example-basic-multiple').select2();
        }
    ); 
</script>