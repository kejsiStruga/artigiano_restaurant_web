/*!CK:3714521966!*//*1453054977,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["8gvAw"]); }

__d('StarsInput.react',['React','TooltipLink.react','cx','fbt'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();var l=h.PropTypes,m=h.createClass({displayName:'StarsInput',propTypes:{allowMultipleSubmissions:l.bool,count:l.number,large:l.bool,onClick:l.func.isRequired,starLabels:l.array},getDefaultProps:function(){return {allowMultipleSubmissions:false,count:0,large:false,starLabels:[k._("Poor"),k._("Fair"),k._("Good"),k._("Very Good"),k._("Excellent")]};},getInitialState:function(){return {starRating:this.props.count,starsShown:this.props.count,canUpdate:true};},onMouseEnter:function(n,event){if(this.state.canUpdate)this.setState({starsShown:n});},onMouseLeave:function(n,event){if(this.state.canUpdate){var o=this.state.starRating;this.setState({starsShown:o});}},onClick:function(n,event){if(this.state.canUpdate){this.setState({starRating:n,starsShown:n,canUpdate:this.props.allowMultipleSubmissions});this.props.onClick(n);}},getStars:function(){var n=this.props.starLabels.length,o=[];for(var p=0;p<n;p++){var q=p+1;o.push(h.createElement(i,{className:"mls"+(' '+"_22mm")+(this.props.large?' '+"_1vr2":'')+(p>=this.state.starsShown?' '+"_22mn":'')+(p<this.state.starsShown?' '+"_22mo":'')+(!this.state.canUpdate?' '+"_1g87":''),key:p,tooltip:this.props.starLabels[p],onMouseEnter:this.onMouseEnter.bind(this,q),onMouseLeave:this.onMouseLeave.bind(this,q),onClick:this.onClick.bind(this,q),position:'above',alignH:'center'}));}return o;},render:function(){return (h.createElement('div',{className:this.props.className},this.getStars()));}});f.exports=m;},null);
__d('XUIOverlayButton.react',['AbstractButton.react','React','cx','joinClasses'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();var l=i.createClass({displayName:'XUIOverlayButton',render:function(){var m="_51tl selected";return (i.createElement(h,babelHelpers._extends({},this.props,{className:k(this.props.className,m)})));}});f.exports=l;},null);
__d('MessengerProfileImageWrapper.react',['ReactComponentWithPureRenderMixin','React','cssVar','cx','getViewportDimensions','joinClasses'],function a(b,c,d,e,f,g,h,i,j,k,l,m){'use strict';if(c.__markCompiled)c.__markCompiled();var n=i.PropTypes,o=i.createClass({displayName:'MessengerProfileImageWrapper',mixins:[h],propTypes:{isMessengerUser:n.bool,showBadge:n.bool,size:n.number,tooltipContent:n.string},render:function(){var q={};if(this.props.tooltipContent){q['aria-label']=this.props.tooltipContent;q['data-hover']='tooltip';var r=l().width,s=parseInt("640px".replace('px',''),10);q['data-tooltip-position']=r<=s?'above':'left';}return (i.createElement('div',babelHelpers._extends({className:m("_4ldz",this.props.className),style:{width:this.props.size+'px',height:this.props.size+'px'}},q),i.createElement('div',{className:"_4ld-",style:{width:this.props.size+'px',height:this.props.size+'px'}},this.props.children),this._renderBadge()));},_renderBadge:function(){if(!this.props.showBadge||this.props.isMessengerUser==null)return null;return (i.createElement(p,{className:"_4ld_",isMessengerUser:this.props.isMessengerUser}));}}),p=i.createClass({displayName:'MessengerBadge',mixins:[h],propTypes:{isMessengerUser:n.bool,size:n.number},render:function(){return (i.createElement('div',{className:m(this.props.className,"_2pom")},i.createElement('div',{className:"_2pon"+(this.props.isMessengerUser?' '+"_2poo":'')+(!this.props.isMessengerUser?' '+"_2pop":'')})));}});f.exports=o;},null);
__d('MessengerDialogTitle.react',['React','cx','joinClasses'],function a(b,c,d,e,f,g,h,i,j){'use strict';if(c.__markCompiled)c.__markCompiled();var k=h.createClass({displayName:'MessengerDialogTitle',render:function(){return (h.createElement('div',{className:j("_19jt",this.props.className)},this.props.children));}});f.exports=k;},null);
__d('MessengerSpinner.react',['Image.react','ReactComponentWithPureRenderMixin','React','cx','fbt','ix','joinClasses'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n){'use strict';if(c.__markCompiled)c.__markCompiled();var o=j.PropTypes,p=m('/images/mercury/clients/messenger/core/LoadingSpinner.png'),q=m('/images/mercury/clients/messenger/core/LoadingSpinnerGrey.png'),r=m('/images/mercury/clients/messenger/core/LoadingSpinnerExtraLarge.png'),s=24,t=32,u=j.createClass({displayName:'MessengerSpinner',mixins:[i],propTypes:{color:o.oneOf(['blue','grey']),size:o.oneOf([s,t])},getDefaultProps:function(){return {color:'blue',size:s};},render:function(){return (j.createElement(h,{'aria-label':l._("Loading..."),'aria-busy':true,className:n(this.props.className,"_3u55 _3qh2"),height:this.props.size,src:this._getSpinnerSrc(),width:this.props.size}));},_getSpinnerSrc:function(){return this.props.size===s?this.props.color==='blue'?p:q:r;}});u.Sizes={LARGE:t,MEDIUM:s};f.exports=u;},null);
__d("XVideoCallAdminMessageController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/videocall\/admin_msg\/",{});},null);