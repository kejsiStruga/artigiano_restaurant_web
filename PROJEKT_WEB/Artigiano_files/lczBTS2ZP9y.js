/*!CK:2506767299!*//*1453055269,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["4ukzL"]); }

__d("TimelineProfilePictureLoggerEnums",[],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports={actions:{EDIT_THUMBNAIL:"edit_thumbnail",FROM_PHOTOS:"from_photos",MAKE_PROFILE:"make_profile",SILHOUETTE:"silhouette",SUGGESTION:"suggestion",SUGGESTION_UPLOAD:"suggestion_upload",SYNCED_PHOTO:"synced_photo",TAKE_PHOTO:"take_photo",UPLOAD:"upload_photo",USE_PREVIOUS:"use_previous"},flows:{PERMALINK:"permalink",SNOWLIFT:"snowlift",SPOTLIGHT:"spotlight",VAULT:"vault",ZOOMCROP:"zoomcrop"},steps:{CANCEL:"cancel",CROP:"crop",CROP_FAIL:"crop_fail",CROP_SAVING:"crop_saving",CROP_SUCCESS:"crop_success",DRAG_AND_DROP:"drag_and_drop",FAIL:"fail",INIT:"init",LOADING:"loading",PREVIOUS_PIC_FAIL:"previous_pic_fail",PREVIOUS_PIC_INIT:"previous_pic_init",PREVIOUS_PIC_SAVING:"previous_pic_saving",PREVIOUS_PIC_SUCCESS:"previous_pic_success",RESIZE_BEGIN:"resize_begin",RESIZE_SKIPPED:"resize_skipped",RESIZE_SUCCESS:"resize_success",RESIZE_FAIL:"resize_fail",SKIP_CROP:"skip_crop",SUCCESS:"success",UPLOAD_CANCEL:"upload_cancel",UPLOAD_SELECT:"upload_select",UPLOAD_SUCCESS:"upload_success",VIEWER_INIT:"viewer_init"}};},null);
__d('FileUploadTarget',['AsyncUploadRequest','DragDropFileUpload','DragDropTarget','emptyFunction'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();function l(m,n){'use strict';var o=(function(p){this.$FileUploadTarget1=new h(n).setFiles({file:p}).setRelativeTo(m).setStatusElement(m).setAllowCrossOrigin(this.$FileUploadTarget2);this.$FileUploadTarget1.subscribe('complete',(function(q,r){this.onCompleteCallback(r);this.$FileUploadTarget1=null;}).bind(this));this.$FileUploadTarget1.send();}).bind(this);this.dragDropTarget=new j(m).setOnFilesDropCallback((function(p){p.length&&this.asyncProcess(p,function(q){q.length&&o(q);});}).bind(this));this.asyncProcess=function(p,q){q(p);};this.preprocess=function(p){return p;};this.onCompleteCallback=k;}l.prototype.setAllowCrossOrigin=function(m){'use strict';this.$FileUploadTarget2=m;return this;};l.prototype.setPreprocessor=function(m){'use strict';this.preprocess=m;return this;};l.prototype.setAsyncProcessor=function(m){'use strict';this.asyncProcess=m;return this;};l.prototype.onComplete=function(m){'use strict';this.onCompleteCallback=m;return this;};l.prototype.abort=function(){'use strict';this.$FileUploadTarget1&&this.$FileUploadTarget1.abort();};l.prototype.activate=function(){'use strict';if(!i.isSupported())return this;this.dragDropTarget.setFileFilter(this.preprocess).enable();return this;};f.exports=l;},null);
__d('SinglePictureUploadTarget',['Bootloader','Dialog','ErrorDialog','FileUploadTarget','emptyFunction','htmlSpecialChars','fbt'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n){if(c.__markCompiled)c.__markCompiled();function o(p,q){'use strict';this.fileUploadTarget=new k(p,q);this.preprocessCallback=l;this.asyncPreprocessCallback=function(r,s){s(r);};this.oncompleteCallback=l;this.afterSuccessCallback=l;}o.prototype.setAllowCrossOrigin=function(p){'use strict';this.fileUploadTarget.setAllowCrossOrigin(p);return this;};o.prototype.setPreprocessCallback=function(p){'use strict';this.preprocessCallback=p;return this;};o.prototype.setAsyncPreprocessCallback=function(p){'use strict';this.asyncPreprocessCallback=p;return this;};o.prototype.setOncompleteCallback=function(p){'use strict';this.oncompleteCallback=p;return this;};o.prototype.setAfterSuccessCallback=function(p){'use strict';this.afterSuccessCallback=p;return this;};o.prototype.activate=function(){'use strict';var p=function(t){return m(t.name);},q=(function(t){if(t.length>1){j.show(n._("Upload Error"),n._("You can only select 1 photo to upload to this album. Only the first photo you selected will be uploaded."));t=[t[0]];}var u=t[0];if(!u.type.match(/^image\//)){j.show(n._("Upload Error"),n._("We could not understand the contents of {filename}. Make sure it is a jpg, gif, or png formatted image.",[n.param('filename',p(u))]));return [];}this.preprocessCallback(t);return t;}).bind(this),r=(function(t,u){var v=1024*1024*16,w=1024*1024*1,x=(function(z){if(z.size>v){j.show(n._("Upload Error"),n._("{filename} is too large. Please resize your photo to under 8000x8000 pixels and try again.",[n.param('filename',p(t[0]))]));u([]);}else this.asyncPreprocessCallback([z],u);}).bind(this),y=t[0];if(y.size<w){x(y);}else h.loadModules(["ImageExif","ImageResizer"],function(z,aa){if(!aa.isSupported()){x(y);return;}var ba=new aa(y,null,null);ba.subscribe('resized',(function(ca,da){if(da.size>y.size){x(y);}else x(da);}).bind(this));ba.subscribe('error',(function(){x(y);}).bind(this));z.readFromFile(y,function(ca){ca&&ba.setOrientation(ca.Orientation);ba.resize();});});}).bind(this),s=(function(t){var u=t[0];if(!u.getResponse())return;this.oncompleteCallback(u);var v=u.getResponse().getPayload();if(u.isSuccess()){this.afterSuccessCallback(v);}else if(v&&v.__dialog){var w=new i();w.$SinglePictureUploadTarget1(v.__dialog);w.setButtons(i.OK).show();}else j.show(v.error.title,v.error.body);}).bind(this);return this.fileUploadTarget.onComplete(s).setPreprocessor(q).setAsyncProcessor(r).activate();};f.exports=o;},null);
__d('ServerRedirect',['ReloadPage','goURI'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j={redirectPageTo:i,reloadPage:h.now};f.exports=j;},null);
__d('ProfilePhotoActionLogger',['Banzai'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i={EVENT_SELECT_METHOD:'select_method',EVENT_CAMERA_PERMISSION_PROVIDED:'permission_provided',EVENT_CAMERA_PERMISSION_DENIED:'permission_denied',EVENT_CAMERA_NO_WEBCAM:'permission_denied',EVENT_CAMERA_UNKNOWN_MEDIASTREAM_ERROR:'unknown_mediastream_error',EVENT_CAMERA_TAKE_PHOTO:'take_photo',EVENT_CAMERA_RETAKE_PHOTO:'retake_photo',EVENT_CAMERA_UPLOAD_ATTEMPT:'upload_attempt',EVENT_CAMERA_UPLOAD_ERROR:'upload_error',EVENT_CAMERA_UPLOAD_SUCCESS:'upload_success',SOURCE_SUGGESTIONS:'suggestions',SOURCE_TIMELINE:'timeline',SOURCE_NUX:'nux',METHOD_EXISTING:'existing',METHOD_UPLOAD:'upload',METHOD_CAMERA:'camera',log:function(j,k,l){h.post('profile_photo_action',{event:j,source:k,method:l});}};f.exports=i;},null);
__d('TimelineProfilePicConfig',['fbt'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i={loading:'timeline/profile_pic/loading',success:'timeline/profile_pic/success',leavingMessage:h._("Your profile picture is still uploading, are you sure you want to leave?")};f.exports=i;},null);
__d('ProfilePictureFlowLogging',['Arbiter','Banzai','Event','Parent','ProfilePhotoActionLogger','Run','TimelineProfilePicConfig','TimelineProfilePictureLoggerEnums','tidyEvent'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){if(c.__markCompiled)c.__markCompiled();var q=n.loading,r=n.success,s='data-action-type',t,u,v,w;function x(){w&&w.unsubscribe();w=null;}var y={action:o.actions,flow:o.flows,step:o.steps,log:function(z){var aa=z||y.step.INIT;i.post('profile_pic_action',{action_type:t,flow_type:u,step_type:aa});if(t===y.action.UPLOAD&&aa===y.step.INIT)l.log(l.EVENT_SELECT_METHOD,v,l.METHOD_UPLOAD);u=null;if(z==='success'||z==='fail')t=null;return y;},setAction:function(z){t=z;return y;},setFlowType:function(z){u=z;return y;},setSource:function(z){v=z;return y;},init:function(z,aa){if(aa)v=aa;if(!w){w=h.subscribe([q,r],function(ba){y.log(ba===q?o.steps.LOADING:o.steps.SUCCESS);});m.onLeave(x);}p(j.listen(z,'click',function(ba){var ca=k.byAttribute(ba.getTarget(),s);if(!ca)return;y.setAction(ca.getAttribute(s)).log();}));},initMenuItems:function(z,aa,ba){y.init(z.getRoot(),ba);}};f.exports=y;},null);
__d("XWorkNewsfeedNuxNextStepController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/work\/newsfeed_nux\/next_step\/",{});},null);
__d('ProfilePicCropViewerInit',['Bootloader','CurrentCommunity','ProfilePictureFlowLogging','React','ServerRedirect','XWorkNewsfeedNuxNextStepController'],function a(b,c,d,e,f,g,h,i,j,k,l,m){if(c.__markCompiled)c.__markCompiled();var n='profile-picture-crop',o='loading',p=j.flow,q,r;function s(){r&&r.close();}function t(v,w,x){x=x||{};h.loadModules(["SpotlightViewerInit","ZoomProfilePicCropViewer.react","PhotoStore","AsyncRequest","AsyncResponse","XProfilePicCropViewerAsyncController"],function(y,z,aa,ba,ca,da){s();var ea=x.stickerID;q=n+':'+v+':'+w;if(ea)q+=':'+ea;var fa=x.successCallback,ga=i.getID()!=='0';if(fa==undefined&&(x.source==="atwork_nux"||x.source==="timeline")&&ga)fa=function(ja){var ka=m.getURIBuilder().getURI();new ba().setURI(ka).setData({current_step_id:1,skipped:false}).setHandler(function(){l.reloadPage();}).send();};r=y.render(k.createElement(z,{open:true,method:x.method,photoid:v,profileID:w,setid:q,source:x.source,uploadRequest:x.uploadRequest,warnOnCancel:x.warnOnCancel,cropOnlyMode:x.cropOnlyMode,successCallback:fa,errorCallback:x.errorCallback,cancelCallback:x.cancelCallback}),function(){r=null;});if(aa.hasBeenCreated(q)||v===o)return;var ha=da.getURIBuilder().setString('photo_id',v).setInt('profile_id',w).setString('set_id',q);ea&&ha.setInt('sticker_id',ea);ha=ha.getURI();var ia=q;new ba(ha).setErrorHandler(function(ja){ia===q&&s();ca.defaultErrorHandler(ja);}).send();});return true;}var u={close:s,getFlowType:function(){return p.ZOOMCROP;},useCropViewer:function(){return true;},loading:function(v,w){t(o,v,w);},loadID:t};f.exports=u;},null);
__d('ProfilePicUploadToCrop',['FileInputUploader','JpegResizer','PhotosMimeType','ProfilePicCropViewerInit','ProfilePictureFlowLogging','tidyEvent'],function a(b,c,d,e,f,g,h,i,j,k,l,m){if(c.__markCompiled)c.__markCompiled();function n(){return k.getFlowType();}function o(){l.setFlowType(n()).log(l.step.UPLOAD_SUCCESS);}function p(){l.setFlowType(n()).log(l.step.RESIZE_SKIPPED);}function q(r,s,t,u,v){'use strict';this.$ProfilePicUploadToCrop1=null;if(i.isSupported())this.$ProfilePicUploadToCrop1=new i(1);m(s.subscribe('change',(function(){if(!s.getValue())return;var w=s.getInput();if(!w.name)w.name='photo';l.setAction(l.action.UPLOAD).setFlowType(n()).log(l.step.UPLOAD_SELECT);v=String(v);var x=new h(w).setURI(r).setAllowCrossOrigin(true);k.loading(v,{uploadRequest:x});m([x.subscribe('success',function(y,z){s.clear();q.loadCropper(z.response.getPayload(),v,u);}),x.subscribe('failure',function(){s.clear();k.close();l.setFlowType(n()).log(l.step.FAIL);})]);if(this.$ProfilePicUploadToCrop1)x.setUploadInParallel(true).setPreprocessHandler(this.$ProfilePicUploadToCrop2.bind(this));x.send();}).bind(this)));}q.prototype.$ProfilePicUploadToCrop2=function(r,s){'use strict';l.setFlowType(n()).log(l.step.RESIZE_BEGIN);var t=r.getFile();if(!t||!j(t.type).isJpeg()){p();return s(r);}this.$ProfilePicUploadToCrop1.resizeBlob(t,function(u,v,w){if(u){l.setFlowType(n()).log(l.step.RESIZE_FAIL);return s(r);}if(w){p();}else{r.setFile(v);l.setFlowType(n()).log(l.step.RESIZE_SUCCESS);}s(r);});};q.loadCropper=function(r,s,t){'use strict';o();k.loadID(r.fbid,s,{warnOnCancel:true,source:t,method:'upload'});};f.exports=q;},null);
__d('ProfilePicDragAndDropUpload',['ProfilePicCropViewerInit','ProfilePictureFlowLogging','ProfilePicUploadToCrop','SinglePictureUploadTarget'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();var l={init:function(m,n,o){var p=new k(m,n).setAllowCrossOrigin(true).setPreprocessCallback(function(){i.setFlowType(h.getFlowType()).log(i.step.DRAG_AND_DROP);h.loading(o,{uploadRequest:p});}).setAfterSuccessCallback(function(q){j.loadCropper(q,o,'timeline');}).activate();}};f.exports=l;},null);
__d('TimelineCoverPhotoChangePrivacyDialog',['Arbiter','Event'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j={init:function(k,l,m){this._dialog=k;this._tooltipLink=m;this._closeButton=l;this._showDialog=false;this._tooltip=null;},registerDialogShow:function(){this._showDialog=true;h.subscribe('CoverPhotoEdit',(function(k,l){if(!this._showDialog)return;if(l.state==="open"){this._dialog&&this._dialog.show();if(this._tooltipLink){this._tooltip=this._tooltipLink.getAttribute('data-hover');this._tooltipLink.setAttribute('data-hover',null);}}else if(l.state==="closed")this.hideDialog();}).bind(this));i.listen(this._closeButton,'click',this.hideDialog.bind(this));},hideDialog:function(){this._dialog&&this._dialog.hide();if(this._tooltipLink)this._tooltipLink.setAttribute('data-hover',this._tooltip);this._showDialog=false;}};f.exports=j;},null);
__d('TimelineProfilePic',['Arbiter','CSS','Dialog','DOM','HTML','TimelineProfilePicConfig','Run','$','ge'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){if(c.__markCompiled)c.__markCompiled();var q;r.init=function(s,t){'use strict';r.destroyInstance();q=new r(s||'fbProfileCover',t||'.profilePicThumb');};function r(s,t){'use strict';this.$TimelineProfilePic1=o(s);this.$TimelineProfilePic2=t;this.$TimelineProfilePic3=[h.subscribe(m.loading,this.startLoading.bind(this)),h.subscribe(m.success,this.onUploadSuccess.bind(this))];n.onBeforeUnload(this.onBeforeUnload.bind(this));n.onLeave(this.destroy.bind(this));}r.prototype.$TimelineProfilePic4=function(s){'use strict';this.$TimelineProfilePic5=s;i.conditionClass(this.$TimelineProfilePic1,'profilePicLoading',s);};r.prototype.destroy=function(){'use strict';this.$TimelineProfilePic3.forEach(function(s){s.unsubscribe();});this.$TimelineProfilePic3=[];q=null;};r.prototype.startLoading=function(s,t){'use strict';this.$TimelineProfilePic4(!!t.isLoading);};r.prototype.onUploadSuccess=function(s,t){'use strict';this.$TimelineProfilePic4(false);if(!t.newPic)return;var u=j.getCurrent();if(u)u.hide();var v=t.newPic;k.replace(k.find(this.$TimelineProfilePic1,this.$TimelineProfilePic2),typeof v==='string'?l(v):v);if(typeof t.profileId!==undefined&&typeof t.headerPicURL!==undefined){var w=p('profile_pic_header_'+t.profileId);if(w)w.src=t.headerPicURL;}var x=p('fbProfilePicSelector');if(x)i.removeClass(x,'fbTimelineNullProfilePicSelector');};r.prototype.onBeforeUnload=function(){'use strict';if(q===this&&this.$TimelineProfilePic5)return m.leavingMessage;};r.destroyInstance=function(){'use strict';q&&q.destroy();};f.exports=r;},null);
__d('timeline-cover-dragdrop-edit',['SinglePictureUploadTarget','TimelineCover'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j=function(){var n=i.getInstance();n.hideLoadingIndicator();},k=function(n){var o=i.getInstance(),p=n.id,q=n.photo_node;o.updateCoverImage(p,q);},l=function(n){i.getInstance().showLoadingIndicator();},m=function(n,o){new h(n,o).setAllowCrossOrigin(true).setPreprocessCallback(l).setOncompleteCallback(j).setAfterSuccessCallback(k).activate();};g.initialize_timeline_cover_drop_target=m;},null);
__d('InfoReviewInstanceManager',['DOM','Event','ReactDOM','csx'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();var l="._5sf3",m=[],n=[],o={addInstanceRoot:function(p,q){n.push(i.listen(q,'click',function(r){var s=h.scry(q,l)[0];s&&h.remove(s);}));m.push(p);},cleanupInstances:function(){var p=[];while(m.length){var q=m.pop();document.contains(q)?p.push(q):j.unmountComponentAtNode(q);}while(n.length)n.pop().remove();m=p;}};f.exports=o;},null);
__d('InfoReviewCloseButton',['DOM','Event','InfoReviewInstanceManager','Parent','$','tidyEvent'],function a(b,c,d,e,f,g,h,i,j,k,l,m){if(c.__markCompiled)c.__markCompiled();var n='fbTimelineUnit';function o(p,q){'use strict';this.$InfoReviewCloseButton1=p;this.$InfoReviewCloseButton2=q;this.$InfoReviewCloseButton3=i.listen(this.$InfoReviewCloseButton1,'click',this.$InfoReviewCloseButton4.bind(this));m(this.$InfoReviewCloseButton3);}o.prototype.$InfoReviewCloseButton4=function(){'use strict';var p=l(this.$InfoReviewCloseButton2);if(p.parentElement.children.length===1)p=k.byClass(p,n);h.remove(p)&&this.$InfoReviewCloseButton5();j.cleanupInstances();};o.prototype.$InfoReviewCloseButton5=function(){'use strict';this.$InfoReviewCloseButton1=null;this.$InfoReviewCloseButton2=null;this.$InfoReviewCloseButton3&&this.$InfoReviewCloseButton3.remove();this.$InfoReviewCloseButton3=null;};f.exports=o;},null);
__d('ContextualLayerAsyncRelative',['Event','Parent'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();function j(k){'use strict';this._layer=k;}j.prototype.enable=function(){'use strict';this._layerSubscription=this._layer.subscribe('show',this._attachListener.bind(this));if(this._layer.isShown())this._attachListener();};j.prototype.disable=function(){'use strict';this._layerSubscription.unsubscribe();this._layerSubscription=null;if(this._listener){this._listener.remove();this._listener=null;}};j.prototype._attachListener=function(){'use strict';this._listener=h.listen(this._layer.getRoot(),'click',this._onclick.bind(this));};j.prototype._onclick=function(k){'use strict';var l=i.byTag(k.getTarget(),'A');if(!l)return;var m=l.getAttribute('ajaxify'),n=l.href,o=m||n;if(l.rel==='async'||l.rel==='async-post'){e(['AsyncRequest'],(function(p){p.bootstrap(o,this._layer.getContext(),l.rel==='async-post');}).bind(this));return false;}};Object.assign(j.prototype,{_layerSubscription:null,_listener:null});f.exports=j;},null);