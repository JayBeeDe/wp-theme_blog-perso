<body>
    <style>
        {include file='style.css'}
        {include file='404.css'}
    </style>
    <div id="container" class="content container">
        <div id="content" class="col-md-3">
        </div>
        <div id="content" class="col-md-6">
            <h1>404 ERROR:</h1>
            <p>The ressource cannot be found on the server.</p>
            <p>You should navigate to the <a href="/">home page</a>.</p>
            {if isset($content)}
                <hr>
                {$content}
            {/if}
        </div>
        <div id="content" class="col-md-3">
        </div>
    </div>
</body>