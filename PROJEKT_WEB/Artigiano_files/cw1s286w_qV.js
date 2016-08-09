/*!CK:3645144845!*//*1452808871,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["5BLhq"]); }

__d('UFIMentionsInput.react',['Arbiter','BanzaiScuba','Bootloader','DraftEntity','DraftModifier','DOMVector','EditorState','Input','Keys','MentionsInput.react','React','ReactDOM','SelectionState','UFIUIEvents','URI','UFIConfig','canUseReactEditor','clickRefAction','createEditorStateWithEntities','createMentionEntity','cx','emptyFunction','getMentionsInputDecorator','getMentionsTextForContentState','getVisibleValueForContentState','handleBeforeInputForEmoticon','handleSoftNewlineForEmoticon','isSoftNewlineEvent','setImmediate'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ba,ca,da,ea,fa,ga,ha,ia,ja){if(c.__markCompiled)c.__markCompiled();var ka=new i('ufi_tinder',null,{addBrowserFields:true,addGeoFields:true,addPredictedGeographyFields:true,addMobileDeviceFields:true,addUser:true}),la=200,ma='ufi_comment_composer',na='ufi_reply_composer',oa=x(),pa=r.PropTypes;function qa(ua){var va=ua.map(function(wa){return {kind:'file',type:wa.type,getAsFile:ca.thatReturns(wa)};});return {clipboardData:{items:va}};}function ra(ua){var va=/^image\//;return ua.filter(function(wa){return va.test(wa.type);});}var sa=r.createClass({displayName:'UFIMentionsInput',propTypes:{onContentChange:pa.func},getInitialState:function(){var ua='',va=[];if(this.props.initialData){ua=this.props.initialData.value||'';va=this.props.initialData.mentions||[];va=va.map(function(xa){return babelHelpers._extends({},xa,{entity:{uid:xa.uid,weakreference:xa.weakreference}});});}var wa=z({text:ua,ranges:va,decorator:da(),entityCreationFn:ta});wa=n.moveSelectionToEnd(wa);return {bootloaded:false,fullRender:!!(this.props.initialData&&this.props.initialData.value),typeaheadReporter:null,editorState:wa,mentionsSource:null,mentionableEntries:null,fallbackText:ua};},hasEnteredText:function(){return !!this.state.editorState.getCurrentContent().getPlainText().trim();},focus:function(){this._triggerFullRender((function(){if(oa){this.refs.mentionsInput.focus();}else s.findDOMNode(this.refs.textarea).focus();}).bind(this));},submitComment:function(event){if(this._submitComment(event))this._clearDocumentState();},insertMention:function(ua){this._triggerFullRender((function(){if(oa){var va=this.state.editorState,wa=va.getSelection(),xa=va.getCurrentContent(),ya=wa.getStartKey(),za=wa.getStartOffset(),ab=xa.getBlockForKey(ya),bb;if(ab.getText().substr(za-1,1).trim().length>0){var cb=l.replaceText(xa,wa,' ');wa=cb.getSelectionAfter();bb=l.insertText(cb,wa,ua.getTitle(),va.getCurrentInlineStyle(),aa(ua));}else bb=l.replaceText(xa,wa,ua.getTitle(),va.getCurrentInlineStyle(),aa(ua));wa=bb.getSelectionAfter();bb=l.insertText(bb,wa,' ');va=n.push(va,bb,'insert-fragment');va=n.forceSelection(va,va.getSelection());this.setState({editorState:va});this.focus();}else{s.findDOMNode(this.refs.textarea).focus();if(this.state.fallbackText.length){this.setState({fallbackText:this.state.fallbackText+' '+ua.title});}else this.setState({fallbackText:ua.title});}}).bind(this));},insertEmoticon:function(ua){if(!oa){this.setState({fallbackText:this.state.fallbackText+' '+ua});return;}var va=this.state.editorState,wa=va.getCurrentContent(),xa=va.getSelection(),ya=wa.getBlockForKey(xa.getStartKey()).getText()[xa.getStartOffset()-1];if(ya&&ya!==' ')ua=' '+ua;var za=wa.getBlockForKey(xa.getEndKey()).getText()[xa.getEndOffset()];if(za&&za!==' ')ua+=' ';var ab=l.replaceText(va.getCurrentContent(),va.getSelection(),ua);va=n.push(va,ab,'insert-characters');va=n.forceSelection(va,va.getSelection());this.setState({editorState:va});},setSignature:function(ua){setTimeout((function(){var va=this.state.editorState,wa=va.getSelection(),xa=va.getCurrentContent(),ya=xa.getBlockMap().first(),za=ya.getKey();wa=new t({anchorKey:za,anchorOffset:0,focusKey:za,focusOffset:ua.length});xa=l.replaceText(xa,wa,ua);va=n.set(va,{currentContent:xa});this.setState({editorState:va});}).bind(this),0);},_informHeightChange:function(){if(this.props.monitorHeight)ja((function(){if(!this.isMounted())return;var ua=oa?s.findDOMNode(this.refs.mentionsInput):s.findDOMNode(this.refs.textarea),va=m.getElementDimensions(ua).y;if(va!==this._height){this._height=va;h.inform(u.InputHeightChanged,{node:ua});}}).bind(this));},_onChange:function(ua){if(this.props.onContentChange){var va=this.state.editorState.getCurrentContent(),wa=ua.getCurrentContent();if(va!==wa)this.props.onContentChange(wa.hasText());}this.setState({editorState:ua},this._informHeightChange);},_clearDocumentState:function(){this.state.typeaheadReporter&&this.state.typeaheadReporter.sessionEnd();var ua=n.createEmpty(da());this.setState({editorState:n.moveFocusToEnd(ua)});},_handleContentReturn:function(ua){if(ia(ua)){var va=ha(this.state.editorState);if(va===this.state.editorState){return false;}else{this.setState({editorState:va});return true;}}if(this._submitComment(ua)){this._clearDocumentState();return true;}return false;},_handleBeforeInput:function(ua){var va=ga(this.state.editorState,ua);if(va===this.state.editorState){return false;}else{this.setState({editorState:va});return true;}},_submitComment:function(ua){var va=this.state.editorState.getCurrentContent(),wa=fa(va),xa=ea(va),ya={visibleValue:wa,encodedValue:xa},za=o.getValue(s.findDOMNode(this.refs.proxyInput));if(za){var ab=new v(b.location.href);ka.addNormal('path',ab.getPath());ka.addNormal('proxy_value',za.substr(0,la));ka.post();}return this.props.onEnterSubmit(ya,ua);},_handleFiles:function(ua){var va=ra(ua);if(va.length){this.props.onPaste(qa(va));return true;}return false;},_handleDroppedFiles:function(ua,va){return this._handleFiles(va);},_handlePastedFiles:function(ua){return this._handleFiles(ua);},_onMentionsInputBlur:function(){this.state.typeaheadReporter&&this.state.typeaheadReporter.sessionEnd();this.props.onBlur&&this.props.onBlur();h.inform(u.Blur,{hasEnteredText:this.hasEnteredText()});},_onMentionsInputFocus:function(){if(!this.state.bootloaded&&!this._currentlyBootloading){this._currentlyBootloading=true;if(this.props.showBusinessTypeahead){j.loadModules(["TypeaheadMetricReporter","getBusinessMentionsSearchSource"],(function(ua,va){if(!this.isMounted())return;var wa=new ua({event_name:'tinder_mentions'});wa.sessionStart();var xa=va(wa,this.props.ftEntIdentifier);xa.bootstrap();this.setState({typeaheadReporter:wa,bootloaded:true,mentionsSource:xa},(function(){this._currentlyBootloading=false;}).bind(this));}).bind(this));}else j.loadModules(["TypeaheadMetricReporter","getMentionsSearchSource"],(function(ua,va){if(!this.isMounted())return;var wa=new ua({event_name:'tinder_mentions'});wa.sessionStart();var xa=va(this.props.datasource,wa,w.showHashtagTypeahead);xa.bootstrap();this.setState({typeaheadReporter:wa,bootloaded:true,mentionsSource:xa},(function(){this._currentlyBootloading=false;}).bind(this));}).bind(this));}else if(this.state.typeaheadReporter)this.state.typeaheadReporter.sessionStart();this.props.onFocus&&this.props.onFocus();h.inform(u.Focus);},_onShowMentions:function(ua,va){if(this.state.typeaheadReporter)this.state.typeaheadReporter.reportResults(ua.map(function(wa){return wa.getUniqueID();}));},_onAddMention:function(ua,va,wa){if(this.state.typeaheadReporter){this.state.typeaheadReporter.reportSelect(ua.getUniqueID(),ua.getType(),va,wa.button>=0);this.state.typeaheadReporter.sessionEnd();this.state.typeaheadReporter.sessionStart();}},_onFallbackKeyDown:function(ua){if(ua.which!==p.RETURN)return;if(ia(ua)||!this.state.fallbackText.trim())return;ua.preventDefault();var va={visibleValue:this.state.fallbackText,encodedValue:this.state.fallbackText};if(this.props.onEnterSubmit(va,ua))this.setState({fallbackText:''});},_onFallbackChange:function(ua){this.setState({fallbackText:ua.target.value});},_onFallbackBlur:function(ua){this.props.onBlur&&this.props.onBlur();},_onFallbackFocus:function(ua){this.props.onFocus&&this.props.onFocus();},_sortByRenderType:function(ua,va){var wa=ua.getAuxiliaryData().renderType,xa=va.getAuxiliaryData().renderType;if(wa===xa)return ua.getOrder()-va.getOrder();var ya=this.props.viewOptionsTypeObjectsOrder;return ya.indexOf(wa)-ya.indexOf(xa);},_triggerFullRender:function(ua){this.setState({fullRender:true},ua);},_triggerFullRenderWithoutCallback:function(){this._triggerFullRender();},_renderFallback:function(){return (r.createElement('div',null,r.createElement('textarea',{ref:'textarea',className:"UFIAddCommentInput _1os9",name:'add_comment_text',placeholder:this.props.placeholder,spellCheck:true,onKeyDown:this._onFallbackKeyDown,onChange:this._onFallbackChange,onBlur:this._onFallbackBlur,onFocus:this._onFallbackFocus,value:this.state.fallbackText})));},_renderProxyInput:function(){if(!this.props.hideProxyInput){var ua="_1osa mentionsHidden";return (r.createElement('input',{className:ua,name:'add_comment_text',ref:'proxyInput',onFocus:this.focus,tabIndex:'-1'}));}},_renderDummy:function(){var ua="UFIAddCommentInput _1osb _1osc";return (r.createElement('div',{onFocus:this._triggerFullRenderWithoutCallback,onSelect:ca,onClick:this._triggerFullRenderWithoutCallback,onTouchStart:this._triggerFullRenderWithoutCallback,onMouseOver:this._triggerFullRenderWithoutCallback},this._renderProxyInput(),r.createElement('div',{className:ua},this.props.placeholder)));},_onClickEditorContainer:function(ua){y('ufi',ua.target,null,'FORCE');},_renderMentionsInput:function(){var ua="UFIAddCommentInput _1osb",va=babelHelpers._extends({mentionSortFn:this.props.viewOptionsTypeObjectsOrder?this._sortByRenderType:null},this.props.viewProps);return (r.createElement('div',{onClick:this._onClickEditorContainer},this._renderProxyInput(),r.createElement(q,{ref:'mentionsInput',className:ua,editorState:this.state.editorState,onChange:this._onChange,mentionsSource:this.state.mentionsSource,typeaheadView:this.props.viewComponent,typeaheadViewProps:va,spellCheck:true,placeholder:this.props.placeholder,onAddMention:this._onAddMention,onShowMentions:this._onShowMentions,onFocus:this._onMentionsInputFocus,onBlur:this._onMentionsInputBlur,handleContentReturn:this._handleContentReturn,handleBeforeInput:this._handleBeforeInput,handlePastedFiles:this._handlePastedFiles,handleDroppedFiles:this._handleDroppedFiles,autoflip:this.props.autoflip,webDriverTestID:this.props.replyCommentID?na:ma})));},componentDidMount:function(){if(!oa){if(this.state.fallbackText)s.findDOMNode(this.refs.textarea).focus();}else if(this.state.editorState.getCurrentContent().hasText())ja((function(){this.isMounted()&&this.focus();}).bind(this));},render:function(){if(!oa)return this._renderFallback();if(!this.state.fullRender)return this._renderDummy();return this._renderMentionsInput();}});function ta(ua){return k.create('MENTION','IMMUTABLE',{id:ua.uid,isWeak:ua.weakreference});}f.exports=sa;},null);