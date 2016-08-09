/*!CK:1051965837!*//*1453403694,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["AGHpB"]); }

__d('NotificationHiddenState',['NotificationUpdates','NotificationConstants','isEmpty'],function a(b,c,d,e,f,g,h,i,j){if(c.__markCompiled)c.__markCompiled();var k={};h.subscribe('update-notifications',function(m,n){var o=n.nodes,p=n.payloadsource;if(p===i.PayloadSourceType.LIVE_SEND&&o&&o.length){var q={};o.forEach(function(r){var s=r.alert_id;if(k[s])q[s]=false;});if(!j(q)){k=Object.assign(k,q);h.didUpdateHiddenState(Object.keys(q));}}});h.subscribe('update-hidden',function(m,n){if(n.hiddenState){k=Object.assign(k,n.hiddenState);h.didUpdateHiddenState(Object.keys(n.hiddenState));}});var l={isHidden:function(m){if(k[m])return k[m];return false;}};f.exports=l;},null);
__d('NotificationPhotoThumbnail',[],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();function h(j){if(!j.media||!j.style_list||!j.style_list.length)return null;switch(j.style_list[0]){case 'new_album':case 'album':case 'application':case 'photo':case 'video':case 'video_autoplay':case 'video_inline':return j.media.image;default:return null;}}var i={getThumbnail:function(j,k,l){var m;if(j&&j.length){j.some(function(q){m=h(q);if(m)return true;return false;});if(m)return m;}if(l){var n=l.relevant_comments;if(n&&n.length){var o=n[0].attachments;if(o&&o.length){m=h(o[0]);if(m)return m;}}}if(k){var p=k.attachments;if(p&&p.length)return h(p[0]);}return null;}};f.exports=i;},null);
__d('NotificationURI',['BusinessURI.brands','URI','isFacebookURI','VideoPermalinkURI'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();var l={localize:function(m){m=h(m);if(!j(m))return m.toString();var n=m.getSubdomain();return m.getUnqualifiedURI().getQualifiedURI().setSubdomain(n).toString();},snowliftable:function(m){if(!m)return false;m=new i(m);var n=m.getQueryData();return j(m)&&(k.isValid(m)||'fbid' in n);},isVaultSetURI:function(m){return this._areEquals(m,'/ajax/vault/sharer_preview.php');},isAlbumDraftRecoveryDialogURI:function(m){return this._areEquals(m,'/ajax/photos/upload/overlay/');},_areEquals:function(m,n){if(!m)return false;m=new i(m);return j(m)&&m.getPath()===n;},_startsWith:function(m,n){if(!m)return false;m=new i(m);return j(m)&&m.getPath().startsWith(n);}};f.exports=l;},null);
__d('NotificationList.react',['NotificationConstants','NotificationHiddenState','NotificationSeenState','NotificationStore','NotificationUpdates','NotificationUserActions','React','getObjectValues','isEmpty'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){if(c.__markCompiled)c.__markCompiled();var q=n.PropTypes,r=h.PayloadSourceType.LIVE_SEND,s=n.createClass({displayName:'NotificationList',propTypes:{businessID:q.string,hasEverBeenOpened:q.bool,maxHeight:q.number,negativeTracking:q.object,paused:q.bool,tracking:q.string,useChevron:q.bool,chevronType:q.string,numPerPage:q.number.isRequired,listRenderer:q.func.isRequired,upsell:q.object,endpoint:q.string},getInitialState:function(){this._currentlyFetching=false;this._pendingNotifs={};this._shouldScroll=false;return {canFetchMore:true,notifs:{},hiddenState:{},readState:{},showingChevron:false};},componentWillMount:function(){k.registerEndpoint(this.props.endpoint);k.setBusinessID(this.props.businessID);this._subscriptions=[l.subscribe('notifications-updated',(function(t,u){if(u.source==r&&!p(u.updates)){this._shouldScroll=true;if(this.props.paused!==false)this._pendingNotifs=babelHelpers._extends({},this._pendingNotifs,u.updates);return;}this._fetchAndUpdate(k.getCount(this.props.endpoint));}).bind(this)),l.subscribe(['hidden-state-updated','read-state-updated'],(function(t,u){if(t=='hidden-state-updated'){if(u.source!==r||!this.props.paused){var v={};Object.keys(u.updates).forEach(function(x){v[x]=i.isHidden(x);});this.setState({hiddenState:babelHelpers._extends({},this.state.hiddenState,v)});}}else{var w={};Object.keys(u.updates).forEach(function(x){w[x]=j.isRead(x);});this.setState({readState:babelHelpers._extends({},this.state.readState,w)});}}).bind(this))];},componentWillUnmount:function(){if(this._subscriptions){while(this._subscriptions.length)this._subscriptions.pop().unsubscribe();this._subscriptions=null;}},_getNotifsWithCurrentOrder:function(t){var u=Object.keys(this.state.notifs),v=Object.keys(t).filter((function(x){return !this.state.notifs[x];}).bind(this));u=u.concat(v);var w={};u.forEach((function(x){if(this._pendingNotifs[x]){if(this.state.notifs[x])w[x]=this.state.notifs[x];}else w[x]=t[x];}).bind(this));return w;},_fetchAndUpdate:function(t){this._currentlyFetching=true;k.getNotifications(t,(function(u){var v=p(this._pendingNotifs)?u:this._getNotifsWithCurrentOrder(u),w={},x={};o(v).forEach(function(y){var z=y.alert_id;if(!this.state||!this.state.readState[z])w[z]=j.isRead(z);if(!this.state||!this.state.hiddenState[z])x[z]=i.isHidden(z);});this._currentlyFetching=false;this.setState({notifs:v,canFetchMore:k.canFetchMore(this.props.endpoint)||k.getCount(this.props.endpoint)!==Object.keys(v).length,readState:babelHelpers._extends({},this.state.readState,w),hiddenState:babelHelpers._extends({},this.state.hiddenState,x)});}).bind(this),this.props.endpoint);},_fetchAndUpdateAll:function(){var t={};Object.keys(this._pendingNotifs).forEach((function(u){var v=i.isHidden(u);if(v!=this.state.hiddenState[u])t[u]=i.isHidden(u);}).bind(this));if(!p(t))this.setState({hiddenState:babelHelpers._extends({},this.state.hiddenState,t)});this._pendingNotifs={};this._fetchAndUpdate(k.getCount(this.props.endpoint));},_fetchNextSet:function(){if(!this._currentlyFetching){var t=Object.keys(this.state.notifs).length;this._fetchAndUpdate(t+this.props.numPerPage);}},_onScrollAndUpdate:function(t){if(this._currentlyFetching||!this.state.canFetchMore)return;if(t)this._fetchNextSet();},_onChevronShow:function(){this.setState({showingChevron:true});},_onChevronHide:function(){this.setState({showingChevron:false});},_updateNotifInContainer:function(t){if(t.length>this.props.numPerPage){this._fetchAndUpdate(t.length);}else this._fetchNextSet();return;},componentDidUpdate:function(t){var u=j.getUnseenIDs();if(!p(this._pendingNotifs))u=u.filter((function(v){return !this._pendingNotifs[v];}).bind(this));if(u.length&&this.props.paused)m.markNotificationsAsSeen(u);if(!t.hasEverBeenOpened&&this.props.hasEverBeenOpened)this._updateNotifInContainer(u);if(t.paused&&!this.props.paused){this._shouldScroll=false;setTimeout(this._fetchAndUpdateAll,0);return;}},render:function(){var t=this.props.listRenderer;return (n.createElement(t,{hasEverBeenOpened:this.props.hasEverBeenOpened,paused:this.props.paused,tracking:this.props.tracking,negativeTracking:this.props.negativeTracking,shortenTimestamp:this.props.shortenTimestamp,businessID:this.props.businessID,maxHeight:this.props.maxHeight,useChevron:this.props.useChevron,chevronType:this.props.chevronType,notifs:this.state.notifs,afterScroll:this._onScrollAndUpdate,onChevronShow:this._onChevronShow,onChevronHide:this._onChevronHide,canFetchMore:this.state.canFetchMore,hiddenState:this.state.hiddenState,readState:this.state.readState,showingChevron:this.state.showingChevron,shouldScroll:this._shouldScroll,upsell:this.props.upsell||null,isRHC:this.props.isRHC}));}});f.exports=s;},null);
__d('FlexibleBlock.react',['LeftRight.react','React','cx','invariant','keyMirror'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();var m=l({left:true,right:true});function n(p){!(p.flex&&p.flex in o.FLEX)?k(0):undefined;!(p.children&&p.children.length===2)?k(0):undefined;}var o=i.createClass({displayName:'FlexibleBlock',render:function(){n(this.props);var p,q=this.props.children[0],r=this.props.children[1],s=this.props.flex==m.left,t;if(s){t=q;p=h.DIRECTION.right;}else{t=r;p=h.DIRECTION.left;}var u=i.createElement('div',{className:"_42ef"},t);return (i.createElement(h,babelHelpers._extends({},this.props,{direction:p}),s?u:this.props.children[0],s?this.props.children[1]:u));}});o.FLEX=m;f.exports=o;},null);
__d('ReadToggle.react',['React','cx','emptyFunction','joinClasses'],function a(b,c,d,e,f,g,h,i,j,k){'use strict';if(c.__markCompiled)c.__markCompiled();var l=h.PropTypes,m=h.createClass({displayName:'ReadToggle',propTypes:{isRead:l.bool.isRequired,onClick:l.func,readLabel:l.node,unreadLabel:l.node},getDefaultProps:function(){return {onClick:j};},render:function(){if(this.props.isRead){return (h.createElement('div',{'aria-label':this.props.readLabel,className:this._getClasses(),'data-hover':'tooltip','data-tooltip-alignh':'center',onClick:this.props.onClick}));}else return (h.createElement('div',{'aria-label':this.props.unreadLabel,className:this._getClasses(),'data-hover':'tooltip','data-tooltip-alignh':'center',onClick:this.props.onClick,role:'button',tabIndex:'0'}));},_getClasses:function(){return k(this.props.className,(!this.props.isRead?"_5c9q":'')+(this.props.isRead?' '+"_5c9_":''));}});f.exports=m;},null);
__d('NotificationListItem.react',['AsyncResponse','BizSiteIdentifier.brands','BanzaiLogger','CloseButton.react','Event','FlexibleBlock.react','Image.react','ImageBlock.react','Keys','List.react','NotificationPhotoThumbnail','NotificationTokens','NotificationURI','NotificationUserActions','React','TextWithEntities.react','ReadToggle.react','Timestamp.react','VaultBoxURI','XUIButton.react','PopoverMenu.react','ReactXUIMenu','cx','invariant','fbt'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ba,ca,da,ea,fa){if(c.__markCompiled)c.__markCompiled();var ga=ca.Item;function ha(ka,la){return v.createElement('span',{className:'fwb'},ka);}function ia(ka){return !!(ka&&ka.id&&!ka.is_facebook_app);}var ja=v.createClass({displayName:'NotificationListItem',getInitialState:function(){return {showingOptions:false,negativeFeedbackConfirmation:null,canReportAsSpam:false,spamReportConfirmation:null,sendingFeedback:false,mayUndoHide:false,notifOptionConfirmation:null,isBizSite:i.isBizSite()};},_onKeyDownItem:function(ka){if(l.getKeyCode(ka.nativeEvent)==p.RETURN)this._markItemRead();},_markItemReadIfUnreadFromReadButton:function(){if(!this.props.isRead)u.setNextIsFromReadButton(true);this._markItemReadIfUnread();},_markItemReadIfUnread:function(){!this.props.isRead&&this._markItemRead();},_markItemRead:function(){u.markNotificationsAsRead([this.props.alert_id]);},_onFeedbackError:function(ka){h.defaultErrorHandler(ka);this.setState({sendingFeedback:false});},_onHideSuccess:function(ka){var la=ka.getPayload();!la.confirmation?ea(0):undefined;this.setState({negativeFeedbackConfirmation:la.confirmation,canReportAsSpam:la.canReportAsSpam,sendingFeedback:false,showingOptions:true});},_onHideAppSuccess:function(ka){var la=ka.getPayload(),ma=la.confirmation,na=la.canReportAsSpam;!ma?ea(0):undefined;this.setState({negativeFeedbackConfirmation:ma,canReportAsSpam:na,mayUndoHide:true,sendingFeedback:false,showingOptions:true});},_onSpamReportSuccess:function(ka){var la=ka.getPayload().spamReportConfirmation;this.setState({negativeFeedbackConfirmation:null,spamReportConfirmation:la,sendingFeedback:false});},_onHide:function(){u.markNotificationAsHidden(this.props.alert_id,this._onHideSuccess,this._onFeedbackError);this.setState({sendingFeedback:true,mayUndoHide:true});},_onShowSuccess:function(){this.setState({notifOptionConfirmation:null,negativeFeedbackConfirmation:null,sendingFeedback:false,showingOptions:false});},_onShow:function(){var ka=this.props.negative?this.props.negative.subscription_level:null;u.markNotificationAsVisible(this.props.alert_id,ka,this._onShowSuccess,this._onFeedbackError);this.setState({sendingFeedback:true});},_onReportSpam:function(){u.markNotificationAsSpam(this.props.alert_id,this._onSpamReportSuccess,this._onFeedbackError);this.setState({sendingFeedback:true});},_markAppAsHidden:function(){u.markAppAsHidden(this.props.alert_id,this.props.application.id,this._onHideAppSuccess,this._onFeedbackError);this.setState({sendingFeedback:true});},_markAppAsVisible:function(){u.markAppAsVisible(this.props.alert_id,this.props.application.id,(function(){this.setState({negativeFeedbackConfirmation:null,sendingFeedback:false,showingOptions:false,mayUndoHide:false});}).bind(this),this._onFeedbackError);this.setState({sendingFeedback:true});},_renderAttachedImage:function(ka){if(ka)return (v.createElement(n,{src:ka.uri,className:"_42td",'aria-hidden':true}));return v.createElement('span',null);},_getModifiedTrackingString:function(ka){return JSON.stringify(babelHelpers._extends({},JSON.parse(this.props.tracking),ka));},_onClickCloseButton:function(){if(this.props.useChevron){this.showCloseOptionOnMenuClose=true;}else this.setState({showingOptions:true});},_onCancelNegativeFeedback:function(){this.setState({showingOptions:false});},_getChevron:function(){if(!this.props.menu_options.length)return null;var ka="_1_0c"+(' '+"_55m9")+(this.props.chevronType==='persistent'?' '+"_51v8":''),la=v.createElement(ca,null,this.props.menu_options?this.props.menu_options.map((function(na){return (v.createElement(ga,{onclick:(function(){this._onClickNotifOption(na.server_action);}).bind(this),key:na.client_action+na.server_action},v.createElement('div',{className:"_18qh"},na.text)));}).bind(this)):null),ma=v.createElement('a',null,v.createElement(ba,{alignh:'right',menu:la,className:ka,onShow:this._onChevronShow,onHide:this._onChevronHide},v.createElement('div',{className:"_1_0d"})));return ma;},shouldComponentUpdate:function(ka,la){return (this.props.visible!==ka.visible||this.props.isRead!==ka.isRead||this.props.timestamp!==ka.timestamp||this.props.paused!==ka.paused||this.state.showingOptions!==la.showingOptions||this.state.sendingFeedback!==la.sendingFeedback||this.state.canReportAsSpam!==la.canReportAsSpam||this.state.spamReportConfirmation!==la.spamReportConfirmation);},componentWillReceiveProps:function(ka){if(this.props.paused&&!ka.paused&&!this.props.visible&&this.state.mayUndoHide)this.setState({mayUndoHide:false});},_onChevronHide:function(){this.props.onChevronHide();this._logChevronEvent('close');if(this.showCloseOptionOnMenuClose){this.showCloseOptionOnMenuClose=false;this._turnOff();}},_turnOff:function(){var ka=ia(this.props.application)?this._markAppAsHidden:this._onHide;ka();},_onChevronShow:function(){this.props.onChevronShow();this._logChevronEvent('open');},_logChevronEvent:function(ka){var la={event:ka,notif_type:this.props.notif_type,notif_id:parseInt(s.untokenizeIDs([this.props.alert_id])[0],10)};j.log('NotifJewelMenuLoggerConfig',la);},_onNotifOptionSuccess:function(ka){this.setState({showingOptions:true,sendingFeedback:false,notifOptionConfirmation:ka});},_onClickNotifOption:function(ka){this.setState({sendingFeedback:true,mayUndoHide:true});u.sendNotifOption(this.props.alert_id,this._onNotifOptionSuccess,this._onFeedbackError,ka);},_undoNotifOption:function(ka){this.setState({sendingFeedback:true});u.undoNotifOption(this.props.alert_id,this._onShowSuccess,this._onFeedbackError,ka);},render:function(){if(!this.props.visible&&!this.state.mayUndoHide)return v.createElement('li',{className:"_4_62"});var ka=this.props.negative,la=this.props.negativeTracking,ma="_33c"+(!this.props.isRead?' '+"_4af":'')+(this.state.showingOptions?' '+"_4ag":'')+(this.state.sendingFeedback?' '+"_4m8s":'');if(this.state.negativeFeedbackConfirmation){var na=this.state.negativeFeedbackConfirmation,oa=null,pa=null;if(this.state.canReportAsSpam)if(!this.props.useChevron){oa=v.createElement('span',null,v.createElement('span',{className:'mhs'},'·'),v.createElement('a',{href:'#',onClick:this._onReportSpam},fa._("Report app for spam")));}else pa=v.createElement(q,{border:'none',spacing:'small',className:"_1v4c"},v.createElement('li',null,v.createElement('a',{href:'#',onClick:this._onReportSpam,className:'mls'},fa._("Report app for spam"))));var qa=ia(this.props.application)?this._markAppAsVisible:this._onShow,ra=!this.props.useChevron?v.createElement('a',{href:'#',onClick:qa,className:'mls'},fa._("Undo")):null;return (v.createElement('li',{className:ma,'data-gt':this.props.tracking},v.createElement('div',{className:"_4ai"},v.createElement(w,{interpolator:ha,ranges:na.ranges,aggregatedranges:na.aggregated_ranges,text:na.text}),ra,oa),pa));}var sa=this.state.spamReportConfirmation;if(sa)return (v.createElement('li',{className:ma,'data-gt':this.props.tracking},v.createElement('div',{className:"_4ai"},v.createElement(w,{interpolator:ha,ranges:sa.ranges,aggregatedranges:sa.aggregated_ranges,text:sa.text}))));if(this.state.notifOptionConfirmation){na=this.state.notifOptionConfirmation;return (v.createElement('li',{className:ma,'data-gt':this.props.tracking},v.createElement('div',{className:"_4ai"},v.createElement(w,{interpolator:ha,ranges:na.ranges,aggregatedranges:na.aggregated_ranges,text:na.text&&na.text.text?na.text.text:''}),v.createElement('a',{href:'#',onClick:(function(){this._undoNotifOption(na.undo_action);}).bind(this),className:'mls'},fa._("Undo"))),v.createElement(q,{border:'none',spacing:'small',className:"_1v4c"},na.follow_up_options.map?na.follow_up_options.map((function(qb){return (v.createElement('li',{key:qb.client_action+qb.server_action},v.createElement('a',{onClick:(function(){this._onClickNotifOption(qb.server_action);}).bind(this),href:'#',className:'mls'},qb.text)));}).bind(this)):null)));}if(this.state.showingOptions&&!this.props.useChevron){var ta=ia(this.props.application)?this._markAppAsHidden:this._onHide;return (v.createElement('li',{className:ma,'data-gt':this.props.tracking},v.createElement('div',{className:"_4ai"},v.createElement('div',null,v.createElement(w,{interpolator:ha,ranges:ka.confirm_question.ranges,aggregatedranges:ka.confirm_question.aggregated_ranges,text:ka.confirm_question.text})),v.createElement('div',{className:'mts'},v.createElement(aa,{'data-gt':this._getModifiedTrackingString(la.confirm),href:{url:'#'},label:ka.turn_off,use:'confirm',onClick:ta,disabled:this.state.sendingFeedback}),v.createElement(aa,{'data-gt':this._getModifiedTrackingString(la.cancel),href:{url:'#'},label:fa._("Keep On"),onClick:this._onCancelNegativeFeedback,disabled:this.state.sendingFeedback})))));}var ua=null;if(this.props.title)ua=v.createElement(w,{interpolator:ha,ranges:this.props.title.ranges,aggregatedranges:this.props.title.aggregated_ranges,text:this.props.title.text,renderEmoji:true,renderEmoticons:true});var va=null,wa=null;if(ka){var xa=this._onClickCloseButton,ya;ya=this._getModifiedTrackingString(la.click);var za="_4ah"+(' '+"_55m9");va=v.createElement(k,{className:za,'data-gt':ya,size:'medium',tooltip:ka.button_tooltip,onClick:xa,ref:'closeButton'});}var ab=t.localize(this.props.url),bb=null;if(!this.props.noPhotoPreviews)bb=r.getThumbnail(this.props.attachments,this.props.attached_story,this.props.feedback_context);var cb=bb&&t.snowliftable(ab),db=t.isVaultSetURI(ab),eb=t.isAlbumDraftRecoveryDialogURI(ab),fb=(this.props.useChevron?"_55ma":'')+(' '+"_55m9"),gb=v.createElement(x,{className:fb,isRead:!!this.props.isRead,onClick:this._markItemReadIfUnreadFromReadButton,readLabel:fa._("Read"),unreadLabel:fa._("Mark as Read")}),hb=null;if(this.props.useChevron){va=null;hb=this._getChevron();}var ib=cb||db||eb?ab:this.props.ajaxify_url,jb=null,kb=null,lb=db?z.getSyncedTabURI().toString():ab;if(cb){jb='theater';}else if(eb){jb='async-post';}else if(db||ib)jb='dialog';var mb=null,nb=this.props.actors[0];if(nb)mb=v.createElement(n,{src:nb.profile_picture.uri,className:(!this.props.isNotifsPage?"_33h":'')+(this.props.isNotifsPage?' '+"_12u1":'')});var ob=false;this.props.attachments.forEach(function(qb){if(ob)return;ob=qb.style_list.indexOf('notification_target')>=0||qb.style_list.indexOf('question')>=0;if(ob)return;});var pb=v.createElement('div',null,gb,va,hb);return (v.createElement('li',{className:ma,'data-gt':this.props.tracking,onMouseLeave:wa},v.createElement('div',{className:'anchorContainer'},v.createElement('a',{href:lb,ajaxify:ib,className:"_33e"+(this.props.useChevron?' '+"_1_0e":''),rel:jb,onClick:kb,onMouseDown:this._markItemRead,onKeyDown:this._onKeyDownItem},v.createElement(o,null,mb,v.createElement(m,{flex:m.FLEX.left},v.createElement('div',{className:"_4l_v"},ua,v.createElement(o,{className:"_33f"+(this.state.isBizSite?' '+"_2g48":'')},v.createElement(n,{className:"_10cu",src:this.props.icon.uri}),v.createElement('span',null,v.createElement(y,{shorten:this.props.shortenTimestamp,time:this.props.timestamp.time,text:this.props.timestamp.text,verbose:this.props.timestamp.verbose,className:"_33g"})))),this._renderAttachedImage(bb)))),pb)));}});f.exports=ja;},null);
__d('NotificationListPropTypes',['React'],function a(b,c,d,e,f,g,h){'use strict';if(c.__markCompiled)c.__markCompiled();var i=h.PropTypes,j={negativeTracking:i.object,tracking:i.string,useChevron:i.bool,chevronType:i.string,notifs:i.object,afterScroll:i.func,onChevronShow:i.func,onChevronHide:i.func,canFetchMore:i.bool,hiddenState:i.object,readState:i.object,showingChevron:i.bool,paused:i.bool,maxHeight:i.number,shouldScroll:i.bool,upsell:i.object};f.exports=j;},null);
__d('NotificationPageList.react',['Event','LoadingIndicator.react','NotificationListItem.react','NotificationListPropTypes','React','ReactDOM','Vector','cx','debounce','fbt','getObjectValues','isEmpty'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s){if(c.__markCompiled)c.__markCompiled();var t=l.createClass({displayName:'NotificationPageList',propTypes:k,_shouldKeepLoading:function(){var u=this.refs.loading;if(!u)return false;var v=n.getElementPosition(m.findDOMNode(u),'viewport').y;return v<n.getViewportDimensions().y;},_keepOnLoading:function(){this.props.afterScroll(this._shouldKeepLoading());},componentDidUpdate:function(){this._keepOnLoading();},componentDidMount:function(){h.listen(window,'scroll',p(this._keepOnLoading));this._keepOnLoading();},_renderItems:function(){return r(this.props.notifs).map((function(u){var v=u.alert_id;return (l.createElement(j,babelHelpers._extends({key:v,visible:!this.props.hiddenState[v],isRead:this.props.readState[v],negativeTracking:this.props.negativeTracking,shortenTimestamp:this.props.shortenTimestamp,useChevron:this.props.useChevron,chevronType:this.props.chevronType,onChevronShow:this.props.onChevronShow,onChevronHide:this.props.onChevronHide,noPhotoPreviews:true,isNotifsPage:true,paused:this.props.paused},u)));}).bind(this));},render:function(){var u=null,v=null;if(!s(this.props.notifs)){u=l.createElement('ul',{'data-gt':this.props.tracking},this._renderItems());}else if(!this.props.canFetchMore)u=l.createElement('div',{className:"_44_s"},q._("No new notifications"));if(this.props.canFetchMore)v=l.createElement(i,{color:'white',size:'large',ref:'loading',className:"_44_t"});var w=null;if(this.props.upsell){var x=this.props.upsell.module;w=l.createElement(x,babelHelpers._extends({isPage:true},this.props.upsell.props));}var y="_44_u"+(this.props.showingChevron?' '+"_44_v":'');return (l.createElement('div',{className:y},w,u,v));}});f.exports=t;},null);