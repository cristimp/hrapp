<div class="menu-content-container">

    <ul class="secondary-menu-ul">
        <li class="secondary-menu-list">News</a></li>
        <?php if(isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) : ?>
        <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>news/boardMembers">Board members</a></li>
        
		<li class="secondary-menu-list"><a href="#">Legal documents</a></li>
        <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>news/addPost">Add post</a></li>
        <?php endif; ?>
    </ul>

</div>

<div class="content-container">
			<div class="content-container-header">
            <?php 
            if( sizeof($viewmodel) > 0 ) {
            foreach($viewmodel as $item) : ?>
            <div class="well">
			<h3><?php echo $item['title']; ?></h3>
			<small><?php echo $item['created_date']; ?></small>
			<hr />
			<p><?php echo $item['body']; ?></p>
			<br />
		</div> <?php endforeach;  } else { ?>
        <h3>There are no posts to show.</h3>
        <?php } ?>
		 	</div>
		</div>