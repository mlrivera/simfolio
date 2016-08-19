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
                <div id="cta">
                <a href="index.php/<?php 
                         //Allows theme users to link to any page on their site via page slug for a 'Call to Action'
                $sfoptions = get_option('sf_options_settings');
                echo $sfoptions['cta_pageslug'] 
                         ?>" class="cta"><?php 
                        //Allows theme users to change the call to action's link text
                $sfoptions = get_option('sf_options_settings');        
                echo $sfoptions['cta_text']
                    ?></a></div>
            </div>
                
            <div id="boxtwo">
                <h1>About</h1>
                <p><?php 
                        //Allows theme users to add an About Me
                $sfoptions = get_option('sf_options_settings');        
                echo $sfoptions['aboutme']
                    ?></p>
            </div>
            <div id="boxthree">
                <h1>Specialities</h1>
                <ul><li> <?php 
                        //Allows theme users to add their first skill
                $sfoptions = get_option('sf_options_settings');        
                echo $sfoptions['first_skill']
                    ?></li>
                <li> <?php 
                        //Allows theme users to add their second skill
                $sfoptions = get_option('sf_options_settings');        
                echo $sfoptions['second_skill']
                    ?></li>
                <li> <?php 
                        //Allows theme users to add their third skill
                $sfoptions = get_option('sf_options_settings');        
                echo $sfoptions['third_skill']
                    ?></li></ul>
            </div>
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
