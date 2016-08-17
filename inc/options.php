<?php

function sf_add_submenu(){
    add_submenu_page( 'themes.php', 'Simfolio Theme Options Page', 'Simfolio Options', 'manage_options', 'simfolio_options', 'sf_options_page');}

add_action( 'admin_menu', 'sf_add_submenu' );

function sf_settings_init(){
    
    register_setting('theme_options', 'sf_options_settings');
    
    add_settings_section(
        'sf_options_section',
        'Simfolio Theme Features',
        'sf_opt_section_callback',
        'theme_options');
    function sf_opt_section_callback(){
        echo 'This options page includes the following features:';
    }
    
//text box for call to action page slug
        add_settings_field( 
            'cta_pageslug', 
            'Page Slug&ast;', 
            'sf_cta_pagelink', 
            'theme_options', 
            'sf_options_section');
        
        function sf_cta_pagelink(){
            $sfoptions = get_option('sf_options_settings');
            ?>

        <input type="text" name="sf_options_settings[cta_pageslug]" value="<?php if(isset($sfoptions['cta_pageslug']))echo   $sfoptions['cta_pageslug'];?>"/><br/>
        <p>You can find your page slug in the page section via your dashboard. Ex: /portfolio</p>
        <?php
        }

//text box for call to action link text
        add_settings_field( 
            'cta_text', 
            'Call to Action&ast;', 
            'sf_cta_text', 
            'theme_options', 
            'sf_options_section');
        
        function sf_cta_text(){
            $sfoptions = get_option('sf_options_settings');
            ?>
            
        <input type="text" name="sf_options_settings[cta_text]" value="<?php if(isset($sfoptions['cta_text'])) echo   $sfoptions['cta_text'];?>"/><br/>
        <p></p>
        <?php
        }
    
//selectbox to change the font of the masthead
        add_settings_field(
            'masthead_font',
            'Choose a Font',
            'sf_masttext_font',
            'theme_options',
            'sf_options_section');
        
        function sf_masttext_font(){
            $sfoptions = get_option('sf_options_settings');
            ?>
        
        <select name="sf_options_settings[masthead_font]">
            <option value="'Knewave'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 1); ?>>Knewave Font</option>
            
            <option value="'Megrim'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 2); ?>>Megrim Font</option>
            
            <option value="'Yeseva One'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 3); ?>>Yeseva One Font</option>
            
            <option value="'Serina'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 4); ?>>Serina Font</option>
        </select>
        <?php
        }
    
    function sf_options_page(){
            ?>
            <form action="options.php" method="post">
                <h2>Simfolio Theme Options Page</h2>
                <?php
                settings_fields('theme_options');
                do_settings_sections('theme_options');
                submit_button();
                ?>
            </form>
        <?php
        }
}

add_action('admin_init', 'sf_settings_init');
