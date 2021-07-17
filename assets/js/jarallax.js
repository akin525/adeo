/*!
* Name : Just Another Parallax [Jarallax]
* Version : 1.7.3
* Author : _nK https://nkdev.info
* GitHub : https://github.com/nk-o/jarallax
*/(function(window){'use strict';if(!Date.now){Date.now=function(){return new Date().getTime();};}
if(!window.requestAnimationFrame){(function(){var vendors=['webkit','moz'];for(var i=0;i<vendors.length&&!window.requestAnimationFrame;++i){var vp=vendors[i];window.requestAnimationFrame=window[vp+'RequestAnimationFrame'];window.cancelAnimationFrame=window[vp+'CancelAnimationFrame']||window[vp+'CancelRequestAnimationFrame'];}
if(/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent)||!window.requestAnimationFrame||!window.cancelAnimationFrame){var lastTime=0;window.requestAnimationFrame=function(callback){var now=Date.now();var nextTime=Math.max(lastTime+16,now);return setTimeout(function(){callback(lastTime=nextTime);},nextTime-now);};window.cancelAnimationFrame=clearTimeout;}}());}
var supportTransform=(function(){if(!window.getComputedStyle){return false;}
var el=document.createElement('p'),has3d,transforms={'webkitTransform':'-webkit-transform','OTransform':'-o-transform','msTransform':'-ms-transform','MozTransform':'-moz-transform','transform':'transform'};(document.body||document.documentElement).insertBefore(el,null);for(var t in transforms){if(typeof el.style[t]!=='undefined'){el.style[t]="translate3d(1px,1px,1px)";has3d=window.getComputedStyle(el).getPropertyValue(transforms[t]);}}
(document.body||document.documentElement).removeChild(el);return typeof has3d!=='undefined'&&has3d.length>0&&has3d!=="none";}());var isAndroid=navigator.userAgent.toLowerCase().indexOf('android')>-1;var isIOs=/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream;var isOperaOld=!!window.opera;var isEdge=/Edge\/\d+/.test(navigator.userAgent);var isIE11=/Trident.*rv[ :]*11\./.test(navigator.userAgent);var isIE10=!!Function('/*@cc_on return document.documentMode===10@*/')();var isIElt10=document.all&&!window.atob;var wndW;var wndH;function updateWndVars(){wndW=window.innerWidth||document.documentElement.clientWidth;wndH=window.innerHeight||document.documentElement.clientHeight;}
updateWndVars();var jarallaxList=[];var Jarallax=(function(){var instanceID=0;function Jarallax_inner(item,userOptions){var _this=this,dataOptions;_this.$item=item;_this.defaults={type:'scroll',speed:0.5,imgSrc:null,imgWidth:null,imgHeight:null,enableTransform:true,elementInViewport:null,zIndex:-100,noAndroid:false,noIos:true,onScroll:null,onInit:null,onDestroy:null,onCoverImage:null};dataOptions=JSON.parse(_this.$item.getAttribute('data-jarallax')||'{}');_this.options=_this.extend({},_this.defaults,dataOptions,userOptions);if(isAndroid&&_this.options.noAndroid||isIOs&&_this.options.noIos){return;}
_this.options.speed=Math.min(2,Math.max(-1,parseFloat(_this.options.speed)));var elementInVP=_this.options.elementInViewport;if(elementInVP&&typeof elementInVP==='object'&&typeof elementInVP.length!=='undefined'){elementInVP=elementInVP[0];}
if(!elementInVP instanceof Element){elementInVP=null;}
_this.options.elementInViewport=elementInVP;_this.instanceID=instanceID++;_this.image={src:_this.options.imgSrc||null,$container:null,$item:null,width:_this.options.imgWidth||null,height:_this.options.imgHeight||null,useImgTag:isIOs||isAndroid||isOperaOld||isIE11||isIE10||isEdge};if(_this.initImg()){_this.init();}}
return Jarallax_inner;}());Jarallax.prototype.css=function(el,styles){if(typeof styles==='string'){if(window.getComputedStyle){return window.getComputedStyle(el).getPropertyValue(styles);}
return el.style[styles];}
if(styles.transform){styles.WebkitTransform=styles.MozTransform=styles.transform;}
for(var k in styles){el.style[k]=styles[k];}
return el;};Jarallax.prototype.extend=function(out){out=out||{};for(var i=1;i<arguments.length;i++){if(!arguments[i]){continue;}
for(var key in arguments[i]){if(arguments[i].hasOwnProperty(key)){out[key]=arguments[i][key];}}}
return out;};Jarallax.prototype.initImg=function(){var _this=this;if(_this.image.src===null){_this.image.src=_this.css(_this.$item,'background-image').replace(/^url\(['"]?/g,'').replace(/['"]?\)$/g,'');}
return!(!_this.image.src||_this.image.src==='none');};Jarallax.prototype.init=function(){var _this=this,containerStyles={position:'absolute',top:0,left:0,width:'100%',height:'100%',overflow:'hidden',pointerEvents:'none'},imageStyles={position:'fixed'};_this.$item.setAttribute('data-jarallax-original-styles',_this.$item.getAttribute('style'));if(_this.css(_this.$item,'position')==='static'){_this.css(_this.$item,{position:'relative'});}
if(_this.css(_this.$item,'z-index')==='auto'){_this.css(_this.$item,{zIndex:0});}
_this.image.$container=document.createElement('div');_this.css(_this.image.$container,containerStyles);_this.css(_this.image.$container,{visibility:'hidden','z-index':_this.options.zIndex});_this.image.$container.setAttribute('id','jarallax-container-'+_this.instanceID);_this.$item.appendChild(_this.image.$container);if(_this.image.useImgTag&&supportTransform&&_this.options.enableTransform){_this.image.$item=document.createElement('img');_this.image.$item.setAttribute('src',_this.image.src);imageStyles=_this.extend({'max-width':'none'},containerStyles,imageStyles);}
else{_this.image.$item=document.createElement('div');imageStyles=_this.extend({'background-position':'50% 50%','background-size':'100% auto','background-repeat':'no-repeat no-repeat','background-image':'url("'+_this.image.src+'")'},containerStyles,imageStyles);}
if(isIElt10){imageStyles.backgroundAttachment='fixed';}
_this.parentWithTransform=0;var $itemParents=_this.$item;while($itemParents!==null&&$itemParents!==document&&_this.parentWithTransform===0){var parent_transform=_this.css($itemParents,'-webkit-transform')||_this.css($itemParents,'-moz-transform')||_this.css($itemParents,'transform');if(parent_transform&&parent_transform!=='none'){_this.parentWithTransform=1;_this.css(_this.image.$container,{transform:'translateX(0) translateY(0)'});}
$itemParents=$itemParents.parentNode;}
_this.css(_this.image.$item,imageStyles);_this.image.$container.appendChild(_this.image.$item);function initAfterReady(){_this.coverImage();_this.clipContainer();_this.onScroll(true);if(_this.options.onInit){_this.options.onInit.call(_this);}
setTimeout(function(){if(_this.$item){_this.css(_this.$item,{'background-image':'none','background-attachment':'scroll','background-size':'auto'});}},0);}
if(_this.image.width&&_this.image.height){initAfterReady();}else{_this.getImageSize(_this.image.src,function(width,height){_this.image.width=width;_this.image.height=height;initAfterReady();});}
jarallaxList.push(_this);};Jarallax.prototype.destroy=function(){var _this=this;for(var k=0,len=jarallaxList.length;k<len;k++){if(jarallaxList[k].instanceID===_this.instanceID){jarallaxList.splice(k,1);break;}}
var originalStylesTag=_this.$item.getAttribute('data-jarallax-original-styles');_this.$item.removeAttribute('data-jarallax-original-styles');if(originalStylesTag==='null'){_this.$item.removeAttribute('style');}else{_this.$item.setAttribute('style',originalStylesTag);}
if(_this.$clipStyles){_this.$clipStyles.parentNode.removeChild(_this.$clipStyles);}
_this.image.$container.parentNode.removeChild(_this.image.$container);if(_this.options.onDestroy){_this.options.onDestroy.call(_this);}
delete _this.$item.jarallax;for(var n in _this){delete _this[n];}};Jarallax.prototype.getImageSize=function(src,callback){if(!src||!callback){return;}
var tempImg=new Image();tempImg.onload=function(){callback(tempImg.width,tempImg.height);};tempImg.src=src;};Jarallax.prototype.clipContainer=function(){if(isIElt10){return;}
var _this=this,rect=_this.image.$container.getBoundingClientRect(),width=rect.width,height=rect.height;if(!_this.$clipStyles){_this.$clipStyles=document.createElement('style');_this.$clipStyles.setAttribute('type','text/css');_this.$clipStyles.setAttribute('id','#jarallax-clip-'+_this.instanceID);var head=document.head||document.getElementsByTagName('head')[0];head.appendChild(_this.$clipStyles);}
var styles=['#jarallax-container-'+_this.instanceID+' {','   clip: rect(0 '+width+'px '+height+'px 0);','   clip: rect(0, '+width+'px, '+height+'px, 0);','}'].join('\n');if(_this.$clipStyles.styleSheet){_this.$clipStyles.styleSheet.cssText=styles;}else{_this.$clipStyles.innerHTML=styles;}};Jarallax.prototype.coverImage=function(){var _this=this;if(!_this.image.width||!_this.image.height){return;}
var rect=_this.image.$container.getBoundingClientRect(),contW=rect.width,contH=rect.height,contL=rect.left,imgW=_this.image.width,imgH=_this.image.height,speed=_this.options.speed,isScroll=_this.options.type==='scroll'||_this.options.type==='scroll-opacity',scrollDist=0,resultW=0,resultH=contH,resultML=0,resultMT=0;if(isScroll){if(speed<0){scrollDist=speed*Math.max(contH,wndH);}else{scrollDist=speed*(contH+wndH);}
if(speed>1){resultH=Math.abs(scrollDist-wndH);}else if(speed<0){resultH=scrollDist/speed+Math.abs(scrollDist);}else{resultH+=Math.abs(wndH-contH)*(1-speed);}
scrollDist/=2;}
resultW=resultH*imgW/imgH;if(resultW<contW){resultW=contW;resultH=resultW*imgH/imgW;}
_this.bgPosVerticalCenter=0;if(isScroll&&resultH<wndH&&(!supportTransform||!_this.options.enableTransform)){_this.bgPosVerticalCenter=(wndH-resultH)/2;resultH=wndH;}
if(isScroll){resultML=contL+(contW-resultW)/2;resultMT=(wndH-resultH)/2;}else{resultML=(contW-resultW)/2;resultMT=(contH-resultH)/2;}
if(supportTransform&&_this.options.enableTransform&&_this.parentWithTransform){resultML-=contL;}
_this.parallaxScrollDistance=scrollDist;_this.css(_this.image.$item,{width:resultW+'px',height:resultH+'px',marginLeft:resultML+'px',marginTop:resultMT+'px'});if(_this.options.onCoverImage){_this.options.onCoverImage.call(_this);}};Jarallax.prototype.isVisible=function(){return this.isElementInViewport||false;};Jarallax.prototype.onScroll=function(force){var _this=this;if(!_this.image.width||!_this.image.height){return;}
var rect=_this.$item.getBoundingClientRect(),contT=rect.top,contH=rect.height,styles={position:'absolute',visibility:'visible',backgroundPosition:'50% 50%'};var viewportRect=rect;if(_this.options.elementInViewport){viewportRect=_this.options.elementInViewport.getBoundingClientRect();}
_this.isElementInViewport=viewportRect.bottom>=0&&viewportRect.right>=0&&viewportRect.top<=wndH&&viewportRect.left<=wndW;if(force?false:!_this.isElementInViewport){return;}
var beforeTop=Math.max(0,contT),beforeTopEnd=Math.max(0,contH+contT),afterTop=Math.max(0,-contT),beforeBottom=Math.max(0,contT+contH-wndH),beforeBottomEnd=Math.max(0,contH-(contT+contH-wndH)),afterBottom=Math.max(0,-contT+wndH-contH),fromViewportCenter=1-2*(wndH-contT)/(wndH+contH);var visiblePercent=1;if(contH<wndH){visiblePercent=1-(afterTop||beforeBottom)/contH;}else{if(beforeTopEnd<=wndH){visiblePercent=beforeTopEnd/wndH;}else if(beforeBottomEnd<=wndH){visiblePercent=beforeBottomEnd/wndH;}}
if(_this.options.type==='opacity'||_this.options.type==='scale-opacity'||_this.options.type==='scroll-opacity'){styles.transform='translate3d(0, 0, 0)';styles.opacity=visiblePercent;}
if(_this.options.type==='scale'||_this.options.type==='scale-opacity'){var scale=1;if(_this.options.speed<0){scale-=_this.options.speed*visiblePercent;}else{scale+=_this.options.speed*(1-visiblePercent);}
styles.transform='scale('+scale+') translate3d(0, 0, 0)';}
if(_this.options.type==='scroll'||_this.options.type==='scroll-opacity'){var positionY=_this.parallaxScrollDistance*fromViewportCenter;if(supportTransform&&_this.options.enableTransform){if(_this.parentWithTransform){positionY-=contT;}
styles.transform='translate3d(0, '+positionY+'px, 0)';}else if(_this.image.useImgTag){styles.top=positionY+'px';}else{if(_this.bgPosVerticalCenter){positionY+=_this.bgPosVerticalCenter;}
styles.backgroundPosition='50% '+positionY+'px';}
styles.position=isIElt10?'absolute':'fixed';}
_this.css(_this.image.$item,styles);if(_this.options.onScroll){_this.options.onScroll.call(_this,{section:rect,beforeTop:beforeTop,beforeTopEnd:beforeTopEnd,afterTop:afterTop,beforeBottom:beforeBottom,beforeBottomEnd:beforeBottomEnd,afterBottom:afterBottom,visiblePercent:visiblePercent,fromViewportCenter:fromViewportCenter});}};function addEventListener(el,eventName,handler){if(el.addEventListener){el.addEventListener(eventName,handler);}else{el.attachEvent('on'+eventName,function(){handler.call(el);});}}
function update(e){window.requestAnimationFrame(function(){if(e.type!=='scroll'){updateWndVars();}
for(var k=0,len=jarallaxList.length;k<len;k++){if(e.type!=='scroll'){jarallaxList[k].coverImage();jarallaxList[k].clipContainer();}
jarallaxList[k].onScroll();}});}
addEventListener(window,'scroll',update);addEventListener(window,'resize',update);addEventListener(window,'orientationchange',update);addEventListener(window,'load',update);var plugin=function(items){if(typeof HTMLElement==="object"?items instanceof HTMLElement:items&&typeof items==="object"&&items!==null&&items.nodeType===1&&typeof items.nodeName==="string"){items=[items];}
var options=arguments[1],args=Array.prototype.slice.call(arguments,2),len=items.length,k=0,ret;for(k;k<len;k++){if(typeof options==='object'||typeof options==='undefined'){if(!items[k].jarallax){items[k].jarallax=new Jarallax(items[k],options);}}
else if(items[k].jarallax){ret=items[k].jarallax[options].apply(items[k].jarallax,args);}
if(typeof ret!=='undefined'){return ret;}}
return items;};plugin.constructor=Jarallax;var oldPlugin=window.jarallax;window.jarallax=plugin;window.jarallax.noConflict=function(){window.jarallax=oldPlugin;return this;};if(typeof jQuery!=='undefined'){var jQueryPlugin=function(){var args=arguments||[];Array.prototype.unshift.call(args,this);var res=plugin.apply(window,args);return typeof res!=='object'?res:this;};jQueryPlugin.constructor=Jarallax;var oldJqPlugin=jQuery.fn.jarallax;jQuery.fn.jarallax=jQueryPlugin;jQuery.fn.jarallax.noConflict=function(){jQuery.fn.jarallax=oldJqPlugin;return this;};}
addEventListener(window,'DOMContentLoaded',function(){plugin(document.querySelectorAll('[data-jarallax], [data-jarallax-video]'));});}(window));