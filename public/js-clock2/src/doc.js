/**
 * W3Flints Documentor
 * @author W3Flints <nrctkno@gmail.com>
 * @description Helpers for products documentation
 */

function commonEntities(s) {
  return s
          .replace(/"([^"\n]*)"/g, '<span class="s">"$1"</span>')
          .replace(/'([^'\n]*)'/g, '<span class="s">\'$1\'</span>')
          ;
}

var formats = {};

formats.js = function (s) {
  s = commonEntities(s);
  //s = s.replace(/([^\\:]|^)\/\/.*$/gm, '<span class="c">$1</span>');
  s = s
          .replace(/(\/\/[^\n\r]*(?:[\n\r]+|$))/g, '<span class="c">$1</span>')
          ;
  return s;
};

formats.html = function (s) {
  s = s
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          //.replace(/&lt;!--[\s\S]*?--&gt;/g, '<span class="c">$1</span>')
          ;
  s = commonEntities(s);
  return s;
};

formats.css = function (s) {
  /*
   s = s
   .replace(/</g, '&lt;')
   .replace(/>/g, '&gt;')
   ;
   */
  s = commonEntities(s);
  return s;
};

document.addEventListener("DOMContentLoaded", function (event) {

  var codes = document.getElementsByClassName('code');
  for (var i = 0; i < codes.length; ++i) {
    var data_src = codes[i].getAttribute('data-src');

    if (data_src === null) {
      var src = codes[i].innerHTML;
    } else {
      var src = document.getElementById(data_src).innerHTML;
    }

    var fmt = codes[i].getAttribute('data-format');
    if (fmt === null) {
      fmt = 'html';
    }

    codes[i].innerHTML = formats[fmt](src);

  }

});

