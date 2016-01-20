<div class="col-xs-12 col-sm-6 col-md-4">
<div class="thumbnail post <?php if(has_post_thumbnail()){ ?> post-w-thumbnail <?php } ?>">
	<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail('medium');
		} else { ?>
			<img src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" />
		<?php } ?>
	</a>
		<div class="caption">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<p class="post-info"><?php the_time('F jS, Y'); ?> 
			| <?php 
				$categories = get_the_category();
				$separator = ", ";
				$output ='';

				if ($categories){
					foreach ($categories as $category) {
						$output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'. $separator;
					}
					echo trim($output, $separator);
				}
			?></p>
			<?php if(is_search() OR is_archive()){ 
				} ?>
				</div>
			</div>
		</div>