<?php
/**
 * Template Name: Landing Page
 */

get_header(); ?>
   

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
			<div id="boxone">
                <h1>Welcome</h1>
                <!-- HOW TO ACTUALLY MAKE THE OPTIONS PAGE DO SOMETHING -->
                <a href="index.php/<?php 
                         //Allows theme users to link to any page on their site via page slug for a 'Call to Action'
                $sfoptions = get_option('sf_options_settings');
                echo $sfoptions['cta_pageslug'] 
                         ?>"><p><?php 
                        //Allows theme users to change the call to action's link text
                $sfoptions = get_option('sf_options_settings');        
                echo $sfoptions['cta_text']
                         ?></p></a>
                <div class="greeting"><p>enter greeting</p>
                </div>
            </div>
                
            <div id="boxtwo">
                <p>About</p>
            </div>
            <div id="boxthree">
                <p>Skillset</p>
            </div>
            

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
