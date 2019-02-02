define([],function(){var JSNEvent={add:function(el,evt,fn){if(typeof el=='string'){el=document.querySelectorAll(el);}if(!(el instanceof Array||el instanceof NodeList)){el=[el];}for(var i=0;i<el.length;i++){var e=el[i];if(typeof e.addEventListener=='function'){e.addEventListener(evt,fn,false);}else if(typeof e.attachEvent=='function'){e.attachEvent(evt,fn);}else{e._events=e._events||{};e._events[evt]=e._events[evt]||[];e._events[evt].push(fn);}}},remove:function(el,evt,fn){if(typeof el=='string'){el=document.querySelectorAll(el);}if(!(el instanceof Array||el instanceof NodeList)){el=[el];}for(var i=0;i<el.length;i++){var e=el[i];if(typeof e.removeEventListener=='function'){e.removeEventListener(evt,fn,false);}else if(typeof e.detachEvent=='function'){e.detachEvent(evt,fn);}else{if(e._events&&e._events[evt]){for(var j=0;j<e._events[evt].length;j++){if(e._events[evt][j]===fn){e._events[evt].splice(j,1);}}}}}},trigger:function(el,evt){if(typeof el=='string'){el=document.querySelectorAll(el);}if(!(el instanceof Array||el instanceof NodeList)){el=[el];}for(var i=0;i<el.length;i++){var e=el[i],event={target:e,type:evt};if(typeof e.dispatchEvent=='function'){event=new window.Event(evt);e.dispatchEvent(event);}else if(typeof e.fireEvent=='function'){event=document.createEventObject();e.fireEvent('on'+evt,event);}else{if(e._events&&e._events[evt]){for(var j=0;j<e._events[evt].length;j++){if(typeof e._events[evt][j]=='function'){e._events[evt][j](event);}}}}}}};return JSNEvent;});