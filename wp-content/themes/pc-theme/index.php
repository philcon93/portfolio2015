<?php 

get_header(); ?>
		<div class="row main-content <?php wp_title(''); ?>">
			<div class="<?php if(is_active_sidebar('sidebar1')){ echo "col-md-9";} else{ echo "col-md-12";} ?> clearfix">
			
				<?php if (have_posts()) :
						while (have_posts()) : the_post();
							get_template_part('content', get_post_format());	
						endwhile;
					else :
						echo "<p>No content found</p>";
					endif; ?>		
			</div>
			<?php if(is_active_sidebar('sidebar1')){ ?>
				<?php get_sidebar(); ?>
			<?php } ?>
		</div>
<?php get_footer();

?>