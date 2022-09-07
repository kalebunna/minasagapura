(function() {
  (function($) {
    var debugMode, getClientsForMap, log, mapOptions, markerPath, myLogoPath, siLogoPath, testIntervalId;
    debugMode = true;
    testIntervalId = -1;
    markerPath = 'images/marker.png';
    siLogoPath = 'images/si.png';
    myLogoPath = 'images/sh-it.png';
    mapOptions = {
      dotRadius: 3,
      width: 920,
      height: 460,
      colors: {
        lights: ["#fdf6e3", "#fafafa", "#dddddd", "#cccccc", "#bbbbbb"],
        darks: ["#777777", "#888888", "#999999", "#aaaaaa"]
      }
    };
    log = function(message) {
      var ref;
      if (debugMode) {
        return (ref = window.console) != null ? ref.log(message) : void 0;
      }
    };
    getClientsForMap = function() {
      smallimap.addMapIcon('Sebastian Helzle IT-Consulting, Karlsruhe', 'Hey, this is where I live!', markerPath, myLogoPath, 8.38, 49);
      smallimap.addMapIcon('Small Improvements, Berlin', 'Easy performance review software online.', markerPath, siLogoPath, 13.40185, 52.52564);
      return smallimap.addMapIcon('Sample Company, Rio', 'Somewhere in brazil', markerPath, siLogoPath, -43.173, -22.925);
    };
    window.runSmallimapTest = function() {
      testIntervalId = setInterval(function() {
        var event;
        event = new $.si.smallimap.events.BlipEvent(smallimap, {
          latitude: Math.random() * 180 - 90,
          longitude: Math.random() * 360 - 180,
          color: '#ff3333',
          eventRadius: 5,
          duration: 3000,
          weight: 0.6
        });
        return smallimap.enqueueEvent(event);
      }, 512);
      return "lastX = 0\nlastY = 0\npxToX = (px) -> Math.floor(px / smallimap.dotDiameter)\npyToY = (py) -> Math.floor(py / smallimap.dotDiameter)\n\n$('#smallimap').mousemove(function (event) {\n  var px = event.pageX - $(this).offset().left,// - smallimap.width,\n    py = event.pageY - $(this).offset().top,\n    x = pxToX(px),\n    y = pyToY(py);\n\n  if(x != lastX || y != lastY) {\n    var inEvent = new $.si.smallimap.events.LensEvent(smallimap, {\n        longitude: smallimap.xToLong(x),\n        latitude: smallimap.yToLat(y),\n        eventRadius: 0,\n        duration: 128,\n        fade: \"in\"\n    });\n    smallimap.enqueueEvent(inEvent);\n    var outEvent = new $.si.smallimap.events.LensEvent(smallimap, {\n        longitude: smallimap.xToLong(lastX),\n        latitude: smallimap.yToLat(lastY),\n        eventRadius: 0,\n        delay: 128,\n        duration: 256,\n        fade: \"out\"\n    });\n    smallimap.enqueueEvent(outEvent);\n    lastX = x\n    lastY = y\n  }\n});";
    };
    window.stopSmallimapTest = function() {
      return clearInterval(testIntervalId);
    };
    $('.smallipop').smallipop({
      theme: 'black',
      cssAnimations: {
        enabled: true,
        show: 'animated flipInX',
        hide: 'animated flipOutX'
      }
    });
    window.smallimap = $('#smallimap').smallimap(mapOptions).data('api');
    smallimap.run();
    getClientsForMap();
    return $('#startDemoButton').click(function(e) {
      e.preventDefault();
      $('.smallipopTour').smallipop('tour');
      if (testIntervalId) {
        stopSmallimapTest();
      }
      return runSmallimapTest();
    });
  })(jQuery);

}).call(this);
