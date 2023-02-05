<body>
<div class="menu-content-container">
<?php 

if(isset($_SESSION['is_logged_in'])) { ?>

<ul class="secondary-menu-ul">
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>recruitment/applicants">Applicants</a></li>
  <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>forms">Recruitment Form</a></li>
</ul>

<?php } ?>
</div>
<div class="content-container" style="overflow: scroll;">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
        <div class="form-row">

            <div class="col-md-8 mb-1">
                <label><i>The fields marked with (<label style="color:red">*</label>) are mandatory.</i></label><br>
                <label><i>The information is collected only for administrative purposes.</i></label><br>
		<label><i>After you register, you will be contacted by phone starting from 14th February.</i></label><br>
            </div><br>



            <div class="col-md-4 mb-3">
                <label for="validationTooltip01"><b>First name: <sup style="color:red">*</sup></b></label>
                <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" name="first_name" minlength="2"
                required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationTooltip02"><b>Last name: <sup style="color:red">*</sup></b></label>
                <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" name="last_name" minlength="2"
                required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationTooltipUsername"><b>E-mail: <sup style="color:red">*</sup></b></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                    </div>
                    <input type="email" class="form-control" id="validationTooltipUsername" placeholder="E-mail" name="email"
                        aria-describedby="validationTooltipUsernamePrepend" required>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationTooltip02"><b>Phone number: <sup style="color:red">*</sup></b></label>
                <input type="tel" class="form-control" placeholder="Phone number" name="phone_number"
                required>
            </div>

        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationTooltip03"><b>City: <sup style="color:red">*</sup></b></label>
                <input type="text" class="form-control" id="validationTooltip03" placeholder="City" name="city" required>

            </div>
            <div class="col-md-6 mb-3">
                <label for="validationTooltip04"><b>Country: <sup style="color:red">*</sup></b></label>
                <input type="text" class="form-control" id="validationTooltip04" placeholder="Country" name="country" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationTooltip05"><b>Date of birth: <sup style="color:red">*</sup></b></label>
                <input type="date" class="form-control" id="validationTooltip05" placeholder="Date of birth" name="date_birth" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationTooltip05"><b>Facebook profile: <sup style="color:red">*</sup></b></label>
                <input type="link" class="form-control" id="validationTooltip05" placeholder="Facebook profile link" name="fb_profile" required>
            </div>

            <div class="col-md-6 mb-3">
            <label for="validationTooltip05"><b>Where do/did you study/studied in Iasi? <sup style="color:red">*</sup></b></label><br>
                <select class="form-control" name="university" required>
                    <option value="">Open this select menu</option>
                    <option value='Universitatea "Alexandru Ioan Cuza" din Iași'>Universitatea "Alexandru Ioan Cuza" din Iași</option>
                    <option value='Universitatea de Științe Agricole și Medicină Veterinară "Ion Ionescu de la Brad"'>Universitatea de Științe Agricole și Medicină Veterinară "Ion Ionescu de la Brad"</option>
                    <option value='Universitatea Tehnică "Gheorghe Asachi" din Iași'>Universitatea Tehnică "Gheorghe Asachi" din Iași</option>
                    <option value='Universitatea de Medicină și Farmacie "Grigore T. Popa" Iași'>Universitatea de Medicină și Farmacie "Grigore T. Popa" Iași</option>
                    <option value='Universitatea Națională de Arte "George Enescu" Iași'>Universitatea Națională de Arte "George Enescu" Iași</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationTooltip05"><b>Which faculty ? <sup style="color:red">*</sup></b></label>
                <input type="text" class="form-control" id="validationTooltip05"
                    placeholder="ex: Faculty of Letters" name="language" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationTooltip05"><b>What is your motivation to join ESN Iasi? <sup style="color:red">*</sup></b></label>
                <input type="text" class="form-control" id="validationTooltip06" placeholder="" name="skills" required>
            </div>

  <!--          <div class="col-md-6 mb-3">
                <label><b>How do you prefer to have the interview ?</b></label><br>
                <input type="radio" id="validationTooltip07" name="interview" value="On-line" required>
                <label for="validationTooltip07">On-line</label><br>
                <input type="radio" id="validationTooltip08" name="interview" value="Face-to-face" required>
                <label for="validationTooltip08">Face-to-face</label><br>
            </div>
    -->
            <div class="col-md-6 mb-3">
                <label><b>How did you hear about us?</b></label><br>
                <input type="checkbox" id="facebook" name="facebook" value="0">
                <label for="source1"> Facebook page/ Facebook groups</label><br>
                <input type="checkbox" id="instagram" name="instagram" value="0">
                <label for="source2"> Instagram</label><br>
                <input type="checkbox" id="website" name="website" value="0">
                <label for="source3"> Our Website</label><br>
                <input type="checkbox" id="friends" name="friends" value="0">
                <label for="source4"> Friends / colleagues</label><br>
                <input type="checkbox" id="erasmus" name="erasmus" value="0">
                <label for="source5"> During my Erasmus experience</label><br>
                <input type="checkbox" id="iro" name="iro" value="0">
                <label for="source6"> From the Erasmus Office / International Relations Office</label><br>
                <input type="checkbox" id="esners" name="esners" value="0">
                <label for="source7"> From ESN Members</label><br>
		<input type="checkbox" id="poster" name="poster" value="0">
                <label for="source7"> I saw your recruitment poster.</label><br>
            </div>

            <div class="col-md-8 mb-1">
		<label><i><b>After submiting the form, you will be redirected to confirmation page. In case of issues please send an email to esn.iasi@gmail.com.</i></b></label><br><br>
                <label><i>By submitting this form, I give permission for my data to be held in the ESN Iasi database and agree that ESN Iasi may process personal data relating to me for personnel, administration and/or management purposes. ESN Iasi won't make them public or use them in other purposes.</i></label><br>
            </div><br>

            <input class="btn btn-primary" name ="submit" type="submit" value="Submit" />
    </form>
</div>
</body>