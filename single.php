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

if (have_posts()) {
    $smarty->assign("content", $pgContentArr[0]);
}

echo $smarty->fetch("single.tpl");
?>


		sdsd This is the single.php file for post pages lolsdsds
		<div id="content">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<p class="postmetadata">
							<?php the_time('j F Y') ?> par <?php the_author() ?> | 
							Cat&eacute;gorie: <?php the_category(', ') ?> | 
							<?php edit_post_link('Editer', ' &#124; ', ''); ?>
						</p>
						<?php the_content(); ?>
					</div>
					<?php previous_post_link() ?>
					<?php next_post_link() ?>
					<div class="comments-template">
						<?php comments_template(); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</body>
</html>


// <?php get_sidebar(); ?>
// <?php get_footer(); ?>