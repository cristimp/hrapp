<div class="menu-content-container">

    <ul class="secondary-menu-ul">
        <li class="secondary-menu-list">Lista voluntarilor</a></li>
        <li class="secondary-menu-list">Cauta un voluntar</a></li>
		<li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>members/pointsSystem">Sistem de punctaje</a></li>
    </ul>

</div>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col">
                    <div style="display: inline-block;" class="btn btn-dark btn-sm mt-0">Members list</div>
                    <div style="display: inline-block;" class="mt-2"><a class="btn btn-outline-dark btn-sm" href="<?php echo ROOT_URL; ?>members/birthdays">Birthdays</a></div>
            </div>

            
            <div class="col">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"> 
                <div style="display: inline-block;">
                <label style="display: inline-block;" for="validationTooltip05"><b>Last months:</b></label></div>
                <div style="display: inline-block; width: 4.5vw;">
                <input style="display: inline-block;" type="number" min="0" max="12" class="mt-2 form-control form-control-sm" placeholder="" name="last_months"></div>
                <input class="btn btn-outline-dark btn-sm" name ="lastmonths" type="submit" value="GO" />
            </form>
            </div>

            <div class="col-5">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"> 
                <label for="validationTooltip05"></label>
                <div style="display: inline-block; width: 9vw;"><b>From:</b>
                <input class="mt-2 form-control form-control-sm" type="month" name="from_month" min="2021-06" value="" pattern="[0-9]{4}-[0-9]{2}">
        <!--        <select class="mt-2 form-control form-control-sm" name="from_month" required>
                        <option value=""></option>
                        <option value='<?php /* echo date("Y-01-01"); ?>'>Jan</option>
                        <option value='<?php echo date("Y-02-01"); ?>'>Feb</option>
                        <option value='<?php echo date("Y-03-01"); ?>'>Mar</option>
                        <option value='<?php echo date("Y-04-01"); ?>'>Apr</option>
                        <option value='<?php echo date("Y-05-01"); ?>'>May</option>
                        <option value='<?php echo date("Y-06-01"); ?>'>Jun</option>
                        <option value='<?php echo date("Y-07-01"); ?>'>Jul</option>
                        <option value='<?php echo date("Y-08-01"); ?>'>Aug</option>
                        <option value='<?php echo date("Y-09-01"); ?>'>Sep</option>
                        <option value='<?php echo date("Y-10-01"); ?>'>Oct</option>
                        <option value='<?php echo date("Y-11-01"); ?>'>Nov</option>
                        <option value='<?php echo date("Y-12-01"); */ ?>'>Dec</option>
                    </select>--> </div>-> 
                    <div style="display: inline-block; width: 9vw;"><b>To:</b>
                    <input class="mt-2 form-control form-control-sm" type="month" name="to_month" min="2021-06" value="<?php echo date("Y-m"); ?>" pattern="[0-9]{4}-[0-9]{2}">
         <!--           <select class="mt-2 form-control form-control-sm" name="to_month" required>
                        <option value=""></option>
                        <option value='<?php /* echo date("Y-01-01"); ?>'>Jan</option>
                        <option value='<?php echo date("Y-02-01"); ?>'>Feb</option>
                        <option value='<?php echo date("Y-03-01"); ?>'>Mar</option>
                        <option value='<?php echo date("Y-04-01"); ?>'>Apr</option>
                        <option value='<?php echo date("Y-05-01"); ?>'>May</option>
                        <option value='<?php echo date("Y-06-01"); ?>'>Jun</option>
                        <option value='<?php echo date("Y-07-01"); ?>'>Jul</option>
                        <option value='<?php echo date("Y-08-01"); ?>'>Aug</option>
                        <option value='<?php echo date("Y-09-01"); ?>'>Sep</option>
                        <option value='<?php echo date("Y-10-01"); ?>'>Oct</option>
                        <option value='<?php echo date("Y-11-01"); ?>'>Nov</option>
                        <option value='<?php echo date("Y-12-01"); */ ?>'>Dec</option>
                    </select>--> </div>
                    <input class="btn btn-outline-dark btn-sm" name ="to_from" type="submit" value="GO" />
            </form>
            </div>
        </div>
    </div>
    <hr>

        <table class="" id="table_members">
            <thead>
            <tr>
                <th>Member name</th>
                <th>Department</th>
                <th>Date joined</th>
                <th>Activity status</th>
                <th>Effort</th>
            </tr>
            </thead>  
            <tbody>
            <?php $temp = array(); foreach($viewmodel as $item) :

             if($temp == null) {
                array_push($temp, $item['applicant_id']); ?>

                        <tr>
                         <td class="members-content-data" style="display: flex;"><a href="<?php echo ROOT_URL; ?>members/volunteerProfile/?id=<?php echo $item['applicant_id']; ?>"><?php echo $item['first_name'] . " " . $item['last_name']; ?></td>
                         <td class="members-content-data"><?php echo $item['dpt']; ?></td>
                         <td class="members-content-data"><?php echo $item['date_applied']; ?></td>
                         <td class="members-content-data">
                         <?php if($item['punctajTotal'] <= 5 && $item['punctajTotal'] > 2) {?>
                            <div class="normal-performer text-dark"><?php echo $item['punctajTotal']; ?></div>
                        <?php } elseif ($item['punctajTotal'] > 5) { ?>
                            <div class="high-performer text-white"><?php echo $item['punctajTotal']; ?></div>
                        <?php } else { 
                            if ($item['punctajTotal'] == null) {?>
                                <div class="low-performer text-white"><?php echo 0; ?></div>
                            <?php } else { ?>
                            <div class="low-performer text-white"><?php echo $item['punctajTotal']; ?></div> 
                        <?php } } ?>
                         </td>
                         <td class="members-content-data"><?php echo $item['totalEffort']; ?></td>
                        </tr>

                        <?php }

            for($i = 0; $i <= count($temp); $i++) {

                if($temp[$i] != $item['applicant_id']) {
                    
                    if($i == count($temp)-1)
                    {
                        array_push($temp, $item['applicant_id']); ?>

                        <tr>
                         <td class="members-content-data" style="display: flex;"><a href="<?php echo ROOT_URL; ?>members/volunteerProfile/?id=<?php echo $item['applicant_id']; ?>"><?php echo $item['first_name']  . " " . $item['last_name']; ?></td>
                         <td class="members-content-data"><?php echo $item['dpt']; ?></td>
                         <td class="members-content-data"><?php echo $item['date_applied']; ?></td>
                         <td class="members-content-data">
                         <?php if($item['punctajTotal'] <= 6 && $item['punctajTotal'] > 2) {?>
                            <div class="normal-performer text-dark"><?php echo $item['punctajTotal']; ?></div>
                        <?php } elseif ($item['punctajTotal'] > 6) { ?>
                            <div class="high-performer text-white"><?php echo $item['punctajTotal']; ?></div>
                        <?php } else { 
                            if ($item['punctajTotal'] == null) {?>
                                <div class="low-performer text-white"><?php echo 0; ?></div>
                            <?php } else { ?>
                            <div class="low-performer text-white"><?php echo $item['punctajTotal']; ?></div> 
                        <?php } } ?>
                         </td>
                         <td class="members-content-data"><?php echo $item['totalEffort']; ?></td>
                        </tr>

                        <?php break;
                    }
                    continue; 
                } else { 
                    break;
                }
            } endforeach; ?>     
           </tbody>
        </table> 
</div>
</div>

<script>
$(document).ready( function () {
    $('#table_members').DataTable();
} );
</script>