<?php 

get_header(); ?>
	<div class="row clearfix main-content">
		<div class="col-md-12">
			<?php if (have_posts()) :
				while (have_posts()) : the_post();
				if (is_page(6)) {
					get_template_part('content', 'page_about');
				}else{
					get_template_part('content', 'page');
				}

				endwhile;

				else :
					echo "<p>No content found</p>";
				endif; ?>
		</div>
	</div>
<?php get_footer();

?>