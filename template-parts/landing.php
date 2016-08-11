<?php
/**
 * Template Name: Landing Page
 */

get_header(); ?>
   
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
			<div id="welcome">
                <h1>Welcome</h1>
                <!-- HOW TO ACTUALLY MAKE THE OPTIONS PAGE DO SOMETHING -->
                <div class="greeting"><p><?php

                $options = get_option('ex_options_settings');

                echo $options['ex_text_field'] . '<br/>';
                    ?></p>
                </div>
            </div>
                
            <div id="boxtwo">
                <p>Welcome</p>
            </div>
            <div id="boxthree">
                <p>Welcome</p>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
