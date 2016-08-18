<?php
/**
 * Template Name: Grid Layout 
 */

get_header(); ?>

	<div id="primary" class="content-area">
        
		<main id="main" class="site-main" role="main">
            <div class="grid-wrap">
<!-- shows all posts in one category - referenced from the in-class lecture about the WordPress Loop on pages 10-11 and in https://codex.wordpress.org/Pagination to combine the pagination with the query-->
    <?php  
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array( 
            'showposts' => 6, 'cat'=> 10,'order' => 'ASC', 'paged' => $paged);
        query_posts($args);
        $grid = new WP_Query($args);
    ?>
            
        <?php 
            if ($grid->have_posts()) :             
            while ($grid->have_posts()) : $grid->the_post(); ?>
            <div class=griditem>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="post-title"><?php the_title();?></h1>
            <div class="entry-content">
<!-- shows posts' featured images - referenced from: https://developer.wordpress.org/reference/functions/the_post_thumbnail/--> 
        <?php if (has_post_thumbnail()) ?>	
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>			
	</div><!-- .entry-content -->
            </article>
<?php endwhile; endif; ?>  
                </div>
            </div>
		</main><!-- #main --> 
<!-- pagination and navigation buttons referenced from:
    https://codex.wordpress.org/Pagination
    https://codex.wordpress.org/Function_Reference/next_posts_link -->           
        <div class="nav-previous"><?php 
            echo next_posts_link(); ?></div>
            
        <div class="nav-next"><?php 
            echo previous_posts_link(); ?></div>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>