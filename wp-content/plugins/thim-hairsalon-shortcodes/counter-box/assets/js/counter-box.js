/**
 * Counter box
 */
jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(t,n,e,u,o){return jQuery.easing[jQuery.easing.def](t,n,e,u,o)},easeInQuad:function(t,n,e,u,o){return u*(n/=o)*n+e},easeOutQuad:function(t,n,e,u,o){return-u*(n/=o)*(n-2)+e},easeInOutQuad:function(t,n,e,u,o){return(n/=o/2)<1?u/2*n*n+e:-u/2*(--n*(n-2)-1)+e},easeInCubic:function(t,n,e,u,o){return u*(n/=o)*n*n+e},easeOutCubic:function(t,n,e,u,o){return u*((n=n/o-1)*n*n+1)+e},easeInOutCubic:function(t,n,e,u,o){return(n/=o/2)<1?u/2*n*n*n+e:u/2*((n-=2)*n*n+2)+e},easeInQuart:function(t,n,e,u,o){return u*(n/=o)*n*n*n+e},easeOutQuart:function(t,n,e,u,o){return-u*((n=n/o-1)*n*n*n-1)+e},easeInOutQuart:function(t,n,e,u,o){return(n/=o/2)<1?u/2*n*n*n*n+e:-u/2*((n-=2)*n*n*n-2)+e},easeInQuint:function(t,n,e,u,o){return u*(n/=o)*n*n*n*n+e},easeOutQuint:function(t,n,e,u,o){return u*((n=n/o-1)*n*n*n*n+1)+e},easeInOutQuint:function(t,n,e,u,o){return(n/=o/2)<1?u/2*n*n*n*n*n+e:u/2*((n-=2)*n*n*n*n+2)+e},easeInSine:function(t,n,e,u,o){return-u*Math.cos(n/o*(Math.PI/2))+u+e},easeOutSine:function(t,n,e,u,o){return u*Math.sin(n/o*(Math.PI/2))+e},easeInOutSine:function(t,n,e,u,o){return-u/2*(Math.cos(Math.PI*n/o)-1)+e},easeInExpo:function(t,n,e,u,o){return 0==n?e:u*Math.pow(2,10*(n/o-1))+e},easeOutExpo:function(t,n,e,u,o){return n==o?e+u:u*(-Math.pow(2,-10*n/o)+1)+e},easeInOutExpo:function(t,n,e,u,o){return 0==n?e:n==o?e+u:(n/=o/2)<1?u/2*Math.pow(2,10*(n-1))+e:u/2*(-Math.pow(2,-10*--n)+2)+e},easeInCirc:function(t,n,e,u,o){return-u*(Math.sqrt(1-(n/=o)*n)-1)+e},easeOutCirc:function(t,n,e,u,o){return u*Math.sqrt(1-(n=n/o-1)*n)+e},easeInOutCirc:function(t,n,e,u,o){return(n/=o/2)<1?-u/2*(Math.sqrt(1-n*n)-1)+e:u/2*(Math.sqrt(1-(n-=2)*n)+1)+e},easeInElastic:function(t,n,e,u,o){var r=1.70158,i=0,a=u;if(0==n)return e;if(1==(n/=o))return e+u;if(i||(i=.3*o),a<Math.abs(u)){a=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/a);return-(a*Math.pow(2,10*(n-=1))*Math.sin(2*(n*o-r)*Math.PI/i))+e},easeOutElastic:function(t,n,e,u,o){var r=1.70158,i=0,a=u;if(0==n)return e;if(1==(n/=o))return e+u;if(i||(i=.3*o),a<Math.abs(u)){a=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/a);return a*Math.pow(2,-10*n)*Math.sin(2*(n*o-r)*Math.PI/i)+u+e},easeInOutElastic:function(t,n,e,u,o){var r=1.70158,i=0,a=u;if(0==n)return e;if(2==(n/=o/2))return e+u;if(i||(i=.3*o*1.5),a<Math.abs(u)){a=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/a);return 1>n?-.5*a*Math.pow(2,10*(n-=1))*Math.sin(2*(n*o-r)*Math.PI/i)+e:a*Math.pow(2,-10*(n-=1))*Math.sin(2*(n*o-r)*Math.PI/i)*.5+u+e},easeInBack:function(t,n,e,u,o,r){return void 0==r&&(r=1.70158),u*(n/=o)*n*((r+1)*n-r)+e},easeOutBack:function(t,n,e,u,o,r){return void 0==r&&(r=1.70158),u*((n=n/o-1)*n*((r+1)*n+r)+1)+e},easeInOutBack:function(t,n,e,u,o,r){return void 0==r&&(r=1.70158),(n/=o/2)<1?u/2*n*n*(((r*=1.525)+1)*n-r)+e:u/2*((n-=2)*n*(((r*=1.525)+1)*n+r)+2)+e},easeInBounce:function(t,n,e,u,o){return u-jQuery.easing.easeOutBounce(t,o-n,0,u,o)+e},easeOutBounce:function(t,n,e,u,o){return(n/=o)<1/2.75?7.5625*u*n*n+e:2/2.75>n?u*(7.5625*(n-=1.5/2.75)*n+.75)+e:2.5/2.75>n?u*(7.5625*(n-=2.25/2.75)*n+.9375)+e:u*(7.5625*(n-=2.625/2.75)*n+.984375)+e},easeInOutBounce:function(t,n,e,u,o){return o/2>n?.5*jQuery.easing.easeInBounce(t,2*n,0,u,o)+e:.5*jQuery.easing.easeOutBounce(t,2*n-o,0,u,o)+.5*u+e}}),!function(){!function(t){var n,e,u;return u="counter",e={autoStart:!0,duration:1500,countFrom:void 0,countTo:void 0,runOnce:!1,placeholder:void 0,easing:"easeOutQuad",onStart:function(){},onComplete:function(){},numberFormatter:function(t){return Math.round(t)}},n=function(){function n(n,u){this.element=n,this.options=t.extend(!0,{},e,u),this.init()}return n}(),n.prototype.init=function(){var t;return t=parseInt(this.element.innerHTML),null==t||isNaN(t)||(this.options.countFrom<t?this.options.countTo=t:this.options.countFrom=t),void 0===this.options.countFrom&&(this.options.countFrom=0),void 0===this.options.countTo&&(this.options.countTo=0),null!=this.options.placeholder&&(this.element.innerHTML=this.options.placeholder),this.options.autoStart?this.start():void 0},n.prototype.start=function(){var t;return this.options.runOnce&&this.runCount()>=1?!1:this.running?void 0:(this.running=!0,this.updateRunCount(),this.options.onStart(),t=this,jQuery({count:this.options.countFrom}).animate({count:this.options.countTo},{duration:this.options.duration,easing:this.options.easing,step:function(){return t.setNumber(this.count)},complete:function(){return t.setNumber(t.options.countTo),t.running=!1,t.options.onComplete()}}))},n.prototype.updateRunCount=function(){return t(this.element).data("counterRunCount",(this.runCount()||0)+1)},n.prototype.runCount=function(){return t(this.element).data("counterRunCount")},n.prototype.setNumber=function(t){return this.element.innerHTML=this.options.numberFormatter(t)},t.fn.counter=function(e){var o;return o=this,this.each(function(){var o;if(!(o=t(this).data("plugin_"+u)))return t(this).data("plugin_"+u,new n(this,e));if("string"==typeof e)switch(e){case"start":return o.start()}})}}(jQuery)}.call(this),jQuery(document).ready(function(t){t(".counter-up").each(function(){var n=t(this);n.counter({autoStart:!1,duration:2e3,countTo:n.data("number"),placeholder:0});var e=!1;n.outerHeight()<t(window).height()&&n.counter("start"),t(window).scroll(function(){n.offset().top,n.outerHeight(),t(window).height(),t(window).scrollTop();t(window).scrollTop()>n.offset().top+n.outerHeight()-t(window).height()&&(e||(n.counter("start"),e=!0))})})});
