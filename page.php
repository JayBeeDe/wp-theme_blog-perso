		<?php
        echo "This is the page.php file for wordpress pages";

        ?>
		This is the page page
		<div id="content">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content(); ?>
						<?php edit_post_link('Modifier cette page', '<p>', '</p>'); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>
	</body>
</html>