
/*!
Smallimap
Copyright (c) 2012 Small Improvements (http://www.small-improvements.com)

Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) license.

@author Sebastian Helzle (sebastian@small-improvements.com)
@author Tim Taubner (tim@small-improvements.com)
 */

(function() {
  var bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    extend = function(child, parent) { for (var key in parent) { if (hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; },
    hasProp = {}.hasOwnProperty;

  (function($) {
    var BlipEvent, ColorEffect, DelayEffect, Effect, Event, GeoAreaEvent, GeoEvent, LensEvent, MapDot, MapIcon, RadiusEffect, Smallimap, easing;
    $.si || ($.si = {});
    $.si.smallimap = {
      version: '0.2.0',
      defaults: {
        dotRadius: 4,
        fps: 20,
        width: 1000,
        height: 500,
        showNight: true,
        colors: {
          lights: ["#fdf6e3", "#fafafa", "#dddddd", "#cccccc", "#bbbbbb"],
          darks: ["#444444", "#666666", "#888888", "#aaaaaa"],
          land: {
            day: function(smallimap) {
              return smallimap.colors.lights.slice(1).concat(smallimap.colors.darks.slice(1).reverse());
            },
            night: function(smallimap) {
              return smallimap.colors.land.day().reverse();
            }
          }
        }
      }
    };
    Smallimap = (function() {
      function Smallimap(obj, cwidth, cheight, renderContext, world, options) {
        this.obj = obj;
        this.renderContext = renderContext;
        this.world = world;
        if (options == null) {
          options = {};
        }
        this.addMapIcon = bind(this.addMapIcon, this);
        this.enqueueEvent = bind(this.enqueueEvent, this);
        this.triggerOverlay = bind(this.triggerOverlay, this);
        this.reset = bind(this.reset, this);
        this.markDirty = bind(this.markDirty, this);
        this.render = bind(this.render, this);
        this.landinessOf = bind(this.landinessOf, this);
        this.convertToWorldY = bind(this.convertToWorldY, this);
        this.convertToWorldX = bind(this.convertToWorldX, this);
        this.radiusFor = bind(this.radiusFor, this);
        this.colorFor = bind(this.colorFor, this);
        this.generateGrid = bind(this.generateGrid, this);
        this.refresh = bind(this.refresh, this);
        this.run = bind(this.run, this);
        $.extend(true, this, options);
        this.dotDiameter = this.dotRadius * 2;
        this.width = cwidth / this.dotDiameter;
        this.height = cheight / this.dotDiameter;
        this.lastX = -1;
        this.lastY = -1;
        this.dirtyXs = void 0;
        this.eventQueue = [];
        this.lastRefresh = 0;
        this.mapIcons = [];
        this.grid = this.generateGrid(this.width, this.height);
      }

      Smallimap.prototype.run = function() {
        return this.refresh();
      };

      Smallimap.prototype.refresh = function() {
        var dt, event, k, l, len, m, n, now, ongoingEvents, ref, ref1, ref2, ref3, x, y;
        now = new Date().getTime();
        dt = now - this.lastRefresh;
        this.lastRefresh = now;
        ongoingEvents = [];
        ref = this.eventQueue;
        for (k = 0, len = ref.length; k < len; k++) {
          event = ref[k];
          if (event.refresh(dt)) {
            ongoingEvents.push(event);
          }
        }
        this.eventQueue = ongoingEvents;
        if (!this.dirtyXs) {
          this.dirtyXs = [];
          for (x = l = 0, ref1 = this.width - 1; 0 <= ref1 ? l <= ref1 : l >= ref1; x = 0 <= ref1 ? ++l : --l) {
            this.dirtyXs[x] = true;
          }
        }
        for (x = m = 0, ref2 = this.width - 1; 0 <= ref2 ? m <= ref2 : m >= ref2; x = 0 <= ref2 ? ++m : --m) {
          if (this.dirtyXs[x]) {
            this.dirtyXs[x] = false;
            for (y = n = 0, ref3 = this.height - 1; 0 <= ref3 ? n <= ref3 : n >= ref3; y = 0 <= ref3 ? ++n : --n) {
              if (this.grid[x][y].dirty) {
                this.render(x, y);
              }
            }
          }
        }
        return requestAnimationFrame(this.refresh);
      };

      Smallimap.prototype.generateGrid = function(width, height) {
        var grid, k, l, ref, ref1, x, y;
        grid = [];
        for (x = k = 0, ref = width - 1; 0 <= ref ? k <= ref : k >= ref; x = 0 <= ref ? ++k : --k) {
          for (y = l = 0, ref1 = height - 1; 0 <= ref1 ? l <= ref1 : l >= ref1; y = 0 <= ref1 ? ++l : --l) {
            grid[x] || (grid[x] = []);
            grid[x][y] = new MapDot(this, x, y, this.landinessOf(x, y));
          }
        }
        return grid;
      };

      Smallimap.prototype.longToX = function(longitude) {
        return Math.floor((longitude + 180) * this.width / 360 + 0.5);
      };

      Smallimap.prototype.latToY = function(latitude) {
        return Math.floor((-latitude + 90) * this.height / 180 + 0.5);
      };

      Smallimap.prototype.xToLong = function(x) {
        return Math.floor(x * 360 / this.width - 180 + 0.5);
      };

      Smallimap.prototype.yToLat = function(y) {
        return -Math.floor(y * 180 / this.height - 90 + 0.5);
      };

      Smallimap.prototype.colorFor = function(longitude, latitude, landiness) {
        var darkness, idx, landColors, now, sunSet;
        darkness = landiness * landiness;
        now = new Date();
        sunSet = new SunriseSunset(now.getYear(), now.getMonth() + 1, now.getDate(), latitude, longitude);
        landColors = this.colors.land.day(this);
        idx = Math.floor(darkness * (landColors.length - 2));
        if (sunSet.isDaylight(now.getHours()) || !this.showNight) {
          return new Color(landColors[idx]);
        } else {
          return new Color(landColors[idx + 1]);
        }
      };

      Smallimap.prototype.radiusFor = function(longitude, latitude, landiness) {
        var now, sunSet;
        now = new Date();
        sunSet = new SunriseSunset(now.getYear(), now.getMonth() + 1, now.getDate(), latitude, longitude);
        if (sunSet.isDaylight(now.getHours()) || !this.showNight) {
          return this.dotRadius * Math.max(0.2, landiness) * 0.6;
        } else {
          return this.dotRadius * Math.max(0.25, landiness) * 0.78;
        }
      };

      Smallimap.prototype.convertToWorldX = function(x) {
        return Math.floor(x * this.world.length / this.width);
      };

      Smallimap.prototype.convertToWorldY = function(y) {
        return Math.floor(y * this.world[0].length / this.height);
      };

      Smallimap.prototype.landinessOf = function(x, y) {
        var existsCount, i, j, k, l, ref, ref1, ref2, ref3, totalCount, worldXEnd, worldXStart, worldYEnd, worldYStart;
        worldXStart = this.convertToWorldX(x);
        worldXEnd = this.convertToWorldX(x + 1) - 1;
        worldYStart = this.convertToWorldY(y);
        worldYEnd = this.convertToWorldY(y + 1) - 1;
        totalCount = 0;
        existsCount = 0;
        for (i = k = ref = worldXStart, ref1 = worldXEnd; ref <= ref1 ? k <= ref1 : k >= ref1; i = ref <= ref1 ? ++k : --k) {
          for (j = l = ref2 = worldYStart, ref3 = worldYEnd; ref2 <= ref3 ? l <= ref3 : l >= ref3; j = ref2 <= ref3 ? ++l : --l) {
            totalCount += 1;
            if (this.world[i] && this.world[i][j]) {
              existsCount += 1;
            }
          }
        }
        return existsCount / totalCount;
      };

      Smallimap.prototype.render = function(x, y, millis) {
        var color, dot, radius;
        dot = this.grid[x][y];
        color = dot.target.color || dot.initial.color;
        radius = dot.target.radius || dot.initial.radius;
        this.renderContext.clearRect(x * this.dotDiameter, y * this.dotDiameter, this.dotDiameter, this.dotDiameter);
        this.renderContext.fillStyle = color.rgbString();
        this.renderContext.beginPath();
        this.renderContext.arc(x * this.dotDiameter + this.dotRadius, y * this.dotDiameter + this.dotRadius, radius, 0, Math.PI * 2, true);
        this.renderContext.closePath();
        this.renderContext.fill();
        dot.dirty = false;
        return dot.target = {};
      };

      Smallimap.prototype.markDirty = function(x, y) {
        if (this.dirtyXs) {
          this.dirtyXs[x] = true;
        }
        return this.grid[x][y].dirty = true;
      };

      Smallimap.prototype.reset = function(x, y) {
        return this.markDirty(x, y);
      };

      Smallimap.prototype.triggerOverlay = function() {
        var k, push, ref, results, y;
        y = 0;
        push = (function(_this) {
          return function(x, dt) {
            var dot, r, setDots;
            dot = _this.grid[x][0];
            r = dot.initial.radius;
            setDots = function(r) {
              var k, ref, results;
              results = [];
              for (y = k = 0, ref = _this.height - 1; 0 <= ref ? k <= ref : k >= ref; y = 0 <= ref ? ++k : --k) {
                results.push(_this.grid[x][y].setRadius(r));
              }
              return results;
            };
            return _this.eventQueue.push(function() {
              setDots(r + dt);
              return setTimeout(function() {
                setDots(r);
                return _this.eventQueue.push(function() {
                  return push((x + 1) % _this.width, dt);
                });
              }, 1000 / _this.width * 8);
            });
          };
        })(this);
        results = [];
        for (y = k = 0, ref = this.height - 1; 0 <= ref ? k <= ref : k >= ref; y = 0 <= ref ? ++k : --k) {
          results.push(push(0, 0.5));
        }
        return results;
      };

      Smallimap.prototype.enqueueEvent = function(event) {
        event.init();
        return this.eventQueue.push(event);
      };

      Smallimap.prototype.addMapIcon = function(title, label, iconMarker, iconUrl, longitude, latitude) {
        var mapX, mapY;
        longitude = parseFloat(longitude);
        latitude = parseFloat(latitude);
        mapX = this.longToX(longitude) * this.dotDiameter + this.dotRadius;
        mapY = this.latToY(latitude) * this.dotDiameter + this.dotRadius;
        return this.mapIcons.push(new MapIcon(this.obj, title, label, iconMarker, iconUrl, mapX, mapY));
      };

      return Smallimap;

    })();
    Effect = (function() {
      function Effect(dot1, duration1, options) {
        this.dot = dot1;
        this.duration = duration1;
        this.refresh = bind(this.refresh, this);
        this.update = bind(this.update, this);
        this.timeElapsed = 0;
        this.easing = options.easing || easing.linear;
        this.callback = options.callback;
      }

      Effect.prototype.update = function(dt) {
        this.timeElapsed += dt;
        this.refresh(this.easing(Math.min(1, this.timeElapsed / this.duration)));
        if (this.timeElapsed > this.duration) {
          if (typeof this.callback === "function") {
            this.callback();
          }
          return false;
        } else {
          return true;
        }
      };

      Effect.prototype.refresh = function(progress) {
        return "unimplemented";
      };

      return Effect;

    })();
    RadiusEffect = (function(superClass) {
      extend(RadiusEffect, superClass);

      function RadiusEffect(dot, duration, options) {
        this.refresh = bind(this.refresh, this);
        RadiusEffect.__super__.constructor.call(this, dot, duration, options);
        this.startRadius = options.startRadius;
        this.endRadius = options.endRadius;
      }

      RadiusEffect.prototype.refresh = function(progress) {
        return this.dot.setRadius(this.endRadius * progress + this.startRadius * (1 - progress));
      };

      return RadiusEffect;

    })(Effect);
    ColorEffect = (function(superClass) {
      extend(ColorEffect, superClass);

      function ColorEffect(dot, duration, options) {
        this.refresh = bind(this.refresh, this);
        ColorEffect.__super__.constructor.call(this, dot, duration, options);
        this.startColor = options.startColor;
        this.endColor = options.endColor;
      }

      ColorEffect.prototype.refresh = function(progress) {
        var start;
        start = new Color(this.startColor.rgbString());
        return this.dot.setColor(start.mix(this.endColor, progress));
      };

      return ColorEffect;

    })(Effect);
    DelayEffect = (function(superClass) {
      extend(DelayEffect, superClass);

      function DelayEffect(dot, duration, options) {
        this.refresh = bind(this.refresh, this);
        DelayEffect.__super__.constructor.call(this, dot, duration, options);
      }

      DelayEffect.prototype.refresh = function(progress) {
        return "nothing to do";
      };

      return DelayEffect;

    })(Effect);
    Event = (function() {
      function Event(smallimap1, options) {
        this.smallimap = smallimap1;
        this.refresh = bind(this.refresh, this);
        this.init = bind(this.init, this);
        this.enqueue = bind(this.enqueue, this);
        this.callback = options.callback;
        this.queue = [];
      }

      Event.prototype.enqueue = function(effect) {
        return this.queue.push(effect);
      };

      Event.prototype.init = function() {
        return "no init, dude";
      };

      Event.prototype.refresh = function(dt) {
        var currentEffects, effect, k, len;
        currentEffects = this.queue.splice(0);
        this.queue = [];
        for (k = 0, len = currentEffects.length; k < len; k++) {
          effect = currentEffects[k];
          if (effect.update(dt)) {
            this.queue.push(effect);
          }
        }
        return this.queue.length > 0;
      };

      return Event;

    })();
    GeoEvent = (function(superClass) {
      extend(GeoEvent, superClass);

      function GeoEvent(smallimap, options) {
        GeoEvent.__super__.constructor.call(this, smallimap, options);
        this.latitude = parseFloat(options.latitude);
        this.longitude = parseFloat(options.longitude);
        this.x = this.smallimap.longToX(this.longitude);
        this.y = this.smallimap.latToY(this.latitude);
      }

      return GeoEvent;

    })(Event);
    GeoAreaEvent = (function(superClass) {
      extend(GeoAreaEvent, superClass);

      function GeoAreaEvent(smallimap, options) {
        this.init = bind(this.init, this);
        GeoAreaEvent.__super__.constructor.call(this, smallimap, options);
        this.eventRadius = options.eventRadius || 8;
      }

      GeoAreaEvent.prototype.init = function() {
        var d, dot, i, j, k, nx, ny, ref, ref1, results;
        results = [];
        for (i = k = ref = -this.eventRadius, ref1 = this.eventRadius; ref <= ref1 ? k <= ref1 : k >= ref1; i = ref <= ref1 ? ++k : --k) {
          results.push((function() {
            var l, ref2, ref3, results1;
            results1 = [];
            for (j = l = ref2 = -this.eventRadius, ref3 = this.eventRadius; ref2 <= ref3 ? l <= ref3 : l >= ref3; j = ref2 <= ref3 ? ++l : --l) {
              nx = this.x + i;
              ny = this.y + j;
              d = Math.sqrt(i * i + j * j);
              if (d < this.eventRadius + 0.5 && this.smallimap.grid[nx] && this.smallimap.grid[nx][ny]) {
                dot = this.smallimap.grid[nx][ny];
                results1.push(this.initEventsForDot(nx, ny, d, dot));
              } else {
                results1.push(void 0);
              }
            }
            return results1;
          }).call(this));
        }
        return results;
      };

      return GeoAreaEvent;

    })(GeoEvent);
    BlipEvent = (function(superClass) {
      extend(BlipEvent, superClass);

      function BlipEvent(smallimap, options) {
        this.initEventsForDot = bind(this.initEventsForDot, this);
        BlipEvent.__super__.constructor.call(this, smallimap, options);
        this.color = new Color(options.color || "#336699");
        this.duration = options.duration || 2048;
        this.weight = options.weight || 0.5;
      }

      BlipEvent.prototype.initEventsForDot = function(nx, ny, d, dot) {
        var delay, endColor, endRadius, fadeInDuration, fadeOutDuration, ratio, startColor, startRadius;
        ratio = Math.sqrt(d / this.eventRadius * this.weight);
        delay = this.duration / 9 * ratio;
        fadeInDuration = this.duration / 9 * (1 - ratio);
        fadeOutDuration = this.duration * 8 / 9 * (1 - ratio);
        startColor = dot.initial.color;
        endColor = new Color(this.color.rgbString()).mix(startColor, ratio * ratio);
        startRadius = dot.initial.radius;
        if (startRadius >= this.smallimap.dotRadius * 0.5) {
          endRadius = startRadius - startRadius * 0.5 * (1 - ratio);
        } else {
          endRadius = (this.smallimap.dotRadius - startRadius) * (1 - ratio) + startRadius;
        }
        if (fadeInDuration > 0) {
          return this.enqueue(new DelayEffect(dot, delay, {
            callback: (function(_this) {
              return function() {
                _this.enqueue(new ColorEffect(dot, fadeInDuration, {
                  startColor: startColor,
                  endColor: endColor,
                  easing: easing.quadratic,
                  callback: function() {
                    return _this.enqueue(new ColorEffect(dot, fadeOutDuration, {
                      startColor: endColor,
                      endColor: startColor,
                      easing: Math.sqrt
                    }));
                  }
                }));
                return _this.enqueue(new RadiusEffect(dot, fadeInDuration, {
                  startRadius: startRadius,
                  endRadius: endRadius,
                  easing: easing.linear,
                  callback: function() {
                    return _this.enqueue(new RadiusEffect(dot, fadeOutDuration, {
                      startRadius: endRadius,
                      endRadius: startRadius,
                      easing: Math.quadratic
                    }));
                  }
                }));
              };
            })(this)
          }));
        }
      };

      return BlipEvent;

    })(GeoAreaEvent);
    LensEvent = (function(superClass) {
      extend(LensEvent, superClass);

      function LensEvent(smallimap, options) {
        this.init = bind(this.init, this);
        LensEvent.__super__.constructor.call(this, smallimap, options);
        this.delay = options.delay || 0;
        this.duration = options.duration || 1024;
        this.weight = options.weight || 1;
        this.isOut = options.fade === "out";
      }

      LensEvent.prototype.init = function() {
        var dot, duration, endRadius, startRadius;
        dot = this.smallimap.grid[this.x][this.y];
        duration = this.duration;
        startRadius = dot.initial.radius;
        endRadius = (this.smallimap.dotRadius - startRadius) * this.weight + startRadius;
        if (this.isOut) {
          startRadius = endRadius;
          endRadius = dot.initial.radius;
        }
        return this.enqueue(new DelayEffect(dot, this.delay, {
          callback: (function(_this) {
            return function() {
              return _this.enqueue(new RadiusEffect(dot, _this.duration, {
                startRadius: startRadius,
                endRadius: endRadius,
                easing: easing.quadratic
              }));
            };
          })(this)
        }));
      };

      return LensEvent;

    })(GeoEvent);
    MapDot = (function() {
      function MapDot(smallimap1, x1, y1, landiness1) {
        this.smallimap = smallimap1;
        this.x = x1;
        this.y = y1;
        this.landiness = landiness1;
        this.setColor = bind(this.setColor, this);
        this.setRadius = bind(this.setRadius, this);
        this.target = {};
        this.dirty = true;
        this.initial = {
          color: new Color("#333"),
          radius: this.smallimap.radiusFor(this.smallimap.xToLong(this.x), this.smallimap.yToLat(this.y), this.landiness)
        };
      }

      MapDot.prototype.setRadius = function(radius) {
        if (this.target.radius) {
          this.target.radius = (this.target.radius + radius) / 2;
        } else {
          this.target.radius = radius;
        }
        return this.smallimap.markDirty(this.x, this.y);
      };

      MapDot.prototype.setColor = function(color) {
        if (this.target.color) {
          this.target.color = this.target.color.mix(color);
        } else {
          this.target.color = color;
        }
        return this.smallimap.markDirty(this.x, this.y);
      };

      return MapDot;

    })();
    MapIcon = (function() {
      function MapIcon(mapContainer, title1, label1, iconMarker1, iconUrl1, x1, y1) {
        this.mapContainer = mapContainer;
        this.title = title1;
        this.label = label1;
        this.iconMarker = iconMarker1;
        this.iconUrl = iconUrl1;
        this.x = x1;
        this.y = y1;
        this.remove = bind(this.remove, this);
        this.init = bind(this.init, this);
        this.init();
      }

      MapIcon.prototype.init = function() {
        var hintContent, iconHtml;
        iconHtml = "<div class=\"smallipop smallimap-mapicon\">\n  <img src=\"" + this.iconMarker + "\" alt=\"" + this.title + "\"/>\n  <div class=\"smallipopHint\"></div>\n</div>";
        this.iconObj = $(iconHtml);
        hintContent = this.iconObj.children('.smallipopHint');
        if (this.iconUrl) {
          hintContent.append("<img class=\"smallimap-icon\" src=\"" + this.iconUrl + "\"/>");
        }
        if (this.label) {
          hintContent.append("<p class=\"smallimap-icon-label\">" + this.label + "</p>");
        }
        if (this.title) {
          hintContent.append("<span class=\"smallimap-icon-title\">" + this.title + "</span>");
        }
        this.iconObjImage = this.iconObj.children('img');
        return this.iconObjImage.load((function(_this) {
          return function() {
            _this.width = _this.iconObjImage[0].width || 24;
            _this.height = _this.iconObjImage[0].height || 24;
            _this.iconObjImage.css({
              width: '100%',
              height: '100%'
            });
            if (_this.iconUrl) {
              hintContent.children('.smallimap-icon').load(function() {
                var hintIcon;
                hintIcon = $(this);
                return hintIcon.attr({
                  width: hintIcon[0].width,
                  height: hintIcon[0].height
                });
              });
            }
            _this.iconObj.css({
              position: 'absolute',
              left: _this.x - _this.width / 2,
              top: _this.y - _this.height,
              width: _this.width,
              height: _this.height
            });
            _this.mapContainer.append(_this.iconObj);
            return _this.iconObj.smallipop({
              theme: 'blue',
              hideTrigger: true,
              popupDistance: 10,
              popupYOffset: 10,
              popupAnimationSpeed: 200
            });
          };
        })(this));
      };

      MapIcon.prototype.remove = function() {
        return this.iconObj.remove();
      };

      return MapIcon;

    })();
    easing = {
      linear: function(progress) {
        return progress;
      },
      quadratic: function(progress) {
        return progress * progress;
      },
      cubic: function(progress) {
        return progress * progress * progress;
      },
      inverse: function(easingFunction) {
        return function(progress) {
          return 1 - easingFunction(1 - progress);
        };
      }
    };
    $.si.smallimap.effects = {
      Effect: Effect,
      ColorEffect: ColorEffect,
      RadiusEffect: RadiusEffect
    };
    $.si.smallimap.events = {
      Event: Event,
      BlipEvent: BlipEvent,
      LensEvent: LensEvent
    };
    $.si.smallimap.easing = easing;
    return $.fn.smallimap = function(options) {
      if (options == null) {
        options = {};
      }
      options = $.extend(true, {}, $.si.smallimap.defaults, options);
      return this.each(function() {
        var canvas, canvasObj, ctx, self, smallimap;
        self = $(this).css({
          position: 'relative'
        });
        canvasObj = $('<canvas>');
        canvasObj.attr({
          width: options.width,
          height: options.height
        });
        self.append(canvasObj);
        canvas = canvasObj.get(0);
        ctx = canvas.getContext('2d');
        smallimap = new Smallimap(self, canvas.width, canvas.height, ctx, smallimapWorld, options);
        return self.data('api', smallimap);
      });
    };
  })(jQuery);

}).call(this);
