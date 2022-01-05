Clocktimer
==================================================
A powerful, cross-browser and standalone clock engine written in pure Javascript.


About
--------------------------------------

ClockTimer is a powerful, cross-browser and standalone clock engine written in pure Javascript. 
It allows you to implement a clock, a timer or a countdown widget in seconds, or create a sophisticated component extending the core library. 



Basic usage
----------------------------

*Create a new clock, using the flexible HTML renderer:*

### HTML

Include the dependencies:

```html
<head>
  <link rel="stylesheet" href="src/w3fclocktimer.css" />
  <script src="src/w3fclocktimer.js"></script>
</head>
```

Create a placeholder inside the <body> block:

```html
<div id="clock">
  <span data-digit="h"></span>:<span data-digit="i"></span>:<span data-digit="s"></span>
  <span data-digit="m"></span>
  <span data-digit="H"></span> <span data-digit="a"></span>
  <span data-digit="d"></span>-<span data-digit="n"></span>-<span data-digit="y"></span>
  <span data-digit="w"></span>, <span data-digit="N"></span>
</div>
```

### Javascript

Create a new instance inside a <script> block:

```javascript
document.addEventListener("DOMContentLoaded", function (event) { //you can omit this handler
  //Create a new clock:
  document.getElementById('clock').W3FClockTimer({});
});
```


Options
----------------------------

This is the list of default options:

```javascript
mytarget.W3FClockTimer({
  //use it to localize your instances. See the Languages section
  lang: 'default',

  device: {
    //use 'clock' or 'timer'
    type: 'clock',
    //set it to off if you want to enable it manually
    ison: true, 
    //the offset, in seconds
    offset: 0
  },

  //the refresh speed, in milliseconds
  step: 100, 

  //see the Renderers section to get the full list
  renderer: {
    type: 'html',
    settings: {}
  },

  //use it to handle some time-dependant events. See the Milestones and bindings section
  milestones: {},

  bind: {
    //fired when the instance is initialized
    init: function () {},
    //fired when the core updates itself (based on step option)
    tick: function (key, device) {},
    //fired when the device is stopped
    stop: function (device) {}, 
    //fired when the instance in clicked
    click: function (device) {}, 
    //Timer only: fired when the difference between the deadline and the current time is zero
    deadline: function (device) {}
  }
});
```

---

You can find detailed information in the examples. Enjoy it!
