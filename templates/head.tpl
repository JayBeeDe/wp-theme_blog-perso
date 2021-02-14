<!DOCTYPE html>
<!--head.tpl begins-->
<html xmlns="http://www.w3.org/1999/xhtml" {$langAtt}>

<head profile="http://gmpg.org/xfn/11">
    <title>
        {$blogTitle}
    </title>
    {$favicon}
    {if isset($faviconIE)}
        <link rel="icon shortcut" href="{$faviconIE}" type="image/x-icon" />
    {/if}
    <meta http-equiv="Content-Type" content="{$htmlType}" charset="{$charset}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {if $metaDescription}
        <meta name="description" content="{$metaDescription}" />
    {/if}
    {if $metaKeywords}
        <meta name="keywords" content="{$metaKeywords}" />
    {/if}
    <meta name="viewport" content="width=device-width">
    <!-- leave this for stats -->
    {if isset($authorUrl)}
        <link rel="author" href="{$authorUrl}" />
    {/if}
    {if isset($searchUrl)}
        <link rel="search" href="{$searchUrl}" />
    {/if}
    <link rel="stylesheet" href="{$styleSheetUrl}" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="{$rss2}" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="{$rss}" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="{$atom}" />
    <link rel="pingback" href="{$pingBack}" />
    <!-- additional header(disable) -->
    {*$additionalHeader1*}
    <!-- Bootstrap core CSS -->
    <link href="{$templateDir}/lib/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>