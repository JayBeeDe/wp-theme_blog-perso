<body>
    <style>
        {include file='style.css'}
        {include file='cv.css'}
    </style>
    <div id="container" class="content container">
        {if isset($h1Title)}<h1>{$h1Title}</h1>{/if}
        <div class="col-md-12">
            {$content}
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" id="svg" class="zeroZoom" x="0" y="0" width="100%" height="100%">
        <defs>
            <pattern patternUnits="userSpaceOnUse" id="img1" class="zeroZoom" x="0" y="0" width="100%" height="100%">
                <image id="image" xlink:href="{$backgroundPath}" class="zoom1" x="-5%" y="-5%" width="110%"
                    height="110%" preserveAspectRatio="xMidYMid slice"></image>
            </pattern>
            <filter id="gauss" class="zeroZoom" x="0" y="0" width="100%" height="100%">
                <feGaussianBlur stdDeviation="{$gaussianBlur}" class="zeroZoom" x="0" y="0" width="100%" height="100%">
                </feGaussianBlur>
            </filter>
        </defs>
        <rect class="zeroZoom" x="0" y="0" width="100%" height="100%" id="rect"></rect>
    </svg>
</body>