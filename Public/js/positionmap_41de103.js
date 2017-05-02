define("merchants:widget/settled/position/positionMap/positionMap.js",function(require,exports,module){function PositionMap(t,e){var n=new BMap.Point(116.331398,39.897445);this.map=new BMap.Map(t),this.marker=null,this.markerLocation=null,this.markerPoint=null,this.infoWindow=null,this.rendered=!1,this.listwrap=e,this.listwrap.html(LIST_CONTAINER_TMPL()).hide(),this.totalNum=this.listwrap.find("[data-node=total_list_num]"),this.local=null,this.initLocal(),this.centerByPoint(n),this.init()}var LIST_CONTAINER_TMPL=[function(_template_object){var _template_fun_array=[],fn=function(__data__){var _template_varName="";for(var name in __data__)_template_varName+="var "+name+'=__data__["'+name+'"];';eval(_template_varName),_template_fun_array.push('<div class="map-position-list">    <div class="list-head">共<span data-node="total_list_num"></span>条，请选择离您餐厅最近的地址</div>    <ul class="position-list" data-node="position_list" id="positionList">    </ul></div>'),_template_varName=null}(_template_object);return fn=null,_template_fun_array.join("")}][0],MARK_CONTENT_TMPL=[function(_template_object){var _template_fun_array=[],fn=function(__data__){var _template_varName="";for(var name in __data__)_template_varName+="var "+name+'=__data__["'+name+'"];';eval(_template_varName),_template_fun_array.push('<div style="width:210px;font:bold 14px/16px arial,sans-serif;margin:0;color:#cc5522;white-space:nowrap;overflow:hidden">    ',"undefined"==typeof address?"":baidu.template._encodeHTML(address),'</div><button class="poi-set-btn" id="markerSetPoi" onclick="window.onMarkSetPoi()">确认选择</button>'),_template_varName=null}(_template_object);return fn=null,_template_fun_array.join("")}][0],MARK_HINT_TMPL=[function(_template_object){var _template_fun_array=[],fn=function(__data__){var _template_varName="";for(var name in __data__)_template_varName+="var "+name+'=__data__["'+name+'"];';eval(_template_varName),_template_fun_array.push("<div style='font-size:14px;background:#ccc;color:#fff;height:26px;line-height:26px;'><span style=\"margin:0px 5px;display: inline-block;width: 10px;height: 20px;vertical-align:middle;background:url('data:image/png;base64,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')\"></span>点击地图可直接扎点</div>"),_template_varName=null}(_template_object);return fn=null,_template_fun_array.join("")}][0],CITIES_URL={province:"/wmbos/bizpc/provinceList",city:"/wmbos/bizpc/citylist"};window.onMarkSetPoi=function(){listener.trigger("position","marked")},PositionMap.prototype.init=function(){var t=new BMap.Geolocation,e=this;t.getCurrentPosition(function(t){if(this.getStatus()==BMAP_STATUS_SUCCESS&&!e.rendered){var n=new BMap.Point(t.point.lng,t.point.lat);e.centerByPoint(n)}},{enableHighAccuracy:!0});var n=new BMapLib.MarkerTool(e.map,{followText:"",autoClose:!1});n.open(),n.setIcon(BMapLib.MarkerTool.SYS_ICONS[2]),n.addEventListener("markend",function(t){e.marker&&e.map.removeOverlay(e.marker),e.marker=t.marker,e.marker.addEventListener("click",function(t){t.domEvent.cancelBubble=!0,e.infoWindow&&e.markerPoint&&e.openWindow(e.infoWindow,e.markerPoint)});var n=new BMap.Geocoder;n.getLocation(e.marker.point,function(n){var i=MARK_CONTENT_TMPL(n);e.markerLocation=n,e.markerPoint=new BMap.Point(t.marker.point.lng,t.marker.point.lat),e.infoWindow=new BMap.InfoWindow(i,{}),e.openWindow(e.infoWindow,e.markerPoint)})}),listener.on("position","marked",$.proxy(e.onMarked,e)),this.addMarkHint()},PositionMap.prototype.addMarkHint=function(){var t=new BMap.CopyrightControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT});this.map.addControl(t);var e=this.map.getBounds();t.addCopyright({id:1,content:MARK_HINT_TMPL(),bounds:e})},PositionMap.prototype.openWindow=function(t,e){this.map.openInfoWindow(t,e)},PositionMap.prototype.initLocal=function(){var t=this;this.local=new BMap.LocalSearch(t.map,{renderOptions:{map:t.map,panel:"positionList"},onResultsHtmlSet:function(t){t.style.border="none"},onInfoHtmlSet:function(e,n){var i=$(n);if(0==i.find("[data-node=poi_set_btn]").size()){var o=$("<button data-node='poi_set_btn' class='poi-set-btn'>确认选择</button>");i.append(o),o.on("click",function(){t.onSelectPoi(e)})}setTimeout(function(){t.map.setCenter(e.point)},0)},onSearchComplete:function(e){if(e){var n=t.local.getResults().getNumPois();n?(t.showList(),t.setTotalNum(t.local.getResults().getNumPois())):t.hideList()}else t.hideList()},onMarkersSet:function(t){$(t).each(function(t,e){e.marker.addEventListener("click",function(t){t.domEvent.cancelBubble=!0})})}})},PositionMap.prototype.centerByCity=function(t){this.rendered=!0,this.map.centerAndZoom(t,15)},PositionMap.prototype.centerByPoint=function(t,e){this.map.centerAndZoom(t,e||12)},PositionMap.prototype.panPoint=function(t){this.map.centerAndZoom(t)},PositionMap.prototype.search=function(t){this.local.search(t),this.local.enableFirstResultSelection()},PositionMap.prototype.setTotalNum=function(t){this.totalNum.text(t)},PositionMap.prototype.onSelectPoi=function(t){listener.trigger("position","selectpoi",{poi_name:t.title,lat:t.point.lat,lng:t.point.lng})},PositionMap.prototype.hideList=function(){this.listwrap.hide()},PositionMap.prototype.showList=function(){this.listwrap.show()},PositionMap.prototype.onMarked=function(){var t=this,e=this.markerLocation.addressComponents.province,n=this.markerLocation.addressComponents.city,i={city:n,city_id:"",is_open:"",fromMarked:!0},o={poi_name:this.markerLocation.address,lat:this.markerLocation.point.lat,lng:this.markerLocation.point.lng};t.fetchCityData("province",{},function(a){var r=a[e].id;t.fetchCityData("city",{province_id:r},function(t){var e=t[n].id,a="1"==t[n].is_open;i.city_id=e,i.is_open=a,listener.trigger("position","selectposition",i),listener.trigger("position","selectpoi",o)})})},PositionMap.prototype.rangeData=function(t,e){var n={};for(var i in t)for(var o=t[i],a=0;a<o.length;a++){var r=o[a],p=r.city_name.split("-")[1];n[p]={id:r[e+"_id"]},"city"==e&&(n[p].is_open=r.is_open)}return n},PositionMap.prototype.fetchCityData=function(t,e,n){{var i=CITIES_URL[t],o=this;$.Deferred()}$.ajax({url:i,dataType:"json",data:e,success:function(e){if(0==e.errno){var i=e.data[t+"_list"];i=o.rangeData(i,t),n&&n(i)}},error:function(){alert("网络错误！")}})},module.exports=PositionMap});