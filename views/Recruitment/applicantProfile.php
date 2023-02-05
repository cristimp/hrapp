<div class="menu-content-container">

<ul class="secondary-menu-ul">
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>recruitment/applicants">Applicants</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>forms">Recruitment Form</a></li>
</ul>

</div>
<div class="content-container">
<?php foreach($viewmodel as $item) :?>
<h1>Formularul lui <?php echo $item['first_name'];?> <?php echo $item['last_name'];?></h1>
<b>Adresa de email:</b> <?php echo $item['email'];?><br>
<b>Numarul de telefon:</b> <?php echo $item['phone_number'];?><br>
<b>Data nasterii:</b> <?php echo $item['date_birth'];?><br>
<b>Oras:</b> <?php echo $item['city'];?><br>
<b>Tara:</b> <?php echo $item['country'];?><br>
<b>Profilul de Facebook:</b> <?php echo $item['fb_profile'];?><br>
<b>Universitatea unde studiaza:</b> <?php echo $item['university'];?><br>
<b>Facultatea: </b> <?php echo $item['language'];?><br>
<b>Motivatia:</b> <?php echo $item['skillwish'];?><br>
<!-- <b>Forma interviului:</b> <?php // echo $item['interview_place'];?><br> -->
<b>De unde a aflat despre asociatie:</b> <?php
if($item['facebook'] == 1) echo "/ Facebook ";
if($item['instagram'] == 1) echo "/ Instagram ";
if($item['website'] == 1) echo "/ Website ";
if($item['friends'] == 1) echo "/ Prieteni ";
if($item['erasmus'] == 1) echo "/ Din Erasmus ";
if($item['iro'] == 1) echo "/ De la biroul de relatii internationale ";
if($item['esners'] == 1) echo "/ De la membrii ESN ";
if($item['poster'] == 1) echo "/ De pe poster ";
?>
<?php endforeach; ?>

</div>