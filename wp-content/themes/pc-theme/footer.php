		</div> <!-- wrapper-main -->
		<div class="container-fluid wrapper-footer">
			<footer class="site-footer">
			<div class="row">
				<div class="col-xs-12">
				<div class="footer-widgets clearfix hidden">
					<?php if(is_active_sidebar('footer1')){ ?>
						<div class="footer-widget-area">
							<?php dynamic_sidebar('footer1'); ?>
						</div>
						<?php }?>
					<?php if(is_active_sidebar('footer2')){ ?>
						<div class="footer-widget-area">
							<?php dynamic_sidebar('footer2'); ?>
						</div>
						<?php }?>				
					<?php if(is_active_sidebar('footer3')){ ?>
						<div class="footer-widget-area">
							<?php dynamic_sidebar('footer3'); ?>
						</div>
						<?php }?>
					<?php if(is_active_sidebar('footer4')){ ?>
						<div class="footer-widget-area">
							<?php dynamic_sidebar('footer4'); ?>
						</div>
						<?php }?>					
				</div>
				<div class="col-xs-12 col-sm-6 social-icons">
					<ul class="list-inline">
						<li><a href="https://www.facebook.com/phil.connah" target="_blank" class="btn btn-social btn-facebook btn-simple">
							<i class="fa fa-facebook-square"></i></a></li>
						<li><a href="https://www.instagram.com/phillycheese93/" target="_blank" class="btn btn-social btn-facebook btn-simple">
							<i class="fa fa-instagram"></i></a></li>
						<li><a href="https://www.pinterest.com/connah_93/" target="_blank" class="btn btn-social btn-facebook btn-simple">
							<i class="fa fa-pinterest-square"></i></a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6">
					<nav class="site-nav pull-right">
						<?php 
							$args = array(
								'theme_location' => 'footer'
								);
						?>
						<?php wp_nav_menu($args); ?>
					</nav>
				</div>
				<div class="col-xs-12">
					<p><?php bloginfo('name'); ?> &copy <?php echo date('Y'); ?></p>
				</div>
					</div>
				</div>
			</footer>
		</div> <!-- /container -->
	<?php wp_footer();?>
	<?php if(is_front_page()){ ?>
		<script type="text/javascript">
			$(document).ready(function(){
				var feed = new Instafeed({
					get: 'user',
					userId: 209197319,
					accessToken: '209197319.1fb234f.2df44e1fecfe46d0ac3164bb8a326af0',
					template: '<a href="{{link}}" target="_blank"><img src="{{image}}" title="{{caption}}"/></a>',
					resolution: 'standard_resolution',
					limit: '5',
					sortBy: 'most-recent'
				});
					feed.run();
			});
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-55421178-2', 'auto');
			  ga('send', 'pageview');
		</script>
		<?php }?>
	</body>
</html>
