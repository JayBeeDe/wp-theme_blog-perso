<?php
/*
Template Name: Presentation
*/

include TEMPLATEPATH."/head.php";


$args=[
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template_Presentation.php'
];
$pgObject=get_post(get_posts($args)[0]);
$pgContentArr=explode("<hr />", $pgObject->post_content);
foreach ($pgContentArr as $key => $value) {
    if (preg_replace('/\s+/', '', $value)=="") {
        $pgContentArr[$key]="";
    }
}

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

$smarty->assign("colorAccentuation1", get_theme_mod('blogperso_general_accentuation1_setting'));
$smarty->assign("colorAccentuation2", get_theme_mod('blogperso_general_accentuation2_setting'));

$smarty->assign("backgroundPath", get_theme_mod('blogperso_presentation_background_setting'));
$smarty->assign("backgroundColor", get_theme_mod('blogperso_presentation_bgcolor_setting'));
$smarty->assign("backgroundColorRGB", get_theme_mod('blogperso_presentation_bgcolor_setting'));
$smarty->assign("backgroundOpacity", get_theme_mod('blogperso_presentation_bgopacity_setting')/100);
$smarty->assign("gaussianBlur", get_theme_mod('blogperso_presentation_gaussian_blur_setting'));

if (get_theme_mod('blogperso_presentation_title_setting')!="") {
    $smarty->assign("h1Title", get_theme_mod('blogperso_presentation_title_setting'));
}

$smarty->assign("content1", $pgContentArr[0]);
$smarty->assign("content2", $pgContentArr[1]);
$smarty->assign("content3", $pgContentArr[2]);

echo $smarty->fetch("cv.tpl");
?>

