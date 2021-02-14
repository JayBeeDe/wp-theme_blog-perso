<?php

if (!function_exists('dynamic_sidebar') || !cvrt("dynamic_sidebar")) {
    $sidebarCondition1=true;
    $dynamicSidebar="";
} else {
    $sidebarCondition1=false;
    $dynamicSidebar=cvrt("dynamic_sidebar");
}
$sidebarCondition1=false;
$dynamicSidebar=cvrt("dynamic_sidebar");

$smarty->assign("sidebarCondition1", $sidebarCondition1);
$smarty->assign("dynamicSidebar", $dynamicSidebar);
$smarty->assign("sidebarCalendar", cvrt("get_calendar"));
$smarty->assign("sidebarListCats", cvrt("wp_list_cats", "sort_column=name&optioncount=1&hierarchical=0"));
$smarty->assign("sidebarListPages", cvrt("wp_list_pages", "title_li=<h2>Pages</h2>"));
$smarty->assign("sidebarRegister", cvrt("wp_register"));
$smarty->assign("sidebarLoginOut", cvrt("wp_loginout"));
$smarty->assign("sidebarMeta", cvrt("wp_meta"))

?>

