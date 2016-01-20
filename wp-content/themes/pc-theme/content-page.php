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
				  <div class="col-xs-12 col-sm-3 col-md-3 section-title">
					<h3><?php wp_title(''); ?></h3>
	  			</div>
				<div class="col-xs-12 col-sm-9  section-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
</article>	