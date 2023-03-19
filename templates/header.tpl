<!--header.tpl begins-->

<body>
    <style>
        {include file='style.css'}
    </style>
    <div id="page" class="container-fluid">
        <div class="row">
            <header class="col-sm-3 block">
                <nav class="sidebar-nav">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".sidebar-navbar-collapse">
                                <span class="sr-only">
                                    Toggle navigation
                                </span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1 class="visible-xs navbar-brand">
                                <a href="{$blogUrl}">
                                    {$blogName}
                                </a>
                            </h1>
                        </div>

                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="visible-xs">
                                    {$searchForm}
                                </li>
                                {foreach from=$menuContent key=k item=menuItem}
                                    {if $menuItem->menu_item_parent == '0'}
                                        {if $menuContent[$k+1]->menu_item_parent == '0' || $k+1 == $menuContent|@count}
                                            {if $k == 0}
                                                <li class="active"><a href="{$menuItem->url}">{$menuItem->title}</a></li>
                                            {else}
                                                <li><a href="{$menuItem->url}">{$menuItem->title}</a></li>
                                            {/if}
                                        {else}
                                            {if $k == 0}
                                                <li class="active dropdown">
                                                    <a href="{$menuItem->url}" class="dropdown-toggle"
                                                        data-toggle="dropdown">{$menuItem->title}<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                    {else}
                                                        <li class="dropdown">
                                                            <a href="{$menuItem->url}" class="dropdown-toggle"
                                                                data-toggle="dropdown">{$menuItem->title}<b class="caret"></b></a>
                                                            <ul class="dropdown-menu">
                                                            {/if}
                                                        {/if}
                                                    {else}
                                                        <li><a href="{$menuItem->url}">{$menuItem->title}</a></li>
                                                        {if $menuContent[$k+1]->menu_item_parent == 0 || $k+1 == $menuContent|@count}
                                                        </ul>
                                                    </li>
                                                {/if}
                                            {/if}
                                        {/foreach}
                                    </ul>
                        </div>
                    </div>
                </nav>
                <aside class="hidden-xs">
                    <div id="sidebar" class="sidebar">
                        <ul class="sidebar">
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
                </aside>
            </header>
            <section class="col-sm-9 block">
                <h1 class="hidden-xs">
                    <a href="{$blogUrl}">
                        {$blogName}
                    </a>
                </h1>
                <h2 class="hidden-xs">
                    {$blogDescription}
                </h2>