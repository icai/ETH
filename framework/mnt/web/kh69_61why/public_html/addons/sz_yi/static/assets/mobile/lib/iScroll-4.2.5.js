/*!
 * iScroll v4.2.5 ~ Copyright (c) 2012 Matteo Spinelli, http://cubiq.org
 * Released under MIT license, http://cubiq.org/license
 */
!function(t,e){function n(t){return""===r?t:(t=t.charAt(0).toUpperCase()+t.substr(1),r+t)}var i=Math,s=e.createElement("div").style,r=function(){for(var t,e="t,webkitT,MozT,msT,OT".split(","),n=0,i=e.length;i>n;n++)if(t=e[n]+"ransform",t in s)return e[n].substr(0,e[n].length-1);return!1}(),o=r?"-"+r.toLowerCase()+"-":"",a=n("transform"),l=n("transitionProperty"),c=n("transitionDuration"),u=n("transformOrigin"),h=n("transitionTimingFunction"),d=n("transitionDelay"),p=/android/gi.test(navigator.appVersion),f=/iphone|ipad/gi.test(navigator.appVersion),m=/hp-tablet/gi.test(navigator.appVersion),g=n("perspective")in s,v="ontouchstart"in t&&!m,y=r!==!1,b=n("transition")in s,w="onorientationchange"in t?"orientationchange":"resize",x=v?"touchstart":"mousedown",C=v?"touchmove":"mousemove",T=v?"touchend":"mouseup",k=v?"touchcancel":"mouseup",S=function(){if(r===!1)return!1;var t={"":"transitionend",webkit:"webkitTransitionEnd",Moz:"transitionend",O:"otransitionend",ms:"MSTransitionEnd"};return t[r]}(),_=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||t.msRequestAnimationFrame||function(t){return setTimeout(t,1)}}(),D=function(){return t.cancelRequestAnimationFrame||t.webkitCancelAnimationFrame||t.webkitCancelRequestAnimationFrame||t.mozCancelRequestAnimationFrame||t.oCancelRequestAnimationFrame||t.msCancelRequestAnimationFrame||clearTimeout}(),E=g?" translateZ(0)":"",$=function(n,i){var s,r=this;r.wrapper="object"==typeof n?n:e.getElementById(n),r.wrapper.style.overflow="hidden",r.scroller=r.wrapper.children[0],r.options={hScroll:!0,vScroll:!0,x:0,y:0,bounce:!0,bounceLock:!1,momentum:!0,lockDirection:!0,useTransform:!0,useTransition:!1,topOffset:0,checkDOMChanges:!1,handleClick:!0,hScrollbar:!0,vScrollbar:!0,fixedScrollbar:p,hideScrollbar:f,fadeScrollbar:f&&g,scrollbarClass:"",zoom:!1,zoomMin:1,zoomMax:4,doubleTapZoom:2,wheelAction:"scroll",snap:!1,snapThreshold:1,onRefresh:null,onBeforeScrollStart:function(t){t.preventDefault()},onScrollStart:null,onBeforeScrollMove:null,onScrollMove:null,onBeforeScrollEnd:null,onScrollEnd:null,onTouchEnd:null,onDestroy:null,onZoomStart:null,onZoom:null,onZoomEnd:null};for(s in i)r.options[s]=i[s];r.x=r.options.x,r.y=r.options.y,r.options.useTransform=y&&r.options.useTransform,r.options.hScrollbar=r.options.hScroll&&r.options.hScrollbar,r.options.vScrollbar=r.options.vScroll&&r.options.vScrollbar,r.options.zoom=r.options.useTransform&&r.options.zoom,r.options.useTransition=b&&r.options.useTransition,r.options.zoom&&p&&(E=""),r.scroller.style[l]=r.options.useTransform?o+"transform":"top left",r.scroller.style[c]="0",r.scroller.style[u]="0 0",r.options.useTransition&&(r.scroller.style[h]="cubic-bezier(0.33,0.66,0.66,1)"),r.options.useTransform?r.scroller.style[a]="translate("+r.x+"px,"+r.y+"px)"+E:r.scroller.style.cssText+=";position:absolute;top:"+r.y+"px;left:"+r.x+"px",r.options.useTransition&&(r.options.fixedScrollbar=!0),r.refresh(),r._bind(w,t),r._bind(x),v||"none"!=r.options.wheelAction&&(r._bind("DOMMouseScroll"),r._bind("mousewheel")),r.options.checkDOMChanges&&(r.checkDOMTime=setInterval(function(){r._checkDOMChanges()},500))};$.prototype={enabled:!0,x:0,y:0,steps:[],scale:1,currPageX:0,currPageY:0,pagesX:[],pagesY:[],aniTime:null,wheelZoomCount:0,handleEvent:function(t){var e=this;switch(t.type){case x:if(!v&&0!==t.button)return;e._start(t);break;case C:e._move(t);break;case T:case k:e._end(t);break;case w:e._resize();break;case"DOMMouseScroll":case"mousewheel":e._wheel(t);break;case S:e._transitionEnd(t)}},_checkDOMChanges:function(){this.moved||this.zoomed||this.animating||this.scrollerW==this.scroller.offsetWidth*this.scale&&this.scrollerH==this.scroller.offsetHeight*this.scale||this.refresh()},_scrollbar:function(t){var n,s=this;return s[t+"Scrollbar"]?(s[t+"ScrollbarWrapper"]||(n=e.createElement("div"),s.options.scrollbarClass?n.className=s.options.scrollbarClass+t.toUpperCase():n.style.cssText="position:absolute;z-index:100;"+("h"==t?"height:7px;bottom:1px;left:2px;right:"+(s.vScrollbar?"7":"2")+"px":"width:7px;bottom:"+(s.hScrollbar?"7":"2")+"px;top:2px;right:1px"),n.style.cssText+=";pointer-events:none;"+o+"transition-property:opacity;"+o+"transition-duration:"+(s.options.fadeScrollbar?"350ms":"0")+";overflow:hidden;opacity:"+(s.options.hideScrollbar?"0":"1"),s.wrapper.appendChild(n),s[t+"ScrollbarWrapper"]=n,n=e.createElement("div"),s.options.scrollbarClass||(n.style.cssText="position:absolute;z-index:100;background:rgba(0,0,0,0.5);border:1px solid rgba(255,255,255,0.9);"+o+"background-clip:padding-box;"+o+"box-sizing:border-box;"+("h"==t?"height:100%":"width:100%")+";"+o+"border-radius:3px;border-radius:3px"),n.style.cssText+=";pointer-events:none;"+o+"transition-property:"+o+"transform;"+o+"transition-timing-function:cubic-bezier(0.33,0.66,0.66,1);"+o+"transition-duration:0;"+o+"transform: translate(0,0)"+E,s.options.useTransition&&(n.style.cssText+=";"+o+"transition-timing-function:cubic-bezier(0.33,0.66,0.66,1)"),s[t+"ScrollbarWrapper"].appendChild(n),s[t+"ScrollbarIndicator"]=n),"h"==t?(s.hScrollbarSize=s.hScrollbarWrapper.clientWidth,s.hScrollbarIndicatorSize=i.max(i.round(s.hScrollbarSize*s.hScrollbarSize/s.scrollerW),8),s.hScrollbarIndicator.style.width=s.hScrollbarIndicatorSize+"px",s.hScrollbarMaxScroll=s.hScrollbarSize-s.hScrollbarIndicatorSize,s.hScrollbarProp=s.hScrollbarMaxScroll/s.maxScrollX):(s.vScrollbarSize=s.vScrollbarWrapper.clientHeight,s.vScrollbarIndicatorSize=i.max(i.round(s.vScrollbarSize*s.vScrollbarSize/s.scrollerH),8),s.vScrollbarIndicator.style.height=s.vScrollbarIndicatorSize+"px",s.vScrollbarMaxScroll=s.vScrollbarSize-s.vScrollbarIndicatorSize,s.vScrollbarProp=s.vScrollbarMaxScroll/s.maxScrollY),void s._scrollbarPos(t,!0)):void(s[t+"ScrollbarWrapper"]&&(y&&(s[t+"ScrollbarIndicator"].style[a]=""),s[t+"ScrollbarWrapper"].parentNode.removeChild(s[t+"ScrollbarWrapper"]),s[t+"ScrollbarWrapper"]=null,s[t+"ScrollbarIndicator"]=null))},_resize:function(){var t=this;setTimeout(function(){t.refresh()},p?200:0)},_pos:function(t,e){this.zoomed||(t=this.hScroll?t:0,e=this.vScroll?e:0,this.options.useTransform?this.scroller.style[a]="translate("+t+"px,"+e+"px) scale("+this.scale+")"+E:(t=i.round(t),e=i.round(e),this.scroller.style.left=t+"px",this.scroller.style.top=e+"px"),this.x=t,this.y=e,this._scrollbarPos("h"),this._scrollbarPos("v"))},_scrollbarPos:function(t,e){var n,s=this,r="h"==t?s.x:s.y;s[t+"Scrollbar"]&&(r=s[t+"ScrollbarProp"]*r,0>r?(s.options.fixedScrollbar||(n=s[t+"ScrollbarIndicatorSize"]+i.round(3*r),8>n&&(n=8),s[t+"ScrollbarIndicator"].style["h"==t?"width":"height"]=n+"px"),r=0):r>s[t+"ScrollbarMaxScroll"]&&(s.options.fixedScrollbar?r=s[t+"ScrollbarMaxScroll"]:(n=s[t+"ScrollbarIndicatorSize"]-i.round(3*(r-s[t+"ScrollbarMaxScroll"])),8>n&&(n=8),s[t+"ScrollbarIndicator"].style["h"==t?"width":"height"]=n+"px",r=s[t+"ScrollbarMaxScroll"]+(s[t+"ScrollbarIndicatorSize"]-n))),s[t+"ScrollbarWrapper"].style[d]="0",s[t+"ScrollbarWrapper"].style.opacity=e&&s.options.hideScrollbar?"0":"1",s[t+"ScrollbarIndicator"].style[a]="translate("+("h"==t?r+"px,0)":"0,"+r+"px)")+E)},_start:function(e){var n,s,r,o,l,c=this,u=v?e.touches[0]:e;c.enabled&&(c.options.onBeforeScrollStart&&c.options.onBeforeScrollStart.call(c,e),(c.options.useTransition||c.options.zoom)&&c._transitionTime(0),c.moved=!1,c.animating=!1,c.zoomed=!1,c.distX=0,c.distY=0,c.absDistX=0,c.absDistY=0,c.dirX=0,c.dirY=0,c.options.zoom&&v&&e.touches.length>1&&(o=i.abs(e.touches[0].pageX-e.touches[1].pageX),l=i.abs(e.touches[0].pageY-e.touches[1].pageY),c.touchesDistStart=i.sqrt(o*o+l*l),c.originX=i.abs(e.touches[0].pageX+e.touches[1].pageX-2*c.wrapperOffsetLeft)/2-c.x,c.originY=i.abs(e.touches[0].pageY+e.touches[1].pageY-2*c.wrapperOffsetTop)/2-c.y,c.options.onZoomStart&&c.options.onZoomStart.call(c,e)),c.options.momentum&&(c.options.useTransform?(n=getComputedStyle(c.scroller,null)[a].replace(/[^0-9\-.,]/g,"").split(","),s=+(n[12]||n[4]),r=+(n[13]||n[5])):(s=+getComputedStyle(c.scroller,null).left.replace(/[^0-9-]/g,""),r=+getComputedStyle(c.scroller,null).top.replace(/[^0-9-]/g,"")),(s!=c.x||r!=c.y)&&(c.options.useTransition?c._unbind(S):D(c.aniTime),c.steps=[],c._pos(s,r),c.options.onScrollEnd&&c.options.onScrollEnd.call(c))),c.absStartX=c.x,c.absStartY=c.y,c.startX=c.x,c.startY=c.y,c.pointX=u.pageX,c.pointY=u.pageY,c.startTime=e.timeStamp||Date.now(),c.options.onScrollStart&&c.options.onScrollStart.call(c,e),c._bind(C,t),c._bind(T,t),c._bind(k,t))},_move:function(t){var e,n,s,r=this,o=v?t.touches[0]:t,l=o.pageX-r.pointX,c=o.pageY-r.pointY,u=r.x+l,h=r.y+c,d=t.timeStamp||Date.now();return r.options.onBeforeScrollMove&&r.options.onBeforeScrollMove.call(r,t),r.options.zoom&&v&&t.touches.length>1?(e=i.abs(t.touches[0].pageX-t.touches[1].pageX),n=i.abs(t.touches[0].pageY-t.touches[1].pageY),r.touchesDist=i.sqrt(e*e+n*n),r.zoomed=!0,s=1/r.touchesDistStart*r.touchesDist*this.scale,s<r.options.zoomMin?s=.5*r.options.zoomMin*Math.pow(2,s/r.options.zoomMin):s>r.options.zoomMax&&(s=2*r.options.zoomMax*Math.pow(.5,r.options.zoomMax/s)),r.lastScale=s/this.scale,u=this.originX-this.originX*r.lastScale+this.x,h=this.originY-this.originY*r.lastScale+this.y,this.scroller.style[a]="translate("+u+"px,"+h+"px) scale("+s+")"+E,void(r.options.onZoom&&r.options.onZoom.call(r,t))):(r.pointX=o.pageX,r.pointY=o.pageY,(u>0||u<r.maxScrollX)&&(u=r.options.bounce?r.x+l/2:u>=0||r.maxScrollX>=0?0:r.maxScrollX),(h>r.minScrollY||h<r.maxScrollY)&&(h=r.options.bounce?r.y+c/2:h>=r.minScrollY||r.maxScrollY>=0?r.minScrollY:r.maxScrollY),r.distX+=l,r.distY+=c,r.absDistX=i.abs(r.distX),r.absDistY=i.abs(r.distY),void(r.absDistX<6&&r.absDistY<6||(r.options.lockDirection&&(r.absDistX>r.absDistY+5?(h=r.y,c=0):r.absDistY>r.absDistX+5&&(u=r.x,l=0)),r.moved=!0,r._pos(u,h),r.dirX=l>0?-1:0>l?1:0,r.dirY=c>0?-1:0>c?1:0,d-r.startTime>300&&(r.startTime=d,r.startX=r.x,r.startY=r.y),r.options.onScrollMove&&r.options.onScrollMove.call(r,t))))},_end:function(n){if(!v||0===n.touches.length){var s,r,o,l,u,h,d,p=this,f=v?n.changedTouches[0]:n,m={dist:0,time:0},g={dist:0,time:0},y=(n.timeStamp||Date.now())-p.startTime,b=p.x,w=p.y;if(p._unbind(C,t),p._unbind(T,t),p._unbind(k,t),p.options.onBeforeScrollEnd&&p.options.onBeforeScrollEnd.call(p,n),p.zoomed)return d=p.scale*p.lastScale,d=Math.max(p.options.zoomMin,d),d=Math.min(p.options.zoomMax,d),p.lastScale=d/p.scale,p.scale=d,p.x=p.originX-p.originX*p.lastScale+p.x,p.y=p.originY-p.originY*p.lastScale+p.y,p.scroller.style[c]="200ms",p.scroller.style[a]="translate("+p.x+"px,"+p.y+"px) scale("+p.scale+")"+E,p.zoomed=!1,p.refresh(),void(p.options.onZoomEnd&&p.options.onZoomEnd.call(p,n));if(!p.moved)return v&&(p.doubleTapTimer&&p.options.zoom?(clearTimeout(p.doubleTapTimer),p.doubleTapTimer=null,p.options.onZoomStart&&p.options.onZoomStart.call(p,n),p.zoom(p.pointX,p.pointY,1==p.scale?p.options.doubleTapZoom:1),p.options.onZoomEnd&&setTimeout(function(){p.options.onZoomEnd.call(p,n)},200)):this.options.handleClick&&(p.doubleTapTimer=setTimeout(function(){for(p.doubleTapTimer=null,s=f.target;1!=s.nodeType;)s=s.parentNode;"SELECT"!=s.tagName&&"INPUT"!=s.tagName&&"TEXTAREA"!=s.tagName&&(r=e.createEvent("MouseEvents"),r.initMouseEvent("click",!0,!0,n.view,1,f.screenX,f.screenY,f.clientX,f.clientY,n.ctrlKey,n.altKey,n.shiftKey,n.metaKey,0,null),r._fake=!0,s.dispatchEvent(r))},p.options.zoom?250:0))),p._resetPos(400),void(p.options.onTouchEnd&&p.options.onTouchEnd.call(p,n));if(300>y&&p.options.momentum&&(m=b?p._momentum(b-p.startX,y,-p.x,p.scrollerW-p.wrapperW+p.x,p.options.bounce?p.wrapperW:0):m,g=w?p._momentum(w-p.startY,y,-p.y,p.maxScrollY<0?p.scrollerH-p.wrapperH+p.y-p.minScrollY:0,p.options.bounce?p.wrapperH:0):g,b=p.x+m.dist,w=p.y+g.dist,(p.x>0&&b>0||p.x<p.maxScrollX&&b<p.maxScrollX)&&(m={dist:0,time:0}),(p.y>p.minScrollY&&w>p.minScrollY||p.y<p.maxScrollY&&w<p.maxScrollY)&&(g={dist:0,time:0})),m.dist||g.dist)return u=i.max(i.max(m.time,g.time),10),p.options.snap&&(o=b-p.absStartX,l=w-p.absStartY,i.abs(o)<p.options.snapThreshold&&i.abs(l)<p.options.snapThreshold?p.scrollTo(p.absStartX,p.absStartY,200):(h=p._snap(b,w),b=h.x,w=h.y,u=i.max(h.time,u))),p.scrollTo(i.round(b),i.round(w),u),void(p.options.onTouchEnd&&p.options.onTouchEnd.call(p,n));if(p.options.snap)return o=b-p.absStartX,l=w-p.absStartY,i.abs(o)<p.options.snapThreshold&&i.abs(l)<p.options.snapThreshold?p.scrollTo(p.absStartX,p.absStartY,200):(h=p._snap(p.x,p.y),(h.x!=p.x||h.y!=p.y)&&p.scrollTo(h.x,h.y,h.time)),void(p.options.onTouchEnd&&p.options.onTouchEnd.call(p,n));p._resetPos(200),p.options.onTouchEnd&&p.options.onTouchEnd.call(p,n)}},_resetPos:function(t){var e=this,n=e.x>=0?0:e.x<e.maxScrollX?e.maxScrollX:e.x,i=e.y>=e.minScrollY||e.maxScrollY>0?e.minScrollY:e.y<e.maxScrollY?e.maxScrollY:e.y;return n==e.x&&i==e.y?(e.moved&&(e.moved=!1,e.options.onScrollEnd&&e.options.onScrollEnd.call(e)),e.hScrollbar&&e.options.hideScrollbar&&("webkit"==r&&(e.hScrollbarWrapper.style[d]="300ms"),e.hScrollbarWrapper.style.opacity="0"),void(e.vScrollbar&&e.options.hideScrollbar&&("webkit"==r&&(e.vScrollbarWrapper.style[d]="300ms"),e.vScrollbarWrapper.style.opacity="0"))):void e.scrollTo(n,i,t||0)},_wheel:function(t){var e,n,i,s,r,o=this;if("wheelDeltaX"in t)e=t.wheelDeltaX/12,n=t.wheelDeltaY/12;else if("wheelDelta"in t)e=n=t.wheelDelta/12;else{if(!("detail"in t))return;e=n=3*-t.detail}return"zoom"==o.options.wheelAction?(r=o.scale*Math.pow(2,1/3*(n?n/Math.abs(n):0)),r<o.options.zoomMin&&(r=o.options.zoomMin),r>o.options.zoomMax&&(r=o.options.zoomMax),void(r!=o.scale&&(!o.wheelZoomCount&&o.options.onZoomStart&&o.options.onZoomStart.call(o,t),o.wheelZoomCount++,o.zoom(t.pageX,t.pageY,r,400),setTimeout(function(){o.wheelZoomCount--,!o.wheelZoomCount&&o.options.onZoomEnd&&o.options.onZoomEnd.call(o,t)},400)))):(i=o.x+e,s=o.y+n,i>0?i=0:i<o.maxScrollX&&(i=o.maxScrollX),s>o.minScrollY?s=o.minScrollY:s<o.maxScrollY&&(s=o.maxScrollY),void(o.maxScrollY<0&&o.scrollTo(i,s,0)))},_transitionEnd:function(t){var e=this;t.target==e.scroller&&(e._unbind(S),e._startAni())},_startAni:function(){var t,e,n,s=this,r=s.x,o=s.y,a=Date.now();if(!s.animating){if(!s.steps.length)return void s._resetPos(400);if(t=s.steps.shift(),t.x==r&&t.y==o&&(t.time=0),s.animating=!0,s.moved=!0,s.options.useTransition)return s._transitionTime(t.time),s._pos(t.x,t.y),s.animating=!1,void(t.time?s._bind(S):s._resetPos(0));n=function(){var l,c,u=Date.now();return u>=a+t.time?(s._pos(t.x,t.y),s.animating=!1,s.options.onAnimationEnd&&s.options.onAnimationEnd.call(s),void s._startAni()):(u=(u-a)/t.time-1,e=i.sqrt(1-u*u),l=(t.x-r)*e+r,c=(t.y-o)*e+o,s._pos(l,c),void(s.animating&&(s.aniTime=_(n))))},n()}},_transitionTime:function(t){t+="ms",this.scroller.style[c]=t,this.hScrollbar&&(this.hScrollbarIndicator.style[c]=t),this.vScrollbar&&(this.vScrollbarIndicator.style[c]=t)},_momentum:function(t,e,n,s,r){var o=6e-4,a=i.abs(t)/e,l=a*a/(2*o),c=0,u=0;return t>0&&l>n?(u=r/(6/(l/a*o)),n+=u,a=a*n/l,l=n):0>t&&l>s&&(u=r/(6/(l/a*o)),s+=u,a=a*s/l,l=s),l*=0>t?-1:1,c=a/o,{dist:l,time:i.round(c)}},_offset:function(t){for(var e=-t.offsetLeft,n=-t.offsetTop;t=t.offsetParent;)e-=t.offsetLeft,n-=t.offsetTop;return t!=this.wrapper&&(e*=this.scale,n*=this.scale),{left:e,top:n}},_snap:function(t,e){var n,s,r,o,a,l,c=this;for(r=c.pagesX.length-1,n=0,s=c.pagesX.length;s>n;n++)if(t>=c.pagesX[n]){r=n;break}for(r==c.currPageX&&r>0&&c.dirX<0&&r--,t=c.pagesX[r],a=i.abs(t-c.pagesX[c.currPageX]),a=a?i.abs(c.x-t)/a*500:0,c.currPageX=r,r=c.pagesY.length-1,n=0;r>n;n++)if(e>=c.pagesY[n]){r=n;break}return r==c.currPageY&&r>0&&c.dirY<0&&r--,e=c.pagesY[r],l=i.abs(e-c.pagesY[c.currPageY]),l=l?i.abs(c.y-e)/l*500:0,c.currPageY=r,o=i.round(i.max(a,l))||200,{x:t,y:e,time:o}},_bind:function(t,e,n){(e||this.scroller).addEventListener(t,this,!!n)},_unbind:function(t,e,n){(e||this.scroller).removeEventListener(t,this,!!n)},destroy:function(){var e=this;e.scroller.style[a]="",e.hScrollbar=!1,e.vScrollbar=!1,e._scrollbar("h"),e._scrollbar("v"),e._unbind(w,t),e._unbind(x),e._unbind(C,t),e._unbind(T,t),e._unbind(k,t),e.options.hasTouch||(e._unbind("DOMMouseScroll"),e._unbind("mousewheel")),e.options.useTransition&&e._unbind(S),e.options.checkDOMChanges&&clearInterval(e.checkDOMTime),e.options.onDestroy&&e.options.onDestroy.call(e)},refresh:function(){var t,e,n,s,r=this,o=0,a=0;if(r.scale<r.options.zoomMin&&(r.scale=r.options.zoomMin),r.wrapperW=r.wrapper.clientWidth||1,r.wrapperH=r.wrapper.clientHeight||1,r.minScrollY=-r.options.topOffset||0,r.scrollerW=i.round(r.scroller.offsetWidth*r.scale),r.scrollerH=i.round((r.scroller.offsetHeight+r.minScrollY)*r.scale),r.maxScrollX=r.wrapperW-r.scrollerW,r.maxScrollY=r.wrapperH-r.scrollerH+r.minScrollY,r.dirX=0,r.dirY=0,r.options.onRefresh&&r.options.onRefresh.call(r),r.hScroll=r.options.hScroll&&r.maxScrollX<0,r.vScroll=r.options.vScroll&&(!r.options.bounceLock&&!r.hScroll||r.scrollerH>r.wrapperH),r.hScrollbar=r.hScroll&&r.options.hScrollbar,r.vScrollbar=r.vScroll&&r.options.vScrollbar&&r.scrollerH>r.wrapperH,t=r._offset(r.wrapper),r.wrapperOffsetLeft=-t.left,r.wrapperOffsetTop=-t.top,"string"==typeof r.options.snap)for(r.pagesX=[],r.pagesY=[],s=r.scroller.querySelectorAll(r.options.snap),e=0,n=s.length;n>e;e++)o=r._offset(s[e]),o.left+=r.wrapperOffsetLeft,o.top+=r.wrapperOffsetTop,r.pagesX[e]=o.left<r.maxScrollX?r.maxScrollX:o.left*r.scale,r.pagesY[e]=o.top<r.maxScrollY?r.maxScrollY:o.top*r.scale;else if(r.options.snap){for(r.pagesX=[];o>=r.maxScrollX;)r.pagesX[a]=o,o-=r.wrapperW,a++;for(r.maxScrollX%r.wrapperW&&(r.pagesX[r.pagesX.length]=r.maxScrollX-r.pagesX[r.pagesX.length-1]+r.pagesX[r.pagesX.length-1]),o=0,a=0,r.pagesY=[];o>=r.maxScrollY;)r.pagesY[a]=o,o-=r.wrapperH,a++;r.maxScrollY%r.wrapperH&&(r.pagesY[r.pagesY.length]=r.maxScrollY-r.pagesY[r.pagesY.length-1]+r.pagesY[r.pagesY.length-1])}r._scrollbar("h"),r._scrollbar("v"),r.zoomed||(r.scroller.style[c]="0",r._resetPos(400))},scrollTo:function(t,e,n,i){var s,r,o=this,a=t;for(o.stop(),a.length||(a=[{x:t,y:e,time:n,relative:i}]),s=0,r=a.length;r>s;s++)a[s].relative&&(a[s].x=o.x-a[s].x,a[s].y=o.y-a[s].y),o.steps.push({x:a[s].x,y:a[s].y,time:a[s].time||0});o._startAni()},scrollToElement:function(t,e){var n,s=this;t=t.nodeType?t:s.scroller.querySelector(t),t&&(n=s._offset(t),n.left+=s.wrapperOffsetLeft,n.top+=s.wrapperOffsetTop,n.left=n.left>0?0:n.left<s.maxScrollX?s.maxScrollX:n.left,n.top=n.top>s.minScrollY?s.minScrollY:n.top<s.maxScrollY?s.maxScrollY:n.top,e=void 0===e?i.max(2*i.abs(n.left),2*i.abs(n.top)):e,s.scrollTo(n.left,n.top,e))},scrollToPage:function(t,e,n){var i,s,r=this;n=void 0===n?400:n,r.options.onScrollStart&&r.options.onScrollStart.call(r),r.options.snap?(t="next"==t?r.currPageX+1:"prev"==t?r.currPageX-1:t,e="next"==e?r.currPageY+1:"prev"==e?r.currPageY-1:e,t=0>t?0:t>r.pagesX.length-1?r.pagesX.length-1:t,e=0>e?0:e>r.pagesY.length-1?r.pagesY.length-1:e,r.currPageX=t,r.currPageY=e,i=r.pagesX[t],s=r.pagesY[e]):(i=-r.wrapperW*t,s=-r.wrapperH*e,i<r.maxScrollX&&(i=r.maxScrollX),s<r.maxScrollY&&(s=r.maxScrollY)),r.scrollTo(i,s,n)},disable:function(){this.stop(),this._resetPos(0),this.enabled=!1,this._unbind(C,t),this._unbind(T,t),this._unbind(k,t)},enable:function(){this.enabled=!0},stop:function(){this.options.useTransition?this._unbind(S):D(this.aniTime),this.steps=[],this.moved=!1,this.animating=!1},zoom:function(t,e,n,i){var s=this,r=n/s.scale;s.options.useTransform&&(s.zoomed=!0,i=void 0===i?200:i,t=t-s.wrapperOffsetLeft-s.x,e=e-s.wrapperOffsetTop-s.y,s.x=t-t*r+s.x,s.y=e-e*r+s.y,s.scale=n,s.refresh(),s.x=s.x>0?0:s.x<s.maxScrollX?s.maxScrollX:s.x,s.y=s.y>s.minScrollY?s.minScrollY:s.y<s.maxScrollY?s.maxScrollY:s.y,s.scroller.style[c]=i+"ms",s.scroller.style[a]="translate("+s.x+"px,"+s.y+"px) scale("+n+")"+E,s.zoomed=!1)},isReady:function(){return!this.moved&&!this.zoomed&&!this.animating}},s=null,"undefined"!=typeof exports?exports.iScroll=$:t.iScroll=$}(window,document);