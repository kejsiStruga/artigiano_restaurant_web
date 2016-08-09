/*!CK:1814563513!*//*1453196108,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["2lLef"]); }

__d('PageWebsiteLogger',['Banzai','Event'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j={init:function(k,l,m,n){i.listen(k,'click',(function(o){this.log({user_id:l,page_id:m,website_url:n});}).bind(this));},log:function(k){h.post('page_website_logger',k);}};f.exports=j;},null);
__d('PagesBanzaiEventListener',['Event','PagesEventObserver','Run'],function a(b,c,d,e,f,g,h,i,j){if(c.__markCompiled)c.__markCompiled();var k={registerLogEvent:function(l,m,n){var o=h.listen(l,'click',function(event){i.logData_DEPRECATED(m,n);});j.onLeave(function(){o.remove();});}};f.exports=k;},null);
__d('PagesPostsByOthersUnit',['DOM'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i;function j(k,l){'use strict';this.$PagesPostsByOthersUnit1=k;this.$PagesPostsByOthersUnit2=l;i=this;}j.prototype.getRoot=function(){'use strict';return this.$PagesPostsByOthersUnit1;};j.prototype.insertPost=function(k){'use strict';var l=this.getRoot();h.prependContent(l,k);if(l.children.length>this.$PagesPostsByOthersUnit2)h.remove(l.lastChild);if(this.$PagesPostsByOthersUnit3){h.remove(this.$PagesPostsByOthersUnit3);this.$PagesPostsByOthersUnit3=null;}};j.insertPostIntoCurrentInstance=function(k){'use strict';this.getInstance().insertPost(k);};j.initPlaceholderElement=function(k){'use strict';this.getInstance().$PagesPostsByOthersUnit3=k;};j.getInstance=function(){'use strict';return i;};f.exports=j;},null);
__d('PagesTimelineController',['Arbiter'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i={LOAD_SECTION:'PagesTimelineController/loadSection',SECTION_FULLY_LOADED:'PagesTimelineController/sectionFullyLoaded',ACTIVATE_SCRUBBER_ITEM:'PagesTimelineController/activateScrubberItem',FIRST_POSTS_LOADED:'PagesTimelineController/firstPostsLoaded',REMOVE_SECTION:'PagesTimelineController/removeSection',RECENT_SECTION_KEY:'recent',NAV_BAR_LOADED:'PagesTimelineController/navBarLoaded',ADJUST_ADS:'PagesTimelineController/adjustAds',BOTTOM_OFFSET:100,loadSection:function(j){h.inform(this.LOAD_SECTION,{section_key:j},h.BEHAVIOR_STATE);},sectionFullyLoaded:function(j){h.inform(this.SECTION_FULLY_LOADED,{section_index:j},h.BEHAVIOR_PERSISTENT);},activateScrubberItem:function(j){h.inform(this.ACTIVATE_SCRUBBER_ITEM,{section_key:j},h.BEHAVIOR_STATE);},firstPostsLoaded:function(j){h.inform(this.FIRST_POSTS_LOADED,{section_key:j},h.BEHAVIOR_STATE);},removeSection:function(j){h.inform(this.REMOVE_SECTION,{section_key:j},h.BEHAVIOR_STATE);},navBarLoaded:function(){h.inform(this.NAV_BAR_LOADED,{},h.BEHAVIOR_STATE);},adjustAds:function(){h.inform(this.ADJUST_ADS,{},h.BEHAVIOR_STATE);}};f.exports=i;},null);
__d('PagesScrubber',['Arbiter','CSS','Event','PagesTimelineController','Parent','PagesEventObserver','PagesEventType','cx','tidyEvent'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){if(c.__markCompiled)c.__markCompiled();function q(r,s,t,u){'use strict';this.$PagesScrubber1=r;this.$PagesScrubber2=s;this.$PagesScrubber3=t;this.$PagesScrubber4="_-fk";p(j.listen(r,'click',function(event){var v=l.byTag(event.getTarget(),'a'),w=v.getAttribute('data-key');k.loadSection(w);u.tab_key=w;m.notify(n.CLICK_TIMELINE_SCRUBBER_ITEM,u.page_id,u);}));p(h.subscribe(k.ACTIVATE_SCRUBBER_ITEM,this.activateScrubberItem.bind(this)));p(h.subscribe(k.REMOVE_SECTION,this.removeSection.bind(this)));}q.prototype.activateScrubberItem=function(r,s){'use strict';if(this.$PagesScrubber3!=s.section_key){i.removeClass(this.$PagesScrubber2[this.$PagesScrubber3],this.$PagesScrubber4);i.addClass(this.$PagesScrubber2[s.section_key],this.$PagesScrubber4);this.$PagesScrubber3=s.section_key;}};q.prototype.removeSection=function(r,s){'use strict';if(s.section_key!=k.RECENT_SECTION_KEY)i.hide(this.$PagesScrubber2[s.section_key]);};f.exports=q;},null);
__d('PagesSideAds',['Arbiter','CSS','DOM','EgoAdsObjectSet','Event','PagesTimelineController','Parent','Vector','ViewportBounds','cx','throttle','tidyEvent'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s){if(c.__markCompiled)c.__markCompiled();function t(u){'use strict';this.$PagesSideAds1=u;var v=this.adjustAds.bind(this);s(h.subscribe(m.ADJUST_ADS,v));s(h.subscribe('netego_loaded',v));s(l.listen(window,'resize',r(v)));}t.prototype.adjustAds=function(){'use strict';var u=j.scry(this.$PagesSideAds1,'div.ego_unit');if(u.length){this.$PagesSideAds2=new k();this.$PagesSideAds2.init(u);this.$PagesSideAds3=n.byClass(this.$PagesSideAds1,"_23xb");this.$PagesSideAds4=j.scry(this.$PagesSideAds1,'div.uiHeader');var v=this.getNumAdsToShow();this.showAds(v);}return false;};t.prototype.getNumAdsToShow=function(){'use strict';var u=this.getAvailableSpace(),v=0;while(u>0&&v<this.$PagesSideAds2.getCount()){var w=this.getAdHeight(v);u-=w;if(u>=0)v++;}return v;};t.prototype.getAdHeight=function(u){'use strict';var v=this.$PagesSideAds2.getUnit(u);return v.offsetHeight;};t.prototype.showAds=function(u){'use strict';this.$PagesSideAds2.forEach(function(v,w){this.renderOffScreen(v,w>=u);},this);this.renderOffScreen(this.$PagesSideAds1,u===0);};t.prototype.renderOffScreen=function(u,v){'use strict';i.conditionClass(u,"_19x_",v);u.setAttribute('aria-hidden',v?'true':'false');};t.prototype.getAvailableSpace=function(){'use strict';var u=this.$PagesSideAds4&&this.$PagesSideAds4.offsetHeight||0;return o.getViewportDimensions().y-p.getBottom()-m.BOTTOM_OFFSET-(this.$PagesSideAds3.getBoundingClientRect().top+u);};f.exports=t;},null);
__d('PagesToggleSelector',['CSS'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();function i(j,k,l,m,n){'use strict';this.$PagesToggleSelector1=false;this.$PagesToggleSelector2=null;this.$PagesToggleSelector3=j;this.$PagesToggleSelector4=k;this.$PagesToggleSelector5=l;this.$PagesToggleSelector6=m;n.subscribe('itemclick',(function(event,o){if(this.$PagesToggleSelector1){var p=this.$PagesToggleSelector3,q=this.$PagesToggleSelector5,r=this.$PagesToggleSelector4,s=this.$PagesToggleSelector6;}else{p=this.$PagesToggleSelector4;q=this.$PagesToggleSelector6;r=this.$PagesToggleSelector3;s=this.$PagesToggleSelector5;}this.$PagesToggleSelector1=!this.$PagesToggleSelector1;h.show(p);h.show(q);h.hide(s);h.hide(r);if(this.$PagesToggleSelector2)this.$PagesToggleSelector2(event,o);}).bind(this));}i.prototype.setPostClickHandler=function(j){'use strict';this.$PagesToggleSelector2=j;};f.exports=i;},null);
__d('TimelineCommentsLoader',['Event','CommentPrelude','CSS','DOM','Parent','emptyFunction'],function a(b,c,d,e,f,g,h,i,j,k,l,m){if(c.__markCompiled)c.__markCompiled();var n={init:function(){n.init=m;h.listen(document.body,'click',function(o){var p=l.byClass(o.getTarget(),'fbTimelineFeedbackCommentLoader');if(p){o.kill();i.click(p,false,'timeline_comments_loader');var q=l.byTag(p,'form'),r=k.scry(q,'li.uiUfiViewAll input');if(!r.length)r=k.scry(q,'li.fbUfiViewPrevious input');if(!r.length)r=k.scry(q,'a.UFIPagerLink');r[0].click();j.show(k.find(q,'li.uiUfiComments'));j.removeClass(p,'fbTimelineFeedbackCommentLoader');}});}};f.exports=n;},null);