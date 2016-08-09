/*!CK:2409313161!*//*1453403701,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["bJbuM"]); }

__d('htmlize',['htmlSpecialChars'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();function i(j){return h(j).replace(/\r\n|[\r\n]/g,'<br/>');}f.exports=i;},null);
__d('PluginFlyoutDialog',['Arbiter','DOMEvent','DOMEventListener','PluginFlyout'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();function l(m,n,o){this.parent=new k(m,n,o);this.flyout=m;h.subscribe(k.SHOW,this.show.bind(this),h.SUBSCRIBE_NEW);}Object.assign(l.prototype,{show:function(){if(this.subscribed)return;this.subscribed=1;var m=window.ServerJSAsyncLoader;m&&m.ondemandjs&&m.run(m.ondemandjs);j.add(this.flyout.parentNode,'click',(function(n){n=new i(n);if(n.target===this.flyout.parentNode){n.kill();this.parent.hide();}}).bind(this));}});f.exports=l;},null);
__d('MentionsInputMatchers',[],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();var h=['@','\\uff20'].join(''),i=['#','\\uFF03'].join(''),j='.,+*?$|#{}()\\^\\-\\[\\]\\\\\/!%\'"~=<>_:;\n\r',k=j.replace('#','')+'&',l='\u200B';function m(p,q){'use strict';this.$Matchers1=p;this.$Matchers2=q;this.$Matchers3();}m.prototype.$Matchers3=function(){'use strict';var p=this.$Matchers4(this.$Matchers2),q=this.$Matchers5(this.$Matchers1,this.$Matchers2),r=this.$Matchers6(this.$Matchers1,q),s=this.$Matchers7(p,r),t=this.$Matchers8(p);this.$Matchers9=new RegExp('['+this.$Matchers1+']$');this.$Matchers10=new RegExp(r+'$');this.$Matchers11=new RegExp(t+'$');this.$Matchers12=new RegExp(s+'$');this.$Matchers13=new RegExp('['+i+']');};m.prototype.$Matchers4=function(p){'use strict';return '\\b[A-Z][^ A-Z'+p+l+']';};m.prototype.$Matchers5=function(p,q){'use strict';return '(?:[^'+p+q+']|['+q+'][^ '+q+'])';};m.prototype.$Matchers6=function(p,q){'use strict';return '(?:^|\\s)(['+p+']('+q+'{0,20}))';};m.prototype.$Matchers7=function(p,q){'use strict';return '(?:(?:^|[^#])('+p+'+)|'+q+')';};m.prototype.$Matchers8=function(p){'use strict';return '(?:'+p+'{4,})';};m.prototype.getMainMatcher=function(){'use strict';return this.$Matchers10;};m.prototype.getTriggerMatcher=function(){'use strict';return this.$Matchers9;};m.prototype.getAutoMatcher=function(){'use strict';return this.$Matchers12;};m.prototype.getHashtagMatcher=function(){'use strict';return this.$Matchers13;};var n='\\b[A-Z][^ A-Z'+j+']',o={mentionsMatchers:new m(h,j),hashtagMatchers:new m(i,k),userMatcher:new RegExp('(?:'+n+'{4,})'+'$')};f.exports=o;},null);
__d('MentionsInput',['Arbiter','ArbiterMixin','Bootloader','CSS','DataStore','DOM','Event','FbtResult','FlipDirection','Input','InputSelection','Keys','MentionsInputMatchers','Parent','Style','TokenizeUtil','UserAgent_DEPRECATED','htmlize','mixin','removeFromArray','cx'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ba){if(c.__markCompiled)c.__markCompiled();var ca,da,ea='\u200B',fa=new RegExp(ea,'g'),ga=function(pa){return pa+ea;},ha=function(pa){return pa.replace(/(@+)(\[[0-9]+\:([^\]]|\\\])*\]+)/g,'$1 $2');},ia=/[\\\]:]/g,ja={MENTIONS:'mentions',HASHTAGS:'hashtags'};function ka(pa,qa){return pa.replace(qa,' '.repeat(qa.length));}function la(pa,qa){return pa.substring(0,qa)+pa.substring(qa+1);}function ma(pa){var qa=pa.lastIndexOf('>');if(qa>=0){var ra=pa.indexOf(' ',qa);return ra>=0?pa.substr(0,ra+1):pa;}else return '';}function na(pa,qa,ra){var sa=ra.lastIndexOf('<',qa)>ra.lastIndexOf('>',qa);return sa?' ':'&nbsp;<wbr />';}ca=babelHelpers.inherits(oa,z(i));da=ca&&ca.prototype;function oa(pa,qa,ra,sa,ta,ua){'use strict';da.constructor.call(this);l.set(pa,'MentionsInput',this);this._root=pa;this._typeahead=qa;this._input=ra;this._offsets=[];var va=null,wa=this.init.bind(this,sa,ta,ua);try{va=document.activeElement===this._input;}catch(xa){}if(va){setTimeout(wa,0);}else var ya=n.listen(this._input,'focus',function(){setTimeout(wa,0);ya.remove();});this._hasHashtags=sa.hashtags;this._hashtagsDataSource=sa.hashtags_data_source;this._mentionsDataSource=this._typeahead.getData();this._currentDataSource=this._mentionsDataSource;this._autoSuggestPages=sa.autosuggest_pages;this._lastHighlighterHTML='';this._hashtags=[];this._matchers=t.mentionsMatchers;this._setMatchersMode(ja.MENTIONS);}oa.prototype.init=function(pa,qa,ra){'use strict';if(this._initialized)return;this._initValue=qa?qa.value:'';this._initialized=true;this._highlighter=m.find(this._root,'.highlighter');this._highlighterInner=this._highlighter.firstChild;this._highlighterContent=m.find(this._root,'.highlighterContent');this._hiddenInput=m.find(this._root,'.mentionsHidden');this._placeholder=this._input.getAttribute('placeholder')||'';this._metrics=ra;if(!this._hiddenInput.name){var sa=this._input.name;this._input.name=sa+'_text';this._hiddenInput.name=sa;}this._initEvents();this._initTypeahead();if(qa===null){this._setup();}else this.reset(qa);this.inform('init',null,h.BEHAVIOR_STATE);};oa.prototype._setup=function(){'use strict';this._mentioned={};this._orderedUIDs=[];this._numMentioned=0;this._filterData=null;this._highlighterContent&&m.empty(this._highlighterContent);this._highlighterAuxContent&&m.remove(this._highlighterAuxContent);this._highlighterAuxContent=null;q.setPlaceholder(this._input,this._placeholder);v.set(this._typeahead.getElement(),'height','auto');};oa.prototype.reset=function(pa){'use strict';if(!this._initialized)return;this._setup();var qa=pa&&pa.value||'';this._value=qa;this._hiddenInput&&(this._hiddenInput.value=qa);if(this._input&&pa)q.setValue(this._input,pa.value);var ra=pa&&pa.mentions;if(ra&&ra.length){var sa=[];ra.forEach(function(ta){sa.push(ta.offset+ta.length);delete ta.offset;delete ta.length;this._addToken(ta);},this);sa.reverse().forEach(function(ta){qa=qa.substring(0,ta)+ea+qa.substring(ta);});}q.setValue(this._input,qa);if(this._value==='')p.setDirection(this._input);this._update();};oa.prototype.getValue=function(){'use strict';return q.getValue(this._input).replace(fa,'');};oa.prototype._getMarkedValue=function(){'use strict';return q.getValueRaw(this._input);};oa.prototype.getRawValue=function(){'use strict';this._update();return q.getValue(this._hiddenInput);};oa.prototype.checkValue=function(){'use strict';var pa=this._typeahead.getCore().getValue();if(this._matchers.getTriggerMatcher().exec(pa)||pa==='')this.inform('sessionEnd',{});};oa.prototype.getTypeahead=function(){'use strict';return this._typeahead;};oa.prototype.hasChanges=function(){'use strict';return !q.isEmpty(this._input)&&this._input.value!==this._initValue&&this._initialized;};oa.prototype.focus=function(){'use strict';this._input.focus();};oa.prototype._initEvents=function(){'use strict';var pa=this._update.bind(this);n.listen(this._input,{input:pa,keyup:pa,change:pa,blur:this._handleBlur.bind(this),focus:this._handleFocus.bind(this),keydown:this._handleKeydown.bind(this)});if(this._metrics){this._metrics.init(this._typeahead);this._metrics._reset();this._metrics.bindSessionStart(this._typeahead,'render',true);this._metrics.bindSessionEnd(this._typeahead.getView(),'select',true);this._metrics.bindSessionEnd(this,'sessionEnd',false);n.listen(this._input,'keyup',(function(event){setTimeout(this.checkValue.bind(this),0);}).bind(this));}};oa.prototype._initTypeahead=function(){'use strict';this._typeahead.subscribe('select',(function(ua,va){var wa=va.selected;this._addToken({uid:wa.uid,text:wa.text,type:wa.type,weakreference:wa.weak_reference});this.updateValue();}).bind(this));var pa=this._input,qa=null;function ra(){if(qa===null){qa=q.getSubmitOnEnter(pa);q.setSubmitOnEnter(pa,false);}}function sa(){if(qa!==null){q.setSubmitOnEnter(pa,qa);qa=null;}}this._typeahead.subscribe('reset',sa);this._typeahead.subscribe('render',ra);this._typeahead.subscribe('highlight',function(ua,va){va.index>=0?ra():sa();});this._typeahead.subscribe('query',(function(){this._filterData=null;}).bind(this));var ta=this._typeahead.getCore();ta.suffix=ea;this._handleFocus();};oa.prototype._handleBlur=function(){'use strict';if(this._filterToken){this._filterToken.remove();this._filterToken=null;}};oa.prototype._handleFocus=function(){'use strict';if(!this._filterToken)this._filterToken=this._typeahead.getData().addFilter(this._filterResults.bind(this));this._updateWidth();};oa.prototype._handleKeydown=function(event){'use strict';var pa=event.keyCode;if(pa==s.BACKSPACE||pa==s.DELETE)this._handleBackspaceAndDelete(event,pa);if(pa==s.LEFT||pa==s.RIGHT)setTimeout(this._handleLeftAndRight.bind(this,pa),10);};oa.prototype._handleLeftAndRight=function(pa){'use strict';var qa=this._getMarkedValue(),ra=r.get(this._input),sa=ra.start,ta=ra.end,ua=pa==s.LEFT,va=pa==s.RIGHT;if(sa==ta){var wa=ua?-1:1;if(qa.charAt(sa)==ea)r.set(this._input,sa+wa);}else if(ua&&qa.charAt(sa)==ea){r.set(this._input,sa-1,ta);}else if(ua&&qa.charAt(ta)==ea){r.set(this._input,sa,ta-1);}else if(va&&qa.charAt(ta)==ea){r.set(this._input,sa,ta+1);}else if(va&&qa.charAt(sa)==ea)r.set(this._input,sa+1,ta);};oa.prototype._handleBackspaceAndDelete=function(event,pa){'use strict';var qa=r.get(this._input),ra=false;if(qa.start!==qa.end)if(this._offsetIsInsideMention(qa.start+1)&&this._offsetIsInsideMention(qa.end)){ra=pa===s.BACKSPACE;}else return;var sa=pa===s.DELETE?1:-1,ta=sa+(ra?qa.end:qa.start),ua=this._getMarkedValue(),va=ua;for(var wa=0;wa<this._orderedUIDs.length;++wa){var xa=this._mentioned[this._orderedUIDs[wa]],ya=xa.text,za=ga(ya),ab=va.indexOf(za),bb=ab+za.length;if(ta<ab||ta>=bb){va=ka(va,za);continue;}var cb,db;if(xa.type!='user'){cb=0;db=[ya];}else{cb=za.substring(0,ta-ab).split(' ').length-1;db=ya.split(' ');}var eb=db.splice(cb,1)[0],fb=db.join(' '),gb=cb===0?ab:bb-eb.length-1;if(fb){xa.text=fb;fb=ga(fb);}else this._removeToken(xa.uid);var hb=ua.substring(0,ab)+fb+ua.substring(bb);q.setValue(this._input,hb);r.set(this._input,gb);this._update();event.kill();break;}};oa.prototype._offsetIsInsideMention=function(pa){'use strict';for(var qa=0;qa<this._offsets.length;qa++)if(pa>this._offsets[qa][0]&&pa<=this._offsets[qa][1])return true;return false;};oa.prototype._filterResults=function(pa){'use strict';if(this._filterData===null){var qa=r.get(this._input).start;if(this._offsetIsInsideMention(qa)){this._filterData={caretIsInsideMention:true};return false;}var ra=this._typeahead.getCore();this._filterData={value:ra.getValue(),rawValue:ra.getRawValue()};}if(this._filterData.caretIsInsideMention)return false;if(this._matchers.getMainMatcher().test(this._filterData.rawValue))return true;if(pa.type!='user'&&!pa.connected_page)return false;if(pa.disable_autosuggest)return false;if(this._matchersMode===ja.MENTIONS&&t.userMatcher.test(this._filterData.value))return true;return w.isExactMatch(this._filterData.value,this._typeahead.getData().getTextToIndex(pa));};oa.prototype._addToken=function(pa){'use strict';var qa=pa.uid;if(!this._mentioned.hasOwnProperty(qa)){this._mentioned[qa]=pa;var ra=this._orderedUIDs,sa=ha(this._getMarkedValue()),ta=sa.indexOf(ga(this._mentioned[qa].text)),ua=false,va=0;for(var wa=0;wa<ra.length;++wa){var xa=ga(this._mentioned[ra[wa]].text),ya=sa.indexOf(xa,va);va=ya+xa.length;if(ta<ya){this._orderedUIDs.splice(wa,0,qa);ua=true;break;}}if(!ua)this._orderedUIDs.push(qa);this._numMentioned++;this._update();}};oa.prototype._removeToken=function(pa){'use strict';if(this._mentioned.hasOwnProperty(pa)){delete this._mentioned[pa];aa(this._orderedUIDs,pa);this._numMentioned--;this._update();}};oa.prototype._update=function(pa){'use strict';pa=pa||{};var qa=this._getMarkedValue();this._checkShouldSwapDataSource(qa);if(qa==this._value)return;this._value=qa;this._updateTypeahead();this._updateMentions();this._updateWidth();setTimeout(this._updateDirection.bind(this),0);this.updateValue();var ra=this.hasAuxContent();this.inform('valueUpdate',{value:qa,hasAuxContent:ra});};oa.prototype._updateMentions=function(){'use strict';this._offsets=[];var pa=this._getMarkedValue(),qa=pa;for(var ra=0;ra<this._orderedUIDs.length;++ra){var sa=this._orderedUIDs[ra],ta=ga(this._mentioned[sa].text),ua=qa.indexOf(ta);if(ua==-1)this._removeToken(sa);qa=ka(qa,ta);this._offsets.push([ua,ua+ta.length]);}var va=pa;while((ua=qa.indexOf(ea))>-1){va=la(va,ua);qa=la(qa,ua);}if(pa!==va){var wa=r.get(this._input);q.setValue(this._input,va);r.set(this._input,wa.start);this._value=va;}};oa.prototype._renderHashtags=function(pa){'use strict';this._initHashtagParser(pa);if(!this._hasHashtags||!this._hashtagParser)return y(pa);this._hashtags=this._hashtagParser.parse(pa);var qa=[],ra=0;for(var sa=0;sa<this._hashtags.length;sa++){var ta=this._hashtags[sa];qa.push(y(pa.substring(ra,ta.rawOffset)),'<b>',ta.marker,ta.tag,'</b>');ra=ta.rawOffset+ta.marker.length+ta.tag.length;}qa.push(y(pa.substring(ra)));return qa.join('');};oa.prototype.updateValue=function(){'use strict';var pa=this._value=this._getMarkedValue(),qa=this._orderedUIDs,ra=ha(pa);for(var sa=0;sa<qa.length;++sa){var ta='@['+qa[sa]+':]',ua=ga(this._mentioned[qa[sa]].text);ra=ra.replace(ua,ta);pa=pa.replace(ua,ta);}var va=this._renderHashtags(pa);for(var sa=0;sa<qa.length;++sa){var wa=qa[sa],xa=this._mentioned[wa],ya=xa.text,za=xa.weakreference?'<b class="weak">':'<b>';va=va.replace('@['+wa+':]',za+y(ga(ya))+'</b>');ya=ya.replace(ia,function(bb){return '\\'+bb;});ra=ra.replace('@['+wa+':]','@['+wa+':'+ya+']');}var ab=ma(va);if(this._highlighterAuxContent||ab!==this._lastHighlighterHTML){if(x.ie()<9)va=va.replace(/ /g,na);this._highlighterContent.innerHTML=va;this._updateHighlighter();this._lastHighlighterHTML=ab;}this._hiddenInput.value=ra;this._updateHeight();};oa.prototype._updateDirection=function(){'use strict';var pa=v.get(this._input,'direction');if(pa==this._dir)return;this._dir=pa;v.set(this._highlighter,'direction',pa);if(pa=='rtl'){v.set(this._highlighter,'text-align','right');}else v.set(this._highlighter,'text-align','left');};oa.prototype._updateWidth=function(){'use strict';var pa=this._input.offsetWidth;if(pa===this._lastInputWidth)return;this._lastInputWidth=pa;var qa=v.getFloat.bind(null,this._input),ra=pa-qa('paddingLeft')-qa('paddingRight')-qa('borderLeftWidth')-qa('borderRightWidth');this._highlighterInner.style.width=Math.max(ra,0)+'px';};oa.prototype._updateHeight=function(){'use strict';if(this._highlighterAuxContent){var pa=this._highlighter.offsetHeight,qa=this._typeahead.getElement();if(pa>qa.offsetHeight){this._typeahead.setHeight(pa);h.inform('reflow');}}};oa.prototype._updateTypeahead=function(){'use strict';var pa=this._typeahead.getCore();pa.matcher=this._matchers.getAutoMatcher();pa.setExclusions(this._orderedUIDs);this.inform('update',{mentioned:this._mentioned});};oa.prototype.setPlaceholder=function(pa){'use strict';this._placeholder=pa instanceof o?pa.toString():pa;if(!this.hasAuxContent())q.setPlaceholder(this._input,this._placeholder);};oa.prototype._updateHighlighter=function(){'use strict';if(this._highlighterContent)k.conditionShow(this._highlighterContent,this._numMentioned>0||this.hasAuxContent()||this._hashtags.length);};oa.prototype.setAuxContent=function(pa){'use strict';if(this._highlighterContent){if(!this._highlighterAuxContent){this._highlighterAuxContent=m.create('span',{className:"highlighterAuxContent"});m.insertAfter(this._highlighterContent,this._highlighterAuxContent);}m.setContent(this._highlighterAuxContent,pa);if(pa){q.setPlaceholder(this._input,'');}else q.setPlaceholder(this._input,this._placeholder);this._value=null;this._update();this._updateHighlighter();this._updateHeight();}};oa.prototype.hasAuxContent=function(){'use strict';var pa=this.getAuxContentRoot();return pa&&k.shown(pa)&&pa.innerHTML.length>0;};oa.prototype.getAuxContentRoot=function(){'use strict';return this._highlighterAuxContent;};oa.prototype.addMention=function(pa,qa){'use strict';qa=typeof qa==='undefined'?true:qa;var ra=qa===false?'':' ',sa=this._getMarkedValue();if(sa!=='')sa+=' ';q.setValue(this._input,sa+ga(pa.text)+ra);this._addToken(pa);this._update();};oa.prototype.getMentions=function(){'use strict';return this._mentioned;};oa.prototype.bootloadHashtagParser=function(){'use strict';if(!this._hashtagParser)j.loadModules(["HashtagParser"],(function(pa){this._hashtagParser=pa;if(this._initialized){this._value=null;this._update();}}).bind(this));};oa.getInstance=function(pa){'use strict';var qa=u.byClass(pa,'uiMentionsInput');return qa?l.get(qa,'MentionsInput'):null;};oa.prototype._checkShouldSwapDataSource=function(pa){'use strict';this._initHashtagParser(pa);if(!this._hashtagsDataSource||!this._hashtagParser)return;var qa=this._isInsideHashtagToken(pa);if(this._matchersMode===ja.HASHTAGS&&!qa){this._setMatchersMode(ja.MENTIONS);this._swapData(this._mentionsDataSource);}else if(this._matchersMode===ja.MENTIONS&&qa){this._setMatchersMode(ja.HASHTAGS);this._swapData(this._hashtagsDataSource);}};oa.prototype._swapData=function(pa){'use strict';this._currentDataSource=pa;this._typeahead.swapDataNoCoreReset(this._currentDataSource);this._metrics.data=this._currentDataSource;this._metrics.initEvents();};oa.prototype._isInsideHashtagToken=function(pa){'use strict';this._hashtags=this._hashtagParser.parse(pa);var qa=r.get(this._input).start;for(var ra=0;ra<this._hashtags.length;ra++){var sa=this._hashtags[ra],ta=sa.offset;if(qa>=ta&&qa<=ta+sa.tag.length+1)return true;}return false;};oa.prototype._initHashtagParser=function(pa){'use strict';if(this._hashtagParser)return;if(this._matchers.getHashtagMatcher().exec(pa))this.bootloadHashtagParser();};oa.prototype._setMatchersMode=function(pa){'use strict';switch(pa){case ja.MENTIONS:this._matchers=t.mentionsMatchers;break;case ja.HASHTAGS:this._matchers=t.hashtagMatchers;break;default:throw new Error('MatchersMode enum is missing constant '+pa);}this._matchersMode=pa;};f.exports=oa;},null);
__d('legacy:MentionsInput',['MentionsInput'],function a(b,c,d,e){if(c.__markCompiled)c.__markCompiled();b.MentionsInput=c('MentionsInput');},3);
__d('TypeaheadAreaCore',['InputSelection','TextAreaControl','TypeaheadCore','emptyFunction'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();var l,m;l=babelHelpers.inherits(n,j);m=l&&l.prototype;function n(o){'use strict';m.constructor.call(this,o);this.matcher=new RegExp(this.matcher+'$');this.preventFocusChangeOnTab=true;}n.prototype.select=function(o){'use strict';m.select.call(this,o);var p=this.element.value,q=this.prefix+o.text+this.suffix;this.expandBounds(p,q);var r=p.substring(0,this.start),s=p.substring(this.end);this.element.value=r+q+s;h.set(this.element,r.length+q.length);};n.prototype.expandBounds=function(o,p){'use strict';o=o.toLowerCase();p=p.toLowerCase();var q,r,s,t,u=/\s/;r=o.substring(this.start,this.end);s=p.indexOf(r);q=this.start;while(q>=0&&s>=0){t=o.charAt(q-1);if(!t||u.test(t))this.start=q;r=t+r;s=p.indexOf(r);q--;}r=o.substring(this.start,this.end);s=p.indexOf(r);q=this.end;while(q<=o.length&&s>=0){t=o.charAt(q);if(!t||u.test(t))this.end=q;r=r+t;s=p.indexOf(r);q++;}};n.prototype.getRawValue=function(){'use strict';var o=h.get(this.element).start||0;return m.getValue.call(this).substring(0,o);};n.prototype.getValue=function(){'use strict';var o=this.matcher&&this.matcher.exec(this.getRawValue());if(!o)return '';var p=o[0],q=o.index+p.length;p=p.replace(/^\s/,'');var r=p.length;p=p.replace(/\s$/,'');var s=r-p.length;this.start=q-r;this.end=q+s;if(o[2]&&(o[2].charAt(0)==='#'||o[2].charAt(0)==='\\uFF03'))return o[2];return o[3]||o[1]||o[0];};n.prototype.updateHeight=function(){'use strict';var o=i.getInstance(this.element);o.updateHeight();};Object.assign(n.prototype,{prefix:'',suffix:', ',matcher:"\\b[^,]*",click:k});f.exports=n;},null);
__d('TypeaheadHoistFriends',[],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();function h(i){'use strict';this._typeahead=i;}h.prototype.enable=function(){'use strict';var i=this._typeahead.getView();this._subscription=i.subscribe('beforeRender',function(j,k){var l=[],m=[],n=[];for(var o=0;o<k.results.length;++o){var p=k.results[o];if(p.type=='header'){n=n.concat(m,l);n.push(p);m=[];l=[];}else if(p.type=='user'&&p.bootstrapped){m.push(p);}else l.push(p);}k.results=n.concat(m,l);});};h.prototype.disable=function(){'use strict';this._typeahead.getView().unsubscribe(this._subscription);this._subscription=null;};Object.assign(h.prototype,{_subscription:null});f.exports=h;},null);
__d('legacy:HoistFriendsTypeaheadBehavior',['TypeaheadHoistFriends'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();if(!b.TypeaheadBehaviors)b.TypeaheadBehaviors={};b.TypeaheadBehaviors.hoistFriends=function(i){i.enableBehavior(h);};},3);
__d("QueriesHistory",[],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();function h(i){"use strict";this.$QueriesHistory1=i;this.reset();}h.prototype.getQueries=function(){"use strict";return this.$QueriesHistory2;};h.prototype.getCurrentLength=function(){"use strict";return this.$QueriesHistory3;};h.prototype.add=function(i){"use strict";this.$QueriesHistory2.push(i);this.$QueriesHistory3+=i.length;while(this.$QueriesHistory2.length!==0&&this.$QueriesHistory3>this.$QueriesHistory1){var j=this.$QueriesHistory2.shift();this.$QueriesHistory3-=j.length;}};h.prototype.reset=function(){"use strict";this.$QueriesHistory3=0;this.$QueriesHistory2=[];};f.exports=h;},null);
__d('TypeaheadMetrics',['AsyncRequest','Event','QueriesHistory','emptyFunction'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();var l=1000;function m(n){'use strict';this.extraData={};Object.assign(this,n);}m.prototype.init=function(n){'use strict';this.init=k;this._initImpl(n);};m.prototype._initImpl=function(n){'use strict';this.core=n.getCore();this.view=n.getView();this.data=n.getData();this.queriesHistory=new j(l);this.stats={};this.sessionActive=false;this._sessionStartEvents=[];this._sessionEndEvents=[];this._reset();this.initEvents();};m.prototype._reset=function(){'use strict';this.log=[];this.stats={};this.avgStats={};this.sessionActive=false;this._setSid(Math.floor(Date.now()*Math.random()));this.request_ids=[];this.lastNotBackspacedQuery='';this.queriesHistory.reset();this._logEvent('session_started',{});};m.prototype._logEvent=function(n,o){'use strict';var p={type:n,data:o,time:Date.now()};this.log.push(p);};m.prototype._setSid=function(n){'use strict';this.sid=n;if(typeof this.data.queryData==='object'&&this.data.queryData!==null){this.data.queryData.sid=this.sid;}else this.data.setQueryData({sid:this.sid});if(typeof this.data.bootstrapData==='object'&&this.data.bootstrapData!==null){this.data.bootstrapData.sid=this.sid;}else this.data.setBootstrapData({sid:this.sid});};m.prototype.resetWithData=function(n){'use strict';this.init=k;this._initImpl(n);};m.prototype.resetWithDataBeforeSessionEnd=function(n){'use strict';var o=this.sessionActive;this.init=k;this._initImpl(n);this.sessionActive=o;};m.prototype.recordSelect=function(n){'use strict';var o=n.selected;if(o.uid==null){this.recordStat('selected_id','SELECT_NULL');}else this.recordStat('selected_id',o.uid);this.recordStat('selected_type',o.type);this.recordStat('selected_score',o.score);this.recordStat('selected_original_id',o.original_id);this.recordStat('place_id',o.place_id);this.recordStat('client_time',o.client_time);this.recordStat('selected_position',n.index);this.recordStat('selected_with_mouse',n.clicked?1:0);this.recordStat('selected_query',n.query);this._sessionEnd();};m.prototype.bindSessionStart=function(n,event,o){'use strict';if(o)for(var p=0;p<this._sessionStartEvents.length;++p){var q=this._sessionStartEvents[p];q.obj.unsubscribe(q.token);}this._sessionStartEvents.push({obj:n,token:n.subscribe(event,(function(r,s){this._sessionStart();}).bind(this))});};m.prototype.bindSessionEnd=function(n,event,o){'use strict';if(o)for(var p=0;p<this._sessionEndEvents.length;++p){var q=this._sessionEndEvents[p];q.obj.unsubscribe(q.token);}this._sessionEndEvents.push({obj:n,token:n.subscribe(event,(function(r,s){this._sessionEnd();}).bind(this))});};m.prototype.dataSubscribe=function(n,o){'use strict';var p=this.data,q=this.data.subscribe(n,o);this._dataSubscriptions.push(function(){p.unsubscribe(q);});};m.prototype.initEvents=function(){'use strict';this._dataSubscriptions=this._dataSubscriptions||[];this._dataSubscriptions.forEach(function(n){n();});this._dataSubscriptions=[];this.bindSessionStart(this.core,'focus',false);this.bindSessionEnd(this.core,'blur',false);this.view.subscribe('select',(function(n,o){this.recordSelect(o);}).bind(this));this.bindSessionEnd(this.view,'select',false);this.view.subscribe('render',(function(n,o){this.results=o;}).bind(this));this.dataSubscribe('beforeQuery',(function(n,o){this._logEvent('user_typed',{query:o.value});if(!o.value)return;this.query=o.value;this.queriesHistory.add(this.query);if(this.lastNotBackspacedQuery.indexOf(this.query)!==0)this.lastNotBackspacedQuery=this.query;this.recordCountStat('num_queries');}).bind(this));this.dataSubscribe('beforeFetch',(function(n,o){if(o.fetch_context.bootstrap){this.bootstrapBegin=Date.now();}else o.fetch_context.queryBegin=Date.now();this._logEvent('async_query_started',{query:o.fetch_context.value,request_id:o.fetch_context.request_id});}).bind(this));this.dataSubscribe('fetchComplete',(function(n,o){this._logEvent('async_query_completed',{query:o.fetch_context.value,request_id:o.fetch_context.request_id});if(o.fetch_context.bootstrap){this.recordAvgStat('bootstrap_latency',Date.now()-this.bootstrapBegin);var p={};o.response.payload.entries.forEach(function(q){if(!p[q.type]){p[q.type]=1;}else p[q.type]++;});this.recordStat('bootstrap_response_types',p);this.bootstrapped=true;}else{if('filtered_count' in o.response.payload)this.recordStat('filtered_count',o.response.payload.filtered_count);this.recordAvgStat('avg_query_latency',Date.now()-o.fetch_context.queryBegin);}}).bind(this));this.dataSubscribe('respond',(function(n,o){this._logEvent('respond',{query:o.value,num_results:o.results.length});var p=this.data.tokenizeBackend(o.value||'').flatValue,q=this.data.findBestPreviousQuery(p,this.data.getQueryIDs())||'',r=this.data.getQueryIDs()[q];this.normalized_backend_query=q;this.request_id=r;this.request_ids.push(r);}).bind(this));this.dataSubscribe('dirty',(function(n,o){this.bootstrapped=false;}).bind(this));};m.prototype._sessionStart=function(){'use strict';if(this.sessionActive)return;this.sessionActive=true;};m.prototype._sessionEnd=function(){'use strict';if(!this.sessionActive)return;this.sessionActive=false;this.submit();this._reset();};m.prototype.recordStat=function(n,o){'use strict';this.stats[n]=o;};m.prototype.recordCountStat=function(n){'use strict';var o=this.stats[n];this.stats[n]=o?o+1:1;};m.prototype.recordAvgStat=function(n,o){'use strict';if(this.avgStats[n]){this.avgStats[n][0]+=o;++this.avgStats[n][1];}else this.avgStats[n]=[o,1];};m.prototype.hasStats=function(){'use strict';return !!Object.keys(this.stats).length;};m.prototype.submit=function(){'use strict';if('log_all_sessions' in this.extraData||this.hasStats()){Object.assign(this.stats,this.extraData);if(this.results){var n=this.results.map(function(q,r){return q.uid;});this.recordStat('candidate_results',JSON.stringify(n));}if(this.query)this.recordStat('query',this.query);if(this.lastNotBackspacedQuery)this.recordStat('last_not_backspaced_query',this.lastNotBackspacedQuery);this.recordStat('queries_history',JSON.stringify(this.queriesHistory.getQueries()));if(this.normalized_backend_query)this.recordStat('normalized_backend_query',this.normalized_backend_query);if(this.request_id)this.recordStat('request_id',this.request_id);if(this.request_ids.length)this.recordStat('request_ids',this.request_ids);if(this.sid)this.recordStat('sid',this.sid);if(this.bootstrapped)this.recordStat('bootstrapped',1);for(var o in this.avgStats){var p=this.avgStats[o];this.stats[o]=p[0]/p[1];}this.recordStat('log',JSON.stringify(this.log));new h().setURI(this.endPoint).setMethod('POST').setData({stats:this.stats}).setErrorHandler(k).send();this._reset();}};m.register=function(n,o,p){'use strict';if(document.activeElement===n){o.init(p);}else var q=i.listen(n,'focus',function(){o.init(p);q.remove();});};Object.assign(m.prototype,{endPoint:'/ajax/typeahead/record_basic_metrics.php'});f.exports=m;},null);