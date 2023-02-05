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

            <div class="col-sm">
                    <div style="display: inline-block;" class="mt-2"><a class="btn btn-outline-dark btn-sm" href="<?php echo ROOT_URL; ?>members">Members list</a></div>
                    <div style="display: inline-block;" class="btn btn-dark btn-sm mt-0">Birthdays</div>
            </div>

        </div>

    </div><br />

        <table class="" id="table_members">
            <thead>
            <tr>
                <th>Member name</th>
                <th>Birthdate</th>
                <th>Days until their birthday</th>
            </tr>
            </thead>  
            <tbody>
            <?php foreach($viewmodel as $item) : ?>
                <tr>
                    <td><?php echo $item['first_name'] . " " . $item['last_name']; ?></td>
                    <td><?php echo $item['date_birth']; ?></td>
                    <td><?php echo $item['no_of_days']; ?></td>
                </tr>
            <?php endforeach; ?>     
           </tbody>
        </table> 
</div>
</div>

<script>
$(document).ready( function () {
    $('#table_members').DataTable( {
        "order": [[ 2, "asc" ]],
        "lengthMenu": [5, 10, 25, 50]
    } );
} );
</script>