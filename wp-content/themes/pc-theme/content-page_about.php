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
			<div class="col-xs-12 wrapper-section">
				  <div class="col-xs-12 col-sm-3 col-md-3 section-title">
					<h3><?php wp_title(''); ?></h3>
	  			</div>
				<div class="col-xs-12 col-sm-9 col-md-8 section-content">
					<?php the_content(); ?>

					  <?php // Get all result records
		                $params = array(
		                        'orderby' => 'date',
		                        'limit' => -1, // Returns all
		                );
		                    
		                // Maps to the new find method
		                $pod_studies = pods( 'studies', $params );
		                
		               	?>
		        </div>
		    </div>
		</div>
		<hr>
		    <div class="row">
		    <div class="col-xs-12 wrapper-section">
		        <div class="col-xs-12 col-sm-3 col-md-3 section-title">
					<h3>My Studies</h3>
	  			</div>
		        <div class="col-xs-12 col-sm-9 ">
		               	<?php
		                echo $pod_studies->find( $params )->template( 'studies_template' );
		                ?>
		        </div>
		    </div>
		    </div>
		    <hr>
		    <div class="row">
		    <div class="col-xs-12 wrapper-section">
		        <div class="col-xs-12 col-sm-3 col-md-3 section-title">
					<h3>My Work</h3>
	  			</div>
		        <div class="col-xs-12 col-sm-9">
		               <?php // Get all result records
		                $params = array(
		                        'orderby' => 'date',
		                        'limit' => -1, // Returns all
		                );
		                    
		                // Maps to the new find method
		                $pod_work = pods( 'work_experience', $params );
		                ?>
		                <?php
		                echo $pod_work->find( $params )->template( 'work_experience_template' );
		                ?>
				</div>
			</div>
		</div>
</article>	