<?php
function cd_add_submenu(){
    add_submenu_page( 
        'themes.php', 
        'My Super Awesome Options Page', 
        'Theme Options', 
        'manage_options', 
        'theme_options', 
        'my_theme_options_page');
    }

add_action( 'admin_menu', 'cd_add_submenu' );

    function ex_settings_init(){

        register_setting('theme_options', 'ex_options_settings');

        add_settings_section(
            'ex_options_page_section',
            'Your Section Title',
            'ex_options_page_section_callback',
            'theme_options'
        );

        function ex_options_page_section_callback(){
            echo 'A descrption about the section';
        }
//text box
        add_settings_field( 
            'ex_text_field', 
            'Enter your text', 
            'ex_text_field_render', 
            'theme_options', 
            'ex_options_page_section');
        
        function ex_text_field_render(){
            $options = get_option('ex_options_settings');
            ?>
            
        <input type="text" name="ex_options_settings[ex_text_field]" value="<?php if(isset($options['ex_text_field']))echo   $options['ex_text_field'];?>"/>
        <?php
        }

//checkbox            
        add_settings_field( 
            'ex_check_field', 
            'Enter your text', 
            'ex_check_field_render', 
            'theme_options', 
            'ex_options_page_section');
            
        function ex_check_field_render(){
            $options = get_option('ex_options_settings');
            ?>
        <input type="checkbox" name="ex_options_settings[ex_check_field]" value="<?php if(isset($options['ex_check_field']))checked('on', ($options['ex_check_field'])); ?>"/>
        <label>Turn it on</label>
        <?php
        }
        
//radio
        add_settings_field( 
            'ex_radio_field', 
            'Choose an option', 
            'ex_radio_field_render', 
            'theme_options', 
            'ex_options_page_section');
            
        function ex_radio_field_render(){
            $options = get_option('ex_options_settings');
            ?>
        <input type="radio" name="ex_options_settings[ex_radio_field]" <?php if(isset($options['ex_radio_field']))checked( $options['ex_check_field'], 1); ?> value="1"/>
        <label>Option One</label>

        <input type="radio" name="ex_options_settings[ex_radio_field]" <?php if(isset($options['ex_radio_field']))checked( $options['ex_check_field'], 2); ?> value="2"/>
        <label>Option Two</label>

        <input type="radio" name="ex_options_settings[ex_radio_field]" <?php if(isset($options['ex_radio_field']))checked( $options['ex_check_field'], 3); ?> value="3"/>
        <label>Option Three</label>
        <?php
        }
        
//textarea
        add_settings_field(
            'ex_textarea',
            'Enter content in the text area',
            'ex_textarea_render',
            'theme_options',
            'ex_options_page_section');
        
        function ex_textarea_render(){
            $options = get_option('ex_options_settings');
            ?>

        <textarea cols="40" rows="50" name="ex_options_settings[ex_textarea]">
            <?php if(isset($options['ex_textarea'])) echo $options['ex_textarea'];?>
        </textarea>
        <?php
        }
        
//selectbox
        add_settings_field(
            'ex_select',
            'Enter content in the text area',
            'ex_select_render',
            'theme_options',
            'ex_options_page_section');
        
        function ex_select_render(){
            $options = get_option('ex_options_settings');
            ?>
        
        <select name="ex_options_settings[ex_select]">
            <option value="1" <?php if(isset($options['ex_select'])) selected($options['ex_select'], 1); ?>>Option One</option>
            
            <option value="2" <?php if(isset($options['ex_select'])) selected($options['ex_select'], 2); ?>>Option Two</option>
            
        </select>
        <?php
        }
        
        function my_theme_options_page(){
            ?>
            <form action="options.php" method="post">
                <h2>My Awesome Options Page</h2>
                <?php
                settings_fields('theme_options');
                do_settings_sections('theme_options');
                submit_button();
                ?>
            </form>
        <?php
        }
}
       
add_action('admin_init','ex_settings_init');