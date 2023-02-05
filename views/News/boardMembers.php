<div class="menu-content-container">

    <ul class="secondary-menu-ul">
        <li class="secondary-menu-list"><a href="<?php echo ROOT_URL; ?>news">News</a></li>
        <li class="secondary-menu-list">Board members</a></li>
        <?php if(isset($_SESSION['is_logged_in'])) : ?>
		<li class="secondary-menu-list"><a href="#">Legal documents</a></li>
        <li class="secondary-menu-list"><a href="#">Add post</a></li>
        <?php endif; ?>
    </ul>
</div>