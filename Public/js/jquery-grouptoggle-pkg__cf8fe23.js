define("component:components/jquery-grouptoggle/jquery.groupToggle.js",function(e){jQuery=e("component:components/jquery/jquery.js");!function(e){function n(e){return"string"==typeof e[0]?{name:e[0],params:Array.prototype.slice.call(e,1)}:null}function t(e,n){if(e.hasOwnProperty(n.name)){var t=e[n.name];"function"==typeof t&&t.apply(e,n.params)}}function o(n,o,r){var a=e.data(n,u);return a?o&&t(a,o):(a=r.apply(n),e.data(n,u,a)),a}function r(n){var t={};return n.length>0&&("object"==typeof n[0]?n[0]instanceof jQuery?t.filter=n[0]:t=n[0]:t.filter=n[0],n.length>1&&"object"==typeof n[1]&&(t=e.extend(!0,t,n[1]))),t.groupParent||(t.groupParent=e("body")),t.groupParent instanceof jQuery||(t.groupParent=e(t.groupParent)),e.extend(!0,{},c,t)}function a(n,t){function o(){var e=g?this.checked:!i.hasClass(t.toggleOnClass);r(s,e)}function r(n,o){f=!0,"function"==typeof t.onBeforeChange&&t.onBeforeChange();for(var r=0,u=n.length;u>r;r++){var c=n[r],l=c.checked;c.checked=o,l!=o&&e(c).change()}f=!1,a(),"function"==typeof t.onChanged&&t.onChanged()}function a(){if(!f){for(var e=0,o=s.length,r=0;o>r;r++)s[r].checked&&e++;var a=e==o&&0!==e;g?n.checked=a:a?(i.addClass(t.toggleOnClass),i.removeClass(t.toggleOffClass)):(i.addClass(t.toggleOffClass),i.removeClass(t.toggleOnClass))}}function u(){r(s,!0)}function c(){r(s,!1)}function l(){s=t.groupParent.find("input:checkbox"),t.filter&&(s=s.filter(t.filter)),a()}this.elem=n,this.options=t,this.update=l,this.check=u,this.uncheck=c;var s=null,f=!1,i=e(n),g=i.is("input:checkbox");return g?i.change(o):i.click(o),t.groupParent.on("change",t.filter,a),l(),this}var u="groupToggle",c={filter:null,groupParent:null,toggleOffClass:"",toggleOnClass:"checked",onBeforeChange:null,onChanged:null};e.fn[u]=function(){var e=n(arguments),t=r(arguments);return this.each(function(){return o(this,e,function(){return new a(this,t)}),this})}}(jQuery)});
//# sourceMappingURL=//bstatic.nuomi.com/bnuomi/tuanb/static/components/jquery-grouptoggle/jquery.groupToggle__6890112.map