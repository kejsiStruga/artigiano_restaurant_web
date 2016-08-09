/*!CK:325043963!*//*1452530030,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["Xv8vI"]); }

__d("ShareNowCounterEvent",[],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports={SHARE_NOW_NOT_AVAILABLE:"share_now_not_available",OPEN_SHARE_NOW:"open_share_now",OPEN_DIALOG:"open_dialog",OPEN_MESSAGE_DIALOG:"open_mesage_dialog",SHARE_CREATED:"share_created",SHARE_NOW_CREATED:"share_now_created",SHARE_ERROR:"share_error",SHARE_INVOKE_ERROR:"share_invoke_error",SHARE_INVOKED:"share_invoked",SHARE_BOOTLOADED:"share_bootloaded",SHARE_POST:"share_post",SHARE_POST_ERROR:"share_post_error",SHARE_POST_SUCCESS:"share_post_success",NO_FOOTER_REF:"no_footer_ref",NO_PRIVACY_NODE:"no_privacy_node",NO_PRIVACY_REF:"no_privacy_ref",NO_PRIVACY_VALUE:"no_privacy_value",NO_PRIVACY_VALUE_ADAMA:"no_privacy_value_adama",SHARE_POST_OWN:"share_post_own",SHARE_POST_PERSON:"share_post_person",SHARE_POST_PAGE:"share_post_page",SHARE_POST_GROUP:"share_post_group",SHARE_POST_MESSAGE:"share_post_message",SHARE_ERROR_OWN:"share_error_own",SHARE_ERROR_PERSON:"share_error_person",SHARE_ERROR_PAGE:"share_error_page",SHARE_ERROR_GROUP:"share_error_group",SHARE_ERROR_MESSAGE:"share_error_message",SHARE_CREATED_OWN:"share_created_own",SHARE_CREATED_PERSON:"share_created_person",SHARE_CREATED_PAGE:"share_created_page",SHARE_CREATED_GROUP:"share_created_group",SHARE_CREATED_MESSAGE:"share_created_message",DROPDOWN_SELECT_SHARE_POST:"dropdown_select_share_post",DROPDOWN_SELECT_SHARE_LINK:"dropdown_select_share_link",SHARE_CANCEL:"share_cancel"};},null);
__d('HideInlineHelp',['DynamicIconSelector','SelectorDeprecated'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j=[],k={registerMenu:function(l,m,n){j[l]=m.setValue.bind(m,n);},registerLegacyMenu:function(l,m,n){j[l]=function(){i.setSelected(m,n);h.swapIcon(m);};},registerAsyncPopoverMenu:function(l,m,n){j[l]=function(){var o=m.getMenu();o.setValue(n);};},triggerUndo:function(l){j[l]();}};f.exports=k;},null);
__d("XShareNowCounterController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/share\/share_now\/counter\/",{event:{type:"Enum",required:true,enumType:1},control:{type:"Bool",defaultValue:false}});},null);
__d('ShareNowCounter',['AsyncSignal','XShareNowCounterController'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j={logEvent:function(event,k){var l=i.getURIBuilder().setEnum('event',event).setBool('control',k).getURI();new h(l).send();}};f.exports=j;},null);
__d('Sharer',['CSS','Event','ShareModeConst','ShareNowCounter','ShareNowCounterEvent','URI','goURI'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n){if(c.__markCompiled)c.__markCompiled();function o(p,q){'use strict';this.$Sharer1=p;if(q)k.logEvent(l.OPEN_DIALOG,true);}o.prototype.getSharerFrame=function(){'use strict';return this.$Sharer1;};o.prototype.getComponents=function(){'use strict';return this.$Sharer1.getComponents();};o.initPrivacyWarning=function(p,q){'use strict';p.subscribe('selector-change',function(r,s){h.conditionShow(q,s===j.GROUP||s===j.MESSAGE||s===j.FRIEND||s===j.SELF_POST);});};o.close=function(p){'use strict';if(typeof p=='string'&&p){n(p);}else{var q=function(){window.close();n(new m(window.location.href).setPath('/').setQueryData({}));};history.back();setTimeout(q,100);}return false;};o.listenForCancel=function(p){'use strict';i.listen(p,'click',this.close);};o.reloadIfPostLogin=function(){'use strict';var p=new m(document.referrer);if(p.getPath()=='/login.php')window.opener.require('Plugin').reloadOtherPlugins();};f.exports=o;},null);
__d('SharerFrame',['ArbiterMixin','ComposerVersion','ComposerXMarauderLogger','ComposerXSessionIDs','DOM','Event','Parent','cx','mixin'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){if(c.__markCompiled)c.__markCompiled();var q,r;q=babelHelpers.inherits(s,p(h));r=q&&q.prototype;function s(t,u,v,w,x){'use strict';r.constructor.call(this);this.$SharerFrame1=v;this.$SharerFrame2=t;this.$SharerFrame3=this.$SharerFrame1.id;k.resetSessionID(this.$SharerFrame3);l.prependContent(this.$SharerFrame1,k.createSessionIDInput(k.getSessionID(this.$SharerFrame3)));if(w){j.registerComposer(this.$SharerFrame1,'feed','share',i.WWW_LEGACY);j.listenForPostEvents(this.$SharerFrame3,n.byClass(this.$SharerFrame1,"_59s7"));j.logEntry(this.$SharerFrame3);}this.$SharerFrame2.subscribe('change',(function(aa,ba){this.inform('selector-change',ba);if(w)j.setShareMode(this.$SharerFrame3,ba);}).bind(this));this.$SharerFrame4=u;if(x){var y=x.row,z=x.removeLink;m.listen(z,'click',function(){return l.remove(y);});}}s.focusInput=function(t){'use strict';t.focus();};s.focusSelector=function(t){'use strict';var u=l.find(t,'.selectedMode input[type="text"]');if(u)u.focus();};s.prototype.getSelector=function(){'use strict';return this.$SharerFrame2;};s.prototype.getSelectedMode=function(){'use strict';return this.$SharerFrame2.getSelectedMode();};s.prototype.getComponents=function(){'use strict';return this.$SharerFrame4.getComponents();};f.exports=s;},null);
__d("XSharePrivacyAsyncController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/share\/mode\/group\/privacy\/",{current_group_id:{type:"Int",required:true},target_group_id:{type:"Int",required:true}});},null);
__d('SharerSelector',['ArbiterMixin','AsyncRequest','CSS','Event','Input','XSharePrivacyAsyncController','mixin'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n){if(c.__markCompiled)c.__markCompiled();var o,p;o=babelHelpers.inherits(q,n(h));p=o&&o.prototype;function q(r){'use strict';p.constructor.call(this);this.$SharerSelector1=r.attachments;this.$SharerSelector2=r.icons;this.$SharerSelector3=r.modeInput;this.$SharerSelector4=r.selector;this.$SharerSelector5=r.selectorGroup;this.$SharerSelector6=r.selectedMode;if(this.$SharerSelector4)this.$SharerSelector4.subscribe('change',this.$SharerSelector7.bind(this));if(this.$SharerSelector1&&this.$SharerSelector6&&this.$SharerSelector1[this.$SharerSelector6])this.$SharerSelector1[this.$SharerSelector6].showContent();}q.prototype.updateMode=function(r){'use strict';this.$SharerSelector4.setValue(r);};q.prototype.getSelectedMode=function(){'use strict';return this.$SharerSelector6;};q.prototype.hideModeSelector=function(){'use strict';j.hide(this.$SharerSelector5);};q.prototype.showModeSelector=function(){'use strict';j.show(this.$SharerSelector5);};q.prototype.$SharerSelector7=function(r,s){'use strict';var t=s.value;this.$SharerSelector3&&l.setValue(this.$SharerSelector3,t);this.$SharerSelector1[this.$SharerSelector6].hideContent();this.$SharerSelector2&&j.hide(this.$SharerSelector2[this.$SharerSelector6]);this.$SharerSelector1[t].showContent();this.$SharerSelector2&&j.show(this.$SharerSelector2[t]);this.$SharerSelector6=t;if(this.$SharerSelector6==='group')this.$SharerSelector8(this.$SharerSelector1[this.$SharerSelector6]);this.inform('change',this.$SharerSelector6);};q.prototype.$SharerSelector8=function(r){'use strict';if(r.getTypeahead()){var s=r.getTypeahead();k.listen(s,'keyup',function(){if(r.getTargetGroupID()){var t=r.getCurrentGroupID(),u=r.getTargetGroupID();if(r.isCurrentGroupOpenPrivacy()){var v=m.getURIBuilder().setInt('current_group_id',t).setInt('target_group_id',u).getURI();new i(v).setMethod('GET').setReadOnly(true).send();}}});}};f.exports=q;},null);
__d('ShareMode',['CSS','Parent','cx','emptyFunction'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();function l(m){this._content=m;}Object.assign(l.prototype,{showContent:function(){this._content&&h.show(this._content);this.show();},hideContent:function(){this._content&&h.hide(this._content);this.hide();},_getSharerRoot:function(){var m=i.byClass(this._content,"_b-z");if(!m)m=i.byClass(this._content,"_57xr");return m;},hideMentionsInput:function(){h.addClass(this._getSharerRoot(),"_c7f");},showMentionsInput:function(){h.removeClass(this._getSharerRoot(),"_c7f");},show:k,hide:k});f.exports=l;},null);
__d('ShareModeFriendTimeline',['Focus','ShareMode'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j,k;j=babelHelpers.inherits(l,i);k=j&&j.prototype;function l(m,n){'use strict';k.constructor.call(this,m);this._typeaheadInput=n;}l.prototype.show=function(){'use strict';h.set(this._typeaheadInput);};f.exports=l;},null);
__d('ShareModeGroup',['Focus','ShareMode'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j,k;j=babelHelpers.inherits(l,i);k=j&&j.prototype;function l(m,n,o,p,q){'use strict';k.constructor.call(this,m);this._typeaheadInput=n;this._hiddenInput=o;this._currentGroupID=p;this._isCurrentGroupOpenPrivacy=q;}l.prototype.show=function(){'use strict';h.set(this._typeaheadInput);};l.prototype.getTypeahead=function(){'use strict';return this._typeaheadInput;};l.prototype.getCurrentGroupID=function(){'use strict';return this._currentGroupID;};l.prototype.getTargetGroupID=function(){'use strict';if(this._hiddenInput&&this._hiddenInput.value)return this._hiddenInput.value;};l.prototype.isCurrentGroupOpenPrivacy=function(){'use strict';return this._isCurrentGroupOpenPrivacy;};f.exports=l;},null);
__d('ShareModeMessage',['Focus','ShareMode'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j,k;j=babelHelpers.inherits(l,i);k=j&&j.prototype;function l(m,n){'use strict';k.constructor.call(this,m);this._typeaheadInput=n;}l.prototype.show=function(){'use strict';h.set(this._typeaheadInput);};f.exports=l;},null);
__d('ShareModeOwnTimeline',['CSS','ShareMode'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j,k;j=babelHelpers.inherits(l,i);k=j&&j.prototype;function l(m){'use strict';k.constructor.call(this);this._privacyWidget=m;}l.prototype.show=function(){'use strict';h.show(this._privacyWidget);};l.prototype.hide=function(){'use strict';h.hide(this._privacyWidget);};f.exports=l;},null);
__d('Selector',['ArbiterMixin','BehaviorsMixin','Button','DOM','DOMQuery','csx','mixin'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n){if(c.__markCompiled)c.__markCompiled();var o,p;o=babelHelpers.inherits(q,n(h,i));p=o&&o.prototype;function q(r,s,t,u,v){'use strict';p.constructor.call(this);this._popoverMenu=r;this._button=s;this._menu=t;this._input=u;this.init();v.behaviors&&this.enableBehaviors(v.behaviors);}q.prototype.init=function(){'use strict';this._menu.subscribe('change',(function(r,s){this._setLabelContent(s.label);this._input.value=s.value;this.inform('change',s);}).bind(this));this._popoverMenu.getPopover().subscribe(['hide','show'],(function(r){this.inform(r);}).bind(this));};q.prototype._getLabel=function(){'use strict';return l.find(this._button,"span._55pe");};q.prototype._setLabelContent=function(r){'use strict';var s=this._getLabel();k.setContent(s,r);};q.prototype.getLabelContent=function(){'use strict';var r=this._getLabel();return r.firstChild;};q.prototype.setValue=function(r){'use strict';this._menu.setValue(r);};q.prototype.getValue=function(){'use strict';return this._input.value;};q.prototype.getName=function(){'use strict';return this._input.name;};q.prototype.getButton=function(){'use strict';return this._button;};q.prototype.getMenu=function(){'use strict';return this._menu;};q.prototype.enable=function(){'use strict';j.setEnabled(this._button,true);this._popoverMenu.enable();};q.prototype.disable=function(){'use strict';j.setEnabled(this._button,false);this._popoverMenu.disable();};f.exports=q;},null);
__d('SelectorSubmitOnChange',['Parent','submitForm'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();function j(k){'use strict';this._selector=k;}j.prototype.enable=function(){'use strict';this._subscription=this._selector.subscribe('change',this._onChange.bind(this));};j.prototype.disable=function(){'use strict';this._subscription.unsubscribe();this._subscription=null;};j.prototype._onChange=function(){'use strict';var k=h.byTag(this._selector.getButton(),'form');k&&i(k);};Object.assign(j.prototype,{_subscription:null});f.exports=j;},null);