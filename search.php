<?php get_header(); ?>

<script>
jQuery(document).ready(function($){
	
	var $searchContainer = $('#search-results');
	
	$(window).load(function(){
		
		
		
		$searchContainer.css('visibility','visible');
				
	});
	
	$(window).resize(function(){
	   $searchContainer.isotope({
	   	  layoutMode: 'packery',
	      packery: { columnWidth: $('#search-results').width() / 4}
	   });
	});
});
</script>

<div class="container-wrap">
	
	<div class="container main-content">
		
		<div class="row">
			<div class="col span_12">
				<div class="col span_12 section-title">
					<h1><?php echo __('Results For', NECTAR_THEME_NAME); ?><span>"<?php echo esc_html( get_search_query( false ) ); ?>"</span></h1>
				</div>
			</div>
		</div>
		
		<div class="divider"></div>
		
		<div class="row">
			
			<div class="col span_12">
				<?php echo '<div id="post-area" class="col span_12 col_last masonry meta_overlaid" > 
					<div class="posts-container" data-load-animation="fade_in">'
				?>
				
				<div id="search-results">
						
					<?php 
						if (have_posts()) {
							while(have_posts()) {
							the_post();
							global $more;
							$more = 0;

							if ( floatval(get_bloginfo('version')) < "3.6" ) {
								//old post formats before they got built into the core
								get_template_part( 'includes/post-templates-pre-3-6/entry', get_post_format() );
							} else {
								//WP 3.6+ post formats
								get_template_part( 'includes/post-templates/entry', get_post_format() );
							}
							}
						} else {
							echo ("<p>No results found</p>");
						}
				 	?>
				
						
				</div><!--/search-results-->
				
				
			</div><!--/span_9-->
				<?php if( get_next_posts_link() || get_previous_posts_link() ) { ?>
					<div id="pagination">
						<div class="prev"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
						<div class="next"><?php next_posts_link('Next Entries &raquo;','') ?></div>
					</div>	
				<?php }?>
			
						<div id="sidebar" class="col span_3 col_last">
							<?php get_sidebar(); ?>
						</div><!--/span_3-->
					</div>
				</div>
		
		</div><!--/row-->
		
	</div><!--/container-->

</div><!--/container-wrap-->

<?php get_footer(); ?>

