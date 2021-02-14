<!--sidebar.tpl begins-->
<div id="sidebar" class="sidebar">
    <ul>
        {if $sidebarCondition1 == true}
            <li id="search">
                {$sidebarTemplate}
            </li>
            <li id="calendar">
                <h2>Calendrier</h2>
                {$sidebarCalendar}
            </li>
            <li>
                <h2>Categories</h2>
                <ul>
                    {$sidebarListCats}
                </ul>
            </li>
            {$sidebarListPages}
            <h2>Infos Meta</h2>
            <ul>
                {$sidebarRegister}
                <li>{$sidebarLoginOut}</li>
                {$sidebarMeta}
                <li><a href="{$rss2}" title="Flux RSS des articles">Flux RSS des articles</a></li>
            </ul>
            </li>
        {else}
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                {$dynamicSidebar}
            </div>
        {/if}
    </ul>
</div>
<!--sidebar.tpl ends-->