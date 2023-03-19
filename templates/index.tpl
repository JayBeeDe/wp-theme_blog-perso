<!--index.tpl begins-->
{foreach $content as $post}
    <article class="post" id="post-{$post->ID}">
        {$post->post_content}
    </article>
{/foreach}
<!--index.tpl ends-->