<!--search.tpl begins-->
{include 'header.tpl' scope=parent}
<content>
    {if $searchHavePost == true}

        {foreach $content as $post}
            <div class="post" id="post-{$post->ID}">
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a></h2>
                <p class="postmetadata">
                    <?php the_time('j F Y') ?> par
                    <?php the_author() ?> |
                    Cat&eacute;gorie:
                    <?php the_category(', ') ?> |
                    <?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?>
                    <?php edit_post_link('Editer', ' &#124; ', ''); ?>
                </p>
                <?php the_excerpt(); ?>
            </div>
        {/foreach}

    {else}
        <h2 class="center">Aucun article trouvé. Essayer une autre recherche ?</h2>
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    {/if}

</content>
{include 'sidebar.tpl' scope=parent}
{include 'footer.tpl' scope=parent}

$searchHavePost
<!--search.tpl begins-->