/*!CK:1294584265!*//*1453403687,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["xPJz9"]); }

__d('ChatContentSearch',['AsyncRequest','MessengerPlatformQueryType','XMessengerPlatformContentSearchController'],function a(b,c,d,e,f,g,h,i,j){'use strict';if(c.__markCompiled)c.__markCompiled();var k={getContentForQuery:function(l){var m=l.query,n=l.callback,o=l.resume,p=j.getURIBuilder().setString('q',m).setString('resume',o).getURI(),q=new h().setURI(p).setHandler(n);q.send();return q;},getTrending:function(l,m){var n=j.getURIBuilder().setEnum('qtype',i.TRENDING).setString('resume',m).getURI(),o=new h().setURI(n).setHandler(l);o.send();return o;}};f.exports=k;},null);