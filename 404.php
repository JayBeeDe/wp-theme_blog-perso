<?php
include TEMPLATEPATH."/head.php";

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

$smarty->assign("backgroundColor", get_theme_mod('blogperso_general_bgcolor_setting'));
$smarty->assign("bgaccentuation1", get_theme_mod('blogperso_general_accentuation1_setting'));
$smarty->assign("backgroundOpacity", get_theme_mod('blogperso_general_bgopacity_setting')/100);
$smarty->assign("gaussianBlur", get_theme_mod('blogperso_general_gaussian_blur_setting'));

$smarty->assign("content", get_theme_mod('blogperso_admin_httperrormessage_setting'));

echo $smarty->fetch("404.tpl");
?>

