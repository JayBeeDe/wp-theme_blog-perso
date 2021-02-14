		<?php
        get_header();
        ?>
		This is the archive page
		<div id="content">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<p class="postmetadata">
							<?php the_time('j F Y') ?> par <?php the_author() ?> |
							Cat&eacute;gorie: <?php the_category(', ') ?> |
							<?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?>
							<?php edit_post_link('Editer', ' &#124; ', ''); ?>
						</p>
						<?php the_excerpt(); ?>
					</div>
					<div class="navigation">
						<?php posts_nav_link(' - ', 'page suivante', 'page pr&eacute;c&eacute;dente'); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>
	</body>
</html>