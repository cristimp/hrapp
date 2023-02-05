<div class="menu-content-container">

    <ul class="secondary-menu-ul">
        <li class="secondary-menu-list">Lista voluntarilor</a></li>
		<li class="secondary-menu-list">Sistem de punctaje</a></li>
    </ul>

</div>
<div class="content-container">

<?php  foreach($viewmodel as $item) :?>
    <h1>Profile of <?php echo $item['first_name'];?> <?php echo $item['last_name'];?></h1>
<b>Adresa de email:</b> <?php echo $item['email'];?><br>
<b>Numarul de telefon:</b> <?php echo $item['phone_number'];?><br>
<b>Data nasterii:</b> <?php echo $item['date_birth'];?><br>
<b>Oras:</b> <?php echo $item['city'];?><br>
<b>Tara:</b> <?php echo $item['country'];?><br>
<b>Profilul de Facebook:</b> <?php echo $item['fb_profile'];?><br>
<b>Universitatea unde studiaza:</b> <?php echo $item['university'];?><br>
<b>Facultate:</b> <?php echo $item['language'];?><br>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<?php  if(isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) { ?>
<div class="col-sm-6 mb-3 form-group" style="display:flex; flex-direction: row; align-items: center">
    <b><label style="margin-right: 5px;" for="retiredDate">Data retragerii: </label></b> 
    <input type="date" id="retiredDate" class="" style="margin-right: 5px;" placeholder="Data retragerii" name="retiredDate" value="<?php echo $item['date_retired']; ?>">
    <input type="submit" value="Set Date" class="" name="getRetirementDate">
</div> </form>
<?php } endforeach;  ?>
<head></head>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
   <div class="">
   <?php foreach($viewmodel as $item) :?>
        <input type="submit" value="Adeverinta" class="btn btn-outline-dark waves-effect waves-light myBlue" name="getAdv">
        <?php  if(isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) { ?>
        <a href="<?php echo ROOT_URL; ?>members/volunteerReport/?id=<?php echo $_GET['id']; ?>" type="button" class="btn btn-outline-success">Activity Report</a>
    <?php } endforeach; ?>
    </div>
</form>
</div>