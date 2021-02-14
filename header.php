<?php
$smarty->assign("customFontDeclarations", customFontDeclarations());

$smarty->assign("fontTitle", array_keys($listFont)[get_theme_mod('blogperso_general_title_font_setting')]);
$smarty->assign("fontItem", array_keys($listFont)[get_theme_mod('blogperso_general_item_font_setting')]);
$smarty->assign("fontContent", array_keys($listFont)[get_theme_mod('blogperso_general_content_font_setting')]);

$smarty->assign("sizeTitle", get_theme_mod('blogperso_general_title_size_setting'));
$smarty->assign("sizeItem", get_theme_mod('blogperso_general_item_size_setting'));
$smarty->assign("sizeContent", get_theme_mod('blogperso_general_content_size_setting'));

$smarty->assign("colorTitle", get_theme_mod('blogperso_general_title_color_setting'));
$smarty->assign("colorItem", get_theme_mod('blogperso_general_item_color_setting'));
$smarty->assign("colorContent", get_theme_mod('blogperso_general_content_color_setting'));

$smarty->assign("menu", cvrt("wp_nav_menu", array( 'theme_location' => 'header-menu' )));
$smarty->assign("blogName", get_bloginfo('name'));
$smarty->assign("blogDescription", get_bloginfo('description'));

$smarty->assign("menuContent", wp_get_nav_menu_items("Jay Bee"));

$smarty->assign("colorAccentuation1", get_theme_mod('blogperso_general_accentuation1_setting'));
$smarty->assign("colorAccentuation2", get_theme_mod('blogperso_general_accentuation2_setting'));


$smarty->assign("searchForm", get_search_form(false));


if (!function_exists('dynamic_sidebar') || !cvrt("dynamic_sidebar")) {
    $sidebarCondition1=true;
    $dynamicSidebar="";
} else {
    $sidebarCondition1=false;
    $dynamicSidebar=cvrt("dynamic_sidebar");
}


$smarty->assign("sidebarCondition1", $sidebarCondition1);
$smarty->assign("dynamicSidebar", $dynamicSidebar);
$smarty->assign("sidebarCalendar", cvrt("get_calendar"));
$smarty->assign("sidebarListCats", cvrt("wp_list_cats", "sort_column=name&optioncount=1&hierarchical=0"));
$smarty->assign("sidebarListPages", cvrt("wp_list_pages", "title_li=<h2>Pages</h2>"));
$smarty->assign("sidebarRegister", cvrt("wp_register"));
$smarty->assign("sidebarLoginOut", cvrt("wp_loginout"));
//$smarty->assign("sidebarMeta", cvrt("wp_meta"));
$smarty->assign("sidebarMeta", cvrt("wp_site_icon"));


echo $smarty->fetch("header.tpl");

?>

