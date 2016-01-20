<?php 

get_header();?>
	<div class="row">
		<div class="<?php if(is_active_sidebar('sidebar1')){ echo "col-md-8";} else{ echo "col-md-12";} ?>">
			<?php
			if (have_posts()) : ?>
				<h2>Search results for: <?php the_search_query(); ?></h2>
				<?php
				while (have_posts()) : the_post();
					get_template_part('content' , get_post_format());
				endwhile;

				else :
					echo "<p>No content found</p>";
				endif; ?>
		</div>
		<?php if(is_active_sidebar('sidebar1')){ ?>
			<?php get_sidebar(); ?>
		<?php } ?>
	</div>
<?php
get_footer();

?>