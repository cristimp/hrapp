<div class="menu-content-container">

    <ul class="secondary-menu-ul">
        <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>settings/accounts">Account rights</a></li>
    </ul>

</div>

<div class="content-container">

<h3> Create admins, moderators and editors: </h3>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
<div class="row form-row">

<div class="col">
    <label for="admins">Give Admin rights to: </label><br>
      
      <select class="js-example-basic-multiple col-md-8 mb-3" name="admins[]" multiple="" placeholder="Select the admins">
        <?php foreach($viewmodel as $item) :?>
        <option value='<?php echo $item['applicant_id']?>'><?php echo $item['first_name']." ".$item['last_name'];?></option>
        <?php endforeach; ?>
      </select><br>


    <label for="moderator">Give Moderator rights to: </label><br>

      <select class="js-example-basic-multiple col-md-8 mb-3" name="moderator[]" multiple="" placeholder="Select the moderators:">
        <?php foreach($viewmodel as $item) :?>
        <option value='<?php echo $item['applicant_id']?>'><?php echo $item['first_name']." ".$item['last_name'];?></option>
        <?php endforeach; ?>
      </select><br>


    <label for="editor">Give Editor rights to: </label><br>
     
      <select class="js-example-basic-multiple col-md-8 mb-3" name="editor[]" multiple="" placeholder="Select the editors:">
        <?php foreach($viewmodel as $item) :?>
        <option value='<?php echo $item['applicant_id']?>'><?php echo $item['first_name']." ".$item['last_name'];?></option>
        <?php endforeach; ?>
      </select><br><br>
      <input class="btn btn-success" name ="assign" type="submit" value="Assign">
</div>


<div class="col">
    <label for="rightsoff">Revoke rights of: </label><br>

      <select class="js-example-basic-multiple col-md-8 mb-3" name="rightsoff[]" multiple="" placeholder="Select the admins:">
        <?php foreach($viewmodel as $item) :?>
        <option value='<?php echo $item['applicant_id']?>'><?php echo $item['first_name']." ".$item['last_name'];?></option>
        <?php endforeach; ?>
      </select><br><br>

      <input class="btn btn-danger" name ="revoke" type="submit" value="Revoke">
</div> 
</div></form>

</div>

<script>
    $(document).ready(
        function () {
            $('.js-example-basic-multiple').select2();
        }
    ); 
</script>