<?php 
echo '
<!DOCTYPE html>
<html>
    <head>
        <title>CC</title>
        <style>
        iframe {
            width: 0px;
            height: 0px;
            border: 0 !important;
            overflow-y: hidden;
        }
        </style>
        <script>
           
        window.addEventListener("message", function (event) {
            switch(event.data) {
            case "complete":

                parent.postMessage("#fctoken#726314f1a2d65128.9834838701|r=us-east-1|metabgclr=transparent|guitextcolor=%23474747|maintxtclr=%23b8b8b8|metaiconclr=%23757575|meta=3|pk=476068BF-9607-4799-B53D-966BE98E2B81|at=40|ag=101|cdn_url=https%3A%2F%2Froblox-api.arkoselabs.com%2Fcdn%2Ffc|lurl=https%3A%2F%2Faudio-us-east-1.arkoselabs.com|surl=https%3A%2F%2Froblox-api.arkoselabs.com|smurl=https%3A%2F%2Froblox-api.arkoselabs.com%2Fcdn%2Ffc%2Fassets%2Fstyle-manager#cid##csrf#3iRibz5Vl+3R#proxy#LyTkV8A5bOwh5uocbtagICXxnUzDIs70ZQ7V3oVkAhmDdRw7zHcXHUip5xVP0IOGFFF3NAi0p9rN8dhYPx5Y1w==","*");
                break;
            }
        });
        </script>
    </head>
    <body style="margin: 0px">
        <iframe frameborder="0" scrolling="no" id="arkoseFrame" class="fc-iframe-wrap" aria-label=" " style="width: 302px; height: 290px;" src="https://roblox-api.arkoselabs.com/fc/gc/?token=726314f1a2d65128.9834838701&r=us-east-1&metabgclr=transparent&guitextcolor=%23474747&maintxtclr=%23b8b8b8&metaiconclr=%23757575&meta=3&pk=476068BF-9607-4799-B53D-966BE98E2B81&at=40&ag=101&cdn_url=https%3A%2F%2Froblox-api.arkoselabs.com%2Fcdn%2Ffc&lurl=https%3A%2F%2Faudio-us-east-1.arkoselabs.com&surl=https%3A%2F%2Froblox-api.arkoselabs.com&smurl=https%3A%2F%2Froblox-api.arkoselabs.com%2Fcdn%2Ffc%2Fassets%2Fstyle-manager"></iframe>
                    <form method="POST">
        <input type="text" id="tokenInput" name="tokenInput" value="726314f1a2d65128.9834838701|r=us-east-1|metabgclr=transparent|guitextcolor=%23474747|maintxtclr=%23b8b8b8|metaiconclr=%23757575|meta=3|pk=476068BF-9607-4799-B53D-966BE98E2B81|at=40|ag=101|cdn_url=https%3A%2F%2Froblox-api.arkoselabs.com%2Fcdn%2Ffc|lurl=https%3A%2F%2Faudio-us-east-1.arkoselabs.com|surl=https%3A%2F%2Froblox-api.arkoselabs.com|smurl=https%3A%2F%2Froblox-api.arkoselabs.com%2Fcdn%2Ffc%2Fassets%2Fstyle-manager" hidden>
        <input type="submit" id="submit" name="submit" hidden>
    </form>
    </body>
</html>';