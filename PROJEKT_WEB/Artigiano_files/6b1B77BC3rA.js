/*!CK:1220436810!*//*1453173637,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["HG8uR"]); }

__d("XBrowseLoggerController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/browse\/logger\/",{data:{type:"HackType",required:true}});},null);
__d('BrowseLogger',['AsyncRequest','Banzai','mapObject','Run','XBrowseLoggerController'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();var m='browse',n='browse_aggr',o=null,p={},q={},r=function(aa){if(aa==null)return 'undefined';var ba=aa.tagName.toLowerCase(),ca=aa.id,da=aa.className;if(ca)ba+='#'+ca;if(da)ba+='.'+da;return ba;};function s(){o=null;p={};q={};}function t(aa){return Object.assign(aa,{clientSessionID:o});}function u(aa){i.post(m,t(aa));}function v(aa){var ba=l.getURIBuilder().setHackType('data',t(aa)).getURI();new h().setURI(ba).send();}function w(){if(o===null)return;q.aggregated=p;i.post(n,t(q));s();}function x(aa){p[aa]=(p[aa]||0)+1;}function y(aa){Object.assign(q,aa);}k.onUnload(w);var z={newSession:function(){w();o=Math.random().toString();if(!q.start_time)q.start_time=Math.round(Date.now()/1000);},logResultClick:function(aa,ba,ca,da,ea){var fa=arguments.length<=5||arguments[5]===undefined?null:arguments[5],ga={action:'result_click',click_type:aa.ct||'result',section:aa.section||'unknown',id:aa.id||0,path:aa.path||'unknown',rank:aa.rank||0,referrer:aa.referrer||'unknown',result_type:aa.result_type||'unknown',session_id:aa.session_id||0,query_time:aa.query_time||null,abtest_version:aa.abtest_version||'NONE',abtest_params:aa.abtest_params||null,typeahead_sid:aa.typeahead_sid||'',result_title:aa.result_title||'unknown',result_href:aa.result_href||'unknown',result_semantic:aa.result_semantic||'unknown',type:aa.experience_type||'unknown',click_action:ca||null,sub_id:aa.sub_id||null,owner_id:aa.owner_id||null,browse_location:aa.browse_location||'unknown',query_data:aa.query_data||'unknown',is_headline:aa.is_headline||false,qid:ba.qid||0,mf_story_key:ba.mf_story_key||0,module:aa.module||'NONE',view:aa.view||null,clicked_href:ea||null,bt_key:fa};if(ba.tn)ga.tn=ba.tn;if(aa.cst)ga.click_subtype=aa.cst;x('result_click_'+ga.click_type);y({path:ga.path,referrer:ga.referrer,result_type:ga.result_type,session_id:ga.session_id,abtest_version:ga.abtest_version,abtest_params:ga.abtest_params,typeahead_sid:ga.typeahead_sid});if(fa){v(ga);}else u(ga);if(!aa.id&&aa.browse_location!=='browse_location:mf_trending'&&!fa)u({action:'logging_error',click_action:ca,click_type:ga.click_type,attributes:JSON.stringify(aa),element:j({srcElement:da.srcElement,target:da.target,toElement:da.toElement},r),event:{button:da.button,clientX:da.clientX,clientY:da.clientY,ctrlKey:da.ctrlKey,layerX:da.layerX,layerY:da.layerY,offsetX:da.offsetX,offsetY:da.offsetY,pageX:da.pageX,pageY:da.pageY,screenX:da.screenX,screenY:da.screenY,shiftKey:da.shiftKey,type:da.type,x:da.x,y:da.y}});},logControlsClick:function(aa,ba){var ca={action:'controls_click',click_type:ba,path:aa.path||'unknown',referrer:aa.referrer||'unknown',session_id:aa.session_id||0,query_time:aa.query_time,filter_name:aa.name||'unknown',typeahead_sid:aa.typeahead_sid||'',result_type:aa.result_type||'unknown',type:aa.experience_type||'unknown'};if(aa.cst)ca.click_subtype=aa.cst;x('controls_click_'+ba);y({path:ca.path,referrer:ca.referrer,session_id:ca.session_id,typeahead_sid:ca.typeahead_sid});u(ca);},logResultHover:function(aa,ba){var ca=arguments.length<=2||arguments[2]===undefined?null:arguments[2],da={action:'result_hover',id:aa.id||0,path:aa.path||'unknown',rank:aa.rank||null,result_type:aa.result_type||'unknown',session_id:aa.session_id||0,query_time:aa.query_time||null,time_elapsed:ba||null,typeahead_sid:aa.typeahead_sid||0,type:aa.experience_type||'unknown',module:aa.module||'NONE',view:aa.view||null,bt_key:ca};x('result_hover');y({path:da.path,session_id:da.session_id,typeahead_sid:da.typeahead_sid});if(ca){v(da);}else u(da);},logScroll:function(aa,ba,ca,da){var ea={action:'scroll',encoded_query:aa,fragments:ba,position:ca,session_id:da||0};u(ea);},logNUXStep:function(aa){var ba={action:'nux_step',step:aa};u(ba);},logDisambiguationImpression:function(aa,ba,ca,da,ea){var fa={action:'disambiguation_imp',ids:da,name:aa,path:ca,type:ba,typeahead_sid:ea};u(fa);},logDisambiguationClick:function(aa,ba,ca,da,ea,fa){var ga={action:'disambiguation_clk',id:ea,index:da,name:aa,path:ca,type:ba,typeahead_sid:fa};u(ga);},logDYMLinkClick:function(aa,ba,ca,da){var ea={action:'dym_click',path:aa.path||'unknown',referrer:aa.referrer||'unknown',session_id:aa.session_id||0,query_time:aa.query_time,abtest_version:aa.abtest_version||'NONE',abtest_params:aa.abtest_params,typeahead_sid:aa.typeahead_sid||'',type:aa.experience_type||'unknown',click_action:ca,sub_id:aa.sub_id,owner_id:aa.owner_id,browse_location:aa.browse_location||'unknown',query_data:aa.query_data||'unknown',module:aa.module||'NONE',view:aa.view,dym_confidence:aa.dym_confidence||'NONE',dym_query:aa.dym_query||'',dym_correction:aa.dym_correction||'',dym_clicked:aa.dym_clicked||''};u(ea);}};f.exports=z;},null);
__d('BrowseClickLogger',['Event','BrowseLogger','BrowseClientEventLogger','collectDataAttributes','DOMQuery'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();function m(o,p){var q=o.target,r=k(q,['bt','ft','gt'],['data-bt-key']);if(r.bt&&r.bt.path)r.bt.path+=document.location.search;r.gt.click_type=r.ft.tn;j.logClick(r.gt);if(l.scry(q,'^.recourse-link').length>0){if(p==='left_click')i.logDYMLinkClick(r.bt,r.ft,p,o);}else i.logResultClick(r.bt,r.ft,p,o,q.href,r.normal['data-bt-key']);}var n={init:function(o){h.listen(o,'mousedown',(function(p){var q=p.button===2||p.which===3?'right_click':'left_click';if(p.shiftKey)q+='_shift';if(p.altKey)q+='_alt';if(p.metaKey||p.ctrlKey)q+='_ctrl';m(p,q);}).bind(this));},logClick:m};f.exports=n;},null);
__d('BrowseTopFiltersFullWidth',['Arbiter','CSS','NavigationMessage','SubscriptionsHandler','cx'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();var m,n=/(facebook\.com\/(search|hashtag|topic)\/)/,o={init:function(){i.addClass(document.body,"_4dik");m=new k();m.addSubscriptions(h.subscribe(j.NAVIGATION_FIRST_RESPONSE,this.cleanup));h.inform('browse_top_filters_full_width_displayed');},cleanup:function(){m&&m.release();if(!window.location.href.match(n))i.removeClass(document.body,"_4dik");}};f.exports=o;},null);
__d('BrowseWindowTransitions',['Arbiter','Banzai','BrowseClientEventLogger','Event','NavigationMessage','Run','SubscriptionsHandler'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n){if(c.__markCompiled)c.__markCompiled();var o={init:function(p,q){this.subscriptions=new n();this.currentSessionID=p;this.currentVertical=q;this.logData('window_load');m.onLeave((function(){this.logData('window_transition_to_fb_page');this.cleanup();}).bind(this));if(!this.unLoadAttached){this.unLoadAttached=true;m.onUnload((function(){this.logData('window_unloaded');}).bind(this));}this.subscriptions.addSubscriptions(k.listen(window,'focus',(function(){this.logData('window_focus');}).bind(this)),k.listen(window,'blur',(function(){this.logData('window_blur');}).bind(this)),h.subscribe('pre_page_transition',(function(event,r){this.logData('window_pre_page_transition');}).bind(this)),h.subscribe(l.NAVIGATION_BEGIN,(function(event,r){this.logData('window_transition_to_LHC');this.cleanup();}).bind(this)),h.subscribe('BlueBar/homeClick',(function(){this.logData('window_transition_to_home_click');this.cleanup();}).bind(this)));},logData:function(event){j.logData(event,this.currentSessionID,this.currentVertical);},cleanup:function(){this.subscriptions.release();}};f.exports=o;},null);
__d('NodeHighlighter',['DOM','TokenizeUtil','concatMap','escapeRegex','getElementText','isTextNode'],function a(b,c,d,e,f,g,h,i,j,k,l,m){if(c.__markCompiled)c.__markCompiled();var n={};function o(r,s){var t=l(r).split(s),u=t.map(function(v){if(s.test(v))return p(v);return v||'';});return t.length>1?u:null;}function p(r){var s=h.create('span',{'class':'highlightNode',className:'highlightNode'},r);return s;}var q={getTextNodes:function(r){if(this.isLeafNode(r)||this.isStopNode(r)){return r;}else if(this.isDiscardNode(r))return [];return j(this.getTextNodes.bind(this),Array.from(r.childNodes));},getHighlightCandidates:function(){return [];},isLeafNode:function(r){return m(r);},isStopNode:function(r){return false;},isDiscardNode:function(r){return false;},createSegmentedRegex:function(r){var s=i.getPunctuation();r=this.escapeAndAddBidirectionalCharsToTokens(r);r=r.map(function(t){t=t.split(/\s+/).join('(?:'+s+'|\\s)+');return t;});return '(^|\\s|'+s+')('+r.join('|')+')(?=(?:$|\\s|'+s+'))';},createNonSegmentedRegex:function(r){return '('+r.map(k).join('|')+')';},escapeAndAddBidirectionalCharsToTokens:function(r){var s='[\\u200E\\u200F\\u202A\\u202B\\u202C\\u202D\\u202E]*';return r.map(function(t){return s+String(t).split('').map(k).join(s)+s;});},createRegex:function(r){r=r.filter(function(y){return y;});if(!r||r.length===0)return new RegExp(null);var s=r.join('|');if(n[s])return n[s];var t=/[\u0E00-\u109F\u2000-\uFFFF]/,u=[],v=[];r.forEach(function(y){if(t.test(y)){v.push(y);}else u.push(y);});var w='';if(u.length){w+=this.createSegmentedRegex(u);w+=v.length?'|':'';}if(v.length)w+=this.createNonSegmentedRegex(v);var x=new RegExp(w,'i');n[s]=x;return x;},searchNodes:function(r,s){return h.scry(r,s);},highlight:function(r,s){s=s.filter(function(v){return v;});if(!s||s.length===0||!r)return;var t=j((function(v){return j(this.getTextNodes.bind(this),this.searchNodes(r,v));}).bind(this),this.getHighlightCandidates()),u=this.createRegex(s);t.forEach((function(v){var w=o(v,u);if(w)if(this.isStopNode(v)){h.setContent(v,w);}else h.replace(v,w);}).bind(this));}};f.exports=q;},null);