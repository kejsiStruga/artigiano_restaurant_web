/*!CK:1689240414!*//*1452712968,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["SxFaf"]); }

__d('ContextualBlind',['Event','Animation','Arbiter','DOM','Rect','Vector','$','cx','shield'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){if(c.__markCompiled)c.__markCompiled();var q=0,r=1,s=.8,t=500;u.prototype.$ContextualBlind1=function(){'use strict';this.$ContextualBlind2&&j.unsubscribe(this.$ContextualBlind2);this.$ContextualBlind2=null;this.$ContextualBlind3=[];this.$ContextualBlind4&&this.$ContextualBlind4.remove();this.$ContextualBlind4=null;this.$ContextualBlind5&&k.remove(this.$ContextualBlind5);this.$ContextualBlind6=false;};u.prototype.show=function(v,w,x,y,z,aa,ba,ca){'use strict';if(ba==null)ba=s;ca=ca||q;this.hide();var da=ca===q?"_2xgb":"_2xgc";for(var ea=0;ea<4;ea++)this.$ContextualBlind3.push(k.create('div',{className:da,style:'opacity:'+ba}));k.appendContent(document.body,this.$ContextualBlind3);if(aa!==false){da=ca===q?"_2xgd":"_2xge";this.$ContextualBlind5=k.create('div',{className:da});k.appendContent(document.body,this.$ContextualBlind5);}var fa=p(this.updatePosition,this,v,w,x,y,z);fa();this.$ContextualBlind2=j.subscribe('reflow',fa);this.$ContextualBlind4=h.listen(window,'resize',fa);this.$ContextualBlind6=true;};u.prototype.fadeIn=function(v,w,x,y,z,aa,ba,ca){'use strict';ca=ca||t;if(ba==null)ba=s;this.show(v,w,x,y,z,aa,ba,q);if(this.$ContextualBlind6)return;for(var da=0;da<this.$ContextualBlind3.length;da++){var ea=this.$ContextualBlind3[da];new i(ea).duration(ca).from('opacity',0).to('opacity',ba).go();}};u.prototype.hide=function(){'use strict';this.$ContextualBlind3&&this.$ContextualBlind3.forEach(k.remove);this.$ContextualBlind1();};u.prototype.fadeOut=function(){'use strict';for(var v=0;v<this.$ContextualBlind3.length;v++){var w=this.$ContextualBlind3[v];new i(w).duration(t).from('opacity',s).to('opacity',0).ondone(k.remove.bind(null,w)).go();}this.$ContextualBlind1();};u.prototype.$ContextualBlind7=function(v,w){'use strict';w.getPositionVector().setElementPosition(v);w.getDimensionVector().setElementDimensions(v);};u.prototype.updatePosition=function(v,w,x,y,z){'use strict';var aa=m.getDocumentDimensions().y,ba=l.getElementBounds(n(v));ba=new l(ba.t-(w||0),ba.r+(x||0),ba.b+(y||0),ba.l-(z||0),ba.domain);var ca=document,da=ca&&ca.documentElement&&ca.documentElement.scrollWidth||ca&&ca.body&&ca.body.scrollWidth||0;this.$ContextualBlind7(this.$ContextualBlind3[0],new l(0,da,ba.t,0,'document'));this.$ContextualBlind7(this.$ContextualBlind3[1],new l(ba.t,da,ba.b,ba.r,'document'));this.$ContextualBlind7(this.$ContextualBlind3[2],new l(ba.b,da,aa,0,'document'));this.$ContextualBlind7(this.$ContextualBlind3[3],new l(ba.t,ba.l,ba.b,0,'document'));if(this.$ContextualBlind5)this.$ContextualBlind7(this.$ContextualBlind5,ba);};function u(){'use strict';}u.STYLE_LIGHT=q;u.STYLE_DARK=r;f.exports=u;},null);
__d('ContextualLayerBlind',['ContextualBlind','cx','CSS'],function a(b,c,d,e,f,g,h,i,j){if(c.__markCompiled)c.__markCompiled();var k={isModal:false,opacity:.3,paddingTop:8,paddingRight:8,paddingBottom:8,paddingLeft:8,style:h.STYLE_DARK};function l(m,n){'use strict';n=babelHelpers._extends({},k,n);this.$ContextualLayerBlind1=n.isModal;this.$ContextualLayerBlind2=m;this.$ContextualLayerBlind3=n.opacity;this.$ContextualLayerBlind4=n.paddingTop;this.$ContextualLayerBlind5=n.paddingRight;this.$ContextualLayerBlind6=n.paddingBottom;this.$ContextualLayerBlind7=n.paddingLeft;this.$ContextualLayerBlind8=n.style;}l.prototype.enable=function(){'use strict';this.$ContextualLayerBlind9=[this.$ContextualLayerBlind2.subscribe(['show','reposition'],this.$ContextualLayerBlind10.bind(this)),this.$ContextualLayerBlind2.subscribe('hide',this.$ContextualLayerBlind11.bind(this))];j.addClass(this.$ContextualLayerBlind2.getRoot(),"_4746");this.$ContextualLayerBlind12=new h();};l.prototype.disable=function(){'use strict';this.$ContextualLayerBlind11();j.removeClass(this.$ContextualLayerBlind2.getRoot(),"_4746");while(this.$ContextualLayerBlind9.length)this.$ContextualLayerBlind9.pop().unsubscribe();this.$ContextualLayerBlind9=null;this.$ContextualLayerBlind12=null;};l.prototype.$ContextualLayerBlind10=function(){'use strict';if(this.$ContextualLayerBlind2.isShown()){var m=this.$ContextualLayerBlind2.getContext();this.$ContextualLayerBlind12.show(m,this.$ContextualLayerBlind4,this.$ContextualLayerBlind5,this.$ContextualLayerBlind6,this.$ContextualLayerBlind7,this.$ContextualLayerBlind1,this.$ContextualLayerBlind3,this.$ContextualLayerBlind8);}};l.prototype.$ContextualLayerBlind11=function(){'use strict';this.$ContextualLayerBlind12.hide();};f.exports=l;},null);
__d('LeftNavFoldFlyout.react',['XUIContextualDialog.react','ContextualLayerBlind','LeftNavFoldFlyoutConfig','LayerAutoFocus','LayerFadeOnShow','Layout.react','React','Image.react','XUIContextualDialogTitle.react','XUIContextualDialogBody.react','XUIButton.react','cx','glyph','setImmediate'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u){'use strict';if(c.__markCompiled)c.__markCompiled();var v=m.Column,w=5,x=n.PropTypes,y=n.createClass({displayName:'LeftNavFoldFlyout',propTypes:{config:x.object,items:x.array,model:x.object,refModel:x.object,setHoveredItem:x.func},render:function(){var z=this.props.items,aa=this.props.model,ba=this.props.config,ca=j.colSetting[aa.section];if(z.length==0){return null;}else if(z.length>w||ca>1){var da,ea;if(ca>1){da=z.slice(z.length-4);z=z.slice(0,z.length-4);ea=z&&z.length>0?n.createElement('div',{className:"_417-"}):null;da=n.createElement(m,null,n.createElement(v,null,n.createElement('div',{className:"_3y0h"},da.slice(0,(da.length+1)/2))),n.createElement(v,null,n.createElement('div',{className:"_3y0m"},da.slice((da.length+1)/2))));}z=n.createElement('div',null,da,ea,n.createElement(m,null,n.createElement(v,null,n.createElement('div',{className:"_3y0h"},z.slice(0,(z.length+1)/2))),n.createElement(v,null,n.createElement('div',{className:"_3y0m"},z.slice((z.length+1)/2)))));}var fa=n.createElement('div',{className:"_36hc"+(this.props.config.Density?' '+"_5o88":'')+(' '+"_3y0n")},z);return (n.createElement(h,{hideOnEscape:true,position:'right',behaviors:{LayerAutoFocus:k,LayerFadeOnShow:l,ContextualLayerBlind:ba.biggerHover?null:i},contextRef:(function(){return this.props.refModel;}).bind(this),onBlur:ba.biggerHover?null:this._handleOnBlur,offsetX:-2,shown:true},n.createElement(p,null,aa.name,n.createElement('div',{className:"_3y0o"},this.renderButtons())),n.createElement(q,null,fa)));},renderButtons:function(){var z=j.links[this.props.model.section]||[],aa=0;return z.map(function(ba){return (n.createElement(r,{ajaxify:ba.ajaxify,className:'autofocus','data-gt':ba.datagt,href:ba.href,image:ba.create?n.createElement(o,{src:t('create')}):null,key:aa++,label:ba.name,rel:ba.rel,use:ba.use}));});},_handleOnBlur:function(){u((function(){return this.props.setHoveredItem(null);}).bind(this));}});f.exports=y;},null);
__d('ContextualBlindSingleton',['ContextualBlind'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();f.exports=new h();},null);