<?php  
/* 
    Plugin Name: WordPress Inpage Post Navigation
    Plugin URI: https://sketchthemes.com/
    Description: 
    Version: 1.0.1
    Author: SketchThemes
    Author URI: https://sketchthemes.com/
*/  
?>
<?php 

class PostnaviSettingsPage
{
    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'postnavi_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'postnavi_page_init' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'postnavi_load_wp_admin_script' ) );
    }

	function postnavi_load_wp_admin_script() {
		wp_enqueue_script( 'colpick_js', plugin_dir_url( __FILE__ ) . 'js/colpick.js', array('jquery'), '1.9.7', true );
		wp_enqueue_script( 'functional_js', plugin_dir_url( __FILE__ ) . 'js/functional.js', array('jquery'), '2.9.7', false );
		wp_enqueue_style( 'post_navi_admin_css', plugin_dir_url( __FILE__ ) . 'css/post_navi_admin.css' );
		wp_enqueue_style( 'colpick_css', plugin_dir_url( __FILE__ ) . 'css/colpick.css' );
	}


    /**
     * Add options page
     */
    public function postnavi_add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'WP Inpage Postnavi', 
            'WP Postnavi', 
            'manage_options', 
            'wp_postnavi',
            array( $this, 'postnavi_create_admin_page' ),
            '',
            45
        );
    }

    /**
     * Options page callback
     */
    public function postnavi_create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'postnavi_option' );
        ?>
        <div class="wrap">
            <h2>WP Inpage Post Navigation</h2>           
            <form method="post" class="post_navi_class" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'postnavi_option_group' );   
                do_settings_sections( 'postnavi-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function postnavi_page_init()
    {        
        register_setting(
            'postnavi_option_group', // Option group
            'postnavi_option', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'General Setting', // Title
            array( $this, 'print_section_info' ), // Callback
            'postnavi-setting-admin' // Page
        );  

        add_settings_field(
            'post_title', // ID
            'Post Link Text Prefix', // Title 
            array( $this, 'postnavi_title_callback' ), // Callback
            'postnavi-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'postnavi_link_color', 
            'Link Color', 
            array( $this, 'postnavi_link_color_callback' ), 
            'postnavi-setting-admin', 
            'setting_section_id'
        );
        add_settings_field(
            'postnavi_position', 
            'Post Navi Postion Horizontal', 
            array( $this, 'postnavi_position_callback' ), 
            'postnavi-setting-admin',
            'setting_section_id'
        );  
        add_settings_field(
            'postnavi_position_vertical', 
            'Post Navi Postion Top', 
            array( $this, 'postnavi_position_vertical_callback' ), 
            'postnavi-setting-admin', 
            'setting_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['postnavi_title'] ) )
            $new_input['postnavi_title'] = sanitize_text_field( $input['postnavi_title'] );

        if( isset( $input['postnavi_link_color'] ) )
            $new_input['postnavi_link_color'] = sanitize_text_field( $input['postnavi_link_color'] );
        if( isset( $input['postnavi_position'] ) )
            $new_input['postnavi_position'] = sanitize_text_field( $input['postnavi_position'] );

        if( isset( $input['postnavi_position_vertical'] ) )
            $new_input['postnavi_position_vertical'] = sanitize_text_field( $input['postnavi_position_vertical'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
    }

    /** 
     * Title Callback
     */
    public function postnavi_title_callback()
    {
        printf(
            '<input type="text" id="postnavi_title" name="postnavi_option[postnavi_title]" value="%s" />',
            isset( $this->options['postnavi_title'] ) ? esc_attr( $this->options['postnavi_title']) : ''
        );
    }

    /** 
     * Link Color Callback
     */
    public function postnavi_link_color_callback()
    {
        printf(
            '<span class="postnavi_symbol">#</span><input type="text" id="postnavi_link_color" name="postnavi_option[postnavi_link_color]" value="%s" />',
            isset( $this->options['postnavi_link_color'] ) ? esc_attr( $this->options['postnavi_link_color']) : ''
        );
    }

    /** 
     * Position Callback
     */
    public function postnavi_position_callback()
    {
        $pluginOption = get_option("postnavi_option");
            echo '<select name="postnavi_option[postnavi_position]"><option value="left"';
            if($pluginOption["postnavi_position"]=="left") { echo 'selected'; }
            echo '>Left</option><option value="right"';
            if($pluginOption["postnavi_position"]=="right") { echo 'selected'; }
            echo '>Right</option></select>';
    }

    /** 
     * Vertical Position Callback
     */
    public function postnavi_position_vertical_callback()
    {
        printf(
            '<input type="text" id="postnavi_position_vertical" name="postnavi_option[postnavi_position_vertical]" value="%s" /><br /><span style="color:#ccc">Do Not Include px</span>',
            isset( $this->options['postnavi_position_vertical'] ) ? esc_attr( $this->options['postnavi_position_vertical']) : ''
        );
    }
    	
}

    /** 
     * Class Object
     */
if(is_admin()) {
	$postnavi_settings_page = new PostnaviSettingsPage();	
}

function postnaviEnqu() {
	 if( is_home() ){
		wp_enqueue_script( 'postnavi_js',plugins_url( '/js/postnavi.js' , __FILE__ ), array('jquery'), true );
        include('css/customcss.php');
        include('js/customjs.php');
	}
}
	
add_action( 'wp_footer', 'postnaviEnqu');

function postnavi_appendContent() {
	 if( is_home() ){
	 	$pluginOption = get_option("postnavi_option");?>
	 	<div class='flotingDiv' style='<?php echo $pluginOption['postnavi_position']; ?>: 0; top:<?php echo $pluginOption['postnavi_position_vertical']; ?>px;'>
            
            <span class="postnavi"><div style='background :#<?php echo $pluginOption['postnavi_link_color']; ?> none repeat scroll 0 0; color:#fff; font-weight:bold; width:80px; padding: 8px 0; text-align:center; margin-bottom:1px;'  class='post_navi_title'>Post Navi</div></span>
                
            <ul class="postul">
	 	<?php 
	 	$i = 1;

	 	if(have_posts()) :
		while(have_posts()) : the_post();?>
	          <li class="var_nav" id="<?php echo 'var_nav'.$i; ?>">
                    
                    <p style='background :#<?php echo $pluginOption['postnavi_link_color']; ?> none repeat scroll 0 0; color:#fff; text-align:center;' class="postss"><a class="tabber" title = "<?php echo get_the_title(); ?>" href="#postnavi_<?php echo get_the_ID(); ?>"><?php if(isset($pluginOption['postnavi_title'])){ echo $pluginOption['postnavi_title']." ".$i;} else{ echo "Post"." ".$i; } ?></a></p>
                    <p style='background :#<?php echo $pluginOption['postnavi_link_color']; ?> none repeat scroll 0 0; color:#fff;' class="titlee"><a class="tabber" href="#postnavi_<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></a></p>   
              </li>
        <?php
		$i++;
		endwhile; 
		endif;?>
              </ul>
        </div>
        <?php 
	}
}
add_action( 'wp_footer', 'postnavi_appendContent');

add_filter( 'the_excerpt', 'postnavi_updatePostContent');
add_filter( 'the_content', 'postnavi_updatePostContent');

function postnavi_updatePostContent($thecontent) {
	$Modifiedcont = "<div id='postnavi_".get_the_ID()."'>".$thecontent."</div>";
  	return $Modifiedcont;
}