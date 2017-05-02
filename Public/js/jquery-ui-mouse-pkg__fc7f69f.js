define("component:components/jquery-ui-mouse/jquery.ui.mouse.js",function(e,t,s){!function(t){var o=e("component:components/jquery/jquery.js");e("component:components/jquery-ui/ui/jquery.ui.widget.js"),s.exports=t(o)}(function(e){var t=!1;e(document).mouseup(function(){t=!1}),e.widget("ui.mouse",{version:"@VERSION",options:{cancel:"input,textarea,button,select,option",distance:1,delay:0},_mouseInit:function(){var t=this;this.element.bind("mousedown."+this.widgetName,function(e){return t._mouseDown(e)}).bind("click."+this.widgetName,function(s){return!0===e.data(s.target,t.widgetName+".preventClickEvent")?(e.removeData(s.target,t.widgetName+".preventClickEvent"),s.stopImmediatePropagation(),!1):void 0}),this.started=!1},_mouseDestroy:function(){this.element.unbind("."+this.widgetName),this._mouseMoveDelegate&&e(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate)},_mouseDown:function(s){if(!t){this._mouseStarted&&this._mouseUp(s),this._mouseDownEvent=s;var o=this,i=1===s.which,n="string"==typeof this.options.cancel&&s.target.nodeName?e(s.target).closest(this.options.cancel).length:!1;return i&&!n&&this._mouseCapture(s)?(this.mouseDelayMet=!this.options.delay,this.mouseDelayMet||(this._mouseDelayTimer=setTimeout(function(){o.mouseDelayMet=!0},this.options.delay)),this._mouseDistanceMet(s)&&this._mouseDelayMet(s)&&(this._mouseStarted=this._mouseStart(s)!==!1,!this._mouseStarted)?(s.preventDefault(),!0):(!0===e.data(s.target,this.widgetName+".preventClickEvent")&&e.removeData(s.target,this.widgetName+".preventClickEvent"),this._mouseMoveDelegate=function(e){return o._mouseMove(e)},this._mouseUpDelegate=function(e){return o._mouseUp(e)},e(document).bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate),s.preventDefault(),t=!0,!0)):!0}},_mouseMove:function(t){return!e.ui.ie||document.documentMode>=9||t.button?this._mouseStarted?(this._mouseDrag(t),t.preventDefault()):(this._mouseDistanceMet(t)&&this._mouseDelayMet(t)&&(this._mouseStarted=this._mouseStart(this._mouseDownEvent,t)!==!1,this._mouseStarted?this._mouseDrag(t):this._mouseUp(t)),!this._mouseStarted):this._mouseUp(t)},_mouseUp:function(t){return e(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate),this._mouseStarted&&(this._mouseStarted=!1,t.target===this._mouseDownEvent.target&&e.data(t.target,this.widgetName+".preventClickEvent",!0),this._mouseStop(t)),!1},_mouseDistanceMet:function(e){return Math.max(Math.abs(this._mouseDownEvent.pageX-e.pageX),Math.abs(this._mouseDownEvent.pageY-e.pageY))>=this.options.distance},_mouseDelayMet:function(){return this.mouseDelayMet},_mouseStart:function(){},_mouseDrag:function(){},_mouseStop:function(){},_mouseCapture:function(){return!0}})})});
//# sourceMappingURL=//bstatic.nuomi.com/bnuomi/tuanb/static/components/jquery-ui-mouse/jquery.ui.mouse__96c80d9.map