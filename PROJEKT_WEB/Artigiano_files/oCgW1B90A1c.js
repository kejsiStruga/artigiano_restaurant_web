/*!CK:2831150950!*//*1453403738,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["YI6R+"]); }

__d('PluginSend',['Arbiter','CSS','DOM','DOMEvent','DOMEventListener','Focus','Plugin','PluginOptin','PluginResize'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){if(c.__markCompiled)c.__markCompiled();var q=function(r,s,t,u,v,w){if(v)new p(function(){return r.offsetWidth;},function(){return r.offsetHeight;}).resize().auto();if(!u){var x=new o('send').addReturnParams({act:'send'});l.add(s,'click',x.start.bind(x));return;}var y=false,z=false;function aa(){z=!z;i.toggle(s);i.toggle(t);i.toggle(u);if(z){setTimeout(function(){var da=j.find(u,'.textInput');m.set(da);},500);}else{var ba=j.find(s,'button');m.set(ba);}if(!y){var ca=window.ServerJSAsyncLoader;ca&&ca.ondemandjs&&ca.run(ca.ondemandjs);y=true;}new p(function(){return Math.max(r.offsetWidth,u.offsetWidth);},function(){return Math.max(r.offsetHeight,u.offsetHeight+u.offsetTop);},'resize.iframe',true).resize().auto();}l.add(s,'click',aa);l.add(t,'click',aa);l.add(r.parentNode,'click',function(ba){ba=new k(ba);if(ba.target===r.parentNode){ba.kill();aa();}});h.subscribe(q.CLOSE,aa);h.subscribe(n.ERROR,function(event,ba){j.setContent(r,ba.content);aa();});if(w)aa();};Object.assign(q,{SUCCESS:'platform/plugins/send/success',CLOSE:'platform/plugins/send/close',success:function(){h.inform(this.SUCCESS);}});f.exports=q;},null);
__d('PluginUITypeahead',['DOMDimensions','DOMQuery','Tokenizer','getElementPosition'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();function l(){return i.scry(document.body,'.uiTokenizer').map(function(n){var o=j.getInstance(n);if(!o)return {x:0,y:0};var p=o.getTypeahead().getView(),q=k(p.getElement()),r=h.getElementDimensions(p.getElement());return {x:q.x+r.width,y:q.y+r.height};});}var m={width:function(){return Math.max.apply(null,l().map(function(n){return n.x;}));},height:function(){return Math.max.apply(null,l().map(function(n){return n.y;}));}};f.exports=m;},null);
__d('PluginSendFlyout',['Arbiter','Button','DOMEvent','DOMEventListener','DOMQuery','Focus','FormSubmit','PluginResize','PluginSend','PluginUITypeahead','Tokenizer'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r){if(c.__markCompiled)c.__markCompiled();function s(){}Object.assign(s,{init:function(t){var u=l.find(t,'.uiTokenizer'),v=r.getInstance(u),w=l.find(t,'.textInput'),x=l.find(t,'.pluginSendFlyoutTextarea'),y=l.find(t,'form'),z=l.find(document.body,'.pluginSend'),aa=l.find(y,'.pluginSendFlyoutCancelButton'),ba=l.find(y,'.pluginSendFlyoutSendButton');h.subscribe('Form/change',function(da,ea){if(ea.node!==u)return;i.setEnabled(ba,v.getTokens().length>0);});function ca(){v.reset();x.value='';i.setEnabled(ba,false);m.setWithoutOutline(z);h.inform(p.CLOSE);}k.add(y,'submit',function(da){new j(da).kill();n.send(y);});k.add(aa,'click',function(da){new j(da).kill();ca();});k.add(aa,'keydown',function(da){da=new j(da);var ea=da.event.keyCode||da.event.which;if(ea==9&&!da.event.shiftKey){da.preventDefault();m.set(w);}});k.add(w,'keydown',function(da){da=new j(da);var ea=da.event.keyCode||da.event.which;if(ea==9&&da.event.shiftKey){da.preventDefault();if(w.getAttribute('aria-expanded')=='true'){w.setAttribute('aria-expanded','false');}else m.set(aa);}});k.add(y,'keyup',function(da){da=new j(da);var ea=da.event.keyCode||da.event.which;if(ea==27)ca();});h.subscribe(p.SUCCESS,ca);new o(function(){return Math.max(z.offsetWidth,t.offsetWidth,q.width());},function(){return Math.max(z.offsetHeight,t.offsetHeight+t.offsetTop,q.height());},'resize.iframe',false).resize().auto();}});f.exports=s;},null);
__d('TypeaheadPreventSubmitOnEnter',['Event','Keys'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();function j(k){'use strict';this._typeahead=k;}j.prototype.enable=function(){'use strict';var k=this._typeahead.getCore().getElement();this._listener=h.listen(k,'keypress',function(l){if(h.getKeyCode(l)==i.RETURN)l.kill();});};j.prototype.disable=function(){'use strict';this._listener.remove();this._listener=null;};Object.assign(j.prototype,{_listener:null});f.exports=j;},null);
__d('TypeaheadShowResultsOnFocus',['Event','Keys'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();function j(k){'use strict';this._typeahead=k;}j.prototype.enable=function(){'use strict';this._typeahead.getCore().resetOnKeyup=false;this._subscription=this._typeahead.subscribe('bootstrap',(function(k,l){this.firstFetch(l,this._typeahead.getCore(),this._typeahead.getData());}).bind(this));this._keyUpListener=h.listen(this._typeahead.getCore().getElement(),'keyup',(function(event){if(h.getKeyCode(event)==i.BACKSPACE||h.getKeyCode(event)==i.DELETE)this.respond(this._typeahead.getCore(),this._typeahead.getData());}).bind(this));this._focusListener=h.listen(this._typeahead.getCore().getElement(),'focus',(function(event){this.respond(this._typeahead.getCore(),this._typeahead.getData());}).bind(this));};j.prototype.disable=function(){'use strict';this._typeahead.unsubscribe(this._subscription);this._subscription=null;this._keyUpListener.remove();this._keyUpListener=null;this._focusListener.remove();this._focusListener=null;};j.prototype.firstFetch=function(k,l,m){'use strict';!k.bootstrapping&&this.respond(l,m);};j.prototype.respond=function(k,l){'use strict';if(!k.getValue())this.refreshAndShowNeededResults(k,l);};j.prototype.refreshAndShowNeededResults=function(k,l){'use strict';var m=this.getUidsFromData(l);k.setValue('');var n=l.buildUids(' ',m);l.respond('',n);};j.prototype.getUidsFromData=function(k){'use strict';var l=k.getAllEntries(),m=[];for(var n in l)m.push({uid:l[n].uid,index:l[n].index});m.sort(function(o,p){return o.index-p.index;});return m.map(function(o){return o.uid;});};Object.assign(j.prototype,{_subscription:null,_keyUpListener:null,_focusListener:null});f.exports=j;},null);