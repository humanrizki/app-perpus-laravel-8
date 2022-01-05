/**
 * W3Flints Clock Timer
 * @author W3Flints <nrctkno@gmail.com>
 * @description A fully responsive and flexible clock and timer.
 */
(function () {

  "use strict";

  /*
   * Polyfills
   */
  if (typeof Object.assign !== 'function') {
    Object.assign = function (target, varArgs) { // .length of function is 2
      'use strict';
      if (target == null) { // TypeError if undefined or null
        throw new TypeError('Cannot convert undefined or null to object');
      }

      var to = Object(target);

      for (var index = 1; index < arguments.length; index++) {
        var nextSource = arguments[index];

        if (nextSource != null) { // Skip over if undefined or null
          for (var nextKey in nextSource) {
            // Avoid bugs when hasOwnProperty is shadowed
            if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
              to[nextKey] = nextSource[nextKey];
            }
          }
        }
      }
      return to;
    };
  }

  if (!Math.sign) {
    Math.sign = function (x) {
      return ((x > 0) - (x < 0)) || +x;
    };
  }


  var W3FCT = {
    const: {},
    config: {},
    lang: {},
    fn: {
      obj: {}, //object functions
      dt: {}, //date and time functions
      dom: {}, //DOM tree manipulation
      hlp: {}, //helpers
      svg: {}//SVG rendering
    },
    renderers: {},
    devices: {}
  };

  W3FCT.const.digits = 'wynNdhHaism';

  W3FCT.config = {
    lang: 'default',
    device: {
      type: 'clock',
      ison: true,
      offset: 0
    },
    step: 100,
    renderer: {
      type: 'html',
      settings: {}
    },
    milestones: {},
    bind: {
      init: function () {},
      tick: function (key, device) {},
      stop: function (device) {},
      click: function (device) {},
      deadline: function (device) {}
    }
  };

  W3FCT.lang = {
    default: {
      days: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
      months: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AGO', 'SET', 'OCT', 'NOV', 'DEC'],
      ampm: ['am', 'pm']
    }
  };

  /*
   * 
   * functions
   * 
   */

  W3FCT.fn.obj.clone = function (obj) {
    return Object.assign({}, obj);
  };

  W3FCT.fn.obj.merge = function (a, b) {
    a = W3FCT.fn.obj.clone(a);
    b = W3FCT.fn.obj.clone(b);

    if (typeof a !== 'object' || typeof b !== 'object')
      return false; //inputs are not valid 
    for (var p in b) {
      if (!b.hasOwnProperty(p))
        continue; //nothing to merge
      if (p in a) { // merge
        if (typeof a[p] !== 'object') {
          a[p] = b[p];
        } else {
          if (typeof b[p] !== 'object') {
            a[p] = b[p];
          } else {
            if (a[p].concat && b[p].concat) { // two arrays get concatenated
              a[p] = a[p].concat(b[p]);
            } else { // two objects get merged recursively
              a[p] = W3FCT.fn.obj.merge(a[p], b[p]);
            }
          }
        }
      } else { // new perties get added to output
        a[p] = b[p];
      }
    }
    return a;
  };

  W3FCT.fn.dt.parts = function (lang, y, n, d, w, h, i, s, m) {
    var pad = W3FCT.fn.hlp.pad;
    var H_ = (h > 12) ? (h - 12) : h;

    var res = {
      y_: y,
      n_: n,
      d_: d,
      h_: h,
      H_: H_,
      i_: i,
      s_: s,
      m_: m,
      y: pad(y, 4),
      n: pad(n, 2),
      d: pad(d, 2),
      h: pad(h, 2),
      H: pad(H_, 2),
      a: (h < 12) ? lang.ampm[0] : lang.ampm[1],
      i: pad(i, 2),
      s: pad(s, 2),
      m: pad(m, 3)
    };

    res.ansi = res.y + res.n + res.d + ' ' + res.h + res.i + res.s;
    res.w = lang.days[w];
    res.N = lang.months[n - 1];

    return res;
  };

  W3FCT.fn.dt.stamp = function (d) {
    var pad = W3FCT.fn.hlp.pad;
    return  d.getFullYear() + pad(d.getMonth() + 1, 2) + pad(d.getDate(), 2) + ' '
            + pad(d.getHours(), 2) + pad(d.getMinutes(), 2) + pad(d.getSeconds(), 2);
  };

  W3FCT.fn.dt.stampFromOffset = function (s) {
    var d = new Date();
    var d2 = new Date(d.getTime() + s * 1000);

    return W3FCT.fn.dt.stamp(d2);
  };

  W3FCT.fn.dt.fromANSI = function (a) {
    return new Date(
            parseInt(a.substring(0, 4)), parseInt(a.substring(4, 6)) - 1, parseInt(a.substring(6, 8)),
            parseInt(a.substring(9, 11)), parseInt(a.substring(11, 13)), parseInt(a.substring(13, 15)),
            0
            );
  };

  W3FCT.fn.dom.getDigitPlaceholders = function (target) {
    var nodes = target.querySelectorAll("[data-digit]");
    var digits = {};
    var key;
    for (var i = 0; i < nodes.length; i++) {
      key = nodes[i].getAttribute('data-digit');
      if (
              (W3FCT.const.digits.indexOf(key.charAt(0)) > -1) &&
              (
                      (key.length === 1) ||
                      (
                              (key.length === 2) &&
                              (key.charAt(1) === '_')))) { //digit validation
        digits[key] = nodes[i];
      }
    }
    return digits;
  };

  W3FCT.fn.dom.setDigits = function (digits, values) {
    for (var i in digits) {
      digits[i].innerHTML = values[i];
    }
  };

  W3FCT.fn.hlp.pad = function (n, size) {
    var s = "000" + n;
    return s.substr(s.length - size);
  };

  W3FCT.fn.svg.ns = "http://www.w3.org/2000/svg";

  W3FCT.fn.svg.polarToCartesian = function (centerX, centerY, radius, angleInDegrees) {
    var angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;
    return {
      x: centerX + (radius * Math.cos(angleInRadians)),
      y: centerY + (radius * Math.sin(angleInRadians))
    };
  };

  W3FCT.fn.svg.arcd = function (x, y, radius, startAngle, endAngle) {
    var ptc = W3FCT.fn.svg.polarToCartesian;
    var start = ptc(x, y, radius, endAngle);
    var end = ptc(x, y, radius, startAngle);

    var largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

    return [
      "M", start.x, start.y,
      "A", radius, radius, 0, largeArcFlag, 0, end.x, end.y
    ].join(' ');

  };

  W3FCT.fn.svg.arc = function (d, stroke, endings, dashes) {
    var n = document.createElementNS(W3FCT.fn.svg.ns, 'path');

    n.setAttribute('d', d);
    n.setAttribute('fill', 'none');
    n.setAttribute('stroke', 'black');
    n.setAttribute('stroke-width', stroke);
    n.setAttribute('stroke-linecap', endings);
    n.setAttribute('stroke-dasharray', dashes);
    n.setAttribute('d', d);

    return n;
  };

  /*
   * 
   * devices
   * 
   */

  W3FCT.devices.core = function (device, cfg) {

    var self = this;
    var now;

    self.running = false;
    self.last_start = null;
    self.renderer = null;

    self.setUp = function () {
      now = getDt(cfg.device.offset);
      device.reset();
    };

    self.setRenderer = function (renderer) {
      self.renderer = renderer;
      renderer.init();
    };

    self.now = function () {
      return now;
    };

    self.resume = function () {
      if (self.running) {
        return;
      }

      self.last_start = new Date();
      update();

      self.timer = setInterval(function () {
        update();
      }, cfg.step);
      self.running = true;
    };

    self.stop = function () {
      clearInterval(this.timer);
      cfg.bind.stop(device);
      self.running = false;
    };

    self.isRunning = function () {
      return self.running;
    };

    //get the current datetime with an offset of seconds
    function getDt(offset) {
      var rawdt = new Date();
      return new Date(rawdt.getTime() + offset * 1000);
    }

    function update() {
      now = getDt(cfg.device.offset);

      var instant = device.getInstant(now);
      self.renderer.render(instant);

      cfg.bind.tick(instant.ansi, device);

      checkMilestones(instant, cfg.milestones, device);
    }

    function checkMilestones(instant, milestones, device) {
      var key = instant.ansi;

      for (var date in milestones) {
        if (date === key) {
          milestones[key](device, instant);
          delete milestones[date];//fired
        }
      }
    }
  };

  W3FCT.devices.clock = function (cfg, lang) {

    var self = this;
    self.core = new W3FCT.devices.core(self, cfg);

    self.reset = function () {

    };

    self.getInstant = function () {
      var d = self.core.now();

      return W3FCT.fn.dt.parts(lang,
              d.getFullYear(), d.getMonth() + 1, d.getDate(), d.getDay(),
              d.getHours(), d.getMinutes(), d.getSeconds(), d.getMilliseconds());
    };

  };

  W3FCT.devices.timer = function (cfg, lang) {

    var self = this;
    self.core = new W3FCT.devices.core(self, cfg);
    self.sign = null;

    self.overrideDeadline = function (a) {
      self.deadline = W3FCT.fn.dt.fromANSI(a);
    };

    self.reset = function () {
      var defdl = W3FCT.fn.dt.stampFromOffset(0);

      var settings = W3FCT.fn.obj.merge({deadline: defdl}, cfg.device);
      var c = settings.deadline;

      self.deadline = W3FCT.fn.dt.fromANSI(c);
    };

    self.getInstant = function () {
      var now = self.core.now();
      var span_real = self.deadline - now /*- now.getTimezoneOffset()*/;

      var sign = Math.sign(span_real);
      if (self.sign === null) {//get the first sign
        self.sign = sign;
      }
      if (self.sign !== sign) {//if the sign has changed, the deadline was reached
        cfg.bind.deadline(self);
        self.sign = sign;
      }

      var span = Math.abs(span_real);

      var msxhour = 1000 * 60 * 60;//milliseconds in an hour

      var y = Math.floor((span) / (msxhour * 24 * 365));
      var d = Math.floor((span % (msxhour * 24 * 365)) / (msxhour * 24));
      var h = Math.floor((span % (msxhour * 24)) / (msxhour));
      var i = Math.floor((span % (msxhour)) / (1000 * 60));
      var s = Math.floor((span % (1000 * 60)) / 1000);
      var m = Math.floor((span % (1000)));

      var parts = W3FCT.fn.dt.parts(lang, y, 0, d, self.deadline.getDay(), h, i, s, m);
      parts.deadline = self.deadline.getTime();//progressbar
      parts.span = span;//progressbar
      parts.time = now.getTime();//progressbar

      return parts;
    };

  };


  /*
   * 
   * renderers
   * 
   */

  W3FCT.renderers.html = function (target, cfg) {
    var self = this;

    self.target = target;

    self.init = function () {
      self.digits = W3FCT.fn.dom.getDigitPlaceholders(target);
    };

    self.render = function (values) {
      W3FCT.fn.dom.setDigits(self.digits, values);
    };

  };

  W3FCT.renderers.progressbar = function (target, cfg) {

    var self = this;
    var settings = W3FCT.fn.obj.merge({mode: 'remaining'}, cfg.renderer);

    self.mode = {
      remaining: function (a) {
        return a;
      },
      elapsed: function (a) {
        return 100 - a;
      }
    };

    self.init = function () {
      self.total = null;

      self.progress = document.createElement('div');
      self.progress.classList.add('progress');

      self.progress.style.width = '0%';
      self.progress.style.height = '100%';
      self.progress.style.backgroundColor = '#aaa';

      target.prepend(self.progress);
      target.progress = self.progress;//a shorthand to alter the progressbar attributes

      self.digits = W3FCT.fn.dom.getDigitPlaceholders(target);
    };

    self.render = function (values) {
      if (self.total === null) {//get the first span, assumed as 100% of the span
        self.total = values.span;
      }

      var perc = self.mode[settings.mode](values.span / self.total * 100);
      if (perc >= 0) {
        self.progress.style.width = perc.toFixed(2) + '%';
      }


      W3FCT.fn.dom.setDigits(self.digits, values);
    };

  };

  W3FCT.renderers.analog = function (target, cfg) {
    var self = this;

    self.init = function () {
      self.digits = W3FCT.fn.dom.getDigitPlaceholders(target);

      var clock = document.createElement('div');
      clock.classList.add('w3f-analog-face');

      //
      self.hc = document.createElement('div');
      self.hc.classList.add('hc');
      clock.appendChild(self.hc);

      var h = document.createElement('div');
      h.classList.add('h');
      self.hc.appendChild(h);

      //
      self.ic = document.createElement('div');
      self.ic.classList.add('ic');
      clock.appendChild(self.ic);

      var i = document.createElement('div');
      i.classList.add('i');
      self.ic.appendChild(i);

      //
      self.sc = document.createElement('div');
      self.sc.classList.add('sc');
      clock.appendChild(self.sc);

      var s = document.createElement('div');
      s.classList.add('s');
      self.sc.appendChild(s);

      target.prepend(clock);
    };

    this.render = function (values) {
      self.sc.style.webkitTransform = 'rotateZ(' + ((values.s_ + (values.m_ * 0.001)) * 6) + 'deg)';
      self.ic.style.transform = 'rotateZ(' + ((values.i_ + (values.s_ / 60)) * 6) + 'deg)';
      self.hc.style.transform = 'rotateZ(' + ((values.h_ % 12) * 30 + values.i_ / 2) + 'deg)';

      W3FCT.fn.dom.setDigits(self.digits, values);
    };

  };

  W3FCT.renderers.polar = function (target, cfg) {
    var self = this;
    var settings = W3FCT.fn.obj.merge({
      //endings: butt, round or square
      size: 400, arcs: 'msiHhdn', stroke: 10, spacing: 10, endings: 'butt', dashes: ''
    }, cfg.renderer);

    self.arcs = [];

    self.init = function () {
      self.digits = W3FCT.fn.dom.getDigitPlaceholders(target);

      var face = document.createElementNS(W3FCT.fn.svg.ns, 'svg');
      face.classList.add('w3f-polar-face');

      var size = settings.size;
      self.center = Math.round(size / 2);

      var arcsdef = settings.arcs;

      face.setAttribute('height', size);
      face.setAttribute('width', size);

      var radius = self.center;
      for (var i = 0; i < arcsdef.length; i++) {
        radius -= settings.stroke + settings.spacing;
        var k = arcsdef.charAt(i);

        var d = W3FCT.fn.svg.arc(self.center, self.center, radius, 0, 180);
        self.arcs[k] = W3FCT.fn.svg.arc(d, settings.stroke, settings.endings, settings.dashes);
        //just some selectors to customize the arcs with CSS
        self.arcs[k].classList.add('arc');
        self.arcs[k].classList.add(k);

        face.appendChild(self.arcs[k]);
      }

      target.prepend(face);
    };

    this.render = function (values) {
      var radius = self.center;

      for (var k in self.arcs) {
        radius -= settings.stroke + settings.spacing;

        var angle = angles[k](values);
        var d = W3FCT.fn.svg.arcd(self.center, self.center, radius, 0, angle);
        self.arcs[k].setAttribute('d', d);
      }

      W3FCT.fn.dom.setDigits(self.digits, values);
    };

    var angles = {
      n: function (vs) {
        return vs.n_ * 30;
      },
      d: function (vs) {
        return vs.d_ * 11.613;
      },
      h: function (vs) {
        return (vs.h_ + (vs.i_ * 0.016)) * 15;
      },
      H: function (vs) {
        return (vs.H_) * 30;//doesn't have smooth move because of hour=12 > 360º
      },
      i: function (vs) {
        return (vs.i_ + (vs.s_ * 0.016)) * 6;
      },
      s: function (vs) {
        return (vs.s_ + (vs.m_ * 0.001)) * 6;
      },
      m: function (vs) {
        return vs.m_ * 0.36;
      }
    };

  };


  /*
   * 
   * factory
   * 
   */
  var W3FClockTimer = function (settings) {

    var self = this;

    var cfg = W3FCT.fn.obj.merge(W3FCT.config, settings);
    var lang = W3FCT.lang[cfg.lang];

    var renderer = new W3FCT.renderers[cfg.renderer.type](self, cfg);

    self.device = new W3FCT.devices[cfg.device.type](cfg, lang);

    //device common tasks
    self.device.core.setRenderer(renderer);
    self.device.core.setUp();
    cfg.bind.init();
    self.onclick = function () {
      cfg.bind.click(self.device);
    };

    if (cfg.device.ison === true) {
      self.device.core.resume();
    }

    return self;
  };

  window.W3FCT = W3FCT;
  window.Element.prototype.W3FClockTimer = W3FClockTimer;

})(window);


