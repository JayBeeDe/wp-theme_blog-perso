<?php

// header assignation
include TEMPLATEPATH."/head.php";
include TEMPLATEPATH."/header.php";

$smarty->assign("content", get_posts());
$smarty->display("index.tpl");
//echo "kl".the_search_query()."azert";

// sidebar assignation
include TEMPLATEPATH."/sidebar.php";
// footer assignation
include TEMPLATEPATH."/footer.php";


?>

