define("component:components/underscore/underscore.js",function(n,t,r){(function(){var n=this,t=n._,e=Array.prototype,u=Object.prototype,i=Function.prototype,a=e.push,o=e.slice,l=e.concat,c=u.toString,f=u.hasOwnProperty,s=Array.isArray,p=Object.keys,h=i.bind,g=function(n){return n instanceof g?n:this instanceof g?void(this._wrapped=n):new g(n)};n._=g,window._=g,g.VERSION="1.7.0";var v=function(n,t,r){if(void 0===t)return n;switch(null==r?3:r){case 1:return function(r){return n.call(t,r)};case 2:return function(r,e){return n.call(t,r,e)};case 3:return function(r,e,u){return n.call(t,r,e,u)};case 4:return function(r,e,u,i){return n.call(t,r,e,u,i)}}return function(){return n.apply(t,arguments)}};g.iteratee=function(n,t,r){return null==n?g.identity:g.isFunction(n)?v(n,t,r):g.isObject(n)?g.matches(n):g.property(n)},g.each=g.forEach=function(n,t,r){if(null==n)return n;t=v(t,r);var e,u=n.length;if(u===+u)for(e=0;u>e;e++)t(n[e],e,n);else{var i=g.keys(n);for(e=0,u=i.length;u>e;e++)t(n[i[e]],i[e],n)}return n},g.map=g.collect=function(n,t,r){if(null==n)return[];t=g.iteratee(t,r);for(var e,u=n.length!==+n.length&&g.keys(n),i=(u||n).length,a=Array(i),o=0;i>o;o++)e=u?u[o]:o,a[o]=t(n[e],e,n);return a};var m="Reduce of empty array with no initial value";g.reduce=g.foldl=g.inject=function(n,t,r,e){null==n&&(n=[]),t=v(t,e,4);var u,i=n.length!==+n.length&&g.keys(n),a=(i||n).length,o=0;if(arguments.length<3){if(!a)throw new TypeError(m);r=n[i?i[o++]:o++]}for(;a>o;o++)u=i?i[o]:o,r=t(r,n[u],u,n);return r},g.reduceRight=g.foldr=function(n,t,r,e){null==n&&(n=[]),t=v(t,e,4);var u,i=n.length!==+n.length&&g.keys(n),a=(i||n).length;if(arguments.length<3){if(!a)throw new TypeError(m);r=n[i?i[--a]:--a]}for(;a--;)u=i?i[a]:a,r=t(r,n[u],u,n);return r},g.find=g.detect=function(n,t,r){var e;return t=g.iteratee(t,r),g.some(n,function(n,r,u){return t(n,r,u)?(e=n,!0):void 0}),e},g.filter=g.select=function(n,t,r){var e=[];return null==n?e:(t=g.iteratee(t,r),g.each(n,function(n,r,u){t(n,r,u)&&e.push(n)}),e)},g.reject=function(n,t,r){return g.filter(n,g.negate(g.iteratee(t)),r)},g.every=g.all=function(n,t,r){if(null==n)return!0;t=g.iteratee(t,r);var e,u,i=n.length!==+n.length&&g.keys(n),a=(i||n).length;for(e=0;a>e;e++)if(u=i?i[e]:e,!t(n[u],u,n))return!1;return!0},g.some=g.any=function(n,t,r){if(null==n)return!1;t=g.iteratee(t,r);var e,u,i=n.length!==+n.length&&g.keys(n),a=(i||n).length;for(e=0;a>e;e++)if(u=i?i[e]:e,t(n[u],u,n))return!0;return!1},g.contains=g.include=function(n,t){return null==n?!1:(n.length!==+n.length&&(n=g.values(n)),g.indexOf(n,t)>=0)},g.invoke=function(n,t){var r=o.call(arguments,2),e=g.isFunction(t);return g.map(n,function(n){return(e?t:n[t]).apply(n,r)})},g.pluck=function(n,t){return g.map(n,g.property(t))},g.where=function(n,t){return g.filter(n,g.matches(t))},g.findWhere=function(n,t){return g.find(n,g.matches(t))},g.max=function(n,t,r){var e,u,i=-1/0,a=-1/0;if(null==t&&null!=n){n=n.length===+n.length?n:g.values(n);for(var o=0,l=n.length;l>o;o++)e=n[o],e>i&&(i=e)}else t=g.iteratee(t,r),g.each(n,function(n,r,e){u=t(n,r,e),(u>a||u===-1/0&&i===-1/0)&&(i=n,a=u)});return i},g.min=function(n,t,r){var e,u,i=1/0,a=1/0;if(null==t&&null!=n){n=n.length===+n.length?n:g.values(n);for(var o=0,l=n.length;l>o;o++)e=n[o],i>e&&(i=e)}else t=g.iteratee(t,r),g.each(n,function(n,r,e){u=t(n,r,e),(a>u||1/0===u&&1/0===i)&&(i=n,a=u)});return i},g.shuffle=function(n){for(var t,r=n&&n.length===+n.length?n:g.values(n),e=r.length,u=Array(e),i=0;e>i;i++)t=g.random(0,i),t!==i&&(u[i]=u[t]),u[t]=r[i];return u},g.sample=function(n,t,r){return null==t||r?(n.length!==+n.length&&(n=g.values(n)),n[g.random(n.length-1)]):g.shuffle(n).slice(0,Math.max(0,t))},g.sortBy=function(n,t,r){return t=g.iteratee(t,r),g.pluck(g.map(n,function(n,r,e){return{value:n,index:r,criteria:t(n,r,e)}}).sort(function(n,t){var r=n.criteria,e=t.criteria;if(r!==e){if(r>e||void 0===r)return 1;if(e>r||void 0===e)return-1}return n.index-t.index}),"value")};var y=function(n){return function(t,r,e){var u={};return r=g.iteratee(r,e),g.each(t,function(e,i){var a=r(e,i,t);n(u,e,a)}),u}};g.groupBy=y(function(n,t,r){g.has(n,r)?n[r].push(t):n[r]=[t]}),g.indexBy=y(function(n,t,r){n[r]=t}),g.countBy=y(function(n,t,r){g.has(n,r)?n[r]++:n[r]=1}),g.sortedIndex=function(n,t,r,e){r=g.iteratee(r,e,1);for(var u=r(t),i=0,a=n.length;a>i;){var o=i+a>>>1;r(n[o])<u?i=o+1:a=o}return i},g.toArray=function(n){return n?g.isArray(n)?o.call(n):n.length===+n.length?g.map(n,g.identity):g.values(n):[]},g.size=function(n){return null==n?0:n.length===+n.length?n.length:g.keys(n).length},g.partition=function(n,t,r){t=g.iteratee(t,r);var e=[],u=[];return g.each(n,function(n,r,i){(t(n,r,i)?e:u).push(n)}),[e,u]},g.first=g.head=g.take=function(n,t,r){return null==n?void 0:null==t||r?n[0]:0>t?[]:o.call(n,0,t)},g.initial=function(n,t,r){return o.call(n,0,Math.max(0,n.length-(null==t||r?1:t)))},g.last=function(n,t,r){return null==n?void 0:null==t||r?n[n.length-1]:o.call(n,Math.max(n.length-t,0))},g.rest=g.tail=g.drop=function(n,t,r){return o.call(n,null==t||r?1:t)},g.compact=function(n){return g.filter(n,g.identity)};var d=function(n,t,r,e){if(t&&g.every(n,g.isArray))return l.apply(e,n);for(var u=0,i=n.length;i>u;u++){var o=n[u];g.isArray(o)||g.isArguments(o)?t?a.apply(e,o):d(o,t,r,e):r||e.push(o)}return e};g.flatten=function(n,t){return d(n,t,!1,[])},g.without=function(n){return g.difference(n,o.call(arguments,1))},g.uniq=g.unique=function(n,t,r,e){if(null==n)return[];g.isBoolean(t)||(e=r,r=t,t=!1),null!=r&&(r=g.iteratee(r,e));for(var u=[],i=[],a=0,o=n.length;o>a;a++){var l=n[a];if(t)a&&i===l||u.push(l),i=l;else if(r){var c=r(l,a,n);g.indexOf(i,c)<0&&(i.push(c),u.push(l))}else g.indexOf(u,l)<0&&u.push(l)}return u},g.union=function(){return g.uniq(d(arguments,!0,!0,[]))},g.intersection=function(n){if(null==n)return[];for(var t=[],r=arguments.length,e=0,u=n.length;u>e;e++){var i=n[e];if(!g.contains(t,i)){for(var a=1;r>a&&g.contains(arguments[a],i);a++);a===r&&t.push(i)}}return t},g.difference=function(n){var t=d(o.call(arguments,1),!0,!0,[]);return g.filter(n,function(n){return!g.contains(t,n)})},g.zip=function(n){if(null==n)return[];for(var t=g.max(arguments,"length").length,r=Array(t),e=0;t>e;e++)r[e]=g.pluck(arguments,e);return r},g.object=function(n,t){if(null==n)return{};for(var r={},e=0,u=n.length;u>e;e++)t?r[n[e]]=t[e]:r[n[e][0]]=n[e][1];return r},g.indexOf=function(n,t,r){if(null==n)return-1;var e=0,u=n.length;if(r){if("number"!=typeof r)return e=g.sortedIndex(n,t),n[e]===t?e:-1;e=0>r?Math.max(0,u+r):r}for(;u>e;e++)if(n[e]===t)return e;return-1},g.lastIndexOf=function(n,t,r){if(null==n)return-1;var e=n.length;for("number"==typeof r&&(e=0>r?e+r+1:Math.min(e,r+1));--e>=0;)if(n[e]===t)return e;return-1},g.range=function(n,t,r){arguments.length<=1&&(t=n||0,n=0),r=r||1;for(var e=Math.max(Math.ceil((t-n)/r),0),u=Array(e),i=0;e>i;i++,n+=r)u[i]=n;return u};var b=function(){};g.bind=function(n,t){var r,e;if(h&&n.bind===h)return h.apply(n,o.call(arguments,1));if(!g.isFunction(n))throw new TypeError("Bind must be called on a function");return r=o.call(arguments,2),e=function(){if(!(this instanceof e))return n.apply(t,r.concat(o.call(arguments)));b.prototype=n.prototype;var u=new b;b.prototype=null;var i=n.apply(u,r.concat(o.call(arguments)));return g.isObject(i)?i:u}},g.partial=function(n){var t=o.call(arguments,1);return function(){for(var r=0,e=t.slice(),u=0,i=e.length;i>u;u++)e[u]===g&&(e[u]=arguments[r++]);for(;r<arguments.length;)e.push(arguments[r++]);return n.apply(this,e)}},g.bindAll=function(n){var t,r,e=arguments.length;if(1>=e)throw new Error("bindAll must be passed function names");for(t=1;e>t;t++)r=arguments[t],n[r]=g.bind(n[r],n);return n},g.memoize=function(n,t){var r=function(e){var u=r.cache,i=t?t.apply(this,arguments):e;return g.has(u,i)||(u[i]=n.apply(this,arguments)),u[i]};return r.cache={},r},g.delay=function(n,t){var r=o.call(arguments,2);return setTimeout(function(){return n.apply(null,r)},t)},g.defer=function(n){return g.delay.apply(g,[n,1].concat(o.call(arguments,1)))},g.throttle=function(n,t,r){var e,u,i,a=null,o=0;r||(r={});var l=function(){o=r.leading===!1?0:g.now(),a=null,i=n.apply(e,u),a||(e=u=null)};return function(){var c=g.now();o||r.leading!==!1||(o=c);var f=t-(c-o);return e=this,u=arguments,0>=f||f>t?(clearTimeout(a),a=null,o=c,i=n.apply(e,u),a||(e=u=null)):a||r.trailing===!1||(a=setTimeout(l,f)),i}},g.debounce=function(n,t,r){var e,u,i,a,o,l=function(){var c=g.now()-a;t>c&&c>0?e=setTimeout(l,t-c):(e=null,r||(o=n.apply(i,u),e||(i=u=null)))};return function(){i=this,u=arguments,a=g.now();var c=r&&!e;return e||(e=setTimeout(l,t)),c&&(o=n.apply(i,u),i=u=null),o}},g.wrap=function(n,t){return g.partial(t,n)},g.negate=function(n){return function(){return!n.apply(this,arguments)}},g.compose=function(){var n=arguments,t=n.length-1;return function(){for(var r=t,e=n[t].apply(this,arguments);r--;)e=n[r].call(this,e);return e}},g.after=function(n,t){return function(){return--n<1?t.apply(this,arguments):void 0}},g.before=function(n,t){var r;return function(){return--n>0?r=t.apply(this,arguments):t=null,r}},g.once=g.partial(g.before,2),g.keys=function(n){if(!g.isObject(n))return[];if(p)return p(n);var t=[];for(var r in n)g.has(n,r)&&t.push(r);return t},g.values=function(n){for(var t=g.keys(n),r=t.length,e=Array(r),u=0;r>u;u++)e[u]=n[t[u]];return e},g.pairs=function(n){for(var t=g.keys(n),r=t.length,e=Array(r),u=0;r>u;u++)e[u]=[t[u],n[t[u]]];return e},g.invert=function(n){for(var t={},r=g.keys(n),e=0,u=r.length;u>e;e++)t[n[r[e]]]=r[e];return t},g.functions=g.methods=function(n){var t=[];for(var r in n)g.isFunction(n[r])&&t.push(r);return t.sort()},g.extend=function(n){if(!g.isObject(n))return n;for(var t,r,e=1,u=arguments.length;u>e;e++){t=arguments[e];for(r in t)f.call(t,r)&&(n[r]=t[r])}return n},g.pick=function(n,t,r){var e,u={};if(null==n)return u;if(g.isFunction(t)){t=v(t,r);for(e in n){var i=n[e];t(i,e,n)&&(u[e]=i)}}else{var a=l.apply([],o.call(arguments,1));n=new Object(n);for(var c=0,f=a.length;f>c;c++)e=a[c],e in n&&(u[e]=n[e])}return u},g.omit=function(n,t,r){if(g.isFunction(t))t=g.negate(t);else{var e=g.map(l.apply([],o.call(arguments,1)),String);t=function(n,t){return!g.contains(e,t)}}return g.pick(n,t,r)},g.defaults=function(n){if(!g.isObject(n))return n;for(var t=1,r=arguments.length;r>t;t++){var e=arguments[t];for(var u in e)void 0===n[u]&&(n[u]=e[u])}return n},g.clone=function(n){return g.isObject(n)?g.isArray(n)?n.slice():g.extend({},n):n},g.tap=function(n,t){return t(n),n};var w=function(n,t,r,e){if(n===t)return 0!==n||1/n===1/t;if(null==n||null==t)return n===t;n instanceof g&&(n=n._wrapped),t instanceof g&&(t=t._wrapped);var u=c.call(n);if(u!==c.call(t))return!1;switch(u){case"[object RegExp]":case"[object String]":return""+n==""+t;case"[object Number]":return+n!==+n?+t!==+t:0===+n?1/+n===1/t:+n===+t;case"[object Date]":case"[object Boolean]":return+n===+t}if("object"!=typeof n||"object"!=typeof t)return!1;for(var i=r.length;i--;)if(r[i]===n)return e[i]===t;var a=n.constructor,o=t.constructor;if(a!==o&&"constructor"in n&&"constructor"in t&&!(g.isFunction(a)&&a instanceof a&&g.isFunction(o)&&o instanceof o))return!1;r.push(n),e.push(t);var l,f;if("[object Array]"===u){if(l=n.length,f=l===t.length)for(;l--&&(f=w(n[l],t[l],r,e)););}else{var s,p=g.keys(n);if(l=p.length,f=g.keys(t).length===l)for(;l--&&(s=p[l],f=g.has(t,s)&&w(n[s],t[s],r,e)););}return r.pop(),e.pop(),f};g.isEqual=function(n,t){return w(n,t,[],[])},g.isEmpty=function(n){if(null==n)return!0;if(g.isArray(n)||g.isString(n)||g.isArguments(n))return 0===n.length;for(var t in n)if(g.has(n,t))return!1;return!0},g.isElement=function(n){return!(!n||1!==n.nodeType)},g.isArray=s||function(n){return"[object Array]"===c.call(n)},g.isObject=function(n){var t=typeof n;return"function"===t||"object"===t&&!!n},g.each(["Arguments","Function","String","Number","Date","RegExp"],function(n){g["is"+n]=function(t){return c.call(t)==="[object "+n+"]"}}),g.isArguments(arguments)||(g.isArguments=function(n){return g.has(n,"callee")}),"function"!=typeof/./&&(g.isFunction=function(n){return"function"==typeof n||!1}),g.isFinite=function(n){return isFinite(n)&&!isNaN(parseFloat(n))},g.isNaN=function(n){return g.isNumber(n)&&n!==+n},g.isBoolean=function(n){return n===!0||n===!1||"[object Boolean]"===c.call(n)},g.isNull=function(n){return null===n},g.isUndefined=function(n){return void 0===n},g.has=function(n,t){return null!=n&&f.call(n,t)},g.noConflict=function(){return n._=t,this},g.identity=function(n){return n},g.constant=function(n){return function(){return n}},g.noop=function(){},g.property=function(n){return function(t){return t[n]}},g.matches=function(n){var t=g.pairs(n),r=t.length;return function(n){if(null==n)return!r;n=new Object(n);for(var e=0;r>e;e++){var u=t[e],i=u[0];if(u[1]!==n[i]||!(i in n))return!1}return!0}},g.times=function(n,t,r){var e=Array(Math.max(0,n));t=v(t,r,1);for(var u=0;n>u;u++)e[u]=t(u);return e},g.random=function(n,t){return null==t&&(t=n,n=0),n+Math.floor(Math.random()*(t-n+1))},g.now=Date.now||function(){return(new Date).getTime()};var _={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#x27;","`":"&#x60;"},j=g.invert(_),x=function(n){var t=function(t){return n[t]},r="(?:"+g.keys(n).join("|")+")",e=RegExp(r),u=RegExp(r,"g");return function(n){return n=null==n?"":""+n,e.test(n)?n.replace(u,t):n}};g.escape=x(_),g.unescape=x(j),g.result=function(n,t){if(null==n)return void 0;var r=n[t];return g.isFunction(r)?n[t]():r};var A=0;g.uniqueId=function(n){var t=++A+"";return n?n+t:t},g.templateSettings={evaluate:/<%([\s\S]+?)%>/g,interpolate:/<%=([\s\S]+?)%>/g,escape:/<%-([\s\S]+?)%>/g};var k=/(.)^/,O={"'":"'","\\":"\\","\r":"r","\n":"n","\u2028":"u2028","\u2029":"u2029"},F=/\\|'|\r|\n|\u2028|\u2029/g,E=function(n){return"\\"+O[n]};g.template=function(n,t,r){!t&&r&&(t=r),t=g.defaults({},t,g.templateSettings);var e=RegExp([(t.escape||k).source,(t.interpolate||k).source,(t.evaluate||k).source].join("|")+"|$","g"),u=0,i="__p+='";n.replace(e,function(t,r,e,a,o){return i+=n.slice(u,o).replace(F,E),u=o+t.length,r?i+="'+\n((__t=("+r+"))==null?'':_.escape(__t))+\n'":e?i+="'+\n((__t=("+e+"))==null?'':__t)+\n'":a&&(i+="';\n"+a+"\n__p+='"),t}),i+="';\n",t.variable||(i="with(obj||{}){\n"+i+"}\n"),i="var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n"+i+"return __p;\n";try{var a=new Function(t.variable||"obj","_",i)}catch(o){throw o.source=i,o}var l=function(n){return a.call(this,n,g)},c=t.variable||"obj";return l.source="function("+c+"){\n"+i+"}",l},g.chain=function(n){var t=g(n);return t._chain=!0,t};var S=function(n){return this._chain?g(n).chain():n};g.mixin=function(n){g.each(g.functions(n),function(t){var r=g[t]=n[t];g.prototype[t]=function(){var n=[this._wrapped];return a.apply(n,arguments),S.call(this,r.apply(g,n))}})},g.mixin(g),g.each(["pop","push","reverse","shift","sort","splice","unshift"],function(n){var t=e[n];g.prototype[n]=function(){var r=this._wrapped;return t.apply(r,arguments),"shift"!==n&&"splice"!==n||0!==r.length||delete r[0],S.call(this,r)}}),g.each(["concat","join","slice"],function(n){var t=e[n];g.prototype[n]=function(){return S.call(this,t.apply(this._wrapped,arguments))}}),g.prototype.value=function(){return this._wrapped},"function"==typeof define&&define.amd?define("underscore",[],function(){return g}):"function"==typeof define&&(r.exports=g)}).call(this),r.exports=window._});
//# sourceMappingURL=//bstatic.nuomi.com/bnuomi/tuanb/static/components/underscore/underscore__52c1d28.map