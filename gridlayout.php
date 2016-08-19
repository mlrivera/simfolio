<?php
/**
 * Template Name: Grid Layout 
 */

get_header(); ?>

	<div id="primary" class="content-area">
        
		<main id="main" class="site-main" role="main">
            
<!-- shows all posts in one category - referenced from the in-class lecture about the WordPress Loop on pages 10-11 and in https://codex.wordpress.org/Pagination to combine the pagination with the query-->
    <?php  
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array( 
            'posts_per_page' => 4, 
            'category_name'=> 'portfolio',
            'order' => 'ASC',
            'post_type' => 'post',
            'suppress_filters'=>true,
            'paged' => $paged);
        query_posts($args);
        $gridquery = new WP_Query($args);
    ?>
            
        <?php 
            if ($gridquery->have_posts()) :     
        
            while ($gridquery->have_posts()) : $gridquery->the_post(); ?>
            <div class="grid-wrap">    
            <div class=griditem>
                
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2 class="post-title"><?php the_title();?></h2>
                
            <?php if (has_post_thumbnail())
		      ?>	    
            
<!-- shows posts' featured images - referenced from: https://developer.wordpress.org/reference/functions/the_post_thumbnail/--> 
        <?php if (has_post_thumbnail()) ?>	
				<?php the_post_thumbnail('grid-thumb'); ?>
			
            <p><?php the_tags( 'Tagged as: ', ' , '); ?></p>
            </article>
                </div><!-- grid item-->
            </div><!-- grid wrap-->
<?php endwhile; endif; ?>  
                </div>
		</main><!-- #main --> 
<!-- pagination and navigation buttons referenced from:
    https://codex.wordpress.org/Pagination
    https://codex.wordpress.org/Function_Reference/next_posts_link -->   
<nav class="grid-nav">
        <div class="grid-older"><?php 
            echo next_posts_link('Older', $gridquery->max_num_pages); ?></div>
            
        <div class="grid-newer"><?php 
            echo previous_posts_link('Newer', $gridquery->max_num_pages); ?></div>
        </nav>
    </div><!-- #primary -->
        
        
<?php get_footer(); ?>