/*
 * boot启动文件
 * @author zhengxin@baidu.com
 */
/**
 * @namespace baidu
 */
var baidu = baidu || {};

/**
 * @namespace baidu.phoenix
 */
baidu.phoenix = baidu.phoenix || {};

(function(){

    var phn = baidu.phoenix;
    var protocol = document.location.protocol+"//";
    /**
     * 服务器文件相关配置
     */
    phn._SERVER_CONFIG = {
        'all_js': protocol + 'passport.baidu.com/static/phoenix/scripts/jssdk/all.js?v=02281642',
        'server_status': protocol + 'passport.baidu.com/phoenix/account/osavailable?callback=baidu.phoenix._setIconsStatus',
        'login': 'https://passport.baidu.com/phoenix/account/startlogin?'
    };
    
    /**
     * 请求script脚本
     */
    phn._addScript = function(src , cb){
        var scrElements = document.getElementsByTagName('script');
        if( scrElements.length ){
            var scr = document.createElement('script');
            scr.async = true;
            scr.src = src;
            scr.setAttribute('charset' , 'utf-8');
            
            if(cb){//call by browser
                var scriptLoaded = false;
                scr.onload = scr.onreadystatechange = function(){
                    if( scriptLoaded ){
                        return;
                    }
                    var readyState = scr.readyState;
                    if( typeof readyState == 'undefined' || readyState == 'ready' || readyState == 'complete' || readyState == 'loaded' ){
                        scriptLoaded = true;
                        try{
                            cb();
                        }finally{
                            scr.onload = scr.onreadystatechange = null;
                        }
                    }
                };
            }
            var parent = scrElements[0].parentNode;
            for(var i=0,len=scrElements.length; i<len; i++){
              if(scrElements[i].parentNode){
                parent = scrElements[i].parentNode;
                break;
              }
            }
            parent && parent.appendChild(scr);
        }
    };
    

    
    phn._FilesGetter = function(){
        var is_server_ready = false , is_all_js_ready = false;
        var callback = null;
        
        function fireCallback(){
            if( is_all_js_ready && is_server_ready ){
                callback && callback();
            }
        }
        
        function getAllJS(){
            phn._addScript(phn._SERVER_CONFIG['all_js'] , function(){
                is_all_js_ready = true;
                fireCallback();
            });
        }
        
        function getServerStatus(){
            phn._addScript(phn._SERVER_CONFIG['server_status'] , function(){
                is_server_ready = true;
                fireCallback();
            });
        }
        
        return {
            init: function(cb){
                callback = cb||function(){};
                getAllJS();
                getServerStatus();
            }
        };
    }();
    
    
    /**
     * server_status回调函数
     */
     
    phn._setIconsStatus = function(data){
        phn._icons_status = data;
    };
    
    /**
     * 选择需要btn
     * @name baidu.phoenix.require
     * @type function
     * @param {String|Array} icons
     * @param {Object} config
     */
    phn.require = function( icons , config ){
        phn._public_config = config || {};
        phn._icons = typeof icons == 'string' ? [icons] : icons;
        phn._FilesGetter.init( function(){
            try{
                baidu.phoenix.acc.init();
            }catch(e){
                window['console'] && console.log && console.log('Error in add script.');
            }
        } );
    };

})();