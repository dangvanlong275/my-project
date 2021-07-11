;(function(){var block={newline:/^\n+/,code:/^( {4}[^\n]+\n*)+/,fences:noop,hr:/^( *[-*_]){3,} *(?:\n+|$)/,heading:/^ *(#{1,6}) *([^\n]+?) *#* *(?:\n+|$)/,nptable:noop,lheading:/^([^\n]+)\n *(=|-){2,} *(?:\n+|$)/,blockquote:/^( *>[^\n]+(\n[^\n]+)*\n*)+/,list:/^( *)(bull) [\s\S]+?(?:hr|\n{2,}(?! )(?!\1bull )\n*|\s*$)/,html:/^ *(?:comment|closed|closing) *(?:\n{2,}|\s*$)/,def:/^ *\[([^\]]+)\]: *<?([^\s>]+)>?(?: +["(]([^\n]+)[")])? *(?:\n+|$)/,table:noop,paragraph:/^((?:[^\n]+\n?(?!hr|heading|lheading|blockquote|tag|def))+)\n*/,text:/^[^\n]+/};block.bullet=/(?:[*+-]|\d+\.)/;block.item=/^( *)(bull) [^\n]*(?:\n(?!\1bull )[^\n]*)*/;block.item=replace(block.item,'gm')
(/bull/g,block.bullet)
();block.list=replace(block.list)
(/bull/g,block.bullet)
('hr',/\n+(?=(?: *[-*_]){3,} *(?:\n+|$))/)
();block._tag='(?!(?:'
+'a|em|strong|small|s|cite|q|dfn|abbr|data|time|code'
+'|var|samp|kbd|sub|sup|i|b|u|mark|ruby|rt|rp|bdi|bdo'
+'|span|br|wbr|ins|del|img)\\b)\\w+(?!:/|[^\\w\\s@]*@)\\b';block.html=replace(block.html)
('comment',/<!--[\s\S]*?-->/)
('closed',/<(tag)[\s\S]+?<\/\1>/)
('closing',/<tag(?:"[^"]*"|'[^']*'|[^'">])*?>/)
(/tag/g,block._tag)
();block.paragraph=replace(block.paragraph)
('hr',block.hr)
('heading',block.heading)
('lheading',block.lheading)
('blockquote',block.blockquote)
('tag','<'+block._tag)
('def',block.def)
();block.normal=merge({},block);block.gfm=merge({},block.normal,{fences:/^ *(`{3,}|~{3,}) *(\S+)? *\n([\s\S]+?)\s*\1 *(?:\n+|$)/,paragraph:/^/});block.gfm.paragraph=replace(block.paragraph)
('(?!','(?!'
+block.gfm.fences.source.replace('\\1','\\2')+'|'
+block.list.source.replace('\\1','\\3')+'|')
();block.tables=merge({},block.gfm,{nptable:/^ *(\S.*\|.*)\n *([-:]+ *\|[-| :]*)\n((?:.*\|.*(?:\n|$))*)\n*/,table:/^ *\|(.+)\n *\|( *[-:]+[-| :]*)\n((?: *\|.*(?:\n|$))*)\n*/});function Lexer(options){this.tokens=[];this.tokens.links={};this.options=options||marked.defaults;this.rules=block.normal;if(this.options.gfm){if(this.options.tables){this.rules=block.tables;}else{this.rules=block.gfm;}}}
Lexer.rules=block;Lexer.lex=function(src,options){var lexer=new Lexer(options);return lexer.lex(src);};Lexer.prototype.lex=function(src){src=src.replace(/\r\n|\r/g,'\n').replace(/\t/g,'    ').replace(/\u00a0/g,' ').replace(/\u2424/g,'\n');return this.token(src,true);};Lexer.prototype.token=function(src,top){var src=src.replace(/^ +$/gm,''),next,loose,cap,bull,b,item,space,i,l;while(src){if(cap=this.rules.newline.exec(src)){src=src.substring(cap[0].length);if(cap[0].length>1){this.tokens.push({type:'space'});}}
if(cap=this.rules.code.exec(src)){src=src.substring(cap[0].length);cap=cap[0].replace(/^ {4}/gm,'');this.tokens.push({type:'code',text:!this.options.pedantic?cap.replace(/\n+$/,''):cap});continue;}
if(cap=this.rules.fences.exec(src)){src=src.substring(cap[0].length);this.tokens.push({type:'code',lang:cap[2],text:cap[3]});continue;}
if(cap=this.rules.heading.exec(src)){src=src.substring(cap[0].length);this.tokens.push({type:'heading',depth:cap[1].length,text:cap[2]});continue;}
if(top&&(cap=this.rules.nptable.exec(src))){src=src.substring(cap[0].length);item={type:'table',header:cap[1].replace(/^ *| *\| *$/g,'').split(/ *\| */),align:cap[2].replace(/^ *|\| *$/g,'').split(/ *\| */),cells:cap[3].replace(/\n$/,'').split('\n')};for(i=0;i<item.align.length;i++){if(/^ *-+: *$/.test(item.align[i])){item.align[i]='right';}else if(/^ *:-+: *$/.test(item.align[i])){item.align[i]='center';}else if(/^ *:-+ *$/.test(item.align[i])){item.align[i]='left';}else{item.align[i]=null;}}
for(i=0;i<item.cells.length;i++){item.cells[i]=item.cells[i].split(/ *\| */);}
this.tokens.push(item);continue;}
if(cap=this.rules.lheading.exec(src)){src=src.substring(cap[0].length);this.tokens.push({type:'heading',depth:cap[2]==='='?1:2,text:cap[1]});continue;}
if(cap=this.rules.hr.exec(src)){src=src.substring(cap[0].length);this.tokens.push({type:'hr'});continue;}
if(cap=this.rules.blockquote.exec(src)){src=src.substring(cap[0].length);this.tokens.push({type:'blockquote_start'});cap=cap[0].replace(/^ *> ?/gm,'');this.token(cap,top);this.tokens.push({type:'blockquote_end'});continue;}
if(cap=this.rules.list.exec(src)){src=src.substring(cap[0].length);bull=cap[2];this.tokens.push({type:'list_start',ordered:bull.length>1});cap=cap[0].match(this.rules.item);next=false;l=cap.length;i=0;for(;i<l;i++){item=cap[i];space=item.length;item=item.replace(/^ *([*+-]|\d+\.) +/,'');if(~item.indexOf('\n ')){space-=item.length;item=!this.options.pedantic?item.replace(new RegExp('^ {1,'+space+'}','gm'),''):item.replace(/^ {1,4}/gm,'');}
if(this.options.smartLists&&i!==l-1){b=block.bullet.exec(cap[i+1])[0];if(bull!==b&&!(bull.length>1&&b.length>1)){src=cap.slice(i+1).join('\n')+src;i=l-1;}}
loose=next||/\n\n(?!\s*$)/.test(item);if(i!==l-1){next=item.charAt(item.length-1)==='\n';if(!loose)loose=next;}
this.tokens.push({type:loose?'loose_item_start':'list_item_start'});this.token(item,false);this.tokens.push({type:'list_item_end'});}
this.tokens.push({type:'list_end'});continue;}
if(cap=this.rules.html.exec(src)){src=src.substring(cap[0].length);this.tokens.push({type:this.options.sanitize?'paragraph':'html',pre:cap[1]==='pre'||cap[1]==='script'||cap[1]==='style',text:cap[0]});continue;}
if(top&&(cap=this.rules.def.exec(src))){src=src.substring(cap[0].length);this.tokens.links[cap[1].toLowerCase()]={href:cap[2],title:cap[3]};continue;}
if(top&&(cap=this.rules.table.exec(src))){src=src.substring(cap[0].length);item={type:'table',header:cap[1].replace(/^ *| *\| *$/g,'').split(/ *\| */),align:cap[2].replace(/^ *|\| *$/g,'').split(/ *\| */),cells:cap[3].replace(/(?: *\| *)?\n$/,'').split('\n')};for(i=0;i<item.align.length;i++){if(/^ *-+: *$/.test(item.align[i])){item.align[i]='right';}else if(/^ *:-+: *$/.test(item.align[i])){item.align[i]='center';}else if(/^ *:-+ *$/.test(item.align[i])){item.align[i]='left';}else{item.align[i]=null;}}
for(i=0;i<item.cells.length;i++){item.cells[i]=item.cells[i].replace(/^ *\| *| *\| *$/g,'').split(/ *\| */);}
this.tokens.push(item);continue;}
if(top&&(cap=this.rules.paragraph.exec(src))){src=src.substring(cap[0].length);this.tokens.push({type:'paragraph',text:cap[1].charAt(cap[1].length-1)==='\n'?cap[1].slice(0,-1):cap[1]});continue;}
if(cap=this.rules.text.exec(src)){src=src.substring(cap[0].length);this.tokens.push({type:'text',text:cap[0]});continue;}
if(src){throw new
Error('Infinite loop on byte: '+src.charCodeAt(0));}}
return this.tokens;};var inline={escape:/^\\([\\`*{}\[\]()#+\-.!_>])/,autolink:/^<([^ >]+(@|:\/)[^ >]+)>/,url:noop,tag:/^<!--[\s\S]*?-->|^<\/?\w+(?:"[^"]*"|'[^']*'|[^'">])*?>/,link:/^!?\[(inside)\]\(href\)/,reflink:/^!?\[(inside)\]\s*\[([^\]]*)\]/,nolink:/^!?\[((?:\[[^\]]*\]|[^\[\]])*)\]/,strong:/^__([\s\S]+?)__(?!_)|^\*\*([\s\S]+?)\*\*(?!\*)/,em:/^\b_((?:__|[\s\S])+?)_\b|^\*((?:\*\*|[\s\S])+?)\*(?!\*)/,code:/^(`+)\s*([\s\S]*?[^`])\s*\1(?!`)/,br:/^ {2,}\n(?!\s*$)/,del:noop,text:/^[\s\S]+?(?=[\\<!\[_*`]| {2,}\n|$)/};inline._inside=/(?:\[[^\]]*\]|[^\[\]]|\](?=[^\[]*\]))*/;inline._href=/\s*<?([\s\S]*?)>?(?:\s+['"]([\s\S]*?)['"])?\s*/;inline.link=replace(inline.link)
('inside',inline._inside)
('href',inline._href)
();inline.reflink=replace(inline.reflink)
('inside',inline._inside)
();inline.normal=merge({},inline);inline.pedantic=merge({},inline.normal,{strong:/^__(?=\S)([\s\S]*?\S)__(?!_)|^\*\*(?=\S)([\s\S]*?\S)\*\*(?!\*)/,em:/^_(?=\S)([\s\S]*?\S)_(?!_)|^\*(?=\S)([\s\S]*?\S)\*(?!\*)/});inline.gfm=merge({},inline.normal,{escape:replace(inline.escape)('])','~|])')(),url:/^(https?:\/\/[^\s<]+[^<.,:;"')\]\s])/,del:/^~~(?=\S)([\s\S]*?\S)~~/,text:replace(inline.text)
(']|','~]|')
('|','|https?://|')
()});inline.breaks=merge({},inline.gfm,{br:replace(inline.br)('{2,}','*')(),text:replace(inline.gfm.text)('{2,}','*')()});function InlineLexer(links,options){this.options=options||marked.defaults;this.links=links;this.rules=inline.normal;this.renderer=this.options.renderer||new Renderer;this.renderer.options=this.options;if(!this.links){throw new
Error('Tokens array requires a `links` property.');}
if(this.options.gfm){if(this.options.breaks){this.rules=inline.breaks;}else{this.rules=inline.gfm;}}else if(this.options.pedantic){this.rules=inline.pedantic;}}
InlineLexer.rules=inline;InlineLexer.output=function(src,links,options){var inline=new InlineLexer(links,options);return inline.output(src);};InlineLexer.prototype.output=function(src){var out='',link,text,href,cap;while(src){if(cap=this.rules.escape.exec(src)){src=src.substring(cap[0].length);out+=cap[1];continue;}
if(cap=this.rules.autolink.exec(src)){src=src.substring(cap[0].length);if(cap[2]==='@'){text=cap[1].charAt(6)===':'?this.mangle(cap[1].substring(7)):this.mangle(cap[1]);href=this.mangle('mailto:')+text;}else{text=escape(cap[1]);href=text;}
out+=this.renderer.link(href,null,text);continue;}
if(cap=this.rules.url.exec(src)){src=src.substring(cap[0].length);text=escape(cap[1]);href=text;out+=this.renderer.link(href,null,text);continue;}
if(cap=this.rules.tag.exec(src)){src=src.substring(cap[0].length);out+=this.options.sanitize?escape(cap[0]):cap[0];continue;}
if(cap=this.rules.link.exec(src)){src=src.substring(cap[0].length);out+=this.outputLink(cap,{href:cap[2],title:cap[3]});continue;}
if((cap=this.rules.reflink.exec(src))||(cap=this.rules.nolink.exec(src))){src=src.substring(cap[0].length);link=(cap[2]||cap[1]).replace(/\s+/g,' ');link=this.links[link.toLowerCase()];if(!link||!link.href){out+=cap[0].charAt(0);src=cap[0].substring(1)+src;continue;}
out+=this.outputLink(cap,link);continue;}
if(cap=this.rules.strong.exec(src)){src=src.substring(cap[0].length);out+=this.renderer.strong(this.output(cap[2]||cap[1]));continue;}
if(cap=this.rules.em.exec(src)){src=src.substring(cap[0].length);out+=this.renderer.em(this.output(cap[2]||cap[1]));continue;}
if(cap=this.rules.code.exec(src)){src=src.substring(cap[0].length);out+=this.renderer.codespan(escape(cap[2],true));continue;}
if(cap=this.rules.br.exec(src)){src=src.substring(cap[0].length);out+=this.renderer.br();continue;}
if(cap=this.rules.del.exec(src)){src=src.substring(cap[0].length);out+=this.renderer.del(this.output(cap[1]));continue;}
if(cap=this.rules.text.exec(src)){src=src.substring(cap[0].length);out+=escape(this.smartypants(cap[0]));continue;}
if(src){throw new
Error('Infinite loop on byte: '+src.charCodeAt(0));}}
return out;};InlineLexer.prototype.outputLink=function(cap,link){var href=escape(link.href),title=link.title?escape(link.title):null;return cap[0].charAt(0)!=='!'?this.renderer.link(href,title,this.output(cap[1])):this.renderer.image(href,title,escape(cap[1]));};InlineLexer.prototype.smartypants=function(text){if(!this.options.smartypants)return text;return text.replace(/--/g,'\u2014').replace(/(^|[-\u2014/(\[{"\s])'/g,'$1\u2018').replace(/'/g,'\u2019').replace(/(^|[-\u2014/(\[{\u2018\s])"/g,'$1\u201c').replace(/"/g,'\u201d').replace(/\.{3}/g,'\u2026');};InlineLexer.prototype.mangle=function(text){var out='',l=text.length,i=0,ch;for(;i<l;i++){ch=text.charCodeAt(i);if(Math.random()>0.5){ch='x'+ch.toString(16);}
out+='&#'+ch+';';}
return out;};function Renderer(options){this.options=options||{};}
Renderer.prototype.code=function(code,lang,escaped){if(this.options.highlight){var out=this.options.highlight(code,lang);if(out!=null&&out!==code){escaped=true;code=out;}}
if(!lang){return '<pre><code>'
+(escaped?code:escape(code,true))
+'\n</code></pre>';}
return '<pre><code class="'
+this.options.langPrefix
+escape(lang,true)
+'">'
+(escaped?code:escape(code,true))
+'\n</code></pre>\n';};Renderer.prototype.blockquote=function(quote){return '<blockquote>\n'+quote+'</blockquote>\n';};Renderer.prototype.html=function(html){return html;};Renderer.prototype.heading=function(text,level,raw){return '<h'
+level
+' id="'
+this.options.headerPrefix
+raw.toLowerCase().replace(/[^\w]+/g,'-')
+'">'
+text
+'</h'
+level
+'>\n';};Renderer.prototype.hr=function(){return '<hr>\n';};Renderer.prototype.list=function(body,ordered){var type=ordered?'ol':'ul';return '<'+type+'>\n'+body+'</'