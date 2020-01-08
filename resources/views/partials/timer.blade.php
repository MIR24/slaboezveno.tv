<script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
<script src="/js/Time.js"></script>
<script>
    var canvas, stage, exportRoot, anim_container, dom_overlay_container, fnStartAnimation;
    function init() {
        canvas = document.getElementById("canvas");
        anim_container = document.getElementById("animation_container");
        dom_overlay_container = document.getElementById("dom_overlay_container");
        var comp=AdobeAn.getComposition("C6755AF421F41F48BED143FAA5585E94");
        var lib=comp.getLibrary();
        var loader = new createjs.LoadQueue(false);
        loader.addEventListener("fileload", function(evt){handleFileLoad(evt,comp)});
        loader.addEventListener("complete", function(evt){handleComplete(evt,comp)});
        var lib=comp.getLibrary();
        loader.loadManifest(lib.properties.manifest);
    }
    var flashVars = {
        reference: "%request.reference%",
        link: "%banner.user1%",
        target: "%banner.target%",
        rnd: parseInt("%request.place_random%") || parseInt("%system.random%"),
        events: [
            "",
            "%banner.event1%",
            "%banner.event2%",
            "%banner.event3%",
            "%banner.event4%",
            "%banner.event5%",
            "%banner.event6%",
            "%banner.event7%",
            "%banner.event8%",
            "%banner.event9%",
            "%banner.event10%",
            "%banner.event11%",
            "%banner.event12%",
            "%banner.event13%",
            "%banner.event14%",
            "%banner.event15%",
            "%banner.event16%",
            "%banner.event17%",
            "%banner.event18%",
            "%banner.event19%",
            "%banner.event20%",
            "%banner.event21%",
            "%banner.event22%",
            "%banner.event23%",
            "%banner.event24%",
            "%banner.event25%",
            "%banner.event26%",
            "%banner.event27%",
            "%banner.event28%",
            "%banner.event29%",
            "%banner.event30%"
        ]
    };
    function callClick(n) {
        var link = ( n ? flashVars.events[n] : flashVars.link );
        window.open(flashVars.reference + "@" + link, flashVars.target);
    }
    function callEvent(n) {
        (new Image()).src = flashVars.events[n];
    }
    function handleFileLoad(evt, comp) {
        var images=comp.getImages();
        if (evt && (evt.item.type == "image")) { images[evt.item.id] = evt.result; }
    }
    function handleComplete(evt,comp) {
        //This function is always called, irrespective of the content. You can use the variable "stage" after it is created in token create_stage.
        var lib=comp.getLibrary();
        var ss=comp.getSpriteSheet();
        var queue = evt.target;
        var ssMetadata = lib.ssMetadata;
        for(i=0; i<ssMetadata.length; i++) {
            ss[ssMetadata[i].name] = new createjs.SpriteSheet( {"images": [queue.getResult(ssMetadata[i].name)], "frames": ssMetadata[i].frames} )
        }
        exportRoot = new lib.Time_1();
        stage = new lib.Stage(canvas);
        //Registers the "tick" event listener.
        fnStartAnimation = function() {
            stage.addChild(exportRoot);
            createjs.Ticker.setFPS(lib.properties.fps);
            createjs.Ticker.addEventListener("tick", stage);
        }
        //Code to support hidpi screens and responsive scaling.
        AdobeAn.makeResponsive(false,'both',false,1,[canvas,anim_container,dom_overlay_container]);
        AdobeAn.compositionLoaded(lib.properties.id);
        fnStartAnimation();
    }
</script>
{{--<body onload="init();" style="margin:0px;">--}}
{{--<div onload="init();" id="animation_container" style="background-color:rgba(255, 255, 255, 1.00); width:127px; height:127px">--}}
<div id="animation_container" style="width:127px; height:127px">
    <canvas id="canvas" width="127" height="127" style="position: absolute; display: block;"></canvas>
    <div id="dom_overlay_container" style="pointer-events:none; overflow:hidden; width:127px; height:127px; position: absolute; left: 0px; top: 0px; display: block;">
    </div>
</div>
<script type="text/javascript">
    var elem = document.getElementsByTagName("canvas")[0];
    elem.style.cursor = "pointer";
    elem.addEventListener("click", function(){
        callClick();
    }, false);
</script>
