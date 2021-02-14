<?php
//wp_footer()

$smarty->assign("footerDate", date(Y));

$smarty->assign("footerNumQueries", get_num_queries());
$smarty->assign("footerTimer", cvrt("timer_stop", "1"));

$smarty->assign("social1Name", get_theme_mod('blogperso_footer_social1_name_setting'));
$smarty->assign("social2Name", get_theme_mod('blogperso_footer_social2_name_setting'));
$smarty->assign("social3Name", get_theme_mod('blogperso_footer_social3_name_setting'));

$smarty->assign("social1Logo", get_theme_mod('blogperso_footer_social1_logo_setting'));
$smarty->assign("social2Logo", get_theme_mod('blogperso_footer_social2_logo_setting'));
$smarty->assign("social3Logo", get_theme_mod('blogperso_footer_social3_logo_setting'));

$smarty->assign("social1Url", get_theme_mod('blogperso_footer_social1_url_setting'));
$smarty->assign("social2Url", get_theme_mod('blogperso_footer_social2_url_setting'));
$smarty->assign("social3Url", get_theme_mod('blogperso_footer_social3_url_setting'));

echo $smarty->fetch("footer.tpl");
?>

