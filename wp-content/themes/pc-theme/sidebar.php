<div class="col-md-3">
	<?php dynamic_sidebar('sidebar1');?>

	<h4>Recent Post</h4>
	<?php
        $latest_post =  new WP_Query( array(
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 5
) );
        if($latest_post->have_posts()) :
    ?>
    <div class="boxBar">
        <?php
            while($latest_post->have_posts()):
                $latest_post->the_post();
        ?>
        <h1 class="boxedHeader">
            <?php the_title() ?>
        </h1>
        <?php endwhile ?>
    </div>
    <?php endif ?>

</div>