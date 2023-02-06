







<h2>
    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_tittle;?></a>
</h2>
<p class="lead">
    by <a href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id;?>">
    <?php echo $post_author;?></a>
</p> 
<p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;?></p>
<hr>
<a href="post.php?p_id=<?php echo $post_id; ?>">
<img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
</a>
<hr>
<p><?php echo $post_content;?></p>
<a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>