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

//selectbox to change the text style of the masthead title
        add_settings_field(
            'masthead_title',
            'Choose a Title Style',
            'sf_masttransform',
            'theme_options',
            'sf_options_section');
        
        function sf_masttransform(){
            $sfoptions = get_option('sf_options_settings');
            ?>
        
        <select name="sf_options_settings[masthead_title]">
            <option value="uppercase" <?php if(isset($sfoptions['masthead_title'])) selected($sfoptions['masthead_title'], 1); ?>>Uppercase</option>
            
            <option value="lowercase" <?php if(isset($sfoptions['masthead_title'])) selected($sfoptions['masthead_title'], 2); ?>>Lowercase</option>
            
            <option value="capitalize" <?php if(isset($sfoptions['masthead_title'])) selected($sfoptions['masthead_title'], 3); ?>>Capitalize</option>
        </select>
        <?php
        }
    
//selectbox to change the font of the masthead
        add_settings_field(
            'masthead_font',
            'Choose a Title Font',
            'sf_masttext_font',
            'theme_options',
            'sf_options_section');
        
        function sf_masttext_font(){
            $sfoptions = get_option('sf_options_settings');
            ?>
        
        <select name="sf_options_settings[masthead_font]">
            <option value="'Open Sans'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 1); ?>>Open Sans [Default Font]</option>
            
            <option value="'Megrim'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 2); ?>>Megrim Font</option>
            
            <option value="'Yeseva One'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 3); ?>>Yeseva One Font</option>
            
            <option value="'Serina'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 4); ?>>Serina Font</option>
            
            <option value="'Knewave'" <?php if(isset($sfoptions['masthead_font'])) selected($sfoptions['masthead_font'], 5); ?>>Knewave Font</option>
            
        </select>
        <?php
        }
    
//textarea for about me
        add_settings_field(
            'aboutme',
            'Enter content for your About Me',
            'aboutme_text',
            'theme_options',
            'sf_options_section');
        
        function aboutme_text(){
            $sfoptions = get_option('sf_options_settings');
            ?>

        <textarea cols="60" rows="5" name="sf_options_settings[aboutme]">
            <?php if(isset($sfoptions['aboutme'])) echo $sfoptions['aboutme'];?>
        </textarea>
        <?php
        }
    
    //textarea for Skill 1
        add_settings_field(
            'first_skill',
            'Enter Your 1st Skill',
            'firstskill_text',
            'theme_options',
            'sf_options_section');
        
        function firstskill_text(){
            $sfoptions = get_option('sf_options_settings');
            ?>

        <textarea cols="60" rows="1" name="sf_options_settings[first_skill]">
            <?php if(isset($sfoptions['first_skill'])) echo $sfoptions['first_skill'];?>
        </textarea>
        <?php
        }
    
    //textarea for Skill 2
        add_settings_field(
            'second_skill',
            'Enter Your 2nd Skill',
            'secondskill_text',
            'theme_options',
            'sf_options_section');
        
        function secondskill_text(){
            $sfoptions = get_option('sf_options_settings');
            ?>

        <textarea cols="60" rows="1" name="sf_options_settings[second_skill]">
            <?php if(isset($sfoptions['second_skill'])) echo $sfoptions['second_skill'];?>
        </textarea>
        <?php
        }
    
    //textarea for Skill 2
        add_settings_field(
            'third_skill',
            'Enter Your 3rd Skill',
            'thirdskill_text',
            'theme_options',
            'sf_options_section');
        
        function thirdskill_text(){
            $sfoptions = get_option('sf_options_settings');
            ?>

        <textarea cols="60" rows="1" name="sf_options_settings[third_skill]">
            <?php if(isset($sfoptions['third_skill'])) echo $sfoptions['third_skill'];?>
        </textarea>
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
