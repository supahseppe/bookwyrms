<?php
/**
 * This file displays your author archives.
 *
 * @package Podcaster
 * @since 1.0
 * @author Theme Station : https://www.themestation.co
 * @copyright Copyright (c) 2013, Theme Station
 * @link https://www.themestation.co
 * @license https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

$options = get_option('podcaster-theme');  
$pod_sticky_header = isset( $options['pod-sticky-header'] ) ? $options['pod-sticky-header'] : '';
$pod_avtr_athpg = isset( $options['pod-avatar-authorpages'] ) ? $options['pod-avatar-authorpages'] : '';

get_header(); ?>

	<?php if ( isset( $pod_sticky_header ) && $pod_sticky_header == TRUE ) : ?>
	<div class="reg sticky">
	<?php else : ?>
	<div class="reg">
	<?php endif ; ?>
		<div class="static">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<div class="title">
								<div class="author_profile">
								<?php
										global $post;
										$author_id =$post->post_author; 
										$field ='description'; 
										$field2 ='display_name'; 
										$email = get_the_author_meta( 'user_email', $author_id );
										$website = get_the_author_meta( 'user_website', $author_id );
										$twitter = get_the_author_meta( 'user_twitter', $author_id );
										$position = get_the_author_meta( 'user_position', $author_id );
										$google = get_the_author_meta( 'user_googleplus', $author_id );
										$facebook = get_the_author_meta( 'user_facebook', $author_id );
										$skype = get_the_author_meta( 'user_skype', $author_id );
										$youtube = get_the_author_meta( 'user_youtube', $author_id );
										$dribbble = get_the_author_meta( 'user_dribbble', $author_id );
										$flickr = get_the_author_meta( 'user_flickr', $author_id );
										$instagram = get_the_author_meta( 'user_instagram', $author_id );
										$soundcloud = get_the_author_meta( 'user_soundcloud', $author_id );
										$pinterest = get_the_author_meta( 'user_pinterest', $author_id );
										$xing = get_the_author_meta( 'user_xing', $author_id );
										$linkedin = get_the_author_meta( 'user_linkedin', $author_id );
										$github = get_the_author_meta( 'user_github', $author_id );
										$stackex = get_the_author_meta( 'user_stackex', $author_id );

										$rss = get_the_author_meta( 'user_rss', $author_id );
										$snapchat = get_the_author_meta( 'user_snapchat', $author_id );
										$spotify = get_the_author_meta( 'user_spotify', $author_id );
										$mixcloud = get_the_author_meta( 'user_mixcloud', $author_id );
										$vine = get_the_author_meta( 'user_vine', $author_id );
										$itunes = get_the_author_meta( 'user_itunes', $author_id );

									?>
									<?php if( $pod_avtr_athpg == true ) : ?>
										<?php echo get_avatar( $author_id, apply_filters( 'themestation_author_bio_avatar_size', 100 ) ); ?>
									<?php endif; ?>
										
									<ul class="info">
										<li class="author_name"><h2><?php the_author_meta( $field2, $author_id ); ?></h2></li>
										<li class="author_position"><?php echo $position; ?></li>
									</ul>
									<div class="clear"></div>
									<ul class="social clearfix">

										<?php if ( $email != '' ) : ?><li><a class="sicon email" href="mailto:<?php echo $email; ?>"></a></li><?php endif; ?>
										<?php if ( $website != '' ) : ?><li><a class="sicon website" href="<?php echo $website; ?>"></a></li><?php endif; ?>
										<?php if ( $rss != '' ) : ?><li><a class="sicon rss" href="<?php echo $rss; ?>"></a></li><?php endif; ?>
										<?php if ( $skype != '' ) : ?><li><a class="sicon skype" href="<?php echo $skype; ?>"></a></li><?php endif; ?>
										<?php if ( $twitter != '' ) : ?><li><a class="sicon twitter" href="<?php echo $twitter; ?>"></a></li><?php endif; ?>
										<?php if ( $facebook != '' ) : ?><li><a class="sicon facebook_2" href="<?php echo $facebook; ?>"></a></li><?php endif; ?>
											
										<?php if ( $google != '' ) : ?><li><a class="sicon googleplus" href="<?php echo $google; ?>"></a></li><?php endif; ?>
										
										<?php if ( $instagram != '' ) : ?><li><a class="sicon instagram" href="<?php echo $instagram; ?>"></a></li><?php endif; ?>
										<?php if ( $snapchat != '' ) : ?><li><a class="sicon snapchat" href="<?php echo $snapchat; ?>"></a></li><?php endif; ?>
										<?php if ( $vine != '' ) : ?><li><a class="sicon vine" href="<?php echo $vine; ?>"></a></li><?php endif; ?>	
										<?php if ( $youtube != '' ) : ?><li><a class="sicon youtube" href="<?php echo $youtube; ?>"></a></li><?php endif; ?>
									
										<?php if ( $dribbble != '' ) : ?><li><a class="sicon dribbble" href="<?php echo $dribbble; ?>"></a></li><?php endif; ?>
										<?php if ( $flickr != '' ) : ?><li><a class="sicon flickr" href="<?php echo $flickr; ?>"></a></li><?php endif; ?>
										<?php if ( $pinterest != '' ) : ?><li><a class="sicon pinterest" href="<?php echo $pinterest; ?>"></a></li><?php endif; ?>
										
										<?php if ( $itunes != '' ) : ?><li><a class="sicon itunes" href="<?php echo $itunes; ?>"></a></li><?php endif; ?>

										<?php if ( $soundcloud != '' ) : ?><li><a class="sicon soundcloud" href="<?php echo $soundcloud; ?>"></a></li><?php endif; ?>
										<?php if ( $mixcloud != '' ) : ?><li><a class="sicon mixcloud" href="<?php echo $mixcloud; ?>"></a></li><?php endif; ?>
										<?php if ( $spotify != '' ) : ?><li><a class="sicon spotify" href="<?php echo $spotify; ?>"></a></li><?php endif; ?>
										
										
										

										
										
										<?php if ( $xing != '' ) : ?><li><a class="sicon xing" href="<?php echo $xing; ?>"></a></li><?php endif; ?>
										<?php if ( $linkedin != '' ) : ?><li><a class="sicon linkedin" href="<?php echo $linkedin; ?>"></a></li><?php endif; ?>
										<?php if ( $github != '' ) : ?><li><a class="sicon github" href="<?php echo $github; ?>"></a></li><?php endif; ?>
										<?php if ( $stackex != '' ) : ?><li><a class="sicon stackexchange" href="<?php echo $stackex; ?>"></a></li><?php endif; ?>
										
									</ul>
									<p><?php the_author_meta( $field, $author_id ); ?></p>	
								</div><!-- .author_profile -->
							</div><!-- .title -->
						</div><!-- .heading -->
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .static -->
	</div><!-- .reg -->


	
	<div class="main-content page archive-page">
        <div class="container">
           <div class="row">
				<div class="col-lg-8 col-md-8">

					<div class="page post">
						<div class="arch_posts entries">
						<!-- Start the Loop. -->
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							
							<?php
								/*This gets the template to display the posts.*/
								$format = get_post_format();
								get_template_part( 'post/format', $format );
							?>

						<?php endwhile; else: ?>
							<div class="post">
								<p>Sorry, no posts matched your criteria.</p>
							</div><!--post-->
						<?php endif; wp_reset_query(); ?>
				
						</div><!-- .arch_posts -->
					</div><!-- .page -->

					<div class="pagination clearfix">
						<?php 
						global $wp_query;
							$big = 999999999;			
							echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
							'prev_text'    => __('&laquo;','thstlang'),
							'next_text'    => __('&raquo;','thstlang')
							)); 			
						?>
					</div><!--pagination-->
				</div><!-- .col -->
	
				<div class="col-lg-4 col-md-4">
					<?php get_template_part( 'sidebar' ); ?> 
				</div><!-- .col -->			
			</div><!-- .row -->	
		</div><!-- .container -->
	</div><!-- .main-content -->

 

<?php
/*This displays the footer with help of footer.php*/
get_footer(); ?>