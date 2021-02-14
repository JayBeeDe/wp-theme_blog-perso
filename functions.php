<?php
require_once("lib/Smarty/Smarty.class.php");
if (function_exists('register_sidebar')) {
    register_sidebar();
}

$smarty=new Smarty();
$smarty->caching=0;
$smarty->setTemplateDir(get_template_directory()."/templates");
$smarty->setCompileDir(get_template_directory()."/templates_c");
//$smarty->setCacheDir(get_template_directory()."/templates_c");
$smarty->setConfigDir(get_template_directory()."/templates_c");
$smarty->assign('templateDir', get_template_directory_uri());

$listFont=array(
    'Linux Libertine' => 'LinLibertine.ttf',
    'Adam' => 'Adam.otf',
    'Oranienbaum' => 'Oranienbaum.ttf'
);

function customFontDeclarations()
{
    global $listFont;
    foreach ($listFont as $key => $value) {
        $ret=$ret.'@font-face {
		    font-family: '.$key.';
		    src: url("'.get_template_directory_uri().'/fonts/'.$value.'");
		}
		';
    }
    return $ret;
}

function cvrt($fct, $args="")
{
    ob_start();
    #scall_user_func_array($fct(),$args);
    $fct($args);
    $ret=ob_get_contents();
    ob_end_clean();
    return $ret;
}

function hex2rgb($colour, $mode=0)
{
    if ($colour[0]=='#') {
        $colour = substr($colour, 1);
    }
    if (strlen($colour)==6) {
        list($r, $g, $b)=array($colour[0].$colour[1],$colour[2].$colour[3],$colour[4].$colour[5]);
    } elseif (strlen($colour)==3) {
        list($r, $g, $b)=array($colour[0].$colour[0],$colour[1].$colour[1],$colour[2].$colour[2]);
    } else {
        return false;
    }
    $r=hexdec($r);
    $g=hexdec($g);
    $b=hexdec($b);
    if ($mode==0) {
        return $r.",".$g.",".$b;
    } else {
        return array('red'=>$r,'green'=>$g,'blue'=>$b);
    }
}

//presentation page

add_action('customize_register', 'blogperso_options');

function blogperso_options($wp_customize)
{
    global $listFont;
    $wp_customize->add_setting(
        'title_tagline_ie_favicon_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'title_tagline_ie_favicon_control',
            array(
                'default' => "",
                'label'    => __('ico Favicon for Internet Explorer', 'blogperso'),
                'section'  => 'title_tagline',
                'settings' => 'title_tagline_ie_favicon_setting',
                'priority' => 1000
            )
        )
    );


    /////////////////////////////////////////////////////////////////////////////////

    //background image setting
    //theme general section
    $wp_customize->add_section(
        'blogperso_font_section',
        array(
            'title'       => __('Font settings', 'blogperso'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
            'description' => __('Change Theme Page Option', 'blogperso')
        )
    );

    //Title - Font
    $wp_customize->add_setting(
        'blogperso_general_title_font_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_general_title_font_control',
        array(
            'default' => 0,
            'label'    => __('Title - Font', 'blogperso'),
            'section'  => 'blogperso_font_section',
            'type'     => 'select',
            'choices'  => array_keys($listFont),
            'settings' => 'blogperso_general_title_font_setting',
            'priority' => 10
        )
    );

    //Title - size
    $wp_customize->add_setting(
        'blogperso_general_title_size_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_general_title_size_control',
        array(
            'default' => 2,
            'label'    => __('Title - Size', 'blogperso'),
            'section'  => 'blogperso_font_section',
            'type'     => 'number',
            'settings' => 'blogperso_general_title_size_setting',
            'priority' => 10
        )
    );

    //Title - color
    $wp_customize->add_setting(
        'blogperso_general_title_color_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blogperso_general_title_color_control',
            array(
                'default' => '#000000',
                'label'    => __('Title - Color', 'blogperso'),
                'section'  => 'blogperso_font_section',
                'settings' => 'blogperso_general_title_color_setting',
                'priority' => 10
            )
        )
    );

    //Item - Font
    $wp_customize->add_setting(
        'blogperso_general_item_font_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_general_item_font_control',
        array(
            'default' => 0,
            'label'    => __('Item - Font', 'blogperso'),
            'section'  => 'blogperso_font_section',
            'type'     => 'select',
            'choices'  => array_keys($listFont),
            'settings' => 'blogperso_general_item_font_setting',
            'priority' => 10
        )
    );

    //Item - size
    $wp_customize->add_setting(
        'blogperso_general_item_size_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_general_item_size_control',
        array(
            'default' => 1,
            'label'    => __('Item - Size', 'blogperso'),
            'section'  => 'blogperso_font_section',
            'type'     => 'number',
            'settings' => 'blogperso_general_item_size_setting',
            'priority' => 10
        )
    );

    //Item - color
    $wp_customize->add_setting(
        'blogperso_general_item_color_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blogperso_general_item_color_control',
            array(
                'default' => '#000000',
                'label'    => __('Item - Color', 'blogperso'),
                'section'  => 'blogperso_font_section',
                'settings' => 'blogperso_general_item_color_setting',
                'priority' => 10
            )
        )
    );

    //Content - Font
    $wp_customize->add_setting(
        'blogperso_general_content_font_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_general_content_font_control',
        array(
            'default' => 0,
            'label'    => __('Content - Font', 'blogperso'),
            'section'  => 'blogperso_font_section',
            'type'     => 'select',
            'choices'  => array_keys($listFont),
            'settings' => 'blogperso_general_content_font_setting',
            'priority' => 10
        )
    );

    //Content - size
    $wp_customize->add_setting(
        'blogperso_general_content_size_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_general_content_size_control',
        array(
            'default' => 1,
            'label'    => __('Content - Size', 'blogperso'),
            'section'  => 'blogperso_font_section',
            'type'     => 'number',
            'settings' => 'blogperso_general_content_size_setting',
            'priority' => 10
        )
    );

    //Content - color
    $wp_customize->add_setting(
        'blogperso_general_content_color_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blogperso_general_content_color_control',
            array(
                'default' => '#000000',
                'label'    => __('Content - Color', 'blogperso'),
                'section'  => 'blogperso_font_section',
                'settings' => 'blogperso_general_content_color_setting',
                'priority' => 10
            )
        )
    );

    /////////////////////////////////////////////////////////////////////////////////
    //general page section
    $wp_customize->add_section(
        'blogperso_general_section',
        array(
            'title'       => __('General Settings', 'blogperso'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
            'description' => __('Change General Page Option', 'blogperso')
        )
    );

    //background image setting
    $wp_customize->add_setting(
        'blogperso_general_background_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'blogperso_general_background_control',
            array(
                'default' => get_template_directory_uri().'/screenshot.png',
                'label'    => __('General Page Background', 'blogperso'),
                'section'  => 'blogperso_general_section',
                'settings' => 'blogperso_general_background_setting',
                'priority' => 10
            )
        )
    );
    //bg color
    $wp_customize->add_setting(
        'blogperso_general_bgcolor_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blogperso_general_bgcolor_control',
            array(
                'default' => 'ffffff',
                'label'    => __('Background Color', 'blogperso'),
                'section'  => 'blogperso_general_section',
                'settings' => 'blogperso_general_bgcolor_setting',
                'priority' => 10
            )
        )
    );
    //bg opacity
    $wp_customize->add_setting(
        'blogperso_general_bgopacity_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_general_bgopacity_control',
        array(
            'default' => 50,
            'label'    => __('Background Opacity Percent', 'blogperso'),
            'section'  => 'blogperso_general_section',
            'settings' => 'blogperso_general_bgopacity_setting',
            'priority' => 10
        )
    );
    //Gaussian Blur
    $wp_customize->add_setting(
        'blogperso_general_gaussian_blur_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_general_gaussian_blur_control',
        array(
            'default' => 20,
            'label'    => __('Gaussian Blur Percent', 'blogperso'),
            'section'  => 'blogperso_general_section',
            'settings' => 'blogperso_general_gaussian_blur_setting',
            'priority' => 10
        )
    );
    //bg accentuation 1
    $wp_customize->add_setting(
        'blogperso_general_accentuation1_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blogperso_general_accentuation1_control',
            array(
                'default' => 'bababa',
                'label'    => __('Accentuation 1 Color', 'blogperso'),
                'section'  => 'blogperso_general_section',
                'settings' => 'blogperso_general_accentuation1_setting',
                'priority' => 10
            )
        )
    );
    //bg accentuation 2
    $wp_customize->add_setting(
        'blogperso_general_accentuation2_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blogperso_general_accentuation2_control',
            array(
                'default' => '777777',
                'label'    => __('Accentuation 2 Color', 'blogperso'),
                'section'  => 'blogperso_general_section',
                'settings' => 'blogperso_general_accentuation2_setting',
                'priority' => 10
            )
        )
    );

    /////////////////////////////////////////////////////////////////////////////////
    //footer section
    $wp_customize->add_section(
        'blogperso_footer_section',
        array(
            'title'       => __('Footer Settings', 'blogperso'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
            'description' => __('Change Footer Settings', 'blogperso')
        )
    );

    //social name 1
    $wp_customize->add_setting(
        'blogperso_footer_social1_name_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_footer_social1_name_control',
        array(
            'default' => 0,
            'label'    => __('Social Network 1 - Name', 'blogperso'),
            'section'  => 'blogperso_footer_section',
            'settings' => 'blogperso_footer_social1_name_setting',
            'priority' => 10
        )
    );
    //social image 1
    $wp_customize->add_setting(
        'blogperso_footer_social1_logo_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'blogperso_footer_social1_logo_control',
            array(
                'default' => get_template_directory_uri().'/screenshot.png',
                'label'    => __('Social Network 1 - Logo', 'blogperso'),
                'section'  => 'blogperso_footer_section',
                'settings' => 'blogperso_footer_social1_logo_setting',
                'priority' => 10
            )
        )
    );
    //social url 1
    $wp_customize->add_setting(
        'blogperso_footer_social1_url_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_footer_social1_url_control',
        array(
            'default' => 0,
            'label'    => __('Social Network 1 - URL', 'blogperso'),
            'section'  => 'blogperso_footer_section',
            'settings' => 'blogperso_footer_social1_url_setting',
            'priority' => 10
        )
    );

    //social name 2
    $wp_customize->add_setting(
        'blogperso_footer_social2_name_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_footer_social2_name_control',
        array(
            'default' => 0,
            'label'    => __('Social Network 2 - Name', 'blogperso'),
            'section'  => 'blogperso_footer_section',
            'settings' => 'blogperso_footer_social2_name_setting',
            'priority' => 10
        )
    );
    //social image 2
    $wp_customize->add_setting(
        'blogperso_footer_social2_logo_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'blogperso_footer_social2_logo_control',
            array(
                'default' => get_template_directory_uri().'/screenshot.png',
                'label'    => __('Social Network 2 - Logo', 'blogperso'),
                'section'  => 'blogperso_footer_section',
                'settings' => 'blogperso_footer_social2_logo_setting',
                'priority' => 10
            )
        )
    );
    //social url 2
    $wp_customize->add_setting(
        'blogperso_footer_social2_url_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_footer_social2_url_control',
        array(
            'default' => 0,
            'label'    => __('Social Network 2 - URL', 'blogperso'),
            'section'  => 'blogperso_footer_section',
            'settings' => 'blogperso_footer_social2_url_setting',
            'priority' => 10
        )
    );

    //social name 3
    $wp_customize->add_setting(
        'blogperso_footer_social3_name_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_footer_social3_name_control',
        array(
            'default' => 0,
            'label'    => __('Social Network 3 - Name', 'blogperso'),
            'section'  => 'blogperso_footer_section',
            'settings' => 'blogperso_footer_social3_name_setting',
            'priority' => 10
        )
    );
    //social image 3
    $wp_customize->add_setting(
        'blogperso_footer_social3_logo_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'blogperso_footer_social3_logo_control',
            array(
                'default' => get_template_directory_uri().'/screenshot.png',
                'label'    => __('Social Network 3 - Logo', 'blogperso'),
                'section'  => 'blogperso_footer_section',
                'settings' => 'blogperso_footer_social3_logo_setting',
                'priority' => 10
            )
        )
    );
    //social url 3
    $wp_customize->add_setting(
        'blogperso_footer_social3_url_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_footer_social3_url_control',
        array(
            'default' => 0,
            'label'    => __('Social Network 3 - URL', 'blogperso'),
            'section'  => 'blogperso_footer_section',
            'settings' => 'blogperso_footer_social3_url_setting',
            'priority' => 10
        )
    );

    /////////////////////////////////////////////////////////////////////////////////
    //presentation page section
    $wp_customize->add_section(
        'blogperso_presentation_section',
        array(
            'title'       => __('Presentation Page', 'blogperso'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
            'description' => __('Change Presentation Page Option', 'blogperso')
        )
    );

    //background image setting
    $wp_customize->add_setting(
        'blogperso_presentation_background_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'blogperso_presentation_background_control',
            array(
                'default' => get_template_directory_uri().'/screenshot.png',
                'label'    => __('Presentation Page Background', 'blogperso'),
                'section'  => 'blogperso_presentation_section',
                'settings' => 'blogperso_presentation_background_setting',
                'priority' => 10
            )
        )
    );
    //bg color
    $wp_customize->add_setting(
        'blogperso_presentation_bgcolor_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'blogperso_presentation_bgcolor_control',
            array(
                'default' => 'ffffff',
                'label'    => __('Background Color', 'blogperso'),
                'section'  => 'blogperso_presentation_section',
                'settings' => 'blogperso_presentation_bgcolor_setting',
                'priority' => 10
            )
        )
    );
    //bg opacity
    $wp_customize->add_setting(
        'blogperso_presentation_bgopacity_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_presentation_bgopacity_control',
        array(
            'default' => 50,
            'label'    => __('Background Opacity Percent', 'blogperso'),
            'section'  => 'blogperso_presentation_section',
            'settings' => 'blogperso_presentation_bgopacity_setting',
            'priority' => 10
        )
    );
    //Gaussian Blur
    $wp_customize->add_setting(
        'blogperso_presentation_gaussian_blur_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_presentation_gaussian_blur_control',
        array(
            'default' => 20,
            'label'    => __('Gaussian Blur Percent', 'blogperso'),
            'section'  => 'blogperso_presentation_section',
            'settings' => 'blogperso_presentation_gaussian_blur_setting',
            'priority' => 10
        )
    );

    //Title of the presentation page
    $wp_customize->add_setting(
        'blogperso_presentation_title_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_presentation_title_control',
        array(
            'default' => '',
            'label'    => __('Presentation Page Custom Title', 'blogperso'),
            'section'  => 'blogperso_presentation_section',
            'settings' => 'blogperso_presentation_title_setting',
            'priority' => 10
        )
    );

    //Only display CV
    $wp_customize->add_setting(
        'blogperso_presentation_only_cv_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_presentation_only_cv_control',
        array(
            'label'    => __('Enable only this page', 'blogperso'),
            'section'  => 'blogperso_presentation_section',
            'settings' => 'blogperso_presentation_only_cv_setting',
            'priority' => 10,
            'default' => false,
            'type' => 'checkbox'
        )
    );

    /////////////////////////////////////////////////////////////////////////////////
    //admin section
    $wp_customize->add_section(
        'blogperso_admin_section',
        array(
            'title'       => __('Admin Customize', 'blogperso'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
            'description' => __('Change Admin Login Page', 'blogperso')
        )
    );

    //login background image setting
    $wp_customize->add_setting(
        'blogperso_admin_background_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'blogperso_admin_background_control',
            array(
                'default' => get_template_directory_uri().'/screenshot.png',
                'label'    => __('Login Page Background', 'blogperso'),
                'section'  => 'blogperso_admin_section',
                'settings' => 'blogperso_admin_background_setting',
                'priority' => 10
            )
        )
    );

    //login background image setting
    $wp_customize->add_setting(
        'blogperso_admin_loginlogo_setting',
        array(
            'type' => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'blogperso_admin_loginlogo_control',
            array(
                'default' => get_site_icon_url(),
                'label'    => __('Login Logo', 'blogperso'),
                'section'  => 'blogperso_admin_section',
                'settings' => 'blogperso_admin_loginlogo_setting',
                'priority' => 10
            )
        )
    );

    $wp_customize->add_setting(
        'blogperso_admin_httperrormessage_setting',
        array(
            'type'    => 'theme_mod'
        )
    );
    $wp_customize->add_control(
        'blogperso_admin_httperrormessage_control',
        array(
            'default' => '',
            'label'    => __('HTTP Error Custom Message', 'blogperso'),
            'section'  => 'blogperso_admin_section',
            'settings' => 'blogperso_admin_httperrormessage_setting',
            'priority' => 10
        )
    );
}

// function blogperso_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => __( 'Primary Sidebar', 'blogperso' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => __( 'Main sidebar that appears on the leftddd.', 'blogperso' ),
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</aside>',
// 		'before_title'  => '<h1 class="widget-title">',
// 		'after_title'   => '</h1>',
// 	) );
// }
// add_action( 'widgets_init', 'blogperso_widgets_init' );

function register_my_menus()
{
    register_nav_menus(
        array(
      'header-menu' => __('Header Menu'),
      'extra-menu' => __('Extra Menu')
    )
    );
}
add_action('init', 'register_my_menus');

function my_login_logo()
{
    global $smarty;
    if (!filter_var(get_theme_mod('blogperso_admin_loginlogo_setting'), FILTER_VALIDATE_URL) === false) {
        $smarty->assign("loginLogoPath", get_theme_mod('blogperso_admin_loginlogo_setting'));
    } else {
        $smarty->assign("loginLogoPath", get_site_icon_url());
    }
    $smarty->assign("backgroundPath", get_theme_mod("blogperso_admin_background_setting"));
    echo $smarty->fetch('admin.tpl');
}
add_action('login_enqueue_scripts', 'my_login_logo');


function processNavMenu()
{
    $args=array(
        'echo' => false,
        'container_class' => 'navbar-collapse collapse sidebar-navbar-collapse',
        'menu_class' => 'nav navbar-nav',
    );
    $menu=wp_nav_menu($args);

    //$menu=preg_replace('class="sub-menu"','class="dropdown-menu"',$menu);
    $menu=preg_replace('/ class="sub-menu"/', '/ class="dropdown-menu" /', $menu);
    $menu=preg_replace('/li class=".*menu-item-has-children.*"/', 'li class="dropdown"', $menu);
    return $menu;
}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function svg_size()
{
    echo '<style>
    svg, img[src*=".svg"] {
      max-width: 150px !important;
      max-height: 150px !important;
    }
  </style>';
}
add_action('admin_head', 'svg_size');

?>