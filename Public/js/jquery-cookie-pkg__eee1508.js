define("component:components/jquery-cookie/jquery.cookie.js",function(e){function n(e){return u.raw?e:encodeURIComponent(e)}function o(e){return u.raw?e:decodeURIComponent(e)}function i(e){return n(u.json?JSON.stringify(e):String(e))}function t(e){0===e.indexOf('"')&&(e=e.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return e=decodeURIComponent(e.replace(s," ")),u.json?JSON.parse(e):e}catch(n){}}function r(e,n){var o=u.raw?e:t(e);return c.isFunction(n)?n(o):o}var c=e("component:components/jquery/jquery.js"),s=/\+/g,u=c.cookie=function(e,t,s){if(arguments.length>1&&!c.isFunction(t)){if(s=c.extend({},u.defaults,s),"number"==typeof s.expires){var a=s.expires,p=s.expires=new Date;p.setMilliseconds(p.getMilliseconds()+864e5*a)}return document.cookie=[n(e),"=",i(t),s.expires?"; expires="+s.expires.toUTCString():"",s.path?"; path="+s.path:"",s.domain?"; domain="+s.domain:"",s.secure?"; secure":""].join("")}for(var d=e?void 0:{},f=document.cookie?document.cookie.split("; "):[],m=0,l=f.length;l>m;m++){var g=f[m].split("="),j=o(g.shift()),k=g.join("=");if(e===j){d=r(k,t);break}e||void 0===(k=r(k))||(d[j]=k)}return d};u.defaults={},c.removeCookie=function(e,n){return c.cookie(e,"",c.extend({},n,{expires:-1})),!c.cookie(e)}});
//# sourceMappingURL=//bstatic.nuomi.com/bnuomi/tuanb/static/components/jquery-cookie/jquery.cookie__90a5aac.map