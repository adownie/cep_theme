<?php
/**
 * The template for displaying all pages.
 *
 * @package Koenda
 */
 get_header(); ?>
		<div id="content">
			<div class="clearfix <?php if(of_get_option('default_layout')=='right') { echo 'right_sidebar'; } ?> <?php if(of_get_option('default_layout')=='left') { echo 'left_sidebar'; } ?> <?php if(of_get_option('default_layout')=='none') { echo 'nosidebar'; } ?>">
			    <?php if(of_get_option('default_layout')=='left') { get_sidebar(); } ?>
				<div class="pagecontent">
		        <?php if (have_posts()) : ?>
					<ul class="posts fullwidth singlepost">
					<?php while (have_posts()) : the_post(); ?>
						<li>
							<div class="short">
							<?php if(get_post_meta($post->ID, 'display_title_page', true)!=1) { ?>
								<h2><?php the_title(); ?></h2>
							<?php } ?>	
								<p><?php the_content(); ?></p>
							</div>
							<p><?php posts_nav_link(); ?></p>
							<div id="comments">
								<?php comments_template(); ?>
							</div>
						</li>
					<?php endwhile; ?>
					</ul> 
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'koenda' ) . '</span>', 'after' => '</div>' ) ); ?>
					<?php else : ?>
						<ul class="posts fullwidth singlepost">
							<li>
								<h2 class="center"><?php _e( 'Not found', 'koenda' ); ?></h2>
								<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'koenda' ); ?></p>
							</li>	
						</ul>
					<?php endif; ?>
				</div> <!--  END Page  -->
				<?php if(of_get_option('default_layout')=='right') { get_sidebar(); } ?>
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>