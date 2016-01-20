<?php 

get_header(); ?>
	<div class="row clearfix main-content">
		<div class="col-md-12">
			<?php if (have_posts()) :
				while (have_posts()) : the_post();
				?>
				<div class="row">
					<div class="col-md-12 wrapper-section">
						<div class="col-xs-12 col-sm-3 col-md-3 section-title"><h3>My Name</h3></div>
						<div class="col-xs-12 col-sm-9 col-md-8 section-content">
							<?php
								the_content();
							endwhile;
							?>
							<?php
							else :
								echo "<p>No content found</p>";
							endif;?>

							<?php
								$the_query = new WP_Query( 'page_id=6' );
								while ( $the_query->have_posts() ) : $the_query->the_post();
								$about_content = the_content();
								  echo substr($about_content,0,200);
								endwhile;
								wp_reset_postdata();
							?>
						</div>
					</div>
					<div class="col-md-12 wrapper-section">
						<div class="col-xs-12 col-sm-3  section-title">
							<h3>My Skills</h3>
						</div>
					<div class="col-xs-12 col-sm-9 section-content  home-skill-bars">
						<div class="col-xs-12 col-sm-6">
							Photoshop
						  <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
						    <span class="sr-only">90% Complete</span>
						  </div>
						</div>
							Illustrator
						    <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
						    <span class="sr-only">80% Complete</span>
						  </div>
						</div>
							Team work
						    <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
						    <span class="sr-only">90% Complete</span>
						  </div>
						</div>
						Organisation
						    <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
						    <span class="sr-only">90% Complete</span>
						  </div>
						</div>
						Drinking Coffee
						    <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						    <span class="sr-only">100% Complete</span>
						  </div>
						</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							HTML
						  <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
						    <span class="sr-only">90% Complete</span>
						  </div>
						</div>
							CSS
						    <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
						    <span class="sr-only">90% Complete</span>
						  </div>
						</div>
							Javascript
						    <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
						    <span class="sr-only">75% Complete</span>
						  </div>
						</div>
						PHP
						    <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
						    <span class="sr-only">60% Complete</span>
						  </div>
						</div>
						Video Games
						    <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						    <span class="sr-only">100% Complete</span>
						  </div>
						</div>
						</div>
					</div>
					</div>
				</div>
				<div class="row home-columns clearfix">
					<div class="text-center section-title">
						<h3>Latest Blog Entries</h3>
					</div>
					<div class="col-xs-12">
					<?php // wp_query Uncategorized post loop begins
						$gallery_posts = new WP_Query('posts_per_page=4');
						if ($gallery_posts->have_posts()) :
							while ($gallery_posts->have_posts()) : $gallery_posts->the_post(); ?>
								<div class="col-xs-12 col-sm-6 col-md-3">
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
									</div>
								</div>
								</div>
							<?php endwhile; ?>
							<?php else :
								echo "<p>No content found</p>";
						endif; 
						wp_reset_postdata(); ?>
						</div>
					<div class="col-xs-12 text-center"><a class="home-posts-button btn btn-info" href="../pc/blog">View all Blog Posts</a></div>	
				</div>
			<hr>
		</div>
		<h3 class="text-center">Latest Instagram</h3>
		<hr>
		<div class="row" id="instafeed">
		</div>
	</div>

<?php get_footer();

?>