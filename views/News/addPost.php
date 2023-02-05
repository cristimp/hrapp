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

<div class="content-container">
	<div class="content-container-header">
    <div class="panel-body">
    <form id="postForm" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<input class="" type="hidden" name="author" value="<?php echo $_SESSION['user_data']['id']; ?>"/>
    	<div class="form-group">
    		<label>Title of the news</label>
    		<input type="text" name="title" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Body</label>
    		<textarea id="ckeditor" name="body" class="form-control"></textarea>
    	</div>
<!--    	<div class="form-group">
    		<label>Link</label>
    		<input type="text" name="link" class="form-control" />
    	</div> --> <br />
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
    </form>
  </div>

 	</div>
</div>

<script>

	ClassicEditor
        .create( document.querySelector( '#ckeditor' ) )
        .catch( error => {
            console.error( error );
        } );

</script>