CodeMirror.defineMode("markdown",function(cmCfg,modeCfg){var htmlFound=CodeMirror.modes.hasOwnProperty("xml");var htmlMode=CodeMirror.getMode(cmCfg,htmlFound?{name:"xml",htmlMode:true}:"text/plain");var aliases={html:"htmlmixed",js:"javascript",json:"application/json",c:"text/x-csrc","c++":"text/x-c++src",java:"text/x-java",csharp:"text/x-csharp","c#":"text/x-csharp",scala:"text/x-scala"};var getMode=(function(){var i,modes={},mimes={},mime;var list=[];for(var m in CodeMirror.modes)
if(CodeMirror.modes.propertyIsEnumerable(m))list.push(m);for(i=0;i<list.length;i++){modes[list[i]]=list[i];}
var mimesList=[];for(var m in CodeMirror.mimeModes)
if(CodeMirror.mimeModes.propertyIsEnumerable(m))
mimesList.push({mime:m,mode:CodeMirror.mimeModes[m]});for(i=0;i<mimesList.length;i++){mime=mimesList[i].mime;mimes[mime]=mimesList[i].mime;}
for(var a in aliases){if(aliases[a]in modes||aliases[a]in mimes)
modes[a]=aliases[a];}
return function(lang){return modes[lang]?CodeMirror.getMode(cmCfg,modes[lang]):null;};}());if(modeCfg.highlightFormatting===undefined)
modeCfg.highlightFormatting=false;if(modeCfg.maxBlockquoteDepth===undefined)
modeCfg.maxBlockquoteDepth=0;if(modeCfg.underscoresBreakWords===undefined)
modeCfg.underscoresBreakWords=true;if(modeCfg.fencedCodeBlocks===undefined)modeCfg.fencedCodeBlocks=false;if(modeCfg.taskLists===undefined)modeCfg.taskLists=false;var codeDepth=0;var header='header',code='comment',quote='quote',list1='variable-2',list2='variable-3',list3='keyword',hr='hr',image='tag',formatting='formatting',linkinline='link',linkemail='link',linktext='link',linkhref='string',em='em',strong='strong';var hrRE=/^([*\-=_])(?:\s*\1){2,}\s*$/,ulRE=/^[*\-+]\s+/,olRE=/^[0-9]+\.\s+/,taskListRE=/^\[(x| )\](?=\s)/,atxHeaderRE=/^#+/,setextHeaderRE=/^(?:\={1,}|-{1,})$/,textRE=/^[^#!\[\]*_\\<>` "'(]+/;function switchInline(stream,state,f){state.f=state.inline=f;return f(stream,state);}
function switchBlock(stream,state,f){state.f=state.block=f;return f(stream,state);}
function blankLine(state){state.linkTitle=false;state.em=false;state.strong=false;state.quote=0;if(!htmlFound&&state.f==htmlBlock){state.f=inlineNormal;state.block=blockNormal;}
state.trailingSpace=0;state.trailingSpaceNewLine=false;state.thisLineHasContent=false;return null;}
function blockNormal(stream,state){var sol=stream.sol();var prevLineIsList=(state.list!==false);if(state.list!==false&&state.indentationDiff>=0){if(state.indentationDiff<4){state.indentation-=state.indentationDiff;}
state.list=null;}else if(state.list!==false&&state.indentation>0){state.list=null;state.listDepth=Math.floor(state.indentation/4);}else if(state.list!==false){state.list=false;state.listDepth=0;}
var match=null;if(state.indentationDiff>=4){state.indentation-=4;stream.skipToEnd();return code;}else if(stream.eatSpace()){return null;}else if(match=stream.match(atxHeaderRE)){state.header=match[0].length<=6?match[0].length:6;if(modeCfg.highlightFormatting)state.formatting="header";state.f=state.inline;return getType(state);}else if(state.prevLineHasContent&&(match=stream.match(setextHeaderRE))){state.header=match[0].charAt(0)=='='?1:2;if(modeCfg.highlightFormatting)state.formatting="header";state.f=state.inline;return getType(state);}else if(stream.eat('>')){state.indentation++;state.quote=sol?1:state.quote+1;if(modeCfg.highlightFormatting)state.formatting="quote";stream.eatSpace();return getType(state);}else if(stream.peek()==='['){return switchInline(stream,state,footnoteLink);}else if(stream.match(hrRE,true)){return hr;}else if((!state.prevLineHasContent||prevLineIsList)&&(stream.match(ulRE,false)||stream.match(olRE,false))){var listType=null;if(stream.match(ulRE,true)){listType='ul';}else{stream.match(olRE,true);listType='ol';}
state.indentation+=4;state.list=true;state.listDepth++;if(modeCfg.taskLists&&stream.match(taskListRE,false)){state.taskList=true;}
state.f=state.inline;if(modeCfg.highlightFormatting)state.formatting=["list","list-"+listType];return getType(state);}else if(modeCfg.fencedCodeBlocks&&stream.match(/^```([\w+#]*)/,true)){state.localMode=getMode(RegExp.$1);if(state.localMode)state.localState=state.localMode.startState();switchBlock(stream,state,local);if(modeCfg.highlightFormatting)state.formatting="code-block";state.code=true;return getType(state);}
return switchInline(stream,state,state.inline);}
function htmlBlock(stream,state){var style=htmlMode.token(stream,state.htmlState);if((htmlFound&&!state.htmlState.tagName&&!state.htmlState.context)||(state.md_inside&&stream.current().indexOf(">")>-1)){state.f=inlineNormal;state.block=blockNormal;state.htmlState=null;}
return style;}
function local(stream,state){if(stream.sol()&&stream.match(/^```/,true)){state.localMode=state.localState=null;state.f=inlineNormal;state.block=blockNormal;if(modeCfg.highlightFormatting)state.formatting="code-block";state.code=true;var returnType=getType(state);state.code=false;return returnType;}else if(state.localMode){return state.localMode.token(stream,state.localState);}else{stream.skipToEnd();return code;}}
function getType(state){var styles=[];if(state.formatting){styles.push(formatting);if(typeof state.formatting==="string")state.formatting=[state.formatting];for(var i=0;i<state.formatting.length;i++){styles.push(formatting+"-"+state.formatting[i]);if(state.formatting[i]==="header"){styles.push(formatting+"-"+state.formatting[i]+state.header);}
if(state.formatting[i]==="quote"){if(!modeCfg.maxBlockquoteDepth||modeCfg.maxBlockquoteDepth>=state.quote){styles.push(formatting+"-"+state.formatting[i]+"-"+state.quote);}else{styles.push("error");}}}}
if(state.taskOpen){styles.push("meta");return styles.length?styles.join(' '):null;}
if(state.taskClosed){styles.push("property");return styles.length?styles.join(' '):null;}
if(state.linkHref){styles.push(linkhref);return styles.length?styles.join(' '):null;}
if(state.strong){styles.push(strong);}
if(state.em){styles.push(em);}
if(state.linkText){styles.push(linktext);}
if(state.code){styles.push(code);}
if(state.header){styles.push(header);styles.push(header+state.header);}
if(state.quote){styles.push(quote);if(!modeCfg.maxBlockquoteDepth||modeCfg.maxBlockquoteDepth>=state.quote){styles.push(quote+"-"+state.quote);}else{styles.push(quote+"-"+modeCfg.maxBlockquoteDepth);}}
if(state.list!==false){var listMod=(state.listDepth-1)%3;if(!listMod){styles.push(list1);}else if(listMod===1){styles.push(list2);}else{styles.push(list3);}}
if(state.trailingSpaceNewLine){styles.push("trailing-space-new-line");}else if(state.trailingSpace){styles.push("trailing-space-"+(state.trailingSpace%2?"a":"b"));}
return styles.length?styles.join(' '):null;}
function handleText(stream,state){if(stream.match(textRE,true)){return getType(state);}
return undefined;}
function inlineNormal(stream,state){var style=state.text(stream,state);if(typeof style!=='undefined')
return style;if(state.list){state.list=null;return getType(state);}
if(state.taskList){var taskOpen=stream.match(taskListRE,true)[1]!=="x";if(taskOpen)state.taskOpen=true;else state.taskClosed=true;if(modeCfg.highlightFormatting)state.formatting="task";state.taskList=false;return getType(state);}
state.taskOpen=false;state.taskClosed=false;if(state.header&&stream.match(/^#+$/,true)){if(modeCfg.highlightFormatting)state.formatting="header";return getType(state);}
var sol=stream.sol();var ch=stream.next();if(state.escape){state.escape=false;return getType(state);}
if(ch==='\\'){if(modeCfg.highlightFormatting)state.formatting="escape";state.escape=true;return getType(state);}
if(state.linkTitle){state.linkTitle=false;var matchCh=ch;if(ch==='('){matchCh=')';}
matchCh=(matchCh+'').replace(/([.?*+^$[\]\\(){}|-])/g,"\\$1");var regex='^\\s*(?:[^'+matchCh+'\\\\]+|\\\\\\\\|\\\\.)'+matchCh;if(stream.match(new RegExp(regex),true)){return linkhref;}}
if(ch==='`'){var previousFormatting=state.formatting;if(modeCfg.highlightFormatting)state.formatting="code";var t=getType(state);var before=stream.pos;stream.eatWhile('`');var difference=1+stream.pos-before;if(!state.code){codeDepth=difference;state.code=true;return getType(state);}else{if(difference===codeDepth){state.code=false;return t;}
state.formatting=previousFormatting;return getType(state);}}else if(state.code){return getType(state);}
if(ch==='!'&&stream.match(/\[[^\]]*\] ?(?:\(|\[)/,false)){stream.match(/\[[^\]]*\]/);state.inline=state.f=linkHref;return image;}
if(ch==='['&&stream.match(/.*\](\(| ?\[)/,false)){state.linkText=true;if(modeCfg.highlightFormatting)state.formatting="link";return getType(state);}
if(ch===']'&&state.linkText){if(modeCfg.highlightFormatting)state.formatting="link";var type=getType(state);state.linkText=false;state.inline=state.f=linkHref;return type;}
if(ch==='<'&&stream.match(/^(https?|ftps?):\/\/(?:[^\\>]|\\.)+>/,false)){state.f=state.inline=linkInline;if(modeCfg.highlightFormatting)state.formatting="link";var type=getType(state);if(type){type+=" ";}else{type="";}
return type+linkinline;}
if(ch==='<'&&stream.match(/^[^> \\]+@(?:[^\\>]|\\.)+>/,false)){state.f=state.inline=linkInline;if(modeCfg.highlightFormatting)state.formatting="link";var type=getType(state);if(type){type+=" ";}else{type="";}
return type+linkemail;}
if(ch==='<'&&stream.match(/^\w/,false)){if(stream.string.indexOf(">")!=-1){var atts=stream.string.substring(1,stream.string.indexOf(">"));if(/markdown\s*=\s*('|"){0,1}1('|"){0,1}/.test(atts)){state.md_inside=true;}}
stream.backUp(1);state.htmlState=CodeMirror.startState(htmlMode);return switchBlock(stream,state,htmlBlock);}
if(ch==='<'&&stream.match(/^\/\w*?>/)){state.md_inside=false;return "tag";}
var ignoreUnderscore=false;if(!modeCfg.underscoresBreakWords){if(ch==='_'&&stream.peek()!=='_'&&stream.match(/(\w)/,false)){var prevPos=stream.pos-2;if(prevPos>=0){var prevCh=stream.string.charAt(prevPos);if(prevCh!=='_'&&prevCh.match(/(\w)/,false)){ignoreUnderscore=true;}}}}
if(ch==='*'||(ch==='_'&&!ignoreUnderscore)){if(sol&&stream.peek()===' '){}else if(state.strong===ch&&stream.eat(ch)){if(modeCfg.highlightFormatting)state.formatting="strong";var t=getType(state);state.strong=false;return t;}else if(!state.strong&&stream.eat(ch)){state.strong=ch;if(modeCfg.highlightFormatting)state.formatting="strong";return getType(state);}else if(state.em===ch){if(modeCfg.highlightFormatting)state.formatting="em";var t=getType(state);state.em=false;return t;}else if(!state.em){state.em=ch;if(modeCfg.highlightFormatting)state.formatting="em";return getType(state);}}else if(ch===' '){if(stream.eat('*')||stream.eat('_')){if(stream.peek()===' '){return getType(state);}else{stream.backUp(1);}}}
if(ch===' '){if(stream.match(/ +$/,false)){state.trailingSpace++;}else if(state.trailingSpace){state.trailingSpaceNewLine=true;}}
return getType(state);}
function linkInline(stream,state){var ch=stream.next();if(ch===">"){state.f=state.inline=inlineNormal;if(modeCfg.highlightFormatting)state.formatting="link";var type=getType(state);if(type){type+=" ";}else{type="";}
return type+linkinline;}
stream.match(/^[^>]+/,true);return linkinline;}
function linkHref(stream,state){if(stream.eatSpace()){return null;}
var ch=stream.next();if(ch==='('||ch==='['){state.f=state.inline=getLinkHrefInside(ch==="("?")":"]");if(modeCfg.highlightFormatting)state.formatting="link-string";state.linkHref=true;return getType(state);}
return 'error';}
function getLinkHrefInside(endChar){return function(stream,state){var ch=stream.next();if(ch===endChar){state.f=state.inline=inlineNormal;if(modeCfg.highlightFormatting)state.formatting="link-string";var returnState=getType(state);state.linkHref=false;return returnState;}
if(stream.match(inlineRE(endChar),true)){stream.backUp(1);}
state.linkHref=true;return getType(state);};}
function footnoteLink(stream,state){if(stream.match(/^[^\]]*\]:/,false)){state.f=footnoteLinkInside;stream.next();if(modeCfg.highlightFormatting)state.formatting="link";state.linkText=true;return getType(state);}
return switchInline(stream,state,inlineNormal);}
function footnoteLinkInside(stream,state){if(stream.match(/^\]:/,true)){state.f=state.inline=footnoteUrl;if(modeCfg.highlightFormatting)state.formatting="link";var returnType=getType(state);state.linkText=false;return returnType;}
stream.match(/^[^\]]+/,true);return linktext;}
function footnoteUrl(stream,state){if(stream.eatSpace()){return null;}
stream.match(/^[^\s]+/,true);if(stream.peek()===undefined){state.linkTitle=true;}else{stream.match(/^(?:\s+(?:"(?:[^"\\]|\\\\|\\.)+"|'(?:[^'\\]|\\\\|\\.)+'|\((?:[^)\\]|\\\\|\\.)+\)))?/,true);}
state.f=state.inline=inlineNormal;return linkhref;}
var savedInlineRE=[];function inlineRE(endChar){if(!savedInlineRE[endChar]){endChar=(endChar+'').replace(/([.?*+^$[\]\\(){}|-])/g,"\\$1");savedInlineRE[endChar]=new RegExp('^(?:[^\\\\]|\\\\.)*?('+endChar+')');}
return savedInlineRE[endChar];}
var mode={startState:function(){return{f:blockNormal,prevLineHasContent:false,thisLineHasContent:false,block:blockNormal,htmlState:null,indentation:0,inline:inlineNormal,text:handleText,escape:false,formatting:false,linkText:false,linkHref:false,linkTitle:false,em:false,strong:false,header:0,taskList:false,list:false,listDepth:0,quote:0,trailingSpace:0,trailingSpaceNewLine:false};},copyState:function(s){return{f:s.f,prevLineHasContent:s.prevLineHasContent,thisLineHasContent:s.thisLineHasContent,block:s.block,htmlState:s.htmlState&&CodeMirror.copyState(htmlMode,s.htmlState),indentation:s.indentation,localMode:s.localMode,localState:s.localMode?CodeMirror.copyState(s.localMode,s.localState):null,inline:s.inline,text:s.text,escape:false,formatting:false,linkTitle:s.linkTitle,em:s.em,strong:s.strong,header:s.header,taskList:s.taskList,list:s.list,listDepth:s.listDepth,quote:s.quote,trailingSpace:s.trailingSpace,trailingSpaceNewLine:s.trailingSpaceNewLine,md_inside:s.md_inside};},token:function(stream,state){state.formatting=false;if(stream.sol()){var forceBlankLine=stream.match(/^\s*$/,true)||state.header;state.header=0;if(forceBlankLine){state.prevLineHasContent=false;return blankLine(state);}else{state.prevLineHasContent=state.thisLineHasContent;state.thisLineHasContent=true;}
state.escape=false;state.taskList=false;state.code=false;state.trailingSpace=0;state.trailingSpaceNewLine=false;state.f=state.block;var indentation=stream.match(/^\s*/,true)[0].replace(/\t/g,'    ').length;var difference=Math.floor((indentation-state.indentation)/4)*4;if(difference>4)difference=4;var adjustedIndentation=state.indentation+difference;state.indentationDiff=adjustedIndentation-state.indentation;state.indentation=adjustedIndentation;if(indentation>0)return null;}
return state.f(stream,state);},innerMode:function(state){if(state.block==htmlBlock)return{state:state.htmlState,mode:htmlMode};if(state.localState)return{state:state.localState,mode:state.localMode};return{state:state,mode:mode};},blankLine:blankLine,getType:getType};return mode;},"xml");CodeMirror.defineMIME("text/x-markdown","markdown");