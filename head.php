<?php
if (get_theme_mod('blogperso_presentation_only_cv_setting')==true) {
    if (!(is_404())) {
        if (get_page_template_slug()!="template_Presentation.php") {
            if (is_user_logged_in()==true) {
                $user=wp_get_current_user();
                if (in_array('subscriber', $user->roles)) {
                    wp_redirect("/404.php");
                    exit;
                }
            } else {
                wp_redirect("/404.php");
                exit;
            }
        }
    }
}

$blogTitle=get_bloginfo('name');
if (is_404()) {
    $blogTitle=$blogTitle." &raquo Not Found";
//$blogTitle=$blogTitle." &raquo "._e('Not Found');
} elseif (is_home()) {
    $blogTitle=$blogTitle." &raquo ".get_bloginfo('description');
} else {
    if (get_page_template_slug()=="template_Presentation.php" && get_theme_mod('blogperso_presentation_title_setting')!="") {
        $blogTitle=get_theme_mod('blogperso_presentation_title_setting');
    } else {
        $blogTitle=$blogTitle.wp_title();
    }
}

if (get_post_custom_values("lang")[0]) {
    $smarty->assign("langAtt", 'lang="'.get_post_custom_values("lang")[0].'"');
} else {
    $smarty->assign("langAtt", cvrt("language_attributes"));
}
$smarty->assign("metaDescription", get_post_custom_values("description")[0]);
//$smarty->assign("metaKeywords", join(",",get_post_custom_values("keyword")));
$smarty->assign("metaKeywords", get_post_custom_values("keyword")[0]);

if (!filter_var(get_the_author_link(), FILTER_VALIDATE_URL) === false) {
    $smarty->assign("authorUrl", get_the_author_link());
}
if (get_theme_mod('blogperso_presentation_only_cv_setting') == false) {
    $smarty->assign("searchUrl", "/search.php");
}
$smarty->assign("blogTitle", $blogTitle);
$smarty->assign("htmlType", get_bloginfo('html_type'));
$smarty->assign("charset", get_bloginfo('charset'));
$smarty->assign("styleSheetUrl", get_bloginfo('stylesheet_url'));
$smarty->assign("rss2", get_bloginfo('rss2_url'));
$smarty->assign("rss", get_bloginfo('rss_url'));
$smarty->assign("atom", get_bloginfo('atom_url'));
$smarty->assign("pingBack", get_bloginfo('pingback_url'));
//$smarty->assign("additionalHeader1", cvrt("wp_head"));

if (has_site_icon()) {
    $smarty->assign("favicon", cvrt("wp_site_icon"));
    if (!filter_var(get_theme_mod('title_tagline_ie_favicon_setting'), FILTER_VALIDATE_URL) === false) {
        $smarty->assign("faviconIE", get_theme_mod('title_tagline_ie_favicon_setting'));
    }
}
echo $smarty->fetch("head.tpl");
?>

