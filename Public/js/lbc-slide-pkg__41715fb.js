define("component:components/lbc-slide/slide.js",function(i,t,s){var e=i("component:components/jquery/jquery.js");i("component:components/jquery-ui/ui/jquery.ui.core.js"),i("component:components/jquery-ui/ui/jquery.ui.widget.js");var n=e.widget("ui.lbcSlide",{options:{appendTo:null,width:null,height:null,hasAnimate:!0,animation:"slide",isAutoScroll:!0,scrollInterval:3e3},_create:function(){this.container=this.element.find(".carousel"),"slide"===this.options.animation?this.container.removeClass("fade").addClass("slide"):"fade"===this.options.animation&&this.container.removeClass("slide").addClass("fade"),this.options.width&&this.container.width(this.options.width),this.options.height&&this.container.height(this.options.height),this.width=this.options.width?this.options.width:this.container.width(),this.height=this.options.height?this.options.height:this.container.height(),this._isAnimating=!1,this._drawCarousel()},_destroy:function(){this.pre&&(this._off(this.pre,"click"),this.pre.remove()),this.next&&this._off(this.next,"click"),this.container&&(this.container.remove(),this.container=null)},show:function(){this.container&&this.container.show()},hide:function(){this.container&&this.container.hide()},_reload:function(){this._destroy(),this._drawCarousel()},_setOptions:function(i){this._super(i),this._reload()},_drawCarousel:function(){var i=this;this.$indicatorsWrap=this.element.find(".carousel-indicators"),this.$indicatorsWrap.css("left",(this.width-this.$indicatorsWrap.width())/2),this.$imgWrap=this.element.find(".carousel-inner"),this.pre=this.element.find(".left"),this.next=this.element.find(".right");var t=this.$imgWrap.find(".item");if(t.css({width:this.width,height:this.height}),"slide"===this.options.animation){if(this.options.hasAnimate){var s=this.$imgWrap.find(".item").eq(0),e=this.$imgWrap.find(".item").eq(this.$imgWrap.find(".item").length-1);s.clone().removeClass("active").appendTo(".carousel-inner"),e.clone().removeClass("active").prependTo(".carousel-inner"),t=this.$imgWrap.find(".item"),t.css({width:this.width,height:this.height})}this.maxLeft=this.width*t.length,this.$imgWrap.css({width:this.maxLeft,height:this.height}),this.options.hasAnimate?i.$imgWrap.css("left","-"+this.width+"px"):i.$imgWrap.css("left",0)}else"slide"===this.options.animation;this.$imgWrap.find(".carousel-caption").css("width",this.width),this._bindEvent(),this.options.isAutoScroll&&this._autoScroll()},_bindEvent:function(){var i=this;if(this._on(this.pre,{click:function(t){i._isAnimating||i._slide(t)}}),this._on(this.next,{click:function(t){i._isAnimating||i._slide(t)}}),this.$indicatorsWrap.length){var t=this.$indicatorsWrap.find("li");t.length&&t.each(function(t,s){i._on(e(s),{click:function(t){i._slide(t)}})})}this._on(this.container,{mouseenter:function(){i._stopScroll()},mouseleave:function(){i._autoScroll()}})},_autoScroll:function(){if(this.options.isAutoScroll&&!this._interval){var i=this;this._interval=setInterval(function(){i.next.trigger("click")},this.options.scrollInterval)}},_stopScroll:function(){this._interval&&(clearInterval(this._interval),delete this._interval)},_slide:function(i){function t(){var i=Math.abs(parseInt(a.$imgWrap.css("left")));if(s==r-1&&0==n&&(l=a.width*(r+1)),0==s&&n==r-1&&(l=0),i!=l){var e=1;e=Math.abs(i-l)>10?Math.ceil(Math.abs(i-l)/10):1,i=l>i?i+e:i-e,a.$imgWrap.css("left","-"+i+"px"),a._timer=setTimeout(t,20)}else a._isAnimating=!1,a._autoScroll(),s==r-1&&0==n&&a.$imgWrap.css("left","-"+a.width+"px"),0==s&&n==r-1&&a.$imgWrap.css("left","-"+a.width*r+"px")}var s,n,a=this,h=e(i.currentTarget);if(this.$indicatorsWrap.length)var o=this.$indicatorsWrap.find("li"),r=o.length;if(h.hasClass("left"))s=1*this.$indicatorsWrap.find(".active").data("slide-to"),o&&o.length&&(o.eq(s).removeClass("active"),n=s-1==-1?r-1:s-1,o.eq(n).addClass("active"));else if(h.hasClass("right"))s=1*this.$indicatorsWrap.find(".active").data("slide-to"),o&&o.length&&(o.eq(s).removeClass("active"),n=s+1==r?0:s+1,o.eq(n).addClass("active"));else{if(n=1*h.data("slide-to"),s=1*this.$indicatorsWrap.find(".active").data("slide-to"),h.hasClass("active"))return;this.$indicatorsWrap.find("li").removeClass("active"),this.$indicatorsWrap.find("li").eq(n).addClass("active")}if("slide"===this.options.animation)if(this.options.hasAnimate){var l=this.width*(n+1);this._stopScroll(),this.$imgWrap.find(".item").removeClass("active"),this.$imgWrap.find(".item").eq(n+1).addClass("active"),this._timer&&clearTimeout(this._timer),a._isAnimating=!0,t()}else this.$imgWrap.find(".item").removeClass("active"),this.$imgWrap.find(".item").eq(n).addClass("active"),this.$imgWrap.css("left","-"+this.width*n+"px");else if("fade"===this.options.animation){var a=this;this.options.hasAnimate?(this.$imgWrap.find(".item").eq(n).addClass("prepared"),this.$imgWrap.find(".active").fadeOut(function(){a.$imgWrap.find(".active").removeClass("active").fadeIn(),a.$imgWrap.find(".item").eq(n).removeClass("prepared").addClass("active")})):(this.$imgWrap.find(".item").removeClass("active"),this.$imgWrap.find(".item").eq(n).addClass("active"))}}});s.exports=n});
//# sourceMappingURL=//bstatic.nuomi.com/bnuomi/tuanb/static/components/lbc-slide/slide__80f74d7.map