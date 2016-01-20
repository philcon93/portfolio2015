
<?php
/**
 * Template Name: Parent Portfolio Page
 */ 

get_header(); ?>
	<div class="row clearfix main-content">
		<div class="col-md-12">
			<?php if (have_posts()) :
				while (have_posts()) : the_post(); ?>
				<article class="post page">
	<?php
		if(has_children() OR $post->post_parent > 0){ ?>
			<nav class="site-nav children-links clearfix">
			<span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
				<ul>
					<?php 
						$args = array(
							'child_of' => get_top_ancestor_id(),
							'title_li' => ''
						);
					?>
					<?php wp_list_pages($args); ?>
				</ul>
			</nav>
	<?php } ?>
		<div class="row">
			<div class="col-md-12 wrapper-section">
				<div class="section-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
</article>	<?php

				endwhile;

				else :
					echo "<p>No content found</p>";
				endif; ?>
		</div>
	</div>
<?php get_footer();

?>