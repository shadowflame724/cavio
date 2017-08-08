var mainScroll;

var inStartFooter = false;
var scrolledBottom = false;

var beCollScrolled = false;

var intervalNewProdDot;

var topMenuScroll;

var itemOffsetCollection;

var scrollFunc;

var wavesBg_1;

var view_HeaderFooter;
var allow_CustomScroll;

platformDef();
blendModeDef();

!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define([],e):"object"==typeof exports?exports.ScrollbarX=e():t.ScrollbarX=e()}(this,function(){return function(t){function e(r){if(n[r])return n[r].exports;var o=n[r]={exports:{},id:r,loaded:!1};return t[r].call(o.exports,o,o.exports,e),o.loaded=!0,o.exports}var n={};return e.m=t,e.c=n,e.p="",e(0)}([function(t,e,n){t.exports=n(1)},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}function o(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return(0,i.default)(t)}var i=r(n(2)),u=r(n(55)),a=r(n(62));Object.defineProperty(e,"__esModule",{value:!0});var c="function"==typeof a.default&&"symbol"==typeof u.default?function(t){return typeof t}:function(t){return t&&"function"==typeof a.default&&t.constructor===a.default&&t!==a.default.prototype?"symbol":typeof t},l=n(78),f=n(89);n(129),n(145),n(158),n(173),n(187),e.default=l.SmoothScrollbarX,l.SmoothScrollbarX.version="7.3.1",l.SmoothScrollbarX.init=function(t,e){if(!t||1!==t.nodeType)throw new TypeError("expect element to be DOM Element, but got "+(void 0===t?"undefined":c(t)));if(f.sbList.has(t))return f.sbList.get(t);t.setAttribute("data-scrollbar","");var n=[].concat(o(t.childNodes)),r=document.createElement("div");r.innerHTML='\n        <article class="scroll-content"></article>\n        <aside class="scrollbar-track scrollbar-track-x">\n            <div class="scrollbar-thumb scrollbar-thumb-x"></div>\n        </aside>\n        <aside class="scrollbar-track scrollbar-track-y">\n            <div class="scrollbar-thumb scrollbar-thumb-y"></div>\n        </aside>\n        <canvas class="overscroll-glow"></canvas>\n    ';var i=r.querySelector(".scroll-content");return[].concat(o(r.childNodes)).forEach(function(e){return t.appendChild(e)}),n.forEach(function(t){return i.appendChild(t)}),new l.SmoothScrollbarX(t,e)},l.SmoothScrollbarX.initAll=function(t){return[].concat(o(document.querySelectorAll(f.selectors))).map(function(e){return l.SmoothScrollbarX.init(e,t)})},l.SmoothScrollbarX.has=function(t){return f.sbList.has(t)},l.SmoothScrollbarX.get=function(t){return f.sbList.get(t)},l.SmoothScrollbarX.getAll=function(){return[].concat(o(f.sbList.values()))},l.SmoothScrollbarX.destroy=function(t,e){return l.SmoothScrollbarX.has(t)&&l.SmoothScrollbarX.get(t).destroy(e)},l.SmoothScrollbarX.destroyAll=function(t){f.sbList.forEach(function(e){e.destroy(t)})},t.exports=e.default},function(t,e,n){t.exports={default:n(3),__esModule:!0}},function(t,e,n){n(4),n(48),t.exports=n(12).Array.from},function(t,e,n){"use strict";var r=n(5)(!0);n(8)(String,"String",function(t){this._t=String(t),this._i=0},function(){var t,e=this._t,n=this._i;return n>=e.length?{value:void 0,done:!0}:(t=r(e,n),this._i+=t.length,{value:t,done:!1})})},function(t,e,n){var r=n(6),o=n(7);t.exports=function(t){return function(e,n){var i,u,a=String(o(e)),c=r(n),l=a.length;return c<0||c>=l?t?"":void 0:(i=a.charCodeAt(c),i<55296||i>56319||c+1===l||(u=a.charCodeAt(c+1))<56320||u>57343?t?a.charAt(c):i:t?a.slice(c,c+2):u-56320+(i-55296<<10)+65536)}}},function(t,e){var n=Math.ceil,r=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?r:n)(t)}},function(t,e){t.exports=function(t){if(void 0==t)throw TypeError("Can't call method on  "+t);return t}},function(t,e,n){"use strict";var r=n(9),o=n(10),i=n(25),u=n(15),a=n(26),c=n(27),l=n(28),f=n(44),s=n(46),d=n(45)("iterator"),h=!([].keys&&"next"in[].keys()),v="keys",_="values",p=function(){return this};t.exports=function(t,e,n,y,b,g,m){l(n,e,y);var x,S,E,M=function(t){if(!h&&t in k)return k[t];switch(t){case v:case _:return function(){return new n(this,t)}}return function(){return new n(this,t)}},O=e+" Iterator",w=b==_,P=!1,k=t.prototype,j=k[d]||k["@@iterator"]||b&&k[b],T=j||M(b),A=b?w?M("entries"):T:void 0,R="Array"==e?k.entries||j:j;if(R&&(E=s(R.call(new t)))!==Object.prototype&&(f(E,O,!0),r||a(E,d)||u(E,d,p)),w&&j&&j.name!==_&&(P=!0,T=function(){return j.call(this)}),r&&!m||!h&&!P&&k[d]||u(k,d,T),c[e]=T,c[O]=p,b)if(x={values:w?T:M(_),keys:g?T:M(v),entries:A},m)for(S in x)S in k||i(k,S,x[S]);else o(o.P+o.F*(h||P),e,x);return x}},function(t,e){t.exports=!0},function(t,e,n){var r=n(11),o=n(12),i=n(13),u=n(15),a="prototype",c=function(t,e,n){var l,f,s,d=t&c.F,h=t&c.G,v=t&c.S,_=t&c.P,p=t&c.B,y=t&c.W,b=h?o:o[e]||(o[e]={}),g=b[a],m=h?r:v?r[e]:(r[e]||{})[a];h&&(n=e);for(l in n)(f=!d&&m&&void 0!==m[l])&&l in b||(s=f?m[l]:n[l],b[l]=h&&"function"!=typeof m[l]?n[l]:p&&f?i(s,r):y&&m[l]==s?function(t){var e=function(e,n,r){if(this instanceof t){switch(arguments.length){case 0:return new t;case 1:return new t(e);case 2:return new t(e,n)}return new t(e,n,r)}return t.apply(this,arguments)};return e[a]=t[a],e}(s):_&&"function"==typeof s?i(Function.call,s):s,_&&((b.virtual||(b.virtual={}))[l]=s,t&c.R&&g&&!g[l]&&u(g,l,s)))};c.F=1,c.G=2,c.S=4,c.P=8,c.B=16,c.W=32,c.U=64,c.R=128,t.exports=c},function(t,e){var n=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=n)},function(t,e){var n=t.exports={version:"2.4.0"};"number"==typeof __e&&(__e=n)},function(t,e,n){var r=n(14);t.exports=function(t,e,n){if(r(t),void 0===e)return t;switch(n){case 1:return function(n){return t.call(e,n)};case 2:return function(n,r){return t.call(e,n,r)};case 3:return function(n,r,o){return t.call(e,n,r,o)}}return function(){return t.apply(e,arguments)}}},function(t,e){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},function(t,e,n){var r=n(16),o=n(24);t.exports=n(20)?function(t,e,n){return r.f(t,e,o(1,n))}:function(t,e,n){return t[e]=n,t}},function(t,e,n){var r=n(17),o=n(19),i=n(23),u=Object.defineProperty;e.f=n(20)?Object.defineProperty:function(t,e,n){if(r(t),e=i(e,!0),r(n),o)try{return u(t,e,n)}catch(t){}if("get"in n||"set"in n)throw TypeError("Accessors not supported!");return"value"in n&&(t[e]=n.value),t}},function(t,e,n){var r=n(18);t.exports=function(t){if(!r(t))throw TypeError(t+" is not an object!");return t}},function(t,e){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},function(t,e,n){t.exports=!n(20)&&!n(21)(function(){return 7!=Object.defineProperty(n(22)("div"),"a",{get:function(){return 7}}).a})},function(t,e,n){t.exports=!n(21)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(t,e){t.exports=function(t){try{return!!t()}catch(t){return!0}}},function(t,e,n){var r=n(18),o=n(11).document,i=r(o)&&r(o.createElement);t.exports=function(t){return i?o.createElement(t):{}}},function(t,e,n){var r=n(18);t.exports=function(t,e){if(!r(t))return t;var n,o;if(e&&"function"==typeof(n=t.toString)&&!r(o=n.call(t)))return o;if("function"==typeof(n=t.valueOf)&&!r(o=n.call(t)))return o;if(!e&&"function"==typeof(n=t.toString)&&!r(o=n.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},function(t,e){t.exports=function(t,e){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:e}}},function(t,e,n){t.exports=n(15)},function(t,e){var n={}.hasOwnProperty;t.exports=function(t,e){return n.call(t,e)}},function(t,e){t.exports={}},function(t,e,n){"use strict";var r=n(29),o=n(24),i=n(44),u={};n(15)(u,n(45)("iterator"),function(){return this}),t.exports=function(t,e,n){t.prototype=r(u,{next:o(1,n)}),i(t,e+" Iterator")}},function(t,e,n){var r=n(17),o=n(30),i=n(42),u=n(39)("IE_PROTO"),a=function(){},c="prototype",l=function(){var t,e=n(22)("iframe"),r=i.length;for(e.style.display="none",n(43).appendChild(e),e.src="javascript:",(t=e.contentWindow.document).open(),t.write("<script>document.F=Object<\/script>"),t.close(),l=t.F;r--;)delete l[c][i[r]];return l()};t.exports=Object.create||function(t,e){var n;return null!==t?(a[c]=r(t),n=new a,a[c]=null,n[u]=t):n=l(),void 0===e?n:o(n,e)}},function(t,e,n){var r=n(16),o=n(17),i=n(31);t.exports=n(20)?Object.defineProperties:function(t,e){o(t);for(var n,u=i(e),a=u.length,c=0;a>c;)r.f(t,n=u[c++],e[n]);return t}},function(t,e,n){var r=n(32),o=n(42);t.exports=Object.keys||function(t){return r(t,o)}},function(t,e,n){var r=n(26),o=n(33),i=n(36)(!1),u=n(39)("IE_PROTO");t.exports=function(t,e){var n,a=o(t),c=0,l=[];for(n in a)n!=u&&r(a,n)&&l.push(n);for(;e.length>c;)r(a,n=e[c++])&&(~i(l,n)||l.push(n));return l}},function(t,e,n){var r=n(34),o=n(7);t.exports=function(t){return r(o(t))}},function(t,e,n){var r=n(35);t.exports=Object("z").propertyIsEnumerable(0)?Object:function(t){return"String"==r(t)?t.split(""):Object(t)}},function(t,e){var n={}.toString;t.exports=function(t){return n.call(t).slice(8,-1)}},function(t,e,n){var r=n(33),o=n(37),i=n(38);t.exports=function(t){return function(e,n,u){var a,c=r(e),l=o(c.length),f=i(u,l);if(t&&n!=n){for(;l>f;)if((a=c[f++])!=a)return!0}else for(;l>f;f++)if((t||f in c)&&c[f]===n)return t||f||0;return!t&&-1}}},function(t,e,n){var r=n(6),o=Math.min;t.exports=function(t){return t>0?o(r(t),9007199254740991):0}},function(t,e,n){var r=n(6),o=Math.max,i=Math.min;t.exports=function(t,e){return t=r(t),t<0?o(t+e,0):i(t,e)}},function(t,e,n){var r=n(40)("keys"),o=n(41);t.exports=function(t){return r[t]||(r[t]=o(t))}},function(t,e,n){var r=n(11),o="__core-js_shared__",i=r[o]||(r[o]={});t.exports=function(t){return i[t]||(i[t]={})}},function(t,e){var n=0,r=Math.random();t.exports=function(t){return"Symbol(".concat(void 0===t?"":t,")_",(++n+r).toString(36))}},function(t,e){t.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(t,e,n){t.exports=n(11).document&&document.documentElement},function(t,e,n){var r=n(16).f,o=n(26),i=n(45)("toStringTag");t.exports=function(t,e,n){t&&!o(t=n?t:t.prototype,i)&&r(t,i,{configurable:!0,value:e})}},function(t,e,n){var r=n(40)("wks"),o=n(41),i=n(11).Symbol,u="function"==typeof i;(t.exports=function(t){return r[t]||(r[t]=u&&i[t]||(u?i:o)("Symbol."+t))}).store=r},function(t,e,n){var r=n(26),o=n(47),i=n(39)("IE_PROTO"),u=Object.prototype;t.exports=Object.getPrototypeOf||function(t){return t=o(t),r(t,i)?t[i]:"function"==typeof t.constructor&&t instanceof t.constructor?t.constructor.prototype:t instanceof Object?u:null}},function(t,e,n){var r=n(7);t.exports=function(t){return Object(r(t))}},function(t,e,n){"use strict";var r=n(13),o=n(10),i=n(47),u=n(49),a=n(50),c=n(37),l=n(51),f=n(52);o(o.S+o.F*!n(54)(function(t){Array.from(t)}),"Array",{from:function(t){var e,n,o,s,d=i(t),h="function"==typeof this?this:Array,v=arguments.length,_=v>1?arguments[1]:void 0,p=void 0!==_,y=0,b=f(d);if(p&&(_=r(_,v>2?arguments[2]:void 0,2)),void 0==b||h==Array&&a(b))for(e=c(d.length),n=new h(e);e>y;y++)l(n,y,p?_(d[y],y):d[y]);else for(s=b.call(d),n=new h;!(o=s.next()).done;y++)l(n,y,p?u(s,_,[o.value,y],!0):o.value);return n.length=y,n}})},function(t,e,n){var r=n(17);t.exports=function(t,e,n,o){try{return o?e(r(n)[0],n[1]):e(n)}catch(e){var i=t.return;throw void 0!==i&&r(i.call(t)),e}}},function(t,e,n){var r=n(27),o=n(45)("iterator"),i=Array.prototype;t.exports=function(t){return void 0!==t&&(r.Array===t||i[o]===t)}},function(t,e,n){"use strict";var r=n(16),o=n(24);t.exports=function(t,e,n){e in t?r.f(t,e,o(0,n)):t[e]=n}},function(t,e,n){var r=n(53),o=n(45)("iterator"),i=n(27);t.exports=n(12).getIteratorMethod=function(t){if(void 0!=t)return t[o]||t["@@iterator"]||i[r(t)]}},function(t,e,n){var r=n(35),o=n(45)("toStringTag"),i="Arguments"==r(function(){return arguments}()),u=function(t,e){try{return t[e]}catch(t){}};t.exports=function(t){var e,n,a;return void 0===t?"Undefined":null===t?"Null":"string"==typeof(n=u(e=Object(t),o))?n:i?r(e):"Object"==(a=r(e))&&"function"==typeof e.callee?"Arguments":a}},function(t,e,n){var r=n(45)("iterator"),o=!1;try{var i=[7][r]();i.return=function(){o=!0},Array.from(i,function(){throw 2})}catch(t){}t.exports=function(t,e){if(!e&&!o)return!1;var n=!1;try{var i=[7],u=i[r]();u.next=function(){return{done:n=!0}},i[r]=function(){return u},t(i)}catch(t){}return n}},function(t,e,n){t.exports={default:n(56),__esModule:!0}},function(t,e,n){n(4),n(57),t.exports=n(61).f("iterator")},function(t,e,n){n(58);for(var r=n(11),o=n(15),i=n(27),u=n(45)("toStringTag"),a=["NodeList","DOMTokenList","MediaList","StyleSheetList","CSSRuleList"],c=0;c<5;c++){var l=a[c],f=r[l],s=f&&f.prototype;s&&!s[u]&&o(s,u,l),i[l]=i.Array}},function(t,e,n){"use strict";var r=n(59),o=n(60),i=n(27),u=n(33);t.exports=n(8)(Array,"Array",function(t,e){this._t=u(t),this._i=0,this._k=e},function(){var t=this._t,e=this._k,n=this._i++;return!t||n>=t.length?(this._t=void 0,o(1)):"keys"==e?o(0,n):"values"==e?o(0,t[n]):o(0,[n,t[n]])},"values"),i.Arguments=i.Array,r("keys"),r("values"),r("entries")},function(t,e){t.exports=function(){}},function(t,e){t.exports=function(t,e){return{value:e,done:!!t}}},function(t,e,n){e.f=n(45)},function(t,e,n){t.exports={default:n(63),__esModule:!0}},function(t,e,n){n(64),n(75),n(76),n(77),t.exports=n(12).Symbol},function(t,e,n){"use strict";var r=n(11),o=n(26),i=n(20),u=n(10),a=n(25),c=n(65).KEY,l=n(21),f=n(40),s=n(44),d=n(41),h=n(45),v=n(61),_=n(66),p=n(67),y=n(68),b=n(71),g=n(17),m=n(33),x=n(23),S=n(24),E=n(29),M=n(72),O=n(74),w=n(16),P=n(31),k=O.f,j=w.f,T=M.f,A=r.Symbol,R=r.JSON,L=R&&R.stringify,X="prototype",I=h("_hidden"),D=h("toPrimitive"),C={}.propertyIsEnumerable,N=f("symbol-registry"),F=f("symbols"),H=f("op-symbols"),z=Object[X],B="function"==typeof A,G=r.QObject,W=!G||!G[X]||!G[X].findChild,V=i&&l(function(){return 7!=E(j({},"a",{get:function(){return j(this,"a",{value:7}).a}})).a})?function(t,e,n){var r=k(z,e);r&&delete z[e],j(t,e,n),r&&t!==z&&j(z,e,r)}:j,U=function(t){var e=F[t]=E(A[X]);return e._k=t,e},q=B&&"symbol"==typeof A.iterator?function(t){return"symbol"==typeof t}:function(t){return t instanceof A},K=function(t,e,n){return t===z&&K(H,e,n),g(t),e=x(e,!0),g(n),o(F,e)?(n.enumerable?(o(t,I)&&t[I][e]&&(t[I][e]=!1),n=E(n,{enumerable:S(0,!1)})):(o(t,I)||j(t,I,S(1,{})),t[I][e]=!0),V(t,e,n)):j(t,e,n)},J=function(t,e){g(t);for(var n,r=y(e=m(e)),o=0,i=r.length;i>o;)K(t,n=r[o++],e[n]);return t},Y=function(t,e){return void 0===e?E(t):J(E(t),e)},Q=function(t){var e=C.call(this,t=x(t,!0));return!(this===z&&o(F,t)&&!o(H,t))&&(!(e||!o(this,t)||!o(F,t)||o(this,I)&&this[I][t])||e)},Z=function(t,e){if(t=m(t),e=x(e,!0),t!==z||!o(F,e)||o(H,e)){var n=k(t,e);return!n||!o(F,e)||o(t,I)&&t[I][e]||(n.enumerable=!0),n}},$=function(t){for(var e,n=T(m(t)),r=[],i=0;n.length>i;)o(F,e=n[i++])||e==I||e==c||r.push(e);return r},tt=function(t){for(var e,n=t===z,r=T(n?H:m(t)),i=[],u=0;r.length>u;)!o(F,e=r[u++])||n&&!o(z,e)||i.push(F[e]);return i};B||(A=function(){if(this instanceof A)throw TypeError("Symbol is not a constructor!");var t=d(arguments.length>0?arguments[0]:void 0),e=function(n){this===z&&e.call(H,n),o(this,I)&&o(this[I],t)&&(this[I][t]=!1),V(this,t,S(1,n))};return i&&W&&V(z,t,{configurable:!0,set:e}),U(t)},a(A[X],"toString",function(){return this._k}),O.f=Z,w.f=K,n(73).f=M.f=$,n(70).f=Q,n(69).f=tt,i&&!n(9)&&a(z,"propertyIsEnumerable",Q,!0),v.f=function(t){return U(h(t))}),u(u.G+u.W+u.F*!B,{Symbol:A});for(var et="hasInstance,isConcatSpreadable,iterator,match,replace,search,species,split,toPrimitive,toStringTag,unscopables".split(","),nt=0;et.length>nt;)h(et[nt++]);for(var et=P(h.store),nt=0;et.length>nt;)_(et[nt++]);u(u.S+u.F*!B,"Symbol",{for:function(t){return o(N,t+="")?N[t]:N[t]=A(t)},keyFor:function(t){if(q(t))return p(N,t);throw TypeError(t+" is not a symbol!")},useSetter:function(){W=!0},useSimple:function(){W=!1}}),u(u.S+u.F*!B,"Object",{create:Y,defineProperty:K,defineProperties:J,getOwnPropertyDescriptor:Z,getOwnPropertyNames:$,getOwnPropertySymbols:tt}),R&&u(u.S+u.F*(!B||l(function(){var t=A();return"[null]"!=L([t])||"{}"!=L({a:t})||"{}"!=L(Object(t))})),"JSON",{stringify:function(t){if(void 0!==t&&!q(t)){for(var e,n,r=[t],o=1;arguments.length>o;)r.push(arguments[o++]);return"function"==typeof(e=r[1])&&(n=e),!n&&b(e)||(e=function(t,e){if(n&&(e=n.call(this,t,e)),!q(e))return e}),r[1]=e,L.apply(R,r)}}}),A[X][D]||n(15)(A[X],D,A[X].valueOf),s(A,"Symbol"),s(Math,"Math",!0),s(r.JSON,"JSON",!0)},function(t,e,n){var r=n(41)("meta"),o=n(18),i=n(26),u=n(16).f,a=0,c=Object.isExtensible||function(){return!0},l=!n(21)(function(){return c(Object.preventExtensions({}))}),f=function(t){u(t,r,{value:{i:"O"+ ++a,w:{}}})},s=function(t,e){if(!o(t))return"symbol"==typeof t?t:("string"==typeof t?"S":"P")+t;if(!i(t,r)){if(!c(t))return"F";if(!e)return"E";f(t)}return t[r].i},d=function(t,e){if(!i(t,r)){if(!c(t))return!0;if(!e)return!1;f(t)}return t[r].w},h=function(t){return l&&v.NEED&&c(t)&&!i(t,r)&&f(t),t},v=t.exports={KEY:r,NEED:!1,fastKey:s,getWeak:d,onFreeze:h}},function(t,e,n){var r=n(11),o=n(12),i=n(9),u=n(61),a=n(16).f;t.exports=function(t){var e=o.Symbol||(o.Symbol=i?{}:r.Symbol||{});"_"==t.charAt(0)||t in e||a(e,t,{value:u.f(t)})}},function(t,e,n){var r=n(31),o=n(33);t.exports=function(t,e){for(var n,i=o(t),u=r(i),a=u.length,c=0;a>c;)if(i[n=u[c++]]===e)return n}},function(t,e,n){var r=n(31),o=n(69),i=n(70);t.exports=function(t){var e=r(t),n=o.f;if(n)for(var u,a=n(t),c=i.f,l=0;a.length>l;)c.call(t,u=a[l++])&&e.push(u);return e}},function(t,e){e.f=Object.getOwnPropertySymbols},function(t,e){e.f={}.propertyIsEnumerable},function(t,e,n){var r=n(35);t.exports=Array.isArray||function(t){return"Array"==r(t)}},function(t,e,n){var r=n(33),o=n(73).f,i={}.toString,u="object"==typeof window&&window&&Object.getOwnPropertyNames?Object.getOwnPropertyNames(window):[],a=function(t){try{return o(t)}catch(t){return u.slice()}};t.exports.f=function(t){return u&&"[object Window]"==i.call(t)?a(t):o(r(t))}},function(t,e,n){var r=n(32),o=n(42).concat("length","prototype");e.f=Object.getOwnPropertyNames||function(t){return r(t,o)}},function(t,e,n){var r=n(70),o=n(24),i=n(33),u=n(23),a=n(26),c=n(19),l=Object.getOwnPropertyDescriptor;e.f=n(20)?l:function(t,e){if(t=i(t),e=u(e,!0),c)try{return l(t,e)}catch(t){}if(a(t,e))return o(!r.f.call(t,e),t[e])}},function(t,e){},function(t,e,n){n(66)("asyncIterator")},function(t,e,n){n(66)("observable")},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}function o(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}var i=r(n(79)),u=r(n(82)),a=r(n(86));Object.defineProperty(e,"__esModule",{value:!0}),e.SmoothScrollbarX=void 0;var c=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),(0,a.default)(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),l=n(89),f=n(112);e.SmoothScrollbarX=function(){function t(e){var n=this,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};o(this,t),e.setAttribute("tabindex","1"),e.scrollTop=e.scrollLeft=0;var a=(0,f.findChild)(e,"scroll-content"),c=(0,f.findChild)(e,"overscroll-glow"),s=(0,f.findChild)(e,"scrollbar-track-x"),d=(0,f.findChild)(e,"scrollbar-track-y");if((0,f.setStyle)(e,{overflow:"hidden",outline:"none"}),(0,f.setStyle)(c,{display:"none","pointer-events":"none"}),this.__readonly("targets",(0,u.default)({container:e,content:a,canvas:{elem:c,context:c.getContext("2d")},xAxis:(0,u.default)({track:s,thumb:(0,f.findChild)(s,"scrollbar-thumb-x")}),yAxis:(0,u.default)({track:d,thumb:(0,f.findChild)(d,"scrollbar-thumb-y")})})).__readonly("offset",{x:0,y:0}).__readonly("thumbOffset",{x:0,y:0}).__readonly("limit",{x:1/0,y:1/0}).__readonly("movement",{x:0,y:0}).__readonly("movementLocked",{x:!1,y:!1}).__readonly("overscrollRendered",{x:0,y:0}).__readonly("overscrollBack",!1).__readonly("thumbSize",{x:0,y:0,realX:0,realY:0}).__readonly("bounding",{top:0,right:0,bottom:0,left:0}).__readonly("children",[]).__readonly("parents",[]).__readonly("size",this.getSize()).__readonly("isNestedScrollbarX",!1),(0,i.default)(this,{__hideTrackThrottle:{value:(0,f.debounce)(this.hideTrack.bind(this),1e3,!1)},__updateThrottle:{value:(0,f.debounce)(this.update.bind(this))},__touchRecord:{value:new f.TouchRecord},__listeners:{value:[]},__handlers:{value:[]},__children:{value:[]},__timerID:{value:{}}}),this.__initOptions(r),this.__initScrollbarX(),l.sbList.set(e,this),"function"==typeof l.GLOBAL_ENV.MutationObserver){var h=new l.GLOBAL_ENV.MutationObserver(function(){n.update(!0)});h.observe(a,{childList:!0}),Object.defineProperty(this,"__observer",{value:h})}}return c(t,[{key:"MAX_OVERSCROLL",get:function(){var t=this.options,e=this.size;switch(t.overscrollEffect){case"bounce":var n=Math.floor(Math.sqrt(Math.pow(e.container.width,2)+Math.pow(e.container.height,2))),r=this.__isMovementLocked()?2:10;return l.GLOBAL_ENV.TOUCH_SUPPORTED?(0,f.pickInRange)(n/r,100,1e3):(0,f.pickInRange)(n/10,25,50);case"glow":return 150;default:return 0}}},{key:"scrollTop",get:function(){return this.offset.y}},{key:"scrollLeft",get:function(){return this.offset.x}}]),t}()},function(t,e,n){t.exports={default:n(80),__esModule:!0}},function(t,e,n){n(81);var r=n(12).Object;t.exports=function(t,e){return r.defineProperties(t,e)}},function(t,e,n){var r=n(10);r(r.S+r.F*!n(20),"Object",{defineProperties:n(30)})},function(t,e,n){t.exports={default:n(83),__esModule:!0}},function(t,e,n){n(84),t.exports=n(12).Object.freeze},function(t,e,n){var r=n(18),o=n(65).onFreeze;n(85)("freeze",function(t){return function(e){return t&&r(e)?t(o(e)):e}})},function(t,e,n){var r=n(10),o=n(12),i=n(21);t.exports=function(t,e){var n=(o.Object||{})[t]||Object[t],u={};u[t]=e(n),r(r.S+r.F*i(function(){n(1)}),"Object",u)}},function(t,e,n){t.exports={default:n(87),__esModule:!0}},function(t,e,n){n(88);var r=n(12).Object;t.exports=function(t,e,n){return r.defineProperty(t,e,n)}},function(t,e,n){var r=n(10);r(r.S+r.F*!n(20),"Object",{defineProperty:n(16).f})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(93);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})})},function(t,e,n){t.exports={default:n(91),__esModule:!0}},function(t,e,n){n(92),t.exports=n(12).Object.keys},function(t,e,n){var r=n(47),o=n(31);n(85)("keys",function(){return function(t){return o(r(t))}})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(94);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})});var a=n(95);(0,i.default)(a).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return a[t]}})});var c=n(111);(0,i.default)(c).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return c[t]}})})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u={MutationObserver:function(){return window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver},TOUCH_SUPPORTED:function(){return"ontouchstart"in document},EASING_MULTIPLIER:function(){return navigator.userAgent.match(/Android/)?.5:.25},WHEEL_EVENT:function(){return"onwheel"in window?"wheel":"mousewheel"}};e.GLOBAL_ENV=function(t){var e={},n={};return(0,i.default)(t).forEach(function(r){(0,o.default)(e,r,{get:function(){if(!n.hasOwnProperty(r)){var e=t[r];n[r]=e()}return n[r]}})}),e}(u)},function(t,e,n){"use strict";var r=function(t){return t&&t.__esModule?t:{default:t}}(n(96));Object.defineProperty(e,"__esModule",{value:!0});var o=new r.default,i=o.set.bind(o),u=o.delete.bind(o);o.update=function(){o.forEach(function(t){t.__updateTree()})},o.delete=function(){var t=u.apply(void 0,arguments);return o.update(),t},o.set=function(){var t=i.apply(void 0,arguments);return o.update(),t},e.sbList=o},function(t,e,n){t.exports={default:n(97),__esModule:!0}},function(t,e,n){n(75),n(4),n(57),n(98),n(108),t.exports=n(12).Map},function(t,e,n){"use strict";var r=n(99);t.exports=n(104)("Map",function(t){return function(){return t(this,arguments.length>0?arguments[0]:void 0)}},{get:function(t){var e=r.getEntry(this,t);return e&&e.v},set:function(t,e){return r.def(this,0===t?0:t,e)}},r,!0)},function(t,e,n){"use strict";var r=n(16).f,o=n(29),i=n(100),u=n(13),a=n(101),c=n(7),l=n(102),f=n(8),s=n(60),d=n(103),h=n(20),v=n(65).fastKey,_=h?"_s":"size",p=function(t,e){var n,r=v(e);if("F"!==r)return t._i[r];for(n=t._f;n;n=n.n)if(n.k==e)return n};t.exports={getConstructor:function(t,e,n,f){var s=t(function(t,r){a(t,s,e,"_i"),t._i=o(null),t._f=void 0,t._l=void 0,t[_]=0,void 0!=r&&l(r,n,t[f],t)});return i(s.prototype,{clear:function(){for(var t=this,e=t._i,n=t._f;n;n=n.n)n.r=!0,n.p&&(n.p=n.p.n=void 0),delete e[n.i];t._f=t._l=void 0,t[_]=0},delete:function(t){var e=this,n=p(e,t);if(n){var r=n.n,o=n.p;delete e._i[n.i],n.r=!0,o&&(o.n=r),r&&(r.p=o),e._f==n&&(e._f=r),e._l==n&&(e._l=o),e[_]--}return!!n},forEach:function(t){a(this,s,"forEach");for(var e,n=u(t,arguments.length>1?arguments[1]:void 0,3);e=e?e.n:this._f;)for(n(e.v,e.k,this);e&&e.r;)e=e.p},has:function(t){return!!p(this,t)}}),h&&r(s.prototype,"size",{get:function(){return c(this[_])}}),s},def:function(t,e,n){var r,o,i=p(t,e);return i?i.v=n:(t._l=i={i:o=v(e,!0),k:e,v:n,p:r=t._l,n:void 0,r:!1},t._f||(t._f=i),r&&(r.n=i),t[_]++,"F"!==o&&(t._i[o]=i)),t},getEntry:p,setStrong:function(t,e,n){f(t,e,function(t,e){this._t=t,this._k=e,this._l=void 0},function(){for(var t=this,e=t._k,n=t._l;n&&n.r;)n=n.p;return t._t&&(t._l=n=n?n.n:t._t._f)?"keys"==e?s(0,n.k):"values"==e?s(0,n.v):s(0,[n.k,n.v]):(t._t=void 0,s(1))},n?"entries":"values",!n,!0),d(e)}}},function(t,e,n){var r=n(15);t.exports=function(t,e,n){for(var o in e)n&&t[o]?t[o]=e[o]:r(t,o,e[o]);return t}},function(t,e){t.exports=function(t,e,n,r){if(!(t instanceof e)||void 0!==r&&r in t)throw TypeError(n+": incorrect invocation!");return t}},function(t,e,n){var r=n(13),o=n(49),i=n(50),u=n(17),a=n(37),c=n(52),l={},f={};(e=t.exports=function(t,e,n,s,d){var h,v,_,p,y=d?function(){return t}:c(t),b=r(n,s,e?2:1),g=0;if("function"!=typeof y)throw TypeError(t+" is not iterable!");if(i(y)){for(h=a(t.length);h>g;g++)if((p=e?b(u(v=t[g])[0],v[1]):b(t[g]))===l||p===f)return p}else for(_=y.call(t);!(v=_.next()).done;)if((p=o(_,b,v.value,e))===l||p===f)return p}).BREAK=l,e.RETURN=f},function(t,e,n){"use strict";var r=n(11),o=n(12),i=n(16),u=n(20),a=n(45)("species");t.exports=function(t){var e="function"==typeof o[t]?o[t]:r[t];u&&e&&!e[a]&&i.f(e,a,{configurable:!0,get:function(){return this}})}},function(t,e,n){"use strict";var r=n(11),o=n(10),i=n(65),u=n(21),a=n(15),c=n(100),l=n(102),f=n(101),s=n(18),d=n(44),h=n(16).f,v=n(105)(0),_=n(20);t.exports=function(t,e,n,p,y,b){var g=r[t],m=g,x=y?"set":"add",S=m&&m.prototype,E={};return _&&"function"==typeof m&&(b||S.forEach&&!u(function(){(new m).entries().next()}))?(m=e(function(e,n){f(e,m,t,"_c"),e._c=new g,void 0!=n&&l(n,y,e[x],e)}),v("add,clear,delete,forEach,get,has,set,keys,values,entries,toJSON".split(","),function(t){var e="add"==t||"set"==t;t in S&&(!b||"clear"!=t)&&a(m.prototype,t,function(n,r){if(f(this,m,t),!e&&b&&!s(n))return"get"==t&&void 0;var o=this._c[t](0===n?0:n,r);return e?this:o})}),"size"in S&&h(m.prototype,"size",{get:function(){return this._c.size}})):(m=p.getConstructor(e,t,y,x),c(m.prototype,n),i.NEED=!0),d(m,t),E[t]=m,o(o.G+o.W+o.F,E),b||p.setStrong(m,t,y),m}},function(t,e,n){var r=n(13),o=n(34),i=n(47),u=n(37),a=n(106);t.exports=function(t,e){var n=1==t,c=2==t,l=3==t,f=4==t,s=6==t,d=5==t||s,h=e||a;return function(e,a,v){for(var _,p,y=i(e),b=o(y),g=r(a,v,3),m=u(b.length),x=0,S=n?h(e,m):c?h(e,0):void 0;m>x;x++)if((d||x in b)&&(_=b[x],p=g(_,x,y),t))if(n)S[x]=p;else if(p)switch(t){case 3:return!0;case 5:return _;case 6:return x;case 2:S.push(_)}else if(f)return!1;return s?-1:l||f?f:S}}},function(t,e,n){var r=n(107);t.exports=function(t,e){return new(r(t))(e)}},function(t,e,n){var r=n(18),o=n(71),i=n(45)("species");t.exports=function(t){var e;return o(t)&&("function"!=typeof(e=t.constructor)||e!==Array&&!o(e.prototype)||(e=void 0),r(e)&&null===(e=e[i])&&(e=void 0)),void 0===e?Array:e}},function(t,e,n){var r=n(10);r(r.P+r.R,"Map",{toJSON:n(109)("Map")})},function(t,e,n){var r=n(53),o=n(110);t.exports=function(t){return function(){if(r(this)!=t)throw TypeError(t+"#toJSON isn't generic");return o(this)}}},function(t,e,n){var r=n(102);t.exports=function(t,e){var n=[];return r(t,!1,n.push,n,e),n}},function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.selectors="scrollbar, [scrollbar], [data-scrollbar]"},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(113);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(114);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})});var a=n(115);(0,i.default)(a).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return a[t]}})});var c=n(116);(0,i.default)(c).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return c[t]}})});var l=n(117);(0,i.default)(l).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return l[t]}})});var f=n(118);(0,i.default)(f).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return f[t]}})});var s=n(119);(0,i.default)(s).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return s[t]}})});var d=n(120);(0,i.default)(d).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return d[t]}})});var h=n(121);(0,i.default)(h).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return h[t]}})});var v=n(122);(0,i.default)(v).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return v[t]}})});var _=n(123);(0,i.default)(_).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return _[t]}})});var p=n(124);(0,i.default)(p).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return p[t]}})})},function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.buildCurve=function(t,e){var n=[];if(e<=0)return n;for(var r=Math.round(e/1e3*60)-1,o=t?Math.pow(1/Math.abs(t),1/r):0,i=1;i<=r;i++)n.push(t-t*Math.pow(o,i));return n.push(t),n}},function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0});e.debounce=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:100,n=!(arguments.length>2&&void 0!==arguments[2])||arguments[2];if("function"==typeof t){var r=void 0;return function(){for(var o=arguments.length,i=Array(o),u=0;u<o;u++)i[u]=arguments[u];!r&&n&&setTimeout(function(){return t.apply(void 0,i)}),clearTimeout(r),r=setTimeout(function(){r=void 0,t.apply(void 0,i)},e)}}}},function(t,e,n){"use strict";function r(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return(0,o.default)(t)}var o=function(t){return t&&t.__esModule?t:{default:t}}(n(2));Object.defineProperty(e,"__esModule",{value:!0}),e.findChild=function(t,e){var n=t.children,o=null;return n&&[].concat(r(n)).some(function(t){if(t.className.match(e))return o=t,!0}),o}},function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n={STANDARD:1,OTHERS:-3},r=[1,28,500],o=function(t){return r[t]||r[0]};e.getDelta=function(t){if("deltaX"in t){var e=o(t.deltaMode);return{x:t.deltaX/n.STANDARD*e,y:t.deltaY/n.STANDARD*e}}return"wheelDeltaX"in t?{x:t.wheelDeltaX/n.OTHERS,y:t.wheelDeltaY/n.OTHERS}:{x:0,y:t.wheelDelta/n.OTHERS}}},function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.getPointerData=function(t){return t.touches?t.touches[t.touches.length-1]:t}},function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.getPosition=void 0;var r=n(118);e.getPosition=function(t){var e=(0,r.getPointerData)(t);return{x:e.clientX,y:e.clientY}}},function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.getTouchID=void 0;var r=n(118);e.getTouchID=function(t){return(0,r.getPointerData)(t).identifier}},function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.isOneOf=function(t){return(arguments.length>1&&void 0!==arguments[1]?arguments[1]:[]).some(function(e){return t===e})}},function(t,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.pickInRange=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:-1/0,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1/0;return Math.max(e,Math.min(t,n))}},function(t,e,n){"use strict";var r=function(t){return t&&t.__esModule?t:{default:t}}(n(90));Object.defineProperty(e,"__esModule",{value:!0});var o=["webkit","moz","ms","o"],i=new RegExp("^-(?!(?:"+o.join("|")+")-)"),u=function(t){var e={};return(0,r.default)(t).forEach(function(n){if(i.test(n)){var r=t[n];n=n.replace(/^-/,""),e[n]=r,o.forEach(function(t){e["-"+t+"-"+n]=r})}else e[n]=t[n]}),e};e.setStyle=function(t,e){e=u(e),(0,r.default)(e).forEach(function(n){var r=n.replace(/^-/,"").replace(/-([a-z])/g,function(t,e){return e.toUpperCase()});t.style[r]=e[n]})}},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}function o(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return(0,u.default)(t)}function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}var u=r(n(2)),a=r(n(86)),c=r(n(125));Object.defineProperty(e,"__esModule",{value:!0}),e.TouchRecord=void 0;var l=c.default||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(t[r]=n[r])}return t},f=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),(0,a.default)(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),s=n(119),d=function(){function t(e){i(this,t),this.updateTime=Date.now(),this.delta={x:0,y:0},this.velocity={x:0,y:0},this.lastPosition=(0,s.getPosition)(e)}return f(t,[{key:"update",value:function(t){var e=this.velocity,n=this.updateTime,r=this.lastPosition,o=Date.now(),i=(0,s.getPosition)(t),u={x:-(i.x-r.x),y:-(i.y-r.y)},a=o-n||16,c=u.x/a*1e3,l=u.y/a*1e3;e.x=.8*c+.2*e.x,e.y=.8*l+.2*e.y,this.delta=u,this.updateTime=o,this.lastPosition=i}}]),t}();e.TouchRecord=function(){function t(){i(this,t),this.touchList={},this.lastTouch=null,this.activeTouchID=void 0}return f(t,[{key:"__add",value:function(t){if(this.__has(t))return null;var e=new d(t);return this.touchList[t.identifier]=e,e}},{key:"__renew",value:function(t){if(!this.__has(t))return null;var e=this.touchList[t.identifier];return e.update(t),e}},{key:"__delete",value:function(t){return delete this.touchList[t.identifier]}},{key:"__has",value:function(t){return this.touchList.hasOwnProperty(t.identifier)}},{key:"__setActiveID",value:function(t){this.activeTouchID=t[t.length-1].identifier,this.lastTouch=this.touchList[this.activeTouchID]}},{key:"__getActiveTracker",value:function(){return this.touchList[this.activeTouchID]}},{key:"isActive",value:function(){return void 0!==this.activeTouchID}},{key:"getDelta",value:function(){var t=this.__getActiveTracker();return t?l({},t.delta):this.__primitiveValue}},{key:"getVelocity",value:function(){var t=this.__getActiveTracker();return t?l({},t.velocity):this.__primitiveValue}},{key:"getLastPosition",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",e=this.__getActiveTracker()||this.lastTouch,n=e?e.lastPosition:this.__primitiveValue;return t?n.hasOwnProperty(t)?n[t]:0:l({},n)}},{key:"updatedRecently",value:function(){var t=this.__getActiveTracker();return t&&Date.now()-t.updateTime<30}},{key:"track",value:function(t){var e=this,n=t.targetTouches;return[].concat(o(n)).forEach(function(t){e.__add(t)}),this.touchList}},{key:"update",value:function(t){var e=this,n=t.touches,r=t.changedTouches;return[].concat(o(n)).forEach(function(t){e.__renew(t)}),this.__setActiveID(r),this.touchList}},{key:"release",value:function(t){var e=this;return this.activeTouchID=void 0,[].concat(o(t.changedTouches)).forEach(function(t){e.__delete(t)}),this.touchList}},{key:"__primitiveValue",get:function(){return{x:0,y:0}}}]),t}()},function(t,e,n){t.exports={default:n(126),__esModule:!0}},function(t,e,n){n(127),t.exports=n(12).Object.assign},function(t,e,n){var r=n(10);r(r.S+r.F,"Object",{assign:n(128)})},function(t,e,n){"use strict";var r=n(31),o=n(69),i=n(70),u=n(47),a=n(34),c=Object.assign;t.exports=!c||n(21)(function(){var t={},e={},n=Symbol(),r="abcdefghijklmnopqrst";return t[n]=7,r.split("").forEach(function(t){e[t]=t}),7!=c({},t)[n]||Object.keys(c({},e)).join("")!=r})?function(t,e){for(var n=u(t),c=arguments.length,l=1,f=o.f,s=i.f;c>l;)for(var d,h=a(arguments[l++]),v=f?r(h).concat(f(h)):r(h),_=v.length,p=0;_>p;)s.call(h,d=v[p++])&&(n[d]=h[d]);return n}:c},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(130);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(131);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})});var a=n(132);(0,i.default)(a).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return a[t]}})});var c=n(133);(0,i.default)(c).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return c[t]}})});var l=n(134);(0,i.default)(l).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return l[t]}})});var f=n(135);(0,i.default)(f).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return f[t]}})});var s=n(136);(0,i.default)(s).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return s[t]}})});var d=n(137);(0,i.default)(d).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return d[t]}})});var h=n(138);(0,i.default)(h).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return h[t]}})});var v=n(139);(0,i.default)(v).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return v[t]}})});var _=n(140);(0,i.default)(_).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return _[t]}})});var p=n(141);(0,i.default)(p).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return p[t]}})});var y=n(142);(0,i.default)(y).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return y[t]}})});var b=n(143);(0,i.default)(b).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return b[t]}})});var g=n(144);(0,i.default)(g).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return g[t]}})})},function(t,e,n){"use strict";var r=n(78);r.SmoothScrollbarX.prototype.clearMovement=r.SmoothScrollbarX.prototype.stop=function(){this.movement.x=this.movement.y=0,cancelAnimationFrame(this.__timerID.scrollTo)}},function(t,e,n){"use strict";function r(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return(0,o.default)(t)}var o=function(t){return t&&t.__esModule?t:{default:t}}(n(2)),i=n(78),u=n(112),a=n(89);i.SmoothScrollbarX.prototype.destroy=function(t){var e=this.__listeners,n=this.__handlers,o=this.__observer,i=this.targets,c=i.container,l=i.content;n.forEach(function(t){var e=t.evt,n=t.elem,r=t.fn;n.removeEventListener(e,r)}),n.length=e.length=0,this.stop(),cancelAnimationFrame(this.__timerID.render),o&&o.disconnect(),a.sbList.delete(c),t||this.scrollTo(0,0,300,function(){if(c.parentNode){(0,u.setStyle)(c,{overflow:""}),c.scrollTop=c.scrollLeft=0;for(var t=[].concat(r(l.childNodes));c.firstChild;)c.removeChild(c.firstChild);t.forEach(function(t){return c.appendChild(t)})}})}},function(t,e,n){"use strict";n(78).SmoothScrollbarX.prototype.getContentElem=function(){return this.targets.content}},function(t,e,n){"use strict";n(78).SmoothScrollbarX.prototype.getSize=function(){var t=this.targets.container,e=this.targets.content;return{container:{width:t.clientWidth,height:t.clientHeight},content:{width:e.offsetWidth-e.clientWidth+e.scrollWidth,height:e.offsetHeight-e.clientHeight+e.scrollHeight}}}},function(t,e,n){"use strict";n(78).SmoothScrollbarX.prototype.infiniteScroll=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:50;if("function"==typeof t){var n={x:0,y:0},r=!1;this.addListener(function(o){var i=o.offset,u=o.limit;u.y-i.y<=e&&i.y>n.y&&!r&&(r=!0,setTimeout(function(){return t(o)})),u.y-i.y>e&&(r=!1),n=i})}}},function(t,e,n){"use strict";n(78).SmoothScrollbarX.prototype.isVisible=function(t){var e=this.bounding,n=t.getBoundingClientRect(),r=Math.max(e.top,n.top),o=Math.max(e.left,n.left),i=Math.min(e.right,n.right);return r<Math.min(e.bottom,n.bottom)&&o<i}},function(t,e,n){"use strict";var r=n(78);r.SmoothScrollbarX.prototype.addListener=function(t){"function"==typeof t&&this.__listeners.push(t)},r.SmoothScrollbarX.prototype.removeListener=function(t){"function"==typeof t&&this.__listeners.some(function(e,n,r){return e===t&&r.splice(n,1)})}},function(t,e,n){"use strict";function r(t,e,n){return e in t?(0,a.default)(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function o(t,e){return!!e.length&&e.some(function(e){return t.match(e)})}function i(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:l.REGIESTER,e=f[t];return function(){for(var n=arguments.length,r=Array(n),i=0;i<n;i++)r[i]=arguments[i];this.__handlers.forEach(function(n){var i=n.elem,u=n.evt,a=n.fn,c=n.hasRegistered;c&&t===l.REGIESTER||!c&&t===l.UNREGIESTER||o(u,r)&&(i[e](u,a),n.hasRegistered=!c)})}}var u,a=function(t){return t&&t.__esModule?t:{default:t}}(n(86)),c=n(78),l={REGIESTER:0,UNREGIESTER:1},f=(u={},r(u,l.REGIESTER,"addEventListener"),r(u,l.UNREGIESTER,"removeEventListener"),u);c.SmoothScrollbarX.prototype.registerEvents=i(l.REGIESTER),c.SmoothScrollbarX.prototype.unregisterEvents=i(l.UNREGIESTER)},function(t,e,n){"use strict";n(78).SmoothScrollbarX.prototype.scrollIntoView=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=e.alignToTop,r=void 0===n||n,o=e.onlyScrollIfNeeded,i=void 0!==o&&o,u=e.offsetTop,a=void 0===u?0:u,c=e.offsetLeft,l=void 0===c?0:c,f=e.offsetBottom,s=void 0===f?0:f,d=this.targets,h=this.bounding;if(t&&d.container.contains(t)){var v=t.getBoundingClientRect();i&&this.isVisible(t)||this.__setMovement(v.left-h.left-l,r?v.top-h.top-a:v.bottom-h.bottom-s)}}},function(t,e,n){"use strict";var r=n(112);n(78).SmoothScrollbarX.prototype.scrollTo=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this.offset.x,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:this.offset.y,n=this,o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,i=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null,u=this.options,a=this.offset,c=this.limit,l=this.__timerID;cancelAnimationFrame(l.scrollTo),i="function"==typeof i?i:function(){},u.renderByPixels&&(t=Math.round(t),e=Math.round(e));var f=a.x,s=a.y,d=(0,r.pickInRange)(t,0,c.x)-f,h=(0,r.pickInRange)(e,0,c.y)-s,v=(0,r.buildCurve)(d,o),_=(0,r.buildCurve)(h,o),p=v.length,y=0;!function t(){n.setPosition(f+v[y],s+_[y]),++y===p?requestAnimationFrame(function(){i(n)}):l.scrollTo=requestAnimationFrame(t)}()}},function(t,e,n){"use strict";var r=function(t){return t&&t.__esModule?t:{default:t}}(n(90));n(78).SmoothScrollbarX.prototype.setOptions=function(){var t=this,e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};(0,r.default)(e).forEach(function(n){t.options.hasOwnProperty(n)&&void 0!==e[n]&&(t.options[n]=e[n])})}},function(t,e,n){"use strict";var r=function(t){return t&&t.__esModule?t:{default:t}}(n(125)).default||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(t[r]=n[r])}return t},o=n(112);n(78).SmoothScrollbarX.prototype.setPosition=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this.offset.x,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:this.offset.y,n=arguments.length>2&&void 0!==arguments[2]&&arguments[2];this.__hideTrackThrottle();var i={},u=this.options,a=this.offset,c=this.limit,l=this.targets,f=this.__listeners;u.renderByPixels&&(t=Math.round(t),e=Math.round(e)),t!==a.x&&this.showTrack("x"),e!==a.y&&this.showTrack("y"),t=(0,o.pickInRange)(t,0,c.x),e=(0,o.pickInRange)(e,0,c.y),t===a.x&&e===a.y||(i.direction={x:t===a.x?"none":t>a.x?"right":"left",y:e===a.y?"none":e>a.y?"down":"up"},this.__readonly("offset",{x:t,y:e}),i.limit=r({},c),i.offset=r({},this.offset),this.__setThumbPosition(),(0,o.setStyle)(l.content,{"-transform":"translate3d("+-t+"px, "+-e+"px, 0)"}),n||f.forEach(function(t){u.syncCallbacks?t(i):requestAnimationFrame(function(){t(i)})}))}},function(t,e,n){"use strict";function r(t,e,n){return e in t?(0,u.default)(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function o(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:c.SHOW,e=f[t];return function(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"both",r=this.options,o=this.movement,i=this.targets,u=i.container,a=i.xAxis,f=i.yAxis;o.x||o.y?u.classList.add(l.CONTAINER):u.classList.remove(l.CONTAINER),r.alwaysShowTracks&&t===c.HIDE||("both"===(n=n.toLowerCase())&&(a.track.classList[e](l.TRACK),f.track.classList[e](l.TRACK)),"x"===n&&a.track.classList[e](l.TRACK),"y"===n&&f.track.classList[e](l.TRACK))}}var i,u=function(t){return t&&t.__esModule?t:{default:t}}(n(86)),a=n(78),c={SHOW:0,HIDE:1},l={TRACK:"show",CONTAINER:"scrolling"},f=(i={},r(i,c.SHOW,"add"),r(i,c.HIDE,"remove"),i);a.SmoothScrollbarX.prototype.showTrack=o(c.SHOW),a.SmoothScrollbarX.prototype.hideTrack=o(c.HIDE)},function(t,e,n){"use strict";function r(){if("glow"===this.options.overscrollEffect){var t=this.targets,e=this.size,n=t.canvas,r=n.elem,o=n.context,i=window.devicePixelRatio||1,u=e.container.width*i,a=e.container.height*i;u===r.width&&a===r.height||(r.width=u,r.height=a,o.scale(i,i))}}function o(){var t=this.size,e=this.thumbSize,n=this.targets,r=n.xAxis,o=n.yAxis;(0,u.setStyle)(r.track,{display:t.content.width<=t.container.width?"none":"block"}),(0,u.setStyle)(o.track,{display:t.content.height<=t.container.height?"none":"block"}),(0,u.setStyle)(r.thumb,{width:e.x+"px"}),(0,u.setStyle)(o.thumb,{height:e.y+"px"})}function i(){var t=this.options;this.__updateBounding();var e=this.getSize(),n={x:Math.max(e.content.width-e.container.width,0),y:Math.max(e.content.height-e.container.height,0)},i={realX:e.container.width/e.content.width*e.container.width,realY:e.container.height/e.content.height*e.container.height};i.x=Math.max(i.realX,t.thumbMinSize),i.y=Math.max(i.realY,t.thumbMinSize),this.__readonly("size",e).__readonly("limit",n).__readonly("thumbSize",i),o.call(this),r.call(this),this.setPosition(),this.__setThumbPosition()}var u=n(112);n(78).SmoothScrollbarX.prototype.update=function(t){t?requestAnimationFrame(i.bind(this)):i.call(this)}},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(146);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(147);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})});var a=n(148);(0,i.default)(a).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return a[t]}})});var c=n(149);(0,i.default)(c).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return c[t]}})});var l=n(154);(0,i.default)(l).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return l[t]}})});var f=n(155);(0,i.default)(f).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return f[t]}})});var s=n(156);(0,i.default)(s).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return s[t]}})});var d=n(157);(0,i.default)(d).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return d[t]}})})},function(t,e,n){"use strict";function r(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return(0,i.default)(t)}function o(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=arguments.length>2&&void 0!==arguments[2]&&arguments[2],o=this.limit,i=this.options,a=this.movement;this.__updateThrottle(),i.renderByPixels&&(t=Math.round(t),e=Math.round(e));var c=a.x+t,l=a.y+e;0===o.x&&(c=0),0===o.y&&(l=0);var f=this.__getDeltaLimit(n);a.x=u.pickInRange.apply(void 0,[c].concat(r(f.x))),a.y=u.pickInRange.apply(void 0,[l].concat(r(f.y)))}var i=function(t){return t&&t.__esModule?t:{default:t}}(n(2)),u=n(112),a=n(78);Object.defineProperty(a.SmoothScrollbarX.prototype,"__addMovement",{value:o,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=this,e=this.movement,n=this.movementLocked;a.forEach(function(r){n[r]=e[r]&&t.__willOverscroll(r,e[r])})}function o(){var t=this.movementLocked;a.forEach(function(e){t[e]=!1})}function i(){var t=this.movementLocked;return t.x||t.y}var u=n(78),a=["x","y"];Object.defineProperty(u.SmoothScrollbarX.prototype,"__autoLockMovement",{value:r,writable:!0,configurable:!0}),Object.defineProperty(u.SmoothScrollbarX.prototype,"__unlockMovement",{value:o,writable:!0,configurable:!0}),Object.defineProperty(u.SmoothScrollbarX.prototype,"__isMovementLocked",{value:i,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";if(t){var e=this.options,n=this.movement,r=this.overscrollRendered,o=this.MAX_OVERSCROLL,i=n[t]=(0,f.pickInRange)(n[t],-o,o),u=e.overscrollDamping,a=r[t]+(i-r[t])*u;e.renderByPixels&&(a|=0),!this.__isMovementLocked()&&Math.abs(a-r[t])<.1&&(a-=i/Math.abs(i||1)),Math.abs(a)<Math.abs(r[t])&&this.__readonly("overscrollBack",!0),(a*r[t]<0||Math.abs(a)<=1)&&(a=0,this.__readonly("overscrollBack",!1)),r[t]=a}}function o(t){var e=this.__touchRecord,n=this.overscrollRendered;return n.x!==t.x||n.y!==t.y||!(!l.GLOBAL_ENV.TOUCH_SUPPORTED||!e.updatedRecently())}function i(){var t=this,e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];if(e.length&&this.options.overscrollEffect){var n=this.options,i=this.overscrollRendered,a=u({},i);if(e.forEach(function(e){return r.call(t,e)}),o.call(this,a))switch(n.overscrollEffect){case"bounce":return c.overscrollBounce.call(this,i.x,i.y);case"glow":return c.overscrollGlow.call(this,i.x,i.y);default:return}}}var u=function(t){return t&&t.__esModule?t:{default:t}}(n(125)).default||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(t[r]=n[r])}return t},a=n(78),c=n(150),l=n(89),f=n(112);Object.defineProperty(a.SmoothScrollbarX.prototype,"__renderOverscroll",{value:i,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(151);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(152);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})});var a=n(153);(0,i.default)(a).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return a[t]}})})},function(t,e,n){"use strict";function r(t,e){var n=this.size,r=this.offset,i=this.targets,u=this.thumbOffset,a=i.xAxis,c=i.yAxis,l=i.content;if((0,o.setStyle)(l,{"-transform":"translate3d("+-(r.x+t)+"px, "+-(r.y+e)+"px, 0)"}),t){var f=n.container.width/(n.container.width+Math.abs(t));(0,o.setStyle)(a.thumb,{"-transform":"translate3d("+u.x+"px, 0, 0) scale3d("+f+", 1, 1)","-transform-origin":t<0?"left":"right"})}if(e){var s=n.container.height/(n.container.height+Math.abs(e));(0,o.setStyle)(c.thumb,{"-transform":"translate3d(0, "+u.y+"px, 0) scale3d(1, "+s+", 1)","-transform-origin":e<0?"top":"bottom"})}}Object.defineProperty(e,"__esModule",{value:!0}),e.overscrollBounce=r;var o=n(112)},function(t,e,n){"use strict";function r(t,e){var n=this.size,r=this.targets,a=this.options,c=r.canvas,l=c.elem,f=c.context;return t||e?((0,u.setStyle)(l,{display:"block"}),f.clearRect(0,0,n.content.width,n.container.height),f.fillStyle=a.overscrollEffectColor,o.call(this,t),void i.call(this,e)):(0,u.setStyle)(l,{display:"none"})}function o(t){var e=this.size,n=this.targets,r=this.__touchRecord,o=this.MAX_OVERSCROLL,i=e.container,l=i.width,f=i.height,s=n.canvas.context;s.save(),t>0&&s.transform(-1,0,0,1,l,0);var d=(0,u.pickInRange)(Math.abs(t)/o,0,a),h=(0,u.pickInRange)(d,0,c)*l,v=Math.abs(t),_=r.getLastPosition("y")||f/2;s.globalAlpha=d,s.beginPath(),s.moveTo(0,-h),s.quadraticCurveTo(v,_,0,f+h),s.fill(),s.closePath(),s.restore()}function i(t){var e=this.size,n=this.targets,r=this.__touchRecord,o=this.MAX_OVERSCROLL,i=e.container,l=i.width,f=i.height,s=n.canvas.context;s.save(),t>0&&s.transform(1,0,0,-1,0,f);var d=(0,u.pickInRange)(Math.abs(t)/o,0,a),h=(0,u.pickInRange)(d,0,c)*l,v=r.getLastPosition("x")||l/2,_=Math.abs(t);s.globalAlpha=d,s.beginPath(),s.moveTo(-h,0),s.quadraticCurveTo(v,_,l+h,0),s.fill(),s.closePath(),s.restore()}Object.defineProperty(e,"__esModule",{value:!0}),e.overscrollGlow=r;var u=n(112),a=.75,c=.25},function(t,e,n){"use strict";function r(t){var e=this.options,n=this.offset,r=this.movement,o=this.__touchRecord,i=e.damping,u=e.renderByPixels,a=e.overscrollDamping,c=n[t],l=r[t],f=i;if(this.__willOverscroll(t,l)?f=a:o.isActive()&&(f=.5),Math.abs(l)<1){var s=c+l;return{movement:0,position:l>0?Math.ceil(s):Math.floor(s)}}var d=l*(1-f);return u&&(d|=0),{movement:d,position:c+l-d}}function o(){var t=this.options,e=this.offset,n=this.limit,i=this.movement,a=this.overscrollRendered,c=this.__timerID;if(i.x||i.y||a.x||a.y){var l=r.call(this,"x"),f=r.call(this,"y"),s=[];if(t.overscrollEffect){var d=(0,u.pickInRange)(l.position,0,n.x),h=(0,u.pickInRange)(f.position,0,n.y);(a.x||d===e.x&&i.x)&&s.push("x"),(a.y||h===e.y&&i.y)&&s.push("y")}this.movementLocked.x||(i.x=l.movement),this.movementLocked.y||(i.y=f.movement),this.setPosition(l.position,f.position),this.__renderOverscroll(s)}c.render=requestAnimationFrame(o.bind(this))}var i=n(78),u=n(112);Object.defineProperty(i.SmoothScrollbarX.prototype,"__render",{value:o,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return(0,i.default)(t)}function o(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=arguments.length>2&&void 0!==arguments[2]&&arguments[2],o=this.options,i=this.movement;this.__updateThrottle();var a=this.__getDeltaLimit(n);o.renderByPixels&&(t=Math.round(t),e=Math.round(e)),i.x=u.pickInRange.apply(void 0,[t].concat(r(a.x))),i.y=u.pickInRange.apply(void 0,[e].concat(r(a.y)))}var i=function(t){return t&&t.__esModule?t:{default:t}}(n(2)),u=n(112),a=n(78);Object.defineProperty(a.SmoothScrollbarX.prototype,"__setMovement",{value:o,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=this.options,r=this.offset,o=this.limit;if(!n.continuousScrolling)return!1;var u=(0,i.pickInRange)(t+r.x,0,o.x),a=(0,i.pickInRange)(e+r.y,0,o.y),c=!0;return c&=u===r.x,c&=a===r.y,c&=u===o.x||0===u||a===o.y||0===a}var o=n(78),i=n(112);Object.defineProperty(o.SmoothScrollbarX.prototype,"__shouldPropagateMovement",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;if(!t)return!1;var n=this.offset,r=this.limit,o=n[t];return(0,i.pickInRange)(e+o,0,r[t])===o&&(0===o||o===r[t])}var o=n(78),i=n(112);Object.defineProperty(o.SmoothScrollbarX.prototype,"__willOverscroll",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(159);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(160);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})});var a=n(161);(0,i.default)(a).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return a[t]}})});var c=n(168);(0,i.default)(c).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return c[t]}})});var l=n(169);(0,i.default)(l).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return l[t]}})});var f=n(170);(0,i.default)(f).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return f[t]}})});var s=n(171);(0,i.default)(s).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return s[t]}})});var d=n(172);(0,i.default)(d).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return d[t]}})})},function(t,e,n){"use strict";function r(){var t=this,e=this.targets,n=e.container,r=e.content,o=!1,u=void 0,a=void 0;Object.defineProperty(this,"__isDrag",{get:function(){return o},enumerable:!1});var c=function e(n){var r=n.x,o=n.y;if(r||o){var i=t.options.speed;t.__setMovement(r*i,o*i),u=requestAnimationFrame(function(){e({x:r,y:o})})}};this.__addEvent(n,"dragstart",function(e){t.__eventFromChildScrollbarX(e)||(o=!0,a=e.target.clientHeight,(0,i.setStyle)(r,{"pointer-events":"auto"}),cancelAnimationFrame(u),t.__updateBounding())}),this.__addEvent(document,"dragover mousemove touchmove",function(e){if(o&&!t.__eventFromChildScrollbarX(e)){cancelAnimationFrame(u),e.preventDefault();var n=t.__getPointerTrend(e,a);c(n)}}),this.__addEvent(document,"dragend mouseup touchend blur",function(){cancelAnimationFrame(u),o=!1})}var o=n(78),i=n(112);Object.defineProperty(o.SmoothScrollbarX.prototype,"__dragHandler",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}function o(){var t=this,e=function(e){var n=t.size,r=t.offset,o=t.limit,i=t.movement;switch(e){case l.SPACE:return[0,200];case l.PAGE_UP:return[0,40-n.container.height];case l.PAGE_DOWN:return[0,n.container.height-40];case l.END:return[0,Math.abs(i.y)+o.y-r.y];case l.HOME:return[0,-Math.abs(i.y)-r.y];case l.LEFT:return[-40,0];case l.UP:return[0,-40];case l.RIGHT:return[40,0];case l.DOWN:return[0,40];default:return null}},n=this.targets.container;this.__addEvent(n,"keydown",function(r){if(document.activeElement===n){var o=t.options,i=t.parents,u=t.movementLocked,c=e(r.keyCode||r.which);if(c){var l=a(c,2),f=l[0],s=l[1];if(t.__shouldPropagateMovement(f,s))return n.blur(),i.length&&i[0].focus(),t.__updateThrottle();r.preventDefault(),t.__unlockMovement(),f&&t.__willOverscroll("x",f)&&(u.x=!0),s&&t.__willOverscroll("y",s)&&(u.y=!0);var d=o.speed;t.__addMovement(f*d,s*d)}}}),this.__addEvent(n,"keyup",function(){t.__unlockMovement()})}var i=r(n(162)),u=r(n(165)),a=function(){function t(t,e){var n=[],r=!0,o=!1,i=void 0;try{for(var a,c=(0,u.default)(t);!(r=(a=c.next()).done)&&(n.push(a.value),!e||n.length!==e);r=!0);}catch(t){o=!0,i=t}finally{try{!r&&c.return&&c.return()}finally{if(o)throw i}}return n}return function(e,n){if(Array.isArray(e))return e;if((0,i.default)(Object(e)))return t(e,n);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),c=n(78),l={SPACE:32,PAGE_UP:33,PAGE_DOWN:34,END:35,HOME:36,LEFT:37,UP:38,RIGHT:39,DOWN:40};Object.defineProperty(c.SmoothScrollbarX.prototype,"__keyboardHandler",{value:o,writable:!0,configurable:!0})},function(t,e,n){t.exports={default:n(163),__esModule:!0}},function(t,e,n){n(57),n(4),t.exports=n(164)},function(t,e,n){var r=n(53),o=n(45)("iterator"),i=n(27);t.exports=n(12).isIterable=function(t){var e=Object(t);return void 0!==e[o]||"@@iterator"in e||i.hasOwnProperty(r(e))}},function(t,e,n){t.exports={default:n(166),__esModule:!0}},function(t,e,n){n(57),n(4),t.exports=n(167)},function(t,e,n){var r=n(17),o=n(52);t.exports=n(12).getIterator=function(t){var e=o(t);if("function"!=typeof e)throw TypeError(t+" is not iterable!");return r(e.call(t))}},function(t,e,n){"use strict";function r(){var t=this,e=this.targets,n=e.container,r=e.xAxis,o=e.yAxis,u=function(e,n){var r=t.size,o=t.thumbSize;return"x"===e?n/(r.container.width-(o.x-o.realX))*r.content.width:"y"===e?n/(r.container.height-(o.y-o.realY))*r.content.height:0},a=function(t){return(0,i.isOneOf)(t,[r.track,r.thumb])?"x":(0,i.isOneOf)(t,[o.track,o.thumb])?"y":void 0},c=void 0,l=void 0,f=void 0,s=void 0,d=void 0;this.__addEvent(n,"click",function(e){if(!l&&(0,i.isOneOf)(e.target,[r.track,o.track])){var n=e.target,c=a(n),f=n.getBoundingClientRect(),s=(0,i.getPosition)(e),d=t.offset,h=t.thumbSize;if("x"===c){var v=s.x-f.left-h.x/2;t.__setMovement(u(c,v)-d.x,0)}else{var _=s.y-f.top-h.y/2;t.__setMovement(0,u(c,_)-d.y)}}}),this.__addEvent(n,"mousedown",function(e){if((0,i.isOneOf)(e.target,[r.thumb,o.thumb])){c=!0;var n=(0,i.getPosition)(e),u=e.target.getBoundingClientRect();s=a(e.target),f={x:n.x-u.left,y:n.y-u.top},d=t.targets.container.getBoundingClientRect()}}),this.__addEvent(window,"mousemove",function(e){if(c){e.preventDefault(),l=!0;var n=t.offset,r=(0,i.getPosition)(e);if("x"===s){var o=r.x-f.x-d.left;t.setPosition(u(s,o),n.y)}if("y"===s){var a=r.y-f.y-d.top;t.setPosition(n.x,u(s,a))}}}),this.__addEvent(window,"mouseup blur",function(){c=l=!1})}var o=n(78),i=n(112);Object.defineProperty(o.SmoothScrollbarX.prototype,"__mouseHandler",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){this.__addEvent(window,"resize",this.__updateThrottle)}var o=n(78);Object.defineProperty(o.SmoothScrollbarX.prototype,"__resizeHandler",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=this,e=!1,n=void 0,r=this.targets,o=r.container,u=r.content,a=function e(r){var o=r.x,i=r.y;if(o||i){var u=t.options.speed;t.__setMovement(o*u,i*u),n=requestAnimationFrame(function(){e({x:o,y:i})})}},c=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";(0,i.setStyle)(o,{"-user-select":t})};this.__addEvent(window,"mousemove",function(r){if(e){cancelAnimationFrame(n);var o=t.__getPointerTrend(r);a(o)}}),this.__addEvent(u,"selectstart",function(r){return t.__eventFromChildScrollbarX(r)?c("none"):(cancelAnimationFrame(n),t.__updateBounding(),void(e=!0))}),this.__addEvent(window,"mouseup blur",function(){cancelAnimationFrame(n),c(),e=!1}),this.__addEvent(o,"scroll",function(t){t.preventDefault(),o.scrollTop=o.scrollLeft=0})}var o=n(78),i=n(112);Object.defineProperty(o.SmoothScrollbarX.prototype,"__selectHandler",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=this,e=this.targets,n=this.__touchRecord,r=e.container;this.__addEvent(r,"touchstart",function(e){if(!t.__isDrag){var r=t.__timerID,o=t.movement;cancelAnimationFrame(r.scrollTo),t.__willOverscroll("x")||(o.x=0),t.__willOverscroll("y")||(o.y=0),n.track(e),t.__autoLockMovement()}}),this.__addEvent(r,"touchmove",function(e){if(!(t.__isDrag||l&&l!==t)){n.update(e);var r=n.getDelta(),o=r.x,i=r.y;if(t.__shouldPropagateMovement(o,i))return t.__updateThrottle();var u=t.movement,a=t.MAX_OVERSCROLL,c=t.options;if(u.x&&t.__willOverscroll("x",o)){var f=2;"bounce"===c.overscrollEffect&&(f+=Math.abs(10*u.x/a)),Math.abs(u.x)>=a?o=0:o/=f}if(u.y&&t.__willOverscroll("y",i)){var s=2;"bounce"===c.overscrollEffect&&(s+=Math.abs(10*u.y/a)),Math.abs(u.y)>=a?i=0:i/=s}t.__autoLockMovement(),e.preventDefault(),t.__addMovement(o,i,!0),l=t}}),this.__addEvent(r,"touchcancel touchend",function(e){if(!t.__isDrag){var r=t.options.speed,i=n.getVelocity(),f={};(0,o.default)(i).forEach(function(t){var e=(0,a.pickInRange)(i[t]*u.GLOBAL_ENV.EASING_MULTIPLIER,-1e3,1e3);f[t]=Math.abs(e)>c?e*r:0}),t.__addMovement(f.x,f.y,!0),t.__unlockMovement(),n.release(e),l=null}})}var o=function(t){return t&&t.__esModule?t:{default:t}}(n(90)),i=n(78),u=n(89),a=n(112),c=100,l=null;Object.defineProperty(i.SmoothScrollbarX.prototype,"__touchHandler",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=this,e=this.targets.container,n=!1,r=(0,i.debounce)(function(){n=!1},30,!1);this.__addEvent(e,u.GLOBAL_ENV.WHEEL_EVENT,function(e){var o=t.options,u=(0,i.getDelta)(e),a=u.y,c=u.x;return a*=o.speed,c*=o.speed,t.__shouldPropagateMovement(a,c)?t.__updateThrottle():(e.preventDefault(),r(),t.overscrollBack&&(n=!0),n&&(t.__willOverscroll("x",a)&&(a=0),t.__willOverscroll("y",c)&&(c=0)),void t.__addMovement(a,c,!0))})}var o=n(78),i=n(112),u=n(89);Object.defineProperty(o.SmoothScrollbarX.prototype,"__wheelHandler",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(174);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}var o=r(n(86)),i=r(n(90));Object.defineProperty(e,"__esModule",{value:!0});var u=n(175);(0,i.default)(u).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return u[t]}})});var a=n(176);(0,i.default)(a).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return a[t]}})});var c=n(177);(0,i.default)(c).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return c[t]}})});var l=n(178);(0,i.default)(l).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return l[t]}})});var f=n(179);(0,i.default)(f).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return f[t]}})});var s=n(182);(0,i.default)(s).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return s[t]}})});var d=n(183);(0,i.default)(d).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return d[t]}})});var h=n(184);(0,i.default)(h).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return h[t]}})});var v=n(185);(0,i.default)(v).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return v[t]}})});var _=n(186);(0,i.default)(_).forEach(function(t){"default"!==t&&"__esModule"!==t&&(0,o.default)(e,t,{enumerable:!0,get:function(){return _[t]}})})},function(t,e,n){"use strict";function r(t,e,n){var r=this;if(!t||"function"!=typeof t.addEventListener)throw new TypeError("expect elem to be a DOM element, but got "+t);var o=function(t){for(var e=arguments.length,r=Array(e>1?e-1:0),o=1;o<e;o++)r[o-1]=arguments[o];!t.type.match(/drag/)&&t.defaultPrevented||n.apply(void 0,[t].concat(r))};e.split(/\s+/g).forEach(function(e){r.__handlers.push({evt:e,elem:t,fn:o,hasRegistered:!0}),t.addEventListener(e,o)})}var o=n(78);Object.defineProperty(o.SmoothScrollbarX.prototype,"__addEvent",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=(arguments.length>0&&void 0!==arguments[0]?arguments[0]:{}).target;return this.children.some(function(e){return e.contains(t)})}var o=n(78);Object.defineProperty(o.SmoothScrollbarX.prototype,"__eventFromChildScrollbarX",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=arguments.length>0&&void 0!==arguments[0]&&arguments[0],e=this.options,n=this.offset,r=this.limit;return t&&(e.continuousScrolling||e.overscrollEffect)?{x:[-1/0,1/0],y:[-1/0,1/0]}:{x:[-n.x,r.x-n.x],y:[-n.y,r.y-n.y]}}var o=n(78);Object.defineProperty(o.SmoothScrollbarX.prototype,"__getDeltaLimit",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=this.bounding,r=n.top,o=n.right,u=n.bottom,a=n.left,c=(0,i.getPosition)(t),l=c.x,f=c.y,s={x:0,y:0};return 0===l&&0===f?s:(l>o-e?s.x=l-o+e:l<a+e&&(s.x=l-a-e),f>u-e?s.y=f-u+e:f<r+e&&(s.y=f-r-e),s)}var o=n(78),i=n(112);Object.defineProperty(o.SmoothScrollbarX.prototype,"__getPointerTrend",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{default:t}}function o(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return(0,l.default)(t)}function i(t){var e=this,n={speed:1,damping:.1,thumbMinSize:20,syncCallbacks:!1,renderByPixels:!0,alwaysShowTracks:!1,continuousScrolling:"auto",overscrollEffect:!1,overscrollEffectColor:"#87ceeb",overscrollDamping:.2},r={damping:[0,1],speed:[0,1/0],thumbMinSize:[0,1/0],overscrollEffect:[!1,"bounce","glow"],overscrollDamping:[0,1]},i=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"auto";if(!1!==n.overscrollEffect)return!1;switch(t){case"auto":return e.isNestedScrollbarX;default:return!!t}},l={set ignoreEvents(t){console.warn("`options.ignoreEvents` parameter is deprecated, use `instance#unregisterEvents()` method instead. https://github.com/idiotWu/smooth-scrollbar/wiki/Instance-Methods#instanceunregisterevents-regex--regex-regex--")},set friction(t){console.warn("`options.friction="+t+"` is deprecated, use `options.damping="+t/100+"` instead."),this.damping=t/100},get syncCallbacks(){return n.syncCallbacks},set syncCallbacks(t){n.syncCallbacks=!!t},get renderByPixels(){return n.renderByPixels},set renderByPixels(t){n.renderByPixels=!!t},get alwaysShowTracks(){return n.alwaysShowTracks},set alwaysShowTracks(t){t=!!t,n.alwaysShowTracks=t;var r=e.targets.container;t?(e.showTrack(),r.classList.add("sticky")):(e.hideTrack(),r.classList.remove("sticky"))},get continuousScrolling(){return i(n.continuousScrolling)},set continuousScrolling(t){n.continuousScrolling="auto"===t?t:!!t},get overscrollEffect(){return n.overscrollEffect},set overscrollEffect(t){t&&!~r.overscrollEffect.indexOf(t)&&(console.warn("`overscrollEffect` should be one of "+(0,c.default)(r.overscrollEffect)+", but got "+(0,c.default)(t)+". It will be set to `false` now."),t=!1),n.overscrollEffect=t},get overscrollEffectColor(){return n.overscrollEffectColor},set overscrollEffectColor(t){n.overscrollEffectColor=t}};(0,a.default)(n).filter(function(t){return!l.hasOwnProperty(t)}).forEach(function(t){(0,u.default)(l,t,{enumerable:!0,get:function(){return n[t]},set:function(e){if(isNaN(parseFloat(e)))throw new TypeError("expect `options."+t+"` to be a number, but got "+(void 0===e?"undefined":d(e)));n[t]=h.pickInRange.apply(void 0,[e].concat(o(r[t])))}})}),this.__readonly("options",l),this.setOptions(t)}var u=r(n(86)),a=r(n(90)),c=r(n(180)),l=r(n(2)),f=r(n(55)),s=r(n(62)),d="function"==typeof s.default&&"symbol"==typeof f.default?function(t){return typeof t}:function(t){return t&&"function"==typeof s.default&&t.constructor===s.default&&t!==s.default.prototype?"symbol":typeof t},h=n(112),v=n(78);Object.defineProperty(v.SmoothScrollbarX.prototype,"__initOptions",{value:i,writable:!0,configurable:!0})},function(t,e,n){t.exports={default:n(181),__esModule:!0}},function(t,e,n){var r=n(12),o=r.JSON||(r.JSON={stringify:JSON.stringify});t.exports=function(t){return o.stringify.apply(o,arguments)}},function(t,e,n){"use strict";function r(){this.update(),this.__keyboardHandler(),this.__resizeHandler(),this.__selectHandler(),this.__mouseHandler(),this.__touchHandler(),this.__wheelHandler(),this.__dragHandler(),this.__render()}var o=n(78);Object.defineProperty(o.SmoothScrollbarX.prototype,"__initScrollbarX",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t,e){return(0,o.default)(this,t,{value:e,enumerable:!0,configurable:!0})}var o=function(t){return t&&t.__esModule?t:{default:t}}(n(86)),i=n(78);Object.defineProperty(i.SmoothScrollbarX.prototype,"__readonly",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=this.targets,e=this.size,n=this.offset,r=this.thumbOffset,i=this.thumbSize;r.x=n.x/e.content.width*(e.container.width-(i.x-i.realX)),r.y=n.y/e.content.height*(e.container.height-(i.y-i.realY)),(0,o.setStyle)(t.xAxis.thumb,{"-transform":"translate3d("+r.x+"px, 0, 0)"}),(0,o.setStyle)(t.yAxis.thumb,{"-transform":"translate3d(0, "+r.y+"px, 0)"})}var o=n(112),i=n(78);Object.defineProperty(i.SmoothScrollbarX.prototype,"__setThumbPosition",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(){var t=this.targets.container.getBoundingClientRect(),e=t.top,n=t.right,r=t.bottom,o=t.left,i=window,u=i.innerHeight,a=i.innerWidth;this.__readonly("bounding",{top:Math.max(e,0),right:Math.min(n,a),bottom:Math.min(r,u),left:Math.max(o,0)})}var o=n(78);Object.defineProperty(o.SmoothScrollbarX.prototype,"__updateBounding",{value:r,writable:!0,configurable:!0})},function(t,e,n){"use strict";function r(t){if(Array.isArray(t)){for(var e=0,n=Array(t.length);e<t.length;e++)n[e]=t[e];return n}return(0,i.default)(t)}function o(){var t=this.targets,e=t.container,n=t.content;this.__readonly("children",[].concat(r(n.querySelectorAll(a.selectors)))),this.__readonly("isNestedScrollbarX",!1);for(var o=[],i=e;i=i.parentElement;)a.sbList.has(i)&&(this.__readonly("isNestedScrollbarX",!0),o.push(i));this.__readonly("parents",o)}var i=function(t){return t&&t.__esModule?t:{default:t}}(n(2)),u=n(78),a=n(89);Object.defineProperty(u.SmoothScrollbarX.prototype,"__updateTree",{value:o,writable:!0,configurable:!0})},function(t,e){}])});


/**
 * Basket
 * @type {{init, get, add, update, updateBasketSumm}}
 */
var basket = (function () {
  var that = this,
    link = '/basket',
    cart_html = null,
    cart = [];

  function start() {
    $.get(link + '/show')
      .done(function (data) {
        cart = data.items;
        cart_html = data.html;
        showCostBasket();
      })
      .fail(function (data) {
        console.error('Fail load basket data');
      })
      .always(function (data) {
        return cart;
      });
  }

  function showCostBasket() {

    var summ = 0;
    _.each(cart, function (item) {
      summ = parseInt(summ) + item.count * item.price;
    });

    $('.header-nav').replaceWith(cart_html);
    if ($('#cartTotal').length) {
      $('#cartTotal').text(summ);
      if (summ == 0) {
        window.location.href = '/';
      }
    }
  }

  function update(id, cnt) {
    saveUpdatedItem(id, cnt);
  }

  function findByid(id) {
    return _.find(cart, {id: id});
  }

  function findBySizeColor(id, size, color) {
    var result = _.find(cart, function (o) {
      return o.goods_id == id && o.size == size && o.color == color
    });
    //  console.log(cart, result, id, size,color);
    return result;
  }

  function seeGoods(id, cnt, size, color, call) {

    var item = findBySizeColor(id, size, color);
    if (_.isUndefined(item)) { // если такого нету - добавляем
      // console.log('addToBasket', [id, cnt, size,color]);
      addToBasket(id, cnt, size, color, call);
    } else { // иначе - обновляем
      // console.log('updateItem', [id, cnt, size,color]);
      item.count = parseInt(item.count) + parseInt(cnt);  // обновляем кол-во
      saveUpdatedItem(item, call);
    }

  }

  /**
   * item - object товара в корзине,
   * callback - ф-ция, срабатывающая после сохранения на сервере
   * **/
  function saveUpdatedItem(id, cnt) {

    $.post(link + '/' + id, {'id': id, 'count': cnt})
      .done(function (data) {
        console.log(data)

        $('.total-basket-main').html(data.html);

        // item = data.item;
        // cart_html = data.html;
      })
      .fail(function (data) {
        console.error('Fail update item in basket');
      });
  }

  /**
   * goods_id - ID товара,
   * cnt - +/- количество,
   * size - размер
   * **/
  function addToBasket(price_id, count) {
    var data = {'price_id': price_id, 'count': count};
    $.ajax({
      type: "PUT",
      url: link,
      data: data
    })
      .done(function (data) {
        cart.push(data.item);
        // cart_html = data.html;
      })
      .fail(function (data) {
        console.error('Fail put item to basket');
      });
  }


  /**
   * goods_id - ID товара,
   * cnt - количество удаляемого товара,
   * size - размер
   * **/
  function removeItem(goods_id) {
    removeFromBasket(goods_id)
  }

  /**
   * goods_id - ID товара,
   * cnt - +/- количество,
   * size - размер
   * **/
  function removeFromBasket(id) {
    $.ajax({
      type: "DELETE",
      url: link + '/' + id,
    })
      .done(function (data) {
        // cart = _.reject(cart, function (o) {
        //   return o.id == item.id;
        // });
        //console.log(data);
        // cart_html = data.html;
        // callback(true);
        $('.total-basket-main').html(data.html);
      })
      .fail(function (data) {
        console.error('Fail put item to basket');
        // callback(false);
      });
  }

  return {
    init: function () {
      start();
    },
    get: function () {
      return cart;
    },
    add: function (id, count) {
      addToBasket(id, count);
    },
    remove: function (id) {
      removeItem(parseInt(id));
    },
    update: function (id, cnt) {
      update(parseInt(id), parseInt(cnt));
    },
    updateBasketSumm: function () {
      showCostBasket();
    }
  }
}());

$(document).ready(function () {
  jQuery.Color.hook("fill stroke");

  initLogRegSwiper();

  allow_CustomScroll = !document.querySelector('html.mobile-platform');


  if (allow_CustomScroll) {
    // initTopMenuMenu
    var newTopMenuHeight = $('#menu-products .wrap-menus').height() + $('header').height();
    if (newTopMenuHeight > window.innerHeight) newTopMenuHeight = window.innerHeight;
    $('.forTopMenuScroll').css('height', newTopMenuHeight + 'px');
    topMenuScroll = Scrollbar.init($('.forTopMenuScroll .topMenuScroll')[0], {alwaysShowTracks: true});
    $('.forTopMenuScroll').attr('style', '');

    mainScroll = Scrollbar.init(document.getElementById('main-scrollbar'), {damping: 0.19});
  }


  //Add to cart
  $('body').on('click', '#btn_to_stash', function (e) {

    var $_price_id = $('.swiper-slide.wrap-card-price.active').find('.card-price').attr('data-id') || false;
    var $_count = 1;

    // $('#circle-stash circle').css({ 'cx': });
    var cx = (-($('#btn_to_stash').offset().left-e.clientX)/2);
    var cy = (-($('#btn_to_stash').offset().top-e.clientY)/2);


    $('#circle-stash circle').attr({
      'cx': cx,
      'cy': cy
    });

   if($('#circle-stash:animated, #circle-stash circle:animated').length != 0)  return;

    $('#circle-stash, #circle-stash circle').finish();
    setTimeout(function () {
      $('#circle-stash, #circle-stash circle').finish();
      $('#btn_to_stash').removeClass('clicked');
    }, 1);

    setTimeout(function () {
      $('#btn_to_stash').addClass('clicked');
      $('#circle-stash circle').animate({
        'r': '100'
      },{
        duration: 500,
        complete: function () {
          $('#circle-stash').animate({
            'opacity': '0'
          },{
            duration: 300,
            complete: function () {
              $('#circle-stash').css('opacity', 1);
              $('#circle-stash circle').css('r', 0);
              $('#btn_to_stash').removeClass('clicked');
            }
          });
        }
      });
    }, 10)

    basket.add($_price_id, $_count);
    return false;
  });

  //subscribe
  $('body').on('submit', '#subscribe', function () {
    var _form = $(this),
      _action = _form.attr('action'),
      mail = _form.find('input.email-input').val() || false;

    console.log('_action');
    console.log(_action);
    console.log(mail);
    if (mail && validateEmail(mail)) {
      alert('subscribe success mail');
      $.get(_action + '?email=' + mail, function (data) {
        alert("subscribe success SEND");
      });
    }
    return false;
  });

  var showDefaultModal = function (title,body) {
    $('#modal-thank_you_default').find('.section-title').html(title);
    $('#modal-thank_you_default').find('.ty-text').html(body);
    $('#modal-thank_you_default').attr('data-anim', 'true');
  };

  //filter news
  $('body').on('click', '.news-types-list li a', function () {
    var id = $(this).attr('data-type') || false;

    if (id === false) {
      $('.news-item[data-type]').show();
    } else {
      $('.news-types-list li').removeClass('active');
      $(this).parent('li').addClass('active');
      $('.news-item[data-type]').hide();
      $('.news-item[data-type="' + id + '"]').show();
    }
    return false;
  });

  var showDefaultModal = function (title,body) {
    $('#modal-thank_you_default').find('.section-title').html(title);
    $('#modal-thank_you_default').find('.ty-text').html(body);
    $('#modal-thank_you_default').attr('data-anim', 'true');
  };

  //contacts form
  $('body').on('submit', '#form-contacts', function () {
    var _form = $(this),
      _action = _form.attr('action'),
      name = _form.find('input[name="name"]').val() || false,
      email = _form.find('input[name="email"]').val() || false,
      message = _form.find('textarea[name="message"]').val() || false,

      thanksTitle = _form.find('.thanks-title').html(),
      thanksBody = _form.find('.thanks-body').html();

    $('#form-contacts input').removeClass('input-error');
    $('#form-contacts textarea').removeClass('input-error');

    $('#form-contacts input').each(function (el) {
      if($( this ).val() == ''){
        $( this ).addClass('input-error');
      }
    });
    $('#form-contacts textarea').each(function (el) {
      if($( this ).val() == ''){
        $( this ).addClass('input-error');
      }
    });
    if(!validateEmail(email)){
      _form.find('input[name="email"]').addClass('input-error');
    }

    if (email && validateEmail(email) && name && message) {
      var data = {
        name:name,
        email:email,
        message:message
      };

      $.ajax({
        url : _action,
        data : data,
        type : 'POST',
      })
      .done(function() {
        console.log('contacts form success SEND');
        showDefaultModal(thanksTitle,thanksBody);
      });
    }
    return false;
  });

  //user_profile update
  $('body').on('submit', '.user_profile', function () {
    var _form = $(this),
      _action = _form.attr('action'),
      name = _form.find('input[name="first_name"]').val(),
      lastname = _form.find('input[name="last_name"]').val(),
      phone = _form.find('input[name="phone"]').val(),
      region = _form.find('input[name="region"]').val();

    var data = {
      first_name:name,
      last_name:lastname,
      phone:phone,
      region:region,
      _method:'PATCH'
    };

    $.ajax({
      url : _action,
      data : data,
      type : 'POST',
      // contentType : 'application/json',
      // processData: false,
      // dataType: 'json',
    })
      .done(function() {
        console.log('user_profile success SEND');
        $('#modal-thank_you_profile').attr('data-anim', 'true');
      });
    return false;
  });

  // order
  $('body').on('submit', '#submitOrder', function () {
    var _form = $(this),
      _action = _form.attr('action'),
      //_method = _form.attr('method'),
      _data = {
        email: (_form.find('input[name="email"]').val() || false),
        first_name: (_form.find('input[name="first_name"]').val() || false),
        last_name: (_form.find('input[name="last_name"]').val() || false),
        phone: (_form.find('input[name="phone"]').val() || false),
        region: (_form.find('input[name="region"]').val() || false),
        city: (_form.find('input[name="city"]').val() || false),
        zip_code: (_form.find('input[name="zip_code"]').val() || false)
      },
      errForm = false;

    $.each(_data, function (key, val) {
      var err = false;
      if (key === 'email') {
        if (!validateEmail(val)) {
          err = true;
        }
      } else if (val === '') {
        err = true;
      }
      if (err) {
        errForm = true;
        _form.find('input[name="' + key + '"]').focus();
      }
    });

    if (!errForm) {
      _form.find('[type=" submit"]').attr('disabled', 'disabled');
      $.ajax({
        method: 'PUT',
        url: _action,
        data: _data
      }).done(function (data) {
        var suc = false;
        $.each(data, function (key, val) {
          if (key === 'user') {
            $('.open-modal-login').replaceWith('<a href="/dashboard" class="btn-login anim-underline">' + val + '</a>');
          }
          if (key === 'order' && val === 'success') {
            suc = true;
          }
        });
        if(suc){
          App.goToPage('/dashboard');
        }

        $('#modal-order').attr('data-anim', 'false');
        $('#modal-thank_you').attr('data-anim', 'true');
        $('body').addClass('overfl-h');
      }).fail(function (err) {
        console.log(err);
        $.each(err.responseJSON, function (name, data) {
          _form
            .find('input[name="' + name + '"]')
            .addClass('input- error')
            .focus();
          $.each(data, function (i, text) {
            console.warn(text);
          });
        });
      }).always(function () {
        _form.find('[type="submit"]').removeAttr('disabled');
      });
    }
    return false;

  });
  initPageAfterLoading();
});

function initPageAfterLoading() {

  var otherPage = true;

  var view_HeaderFooter = !document.querySelector('section[data-page-type="popup"]');

  if (view_HeaderFooter) {
    var timeOTopImg;
    showHeader();
    showFooter();
  }
  else {
    hideHeader();
    hideFooter();
  }


  if(mainScroll){
    mainScroll.options.speed = 1;
    mainScroll.addListener(function () {
      if (view_HeaderFooter) {
        if (mainScroll.offset.y > 0) $('header:not(.scroll)').addClass('scroll');
        else                         $('header.scroll').removeClass('scroll');

        $(window).on('scroll', function () {
          if ($(document).scrollTop()) $('header:not(.scroll)').addClass('scroll');
          else                         $('header.scroll').removeClass('scroll');
        });
      }
    });
  }


  // POPUP ZONES OR POPUP COLLECTIONS ============
  if (document.getElementById('zones-modal') || document.getElementById('collections-modal')) {
    otherPage = false;
    initZonColModalPage();
    $('#zones-modal, #collections-modal').attr('data-anim', 'true');
  }
  // END POPUP ZONES OR POPUP COLLECTIONS ===============


  // product-card =============================
  if (document.getElementById('product-card')) {
    otherPage = false;
    initProductCardPage();
    $('#product-card').attr('data-anim', 'true');
  }
  // END product-card =============================


  // news-item =============================
  if (document.getElementById('news-item')) {
    otherPage = false;
    $('#news-item').attr('data-anim', 'true');
  }
  // END news-item =============================


  setTimeout(function () {   initWaves()   }, 1500);

  if (!document.querySelector('html.mobile-platform')) {

    mainScroll.addListener(function (status) {
      // console.log(wavesBg_1)
      // if (wavesBg_1) {
      //   if (wavesBg_1.playing) wavesBg_1.pause();
      //   else wavesBg_1.play();
      // }

      // if (document.querySelector('body.press-design'))  return;
      //
      // if (status.offset.y != 0) $('header:not(.scroll)').addClass('scroll');
      // else $('header.scroll').removeClass('scroll');
      //
      // if ($('header').hasClass('show-top-menu')) {
      //   $('header').removeClass('show-top-menu');
      //   $('.btn-top-menu.active').removeClass('active');
      //   $('.top-menu-box.show').removeClass('show');
      // }
    });
  }

  // MAIN ========
  if (document.querySelector("main[data-page='/']")) { otherPage = false; initMainPage(); }

  // BASKET ========
  if (document.querySelector("main[data-page$='/basket']")) { otherPage = false; initBasketPage(); }

  // ZONES / COLLECTIONS ========
  if(document.querySelector("main[data-page='/zones']")       ||
    document.querySelector("main[data-page='/collections']") ||
    document.querySelector("main[data-page^='/zones/']")     ||
    document.querySelector("main[data-page^='/collections/']")
  ) {
    otherPage = false;
    initZenCollPage();
  }

  // NEWS ========
  if(document.querySelector("main[data-page='/news']"))  { otherPage = false; initNewsPage(); }

  // CATALOGUE ========
  if(document.querySelector("main[data-page^='/catalogue']"))  { otherPage = false; initCataloguePage(); }

  // DASHBOARD
  if(document.querySelector("main[data-page='/dashboard']"))  { otherPage = false; initDashboardPage(); }

  // ABOUT ========
  if(document.querySelector("main[data-page='/about']")) { otherPage = false; initAboutPage(); }

  // PrivacyPolicy ========
  if(document.querySelector("main[data-page='/privacy-policy']")) { otherPage = false; initPrivacyPolicyPage(); }

  // SHOWROOMS
  if(document.querySelector("main[data-page='/showrooms']")) { otherPage = false; initShowroomsPage(); }

  // CONTACTS
  if(document.querySelector("main[data-page='/contacts']")) { otherPage = false; initContactsPage(); }

  // FAQ
  if(document.querySelector("main[data-page='/faq']")) { otherPage = false; initFAQPage(); }

  // PRESS-DESIGN
  if(document.querySelector("main[data-page='/press-design']")) { otherPage = false; initPresDesignPage(); }

  // FINISH-TISSUE
  if(document.querySelector("main[data-page='/finish-tissue']")) { otherPage = false; initFinTishPage(); }


  // OTHER PAGE
  if(otherPage) { $("main [data-anim='false']").attr('data-anim', 'true'); }

  mainScroll && mainScroll.update();
}


function hideElemsBeforeBack(){
  $("[data-anim='true']").attr('data-anim', 'false');
}

function showHeader() {
  $('.nav-icon').removeClass('hide');
  setTimeout(function () {
    $('.short-nav-item:eq(0)').removeClass('hide')
  }, 150);
  setTimeout(function () {
    $('.short-nav-item:eq(1)').removeClass('hide')
  }, 400);
  setTimeout(function () {
    $('.wrap-login').removeClass('hide')
  }, 550);
  setTimeout(function () {
    $('.wrap-stash-ico').removeClass('hide')
  }, 700);
  setTimeout(function () {
    $('.wrap-banner-cont:eq(0)').attr('data-anim', 'true')
  }, 900);

  setTimeout(function () {
    $('.svg-main-logo').removeClass('hide')
  }, 450);
  setTimeout(function () {
    $('.lang-panel').removeClass('hide')
  }, 480);
}
function hideHeader() {
  $('.nav-icon').addClass('hide');

  setTimeout(function () {
    $('.short-nav-item:eq(0)').addClass('hide')
  }, 150);
  setTimeout(function () {
    $('.short-nav-item:eq(1)').addClass('hide')
  }, 400);
  setTimeout(function () {
    $('.wrap-login').addClass('hide')
  }, 550);
  setTimeout(function () {
    $('.wrap-stash-ico').addClass('hide')
  }, 700);
  setTimeout(function () {
    $('.wrap-banner-cont:eq(0)').attr('data-anim', 'false')
  }, 900);

  setTimeout(function () {
    $('.svg-main-logo').addClass('hide')
  }, 450);
  setTimeout(function () {
    $('.lang-panel').addClass('hide')
  }, 480);
}

function showFooter() {
  $('footer').removeClass('hide');
}
function hideFooter() {
  $('footer').addClass('hide');
}

$('.wrap-login-side a').on('click', function (e) {
  e.preventDefault();

  $('#modal-log_reg').attr('hide').addClass('show');
  $('.wrap-left-nav').removeClass('show');
  $('.nav-icon').removeClass('open');
  $(document.body).addClass('overfl-h');
  $('.btn-top-menu.active').removeClass('active');
  $('.top-menu-box.show').removeClass('show');
  $('header').removeClass('show-top-menu')
    .removeClass('show-left-menu');
});


$(window).on('resize', function () {
  //RESIZE TOPDROPMENU
  var thisDropMenu = $('.top-menu-box.show');
  var newTopMenuHeight = thisDropMenu.find('.wrap-menus').height() + $('header').height();
  if (newTopMenuHeight > window.innerHeight) newTopMenuHeight = window.innerHeight;
  if (thisDropMenu.find('.forTopMenuScroll').length) topMenuScroll.setPosition(0, 0);
  document.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
});



var timeOTopImg;
$('.top-menu-box.collection li >a').on('mouseenter', function () {
  var index = $(this).closest('li').index();

  var showedImg = document.querySelector('.top-menu-box.collection .wrap-coll-top-menu-img.show');
  var willShowImg = $(this).next();

  if (willShowImg.hasClass('show'))  return;

  var lastSritedImgEl = $('.sprite-wrap-coll-top-menu-img .last');
  var firstSritedImgEl = $('.sprite-wrap-coll-top-menu-img .first');

  var firstSritedImgUrl = firstSritedImgEl.css('background-image');


  var wrapSprite = document.querySelector('.sprite-wrap-coll-top-menu-img');
  wrapSprite.setAttribute('style', '');


  if (firstSritedImgUrl != 'none') {
    lastSritedImgEl.css('background-image', firstSritedImgUrl);
  }

  firstSritedImgEl
    .css('background-image', willShowImg.css('background-image'));


  setTimeout(function () {
    wrapSprite.style.transition = 'transform .4s ease, -webkit-transform .4s ease';
    wrapSprite.style.transform = 'translate(0, 50%)';
    wrapSprite.style['-webkit-transform'] = 'translate(0, 50%)';
  }, 1);


  var menuImgDelay = 0;
  if (showedImg) {
    showedImg.classList.remove('show');
    menuImgDelay = 250;
  }

  clearTimeout(timeOTopImg);
  timeOTopImg = setTimeout(function () {
    willShowImg.addClass('show');
  }, menuImgDelay);
});


document.addEventListener('click', function (event) {
  if ($('header').hasClass('show-left-menu') && $(event.target).hasClass('wrap-left-nav')) {

    $('header').removeClass('show-left-menu');
    $('.nav-icon').removeClass('open');
    $('.wrap-left-nav').removeClass('show');
    // mainScroll && mainScroll.enable();

    $(document.body).removeClass('overfl-h');
  }
});

$('.btn-top-menu').on('mouseenter', function () {

  var thisDropMenu = $('#' + this.getAttribute('for'));
  var newTopMenuHeight = thisDropMenu.find('.wrap-menus').height() + $('header').height();
  if (newTopMenuHeight > window.innerHeight) newTopMenuHeight = window.innerHeight;
  if (thisDropMenu.find('.forTopMenuScroll').length) topMenuScroll.setPosition(0, 0);


  if (!$('header').hasClass('show-top-menu')) {
    $('header').addClass('show-top-menu');

    thisDropMenu.removeClass('show');
    setTimeout(function () {
      thisDropMenu.addClass('show')
    }, 2);

    $('.btn-top-menu[for=' + this.getAttribute('for') + ']').addClass('active');
    document.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
    return;
  }

  if ($('.btn-top-menu.active')[0] != this) {
    $('.btn-top-menu.active').removeClass('active');
    $('.top-menu-box.show').removeClass('show');
    this.classList.add('active');

    thisDropMenu.addClass('show');
    document.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
  }
});


$('.wrap-search input').on('focus blur', function () {
  if (window.innerWidth > 1024) $(this).closest('.wrap-search').toggleClass('full-w');
});

$('.drop-down').on('click', function () {
  $(this).toggleClass('open');
});



var newProductsRightSideScroll;
//MAIN
function initMainPage() {
  console.log('Main page');

  var timeChangeAutoNewProdDot = 7000;

  var bannerCircleDelayStart = 100;
  var collectionCarousel;
  var slidesPerViewPrev;

  var wrapRSlidebox = {};

  var itemOffsetOurPhil;

  var cardModalSwip;

  var ourPhilosophyTitle;
  var shopByCollection;
  var collCarous;

  var allowScrollMainSlidebox;

  newProductsRightSideScroll = ScrollbarX.init(document.querySelector('.new-products-right-side'), {
    continuousScrolling: true,
    damping:.1,
    speed: 0,
    overscrollDamping: .2,
  });

  newProductsRightSideScroll.addListener(function (status) {
  });


  $('.new-products-right-side').on({
    'mousemove': function (event) {
       if (mainScroll) mainScroll.options.speed = 0;
       if (newProductsRightSideScroll) newProductsRightSideScroll.options.speed = 1;
      // var currValScrollUndBanner = $(this).find('.new-products-right-item:not(.hide)').offset().left;
    },
    'mouseenter': function (event) {
      allowScrollMainSlidebox = true;

      if (mainScroll) mainScroll.options.speed = 0;
      if (newProductsRightSideScroll) newProductsRightSideScroll.options.speed = 1;

      clearInterval(intervalNewProdDot);
    },
    'mouseleave': function (event) {
      // allowScrollMainSlidebox = false;
      if (mainScroll) mainScroll.options.speed = 1;
      if (newProductsRightSideScroll) newProductsRightSideScroll.options.speed = 0;
    },
    'mousewheel': function (event) {
      // if (!mainScroll || !allowScrollMainSlidebox)  return;
      //
      // var currValScrollUndBanner = $(this).find('.new-products-right-item:not(.hide)').offset().left;
      //
      // if (currValScrollUndBanner == prevValScrollUndBanner) {
      //   mainScroll.options.speed = 1;
      // }
      //
      // if (prevValScrollUndBanner == currValScrollUndBanner && event.deltaY == -1) {
      //   mainScroll.options.speed = 1;
      // }
      //
      // if (prevValScrollUndBanner != currValScrollUndBanner) {
      //   mainScroll.options.speed = 0;
      // }
      //
      //
      // var razn = $(this).offset().left - currValScrollUndBanner;
      // var delta = parseInt(event.originalEvent.wheelDelta || -event.originalEvent.detail);
      // if (razn - event.deltaY > razn) razn += 80;
      // var self = this;
      // // $('html, body').animate({scrollLeft: $(currentElement).offset().left}, 800);
      // // $(this).finish();
      // // $(this).animate({scrollLeft: razn-event.deltaY*100 }, 100);
      // $(this).scrollLeft(razn - event.deltaY * 100);
      //
      //
      // prevValScrollUndBanner = currValScrollUndBanner;// - razn-event.deltaY*100;
    }
  });


  var prevValScrollUndBanner = 0;

  $('.inner-logo a').on('click', function (e) {
    if (!$(this).hasClass('lang-item')) {
      e.preventDefault();

      if (mainScroll && mainScroll.offset.y == 0)  return;

      if (mainScroll) mainScroll.scrollTo(0, 0, mainScroll.offset.y / 4, function () {
        if (wavesBg_1) wavesBg_1.play();
      });
      else  $('body').animate({scrollTop: 0}, $('body').scrollTop() / 5);
    }
  });


  $(window).on({
    'resize': function () {
      initCollectionCarousel();
      itemOffsetCollection = $('#shop-by-collection').offset().top - (window.innerHeight * 0.1);
    },
    'scroll': function (event) {
      if (!mainScroll && document.querySelector("main[data-page='/']")) {
        var currScrolled = $(document).scrollTop();
        var percVisOurPhil = -($('#our-philosophy').offset().top - currScrolled - window.innerHeight) / window.innerHeight;
        var percVisShopByColl = -($('#shop-by-collection').offset().top - currScrolled - window.innerHeight) / window.innerHeight;
        var brPShopByColl = $('#shop-by-collection').offset().top;
        var percVisShopByCat = -($('#shop-by-cat').offset().top - currScrolled - window.innerHeight) / window.innerHeight;
        var percVisShopByCatBtn = -($('.wrap-btn-more').offset().top - currScrolled - window.innerHeight) / window.innerHeight;


        if (itemOffsetOurPhil !== true) itemOffsetOurPhil = brPShopByColl - (window.innerHeight * 1.1) - currScrolled;
        itemOffsetCollection = brPShopByColl - (window.innerHeight * 0.1) - currScrolled;


        if (0 < itemOffsetCollection) {
          document.getElementById('wrapper-bg').style.opacity = (900 - itemOffsetCollection) / 600;
        }
        else {
          document.getElementById('wrapper-bg').style.opacity = 2.4 - (80 - itemOffsetCollection) / 730;
        }


        if (percVisOurPhil > 0.2) $('#our-philosophy h3.section-title').attr('data-anim', 'true');
        if (percVisOurPhil > 0.4) $('.wrap-philosophy.a').attr('data-anim', 'true');
        if (percVisOurPhil > 0.6) $('.phil-right').attr('data-anim', 'true');


        if (percVisShopByColl > 0.4) {
          $('#shop-by-collection h3.section-title').attr('data-anim', 'true');
          if (percVisShopByColl > 0.55) $('#shop-by-collection').attr('data-anim', 'true');
        }


        if (percVisShopByCat > 0.25) {
          $('#shop-by-cat h3.section-title').attr('data-anim', 'true');


          $(".cat[data-anim='false']").each(function (key) {
            var thisVis = -($(this).offset().top - currScrolled - window.innerHeight) / window.innerHeight;

            if (thisVis > 0.2) $(this).attr('data-anim', 'true');
          });
        }

        if (percVisShopByCatBtn > 0.1) $('#shop-by-cat .wrap-btn-more').attr('data-anim', 'true');
      }
    }
  });

  $(document).on({
    'mousemove': function (event) {
      if (wrapRSlidebox.target) {
        var razn = event.clientX - wrapRSlidebox.x;
        $(wrapRSlidebox.target).scrollLeft(-razn);
      }
    },
    'mouseup': function (event) {
      wrapRSlidebox.target = undefined;
    }
  });

  function initCollectionCarousel() {
    var slidesPerView = 4;
    var windWidth = window.innerWidth;

    $('.item-coll.coll-swiper-arr.right').removeClass('coll-swiper-arr right');

    if (850 < windWidth && windWidth <= 1024) slidesPerView = 2.5;
    if (750 < windWidth && windWidth <= 850) slidesPerView = 2.0;
    if (640 < windWidth && windWidth <= 750) slidesPerView = 1.8;
    if (windWidth <= 640) slidesPerView = 1.5;


    if (slidesPerViewPrev != slidesPerView) {
      $('.collection-carousel .item-coll.coll-swiper-arr').removeClass('coll-swiper-arr left right');
      if (!slidesPerViewPrev) slidesPerViewPrev = slidesPerView;
      collectionCarousel && collectionCarousel.destroy();
      collectionCarousel = new Swiper('.collection-carousel', {
        slidesPerView: slidesPerView,
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 20,
        loop: true,
      });
    }

    if (window.innerWidth > 1024) {
      collectionCarousel && collectionCarousel.destroy();
      collectionCarousel = new Swiper('.collection-carousel', {
        slidesPerView: slidesPerView,
        centeredSlides: true,
        loopAdditionalSlides: 1,
        runCallbacksOnInit: false,
        loop: true,
        prevButton: '.zc-modal-swip-arrow.prev',
        nextButton: '.zc-modal-swip-arrow.next',
        onSlideChangeEnd: function () {
          if (window.innerWidth > 1024) {

            $('.collection-carousel .item-coll.coll-swiper-arr').removeClass('coll-swiper-arr left right');
            var collPrevSlides = $('.collection-carousel .item-coll.swiper-slide.swiper-slide-prev');
            var collNextSlides = $('.collection-carousel .item-coll.swiper-slide.swiper-slide-next').next().next();
            collPrevSlides.addClass('coll-swiper-arr left');
            collNextSlides.addClass('coll-swiper-arr right');

            beCollScrolled = true;
          }
        },
        onInit: function () {
          $('.collection-carousel .item-coll.coll-swiper-arr').removeClass('coll-swiper-arr left right');
          var collPrevSlides = $('.collection-carousel .item-coll.swiper-slide.swiper-slide-prev');
          var collNextSlides = $('.collection-carousel .item-coll.swiper-slide.swiper-slide-next').next().next();
          collPrevSlides.addClass('coll-swiper-arr left');
          collNextSlides.addClass('coll-swiper-arr right');
        }
      });
    }
  }

  $(document).on('click', '.item-coll.coll-swiper-arr', function (event) {
    event.preventDefault();

    if ($(event.target).closest('.item-coll').hasClass('right')) {
      collectionCarousel.slideNext();
      // collectionCarousel.slideTo(collectionCarousel.activeIndex + 2);
    }
    if ($(event.target).closest('.item-coll').hasClass('left')) {
      collectionCarousel.slidePrev();
      // collectionCarousel.slideTo(collectionCarousel.activeIndex - 2);
    }
  });

  $(document).on('mouseenter mouseleave', '.coll-swiper-arr', function (e) {
    var collItemWrap = $(e.target).closest('.coll-swiper-arr');

    if (e.type == 'mouseenter') {
      if (collItemWrap.hasClass('left')) {
        $('.coll-carousel-arr .prev').addClass('hov');
      }
      if (collItemWrap.hasClass('right')) {
        $('.coll-carousel-arr .next').addClass('hov');
      }
    }

    if (e.type == 'mouseleave') {
      if (collItemWrap.hasClass('left')) {
        $('.coll-carousel-arr .prev').removeClass('hov');
      }
      if (collItemWrap.hasClass('right')) {
        $('.coll-carousel-arr .next').removeClass('hov');
      }
    }
  });

  $(document).on('mouseenter mouseleave', '.zc-modal-swip-arrow', function (e) {
    if (e.type == 'mouseenter') {
      if ($(e.target).hasClass('prev')) {
        $('.coll-swiper-arr.left').addClass('hov');
      }
      if ($(e.target).hasClass('next')) {
        $('.coll-swiper-arr.right').addClass('hov');
      }
    }

    if (e.type == 'mouseleave') {
      if ($(e.target).hasClass('prev')) {
        $('.coll-swiper-arr.left').removeClass('hov');
      }
      if ($(e.target).hasClass('next')) {
        $('.coll-swiper-arr.right').removeClass('hov');
      }
    }
  });

  $(document).on('mouseenter mouseleave', '.banner-circle.showed', function (e) {

    clearInterval(intervalNewProdDot);

    var sircleStroke = $(this).find('circle.stroke');
    var sircleFilled = $(this).find('circle.filled');
    sircleStroke.stop();
    sircleFilled.stop();


    var sircleStrokeAnimEnterVal = {r1: 14};
    var sircleStrokeAnimLeaveVal = {r1: 17.5};
    var sircleFilledAnimEnterVal = {r1: 8};
    var sircleFilledAnimLeaveVal = {r1: 7};


    if (e.type == 'mouseenter') {
      $(sircleStrokeAnimEnterVal).animate({
        r1: 17.5
      }, {
        duration: 400,
        step: function (now, fx) {
          sircleStroke.attr('r', now);
        }
      });


      $(sircleFilledAnimEnterVal).animate({
        r1: 7
      }, {
        duration: 400,
        step: function (now, fx) {
          sircleFilled.attr('r', now);
        },
      });
    }

    if (e.type == 'mouseleave') {
      $(sircleStrokeAnimLeaveVal).animate({
        r1: 14
      }, {
        duration: 400,
        step: function (now, fx) {
          sircleStroke.attr('r', now);
        }
      });


      $(sircleFilledAnimLeaveVal).animate({
        r1: 8
      }, {
        duration: 400,
        step: function (now, fx) {
          sircleFilled.attr('r', now);
        }
      });
    }
  });

  function animBannerCircle(container) {
    if (window.innerWidth <= 1024)  return;

    //  ==== HIDE ===
    $(container).find('.banner-circle').removeClass('showed');
    $(container).find('.banner-circle .svg-banner-circle path').finish().attr('d', '');
    $(container).find('.banner-circle .svg-banner-circle circle.filled').finish().attr('cx', 30).attr('cy', 30).attr('r', 0);
    // END  ==== HIDE ===


    $(container).find('.banner-circle').each(function (key, el) {

      var currSvg_circle = $(el).find('.svg-banner-circle circle.filled')[0];
      var currSvg_path = $(el).find('.svg-banner-circle path')[0];
      var delay = bannerCircleDelayStart + key * 300;

      $(currSvg_path).delay(delay).animate({
        stroke: "white",
        percent: 100,
      }, {
        duration: 900,
        easing: $.bez([.52, .02, .26, .87]),
        step: function (now, fx) {
          if (fx.prop == 'percent') {
            var calcAngle = 0 + (now / 100) * (-360);
            var calcRadius = 30 + (now / 100) * (  -4);

            drawCircle(this, calcAngle, calcRadius);
          }
        },
        complete: function () {
          this.percent = 0;
          $(this).animate({
            percent: 100,
          }, {
            duration: 400,
            easing: $.bez([.13, .24, .73, .38]),
            step: function (now, fx) {
              var calcRadius = 26 + ((now / 100) * (-12));
              drawCircle(this, 360, calcRadius);
            },
            complete: function () {
              var self = this;
              setTimeout(function () {
                $(self).closest('.banner-circle').addClass('showed');
              }, 100);

              this.percent = 0;
            }
          });
        }
      });


      currSvg_circle.r1 = 0;
      $(currSvg_circle).delay(delay).animate({
        r1: 11,
        fill: 'white',
      }, {
        duration: 900,
        easing: $.bez([.52, .02, .26, .87]),
        step: function (now, fx) {
          if (fx.prop == 'r1') this.setAttribute('r', now);
        },
        complete: function () {
          this.r1 = 0;
          $(this).animate({
            r1: 3,
            fill: '#b56349',
          }, {
            duration: 400,
            easing: $.bez([.46, .12, .64, .51]),
            step: function (now, fx) {
              if (fx.prop == 'r1') this.setAttribute('r', 11 - now);
            },
          });
        }
      });
    });
  }

  function drawCircle(pathCircle, angle, radius) {
    // center point
    var cX = 30,
      cY = 30,
      circle = pathCircle;

    var this_angle = angle;
    this_angle %= 360;

    var p1 = {x: cX + radius, y: cY};
    var p2 = {x: cX - radius, y: cY};

    var radians = (angle / 180) * Math.PI;
    var x = cX + Math.cos(radians) * radius;
    var y = cY + Math.sin(radians) * radius;

    var d;

    if (Math.abs(this_angle) < 180 && this_angle != 0)
      d = 'M ' + p1.x + ',' + p1.y + ' A' + radius + ',' + radius + (Math.abs(this_angle) == 180 ? ' 0 1 0 ' : ' 0 0 0 ') + x + ' ' + y;
    else
      d = 'M ' + p1.x + ',' + p1.y + ' A' + radius + ',' + radius + ' 0 1 0 ' + p2.x + ' ' + p2.y +
        ' M ' + p2.x + ',' + p2.y + ' A' + radius + ',' + radius + (Math.abs(this_angle) == 0 ? ' 0 1 0 ' : ' 0 0 0 ') + x + ' ' + y;

    circle.setAttribute("d", d);
  }

  function autoChangeActiveNewProdDot() {
    intervalNewProdDot = setInterval(function () {
      var nextNewProdDot = $('.new-products-dots .new-prod-dot.active').next()[0];
      if (!nextNewProdDot) nextNewProdDot = $('.new-products-dots .new-prod-dot').eq(0);

      var indexNewProd = $(nextNewProdDot).index();


      $('.new-prod-dot.active').removeClass('active');
      $(nextNewProdDot).addClass('active');


      var hiddingSlideboxL = $('#wrap-left-slidexbox .slidebox').not('.hide');
      hiddingSlideboxL.addClass('hide');

      setTimeout(function () {
        $('#wrap-left-slidexbox .slidebox')[indexNewProd].classList.remove('hide');
      }, 10);


      $('#wrap-banner-img-box .banner-top-item').not('.hide').addClass('hide');
      var currBannerTopItem = $('#wrap-banner-img-box .banner-top-item')[indexNewProd];
      currBannerTopItem.classList.remove('hide');
      animBannerCircle(currBannerTopItem);


      var hiddingSlideboxR = $('.new-products-right-side .wrap-right-slidebox').not('.hide');
      hiddingSlideboxR.addClass('hide').find('.new-products-right-item').addClass('hide');
      setTimeout(function () {
        hiddingSlideboxR.addClass('disp-none');
      }, 100);

      var wrapRightSlidexbox = $('.new-products-right-side .wrap-right-slidebox')[indexNewProd];
      wrapRightSlidexbox.classList.remove('hide');
      wrapRightSlidexbox.classList.remove('disp-none');


      setTimeout(function () {
        $('.new-products-right-side').scrollLeft(0);
      }, 150);
      $(wrapRightSlidexbox).find('.new-products-right-item').each(function (key, el) {
        setTimeout(function () {
          el.classList.remove('hide');
        }, 150 * key);
      });

    }, timeChangeAutoNewProdDot);
  }

  $('.new-products-dots .new-prod-dot').on('click', function () {
    if ($(this).hasClass('active'))  return;

    clearInterval(intervalNewProdDot);

    var indexNewProd = $(this).index();


    $('.new-prod-dot.active').removeClass('active');
    $(this).addClass('active');


    var hiddingSlideboxL = $('#wrap-left-slidexbox .slidebox').not('.hide');
    hiddingSlideboxL.addClass('hide');

    setTimeout(function () {
      $('#wrap-left-slidexbox .slidebox')[indexNewProd].classList.remove('hide');
    }, 10);


    $('#wrap-banner-img-box .banner-top-item').not('.hide').addClass('hide');
    var currBannerTopItem = $('#wrap-banner-img-box .banner-top-item')[indexNewProd];
    currBannerTopItem.classList.remove('hide');
    animBannerCircle(currBannerTopItem);


    var hiddingSlideboxR = $('.new-products-right-side .wrap-right-slidebox').not('.hide');
    hiddingSlideboxR.addClass('hide').find('.new-products-right-item').addClass('hide');
    setTimeout(function () {
      hiddingSlideboxR.addClass('disp-none');
    }, 100);


    var wrapRightSlidexbox = $('.new-products-right-side .wrap-right-slidebox')[indexNewProd];
    wrapRightSlidexbox.classList.remove('hide');
    wrapRightSlidexbox.classList.remove('disp-none');

    setTimeout(function () {
      // $('.new-products-right-side').scrollLeft(0);
      newProductsRightSideScroll.setPosition(0, 0);
    }, 150);
    $(wrapRightSlidexbox).find('.new-products-right-item').each(function (key, el) {
      setTimeout(function () {
        el.classList.remove('hide');
      }, 150 * key);
    });
  });

  $('.item-coll .img-back svg').each(function (key, el) {
    var posX = Math.random() * (40 - 10) + 10;
    var posY = Math.random() * (40 - 10) + 10;
    var rotDeg = 270 * Math.random();

    var transformVal = 'translate(-' + posX + '%,-' + posY + '%) rotate(' + rotDeg + 'deg)';
    $(el).css({
      '-webkit-transform': transformVal,
      'transform': transformVal
    });
  });

  $('.new-products-right-side').on('mousedown', function (event) {
    wrapRSlidebox.target = this;

    var posFirstEl = $(this).offset().left - $(this).find('.new-products-right-item:not(.hide)').offset().left + 70;
    wrapRSlidebox.x = event.clientX + posFirstEl;

    event.preventDefault();
  });

  function scrollFunc() {
    mainScroll.addListener(function(status){
      if(!document.querySelector("main[data-page='/']"))  return;

      if (itemOffsetOurPhil !== true) itemOffsetOurPhil = $('.wrap-philosophy.a').offset().top - (window.innerHeight * 0.7);
      itemOffsetCollection = $('#shop-by-collection').offset().top - (window.innerHeight * 0.1);

      if (0 < itemOffsetCollection) {
        document.getElementById('wrapper-bg').style.opacity = (900 - itemOffsetCollection) / 600;
      }
      else {
        document.getElementById('wrapper-bg').style.opacity = 2.4 - (80 - itemOffsetCollection) / 730;
      }

      if (itemOffsetOurPhil < 0 && itemOffsetOurPhil !== true) {
        itemOffsetOurPhil = true;

        $('.wrap-philosophy.a').attr('data-anim', 'true');
        setTimeout(function () {
          $('.phil-right').attr('data-anim', 'true')
        }, 170);
      }


      if (mainScroll.isVisible(ourPhilosophyTitle)) $('#our-philosophy h3.section-title').attr('data-anim', 'true');


      if (mainScroll.isVisible(collCarous)) {
        $('#shop-by-collection h3.section-title').attr('data-anim', 'true');

        var pxVisibledSwiper = -($(collCarous).offset().top - window.innerHeight);
        var dispUpperSwiper = (pxVisibledSwiper > $(collCarous).height() * 40 / 100);

        if (dispUpperSwiper) $(shopByCollection).attr('data-anim', 'true');
      }


      if (mainScroll.isVisible(document.querySelector('#shop-by-cat'))) {
        var percViewCatTitle = (-($('#shop-by-cat h3.section-title').offset().top - window.innerHeight)) / window.innerHeight;
        var percViewCatTable = (-($('#shop-by-cat .cat-wrapper').offset().top - window.innerHeight)) / window.innerHeight;
        var percViewCatButtn = (-($('#shop-by-cat .wrap-btn-more').offset().top - window.innerHeight)) / window.innerHeight;


        if (percViewCatTitle > 0.2) $('#shop-by-cat h3.section-title').attr('data-anim', 'true');
        if (percViewCatTable > 0.25) {
          $("#shop-by-cat .cat[data-anim='false']").attr('data-anim', 'true');
          $("#shop-by-cat .cat-wrapper").attr('data-anim', 'true');
        }
        if (percViewCatButtn > 0.08) $('#shop-by-cat .wrap-btn-more').attr('data-anim', 'true');
      }
    });
  }

  ourPhilosophyTitle = document.querySelector('#our-philosophy .wrap-philosophy');
  shopByCollection = document.getElementById('shop-by-collection');
  collCarous = document.querySelector('.collection-carousel');

  initCollectionCarousel();

  if (mainScroll) scrollFunc();

  animBannerCircle(document.querySelector('.banner-top-item'));

  setTimeout(function () {
    $('.new-products-left-side').attr('data-anim', 'true');
    $('#banner').attr('data-anim', 'true');
  }, 1);
  setTimeout(function () {
    $('.new-products-right-side, .wrap-new-products-gradiet').attr('data-anim', 'true');

    setTimeout(function () {
      var $_firstWrapRightSlidebox = $('.new-products-right-side .wrap-right-slidebox').eq(0);
      $_firstWrapRightSlidebox.removeClass('hide');
      $_firstWrapRightSlidebox.find('.new-products-right-item').each(function (key, el) {
        setTimeout(function () {
          el.classList.remove('hide');
        }, 150 * key);
      });
    }, 400);

  }, 300);

  // AUTO CLICK NewProdDot =========
  autoChangeActiveNewProdDot();
  // ===============================

  setTimeout(function () {
    if ($('body').hasClass('poppup')) showMainPopup()
  }, 2000);
}

//ZON COL MODAL PAGE
function initZonColModalPage() {
  var zcModalSwip = new Swiper('.zc-modal-carousel', {
    slidesPerView: 1,
    speed: 1000,
    autoplay: 4000,
    loop: true,
    effect: 'fade', //"coverflow"
    prevButton: '.zc-modal-swip-arrow.prev',
    nextButton: '.zc-modal-swip-arrow.next',
    pagination: '.swiper-pagination',
    paginationType: 'progress'
  });
}

//ABOUT
function initAboutPage(){
  console.log('About page');

  var indicArrow = document.getElementById('indicator-arrow');
  var aboutPageLen = $('#about-mood').offset().top;

  $('.indicator a').on('click', function (event) {
    event.preventDefault();

    var durationScroll = Math.abs($(this.getAttribute('href')).offset().top) * 0.3;
    if (mainScroll) {
      mainScroll.scrollTo(0, mainScroll.offset.y + $(this.getAttribute('href')).offset().top, durationScroll / 2, function () {
        if (wavesBg_1) wavesBg_1.play();
      });
    }
    else {
      $('body').animate({scrollTop: $(this.getAttribute('href')).offset().top}, durationScroll);
    }

  });


  $('.banner-cont-read a').on('click', function (event) {
    event.preventDefault();
    var durationScroll = Math.abs($(this.getAttribute('href')).eq(0).offset().top) * 0.3;

    if (mainScroll) {
      mainScroll.scrollTo(0, mainScroll.offset.y + $(this.getAttribute('href')).offset().top - 100, durationScroll, function () {
        if (wavesBg_1) wavesBg_1.play();
      });
    }
    else {
      $('body').animate({scrollTop: $(this.getAttribute('href')).offset().top - 100}, durationScroll / 3);
    }
  });


  if (window.innerWidth > 1024) {
    checkIndicators();

    setTimeout(function () {
      $('#about-history .wrap-banner-cont').attr('data-anim', 'true');
    }, 500);
    setTimeout(function () {
      $('#wrap-page-indicators').attr('data-anim', 'true');
    }, 700);
  }

  if (mainScroll) scrollFunc();


  var footerBeVis = false;

  function scrollFunc() {
    mainScroll.addListener(function () {
      if(document.querySelector("main[data-page='/about']")) {
        var wrapImgUnderHistoryLeft = $('.wrap-img-under-history-left').offset().top - (window.innerHeight * 0.77);
        var wrapTextUnderHistoryRight = $('.wrap-text-under-history-right').offset().top - (window.innerHeight * 0.77);
        var wrapImgUnderHistoryRight = $('.wrap-img-under-history-right').offset().top - (window.innerHeight * 0.77);
        var wrapTextUnderHistoryLeft = $('.wrap-text-under-history-left').offset().top - (window.innerHeight * 0.8);


        var aboutPhilCont = $('#about-philosofhy .banner-center').offset().top - (window.innerHeight * 0.55);
        var aboutMoodCont = $('#about-mood .banner-center').offset().top - (window.innerHeight * 0.55);


        var itemOffsetAboutPhil = $('#about-philosofhy').offset().top - (window.innerHeight * 0.1);
        var itemOffsetAboutMood = $('#about-mood').offset().top - (window.innerHeight * 0.1);


        var wrap2ColUnderPhil = $('#wrap-2-col-under-phil').offset().top - (window.innerHeight * 0.7);
        var itemOffsetAboutRomb = $('#about-romb').offset().top - (window.innerHeight * 0.7);
        var itemOffsetMoodBig = $('#inner-mood-big').offset().top - (window.innerHeight * 0.7);

        var colUnderMoodText = $('.col-under-mood-text').offset().top - (window.innerHeight * 0.7);


        if (0 < itemOffsetAboutPhil) {
          document.getElementById('wrapper-bg-philosofhy').style.opacity = (1200 - itemOffsetAboutPhil) / 730;
        }
        else {
          document.getElementById('wrapper-bg-mood').style.opacity = (1200 - itemOffsetAboutMood) / 730;
        }


        if (0 > wrapImgUnderHistoryLeft) $('.wrap-img-under-history-left:eq(0)').attr('data-anim', 'true');
        if (0 > wrapTextUnderHistoryRight) $('.wrap-text-under-history-right:eq(0)').attr('data-anim', 'true');

        if (0 > aboutPhilCont) $('#about-philosofhy .wrap-banner-cont:eq(0)').attr('data-anim', 'true');
        if (0 > aboutMoodCont) $('#about-mood .wrap-banner-cont:eq(0)').attr('data-anim', 'true');

        if (0 > wrapImgUnderHistoryRight) $('.wrap-img-under-history-right:eq(0)').attr('data-anim', 'true');
        if (0 > wrapTextUnderHistoryLeft) $('.wrap-text-under-history-left:eq(0)').attr('data-anim', 'true');
        if (0 > wrap2ColUnderPhil) $('#wrap-2-col-under-phil').attr('data-anim', 'true');
        if (0 > itemOffsetAboutRomb) $('#about-romb').attr('data-anim', 'true');
        if (0 > itemOffsetMoodBig) $('.mood-big').attr('data-anim', 'true');
        if (0 > colUnderMoodText) $('.col-under-mood-text').attr('data-anim', 'true');


        var notWaveToTop = false;
        if ($('#about-history').offset().top - (window.innerHeight) > 0) {
          wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[0]);
          notWaveToTop = true;
        }
        if ($('#about-philosofhy').offset().top - (window.innerHeight) < 0) {
          wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[1]);
          notWaveToTop = true;
        }
        if ($('#about-mood').offset().top - (window.innerHeight) < 0) {
          notWaveToTop = true;
          wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[2]);
        }
        if (!notWaveToTop) {
          wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[0]);
        }

        if (mainScroll.isVisible(document.querySelector('footer')) && !footerBeVis) {
          $('#wrap-page-indicators').addClass('hide');
          footerBeVis = true;
        }
        if (!mainScroll.isVisible(document.querySelector('footer')) && footerBeVis) {
          $("#wrap-page-indicators[data-anim='false']").attr('data-anim', 'true');
          footerBeVis = false;
        }

        checkIndicators();
      }
    });
  }

  $(window).on('scroll', function (event) {
    if (!mainScroll && document.querySelector("main[data-page='/about']")){
      var currScrolled = $(document).scrollTop();

      var heightVisHist = $('#about-history').offset().top + $('#about-history').height() - currScrolled;
      var heightVisPhil = $('#about-philosofhy').offset().top + $('#about-philosofhy').height() - currScrolled;
      var heightVisMood = $('#about-mood').offset().top + $('#about-mood').height() - currScrolled;


      var wrapImgUnderHistoryLeft = $('.wrap-img-under-history-left').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var wrapTextUnderHistoryRight = $('.wrap-text-under-history-right').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var wrapImgUnderHistoryRight = $('.wrap-img-under-history-right').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var wrapTextUnderHistoryLeft = $('.wrap-text-under-history-left').offset().top - (window.innerHeight * 0.9) - currScrolled;

      var aboutPhilCont = $('#about-philosofhy .banner-center').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var aboutMoodCont = $('#about-mood .banner-center').offset().top - (window.innerHeight * 0.7) - currScrolled;

      var itemOffsetAboutPhil = $('#about-philosofhy').offset().top - (window.innerHeight * 0.1) - currScrolled;
      var itemOffsetAboutMood = $('#about-mood').offset().top - (window.innerHeight * 0.1) - currScrolled;

      var wrap2ColUnderPhil = $('#wrap-2-col-under-phil').offset().top - (window.innerHeight * 0.6) - currScrolled;
      var itemOffsetAboutRomb = $('#about-romb').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var itemOffsetMoodBig = $('#inner-mood-big').offset().top - (window.innerHeight * 0.7) - currScrolled;


      // ==== PHIL ====
      var moodItem0 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(0)').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var moodItem1 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(1)').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var moodItem2 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(2)').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var moodItem3 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(3)').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var moodItem4 = $('.wrap-images-under-mood .anim-img-corn-bg:eq(4)').offset().top - (window.innerHeight * 0.7) - currScrolled;
      // ==============


      var colUnderMoodText = $('.col-under-mood-text:eq(0)').offset().top - (window.innerHeight * 0.7) - currScrolled;

      if (0 < itemOffsetAboutPhil) {
        document.getElementById('wrapper-bg-philosofhy').style.opacity = (1200 - itemOffsetAboutPhil) / 730;
      }
      else {
        document.getElementById('wrapper-bg-mood').style.opacity = (1200 - itemOffsetAboutMood) / 730;
      }

      if (0 > wrapImgUnderHistoryLeft) $('.wrap-img-under-history-left').addClass('show');
      if (0 > wrapTextUnderHistoryRight) $('.wrap-text-under-history-right').addClass('show');

      if (0 > aboutPhilCont) $('#about-philosofhy .wrap-banner-cont').attr('data-anim', 'true');
      if (0 > aboutMoodCont) $('#about-mood .wrap-banner-cont').attr('data-anim', 'true');

      if (0 > wrapImgUnderHistoryRight) $('.wrap-img-under-history-right').attr('data-anim', 'true');
      if (0 > wrapTextUnderHistoryLeft) $('.wrap-text-under-history-left').attr('data-anim', 'true');
      if (0 > wrap2ColUnderPhil) $('#wrap-2-col-under-phil').attr('data-anim', 'true');
      if (0 > itemOffsetAboutRomb) $('#about-romb').attr('data-anim', 'true');
      if (0 > itemOffsetMoodBig) $('.mood-big').attr('data-anim', 'true');

      // ==== MOOD ====
      if (0 > moodItem0) $('.wrap-images-under-mood .anim-img-corn-bg:eq(0)').attr('data-anim', 'true');
      if (0 > moodItem1) $('.wrap-images-under-mood .anim-img-corn-bg:eq(1)').attr('data-anim', 'true');
      if (0 > moodItem2) $('.wrap-images-under-mood .anim-img-corn-bg:eq(2)').attr('data-anim', 'true');
      if (0 > moodItem3) $('.wrap-images-under-mood .anim-img-corn-bg:eq(3)').attr('data-anim', 'true');
      if (0 > moodItem4) $('.wrap-images-under-mood .anim-img-corn-bg:eq(4)').attr('data-anim', 'true');
      // ==============

      if (0 > colUnderMoodText) $('.col-under-mood-text').attr('data-anim', 'true');


      // ===
      if (heightVisHist > 0) {
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[0]);
      }
      if (heightVisHist < 0 && heightVisPhil > 0) {
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[1]);
      }
      if (heightVisPhil < 0 && heightVisMood > 0) {
        wavesBg_1.appendTo(document.querySelectorAll('h3.section-title')[2]);
      }


      if (window.innerWidth > 1024) checkIndicators();
    }
  });

  function checkIndicators() {
    if ($('#about-philosofhy').offset().top - (window.innerHeight * 0.55) > 0) {
      if (!$('#indicator-1').hasClass('active')) {
        $('.indicator.active').removeClass('active');
        $('#indicator-1').addClass('active');
      }
    }

    else if ($('#about-mood').offset().top - (window.innerHeight * 0.55) > 0) {
      if (!$('#indicator-2').hasClass('active')) {
        $('.indicator.active').removeClass('active');
        $('#indicator-2').addClass('active');
      }
    }

    else if (!$('#indicator-3').hasClass('active')) {
      $('.indicator.active').removeClass('active');
      $('#indicator-3').addClass('active');
    }


    if (mainScroll.getSize().content.height - $('footer').height() < mainScroll.offset.y + window.innerHeight) inStartFooter = true;
    else inStartFooter = false;

    if (inStartFooter) $('#wrap-page-indicators').attr('data-anim', 'false');
    if (!inStartFooter && !scrolledBottom && mainScroll && mainScroll.directionY == -1) $('#wrap-page-indicators').attr('data-anim', 'true');
  }
}

//faq
function initFAQPage() {
  console.log('FAQ page');

  setTimeout(function () {
    $('.wrap-banner-cont').attr('data-anim', 'true');
  }, 500);

  setQaBgWavePos();

  if (mainScroll) scrollFunc();

  $(".ac-item[data-anim='false']").each(function (key, el) {
      var timeOStart = 800;
      var timeODelay = 300;
      var acElPos = $(el).offset().top - (window.innerHeight * 1.5);
      if (0 > acElPos) {
        setTimeout(function () {
          el.setAttribute('data-anim', 'true');
        }, timeOStart + timeODelay);
        timeOStart *= 2;
      }
    });


  $('.ac-item input[type=checkbox]').on('change', function () {
    if (mainScroll) setTimeout(function () {
      mainScroll.update();
    }, 500);
  });


  $(window).on('scroll', function (event) {
    if (!mainScroll && document.querySelector("main[data-page='/faq']")) {
      var currScrolled = $(document).scrollTop();
      var mainOffset = $('main').offset().top - currScrolled;

      var lenFooterPath = $('footer').offset().top - (window.innerHeight * 0.1) - currScrolled;
      document.getElementById('wrapper-bg-faq').style.opacity = (1 - (1 / (lenFooterPath / -mainOffset)));


      $(".ac-item[data-anim='false']").each(function (key, el) {
        var acElPos = $(el).offset().top - (window.innerHeight * 1.4) - currScrolled;

        if (0 > acElPos) el.setAttribute('data-anim', 'true');
      });

    }
  });


  function setQaBgWavePos() {
    $('.qa-item-wave-bg').each(function (key, el) {
      var posY = Math.random() * 100;
      var rotDeg = 270 * Math.random();
      $(el).css('background-position', '50% ' + posY + '%');
    })
  }


  function scrollFunc() {
    mainScroll.addListener(function () {
      if(document.querySelector("main[data-page='/faq']")) {
        $(".ac-item[data-anim='false']").each(function (key, el) {
          var acElPos = $(el).offset().top - (window.innerHeight * 1.4);

          if (0 > acElPos) el.setAttribute('data-anim', 'true');
        });


        var lenFooterPath = $('footer').offset().top - (window.innerHeight * 0.1);
        document.getElementById('wrapper-bg-faq').style.opacity = -(1200 - lenFooterPath) / 730;
      }
    })
  }
}

//news
function initNewsPage() {
  var newsItems = [];
  var numbCol = 1;

  if (window.innerWidth > 1400) numbCol = 4;
  else if (window.innerWidth > 1024) numbCol = 3;
  else if (window.innerWidth > 640) numbCol = 2;


  $(window).on('resize', function () {
    if (window.innerWidth > 1400) {
      if (numbCol != 4) {
        numbCol = 4;
        initNewsGrid();
      }
    }
    else if (window.innerWidth > 1024) {
      if (numbCol != 3) {
        numbCol = 3;
        initNewsGrid();
      }
    }
    else if (window.innerWidth > 640) {
      if (numbCol != 2) {
        numbCol = 2;
        initNewsGrid();
      }
    }
    else {
      numbCol = 1;
      initNewsGrid();
    }
  });



  setTimeout(function () {
    $('.wrap-banner-cont').attr('data-anim', 'true');
  }, 500);
  setTimeout(function () {
    $('.wrap-news-types-list').attr('data-anim', 'true');
  }, 800);
  setTimeout(function () {
    $('.wrap-news-list').attr('data-anim', 'true');
  }, 1150);


  // ============= REMAPING NEWS=================
  initNewsGrid();
  // END ============= REMAPINK NEWS=============

  if (mainScroll) scrollFunc();


  var newsTypeList = $('#wrap-news-type');
  newsTypeList.find('.curr-news-type').text(newsTypeList.find('ul.news-types-list li.active a').text());


  function scrollFunc() {
    mainScroll.addListener(function(){
      if(document.querySelector("main[data-page='/news']")) {
        var lenFooterPath = $('footer').offset().top - (window.innerHeight * 0.1);
        document.getElementById('wrapper-bg-news').style.opacity = -(1200 - lenFooterPath) / 730;
      }
    })
  }


  $(window).on('scroll', function (event) {
    if (!mainScroll && document.querySelector("main[data-page='/news']")) {
      var currScrolled = $(document).scrollTop();

      var lenFooterPath = $('footer').offset().top - (window.innerHeight * 0.1) - currScrolled;
      document.getElementById('wrapper-bg-news').style.opacity = -(1200 - lenFooterPath) / 730;
    }
  });


  function initNewsGrid() {
    newsItems = $('#news-list .news-item');

    for (var i = 0; i < numbCol; i++) {
      $("#news-list").append("<div class='news-col'></div>");
    }

    newsItems.each(function (key, el) {
      $(".news-col").eq(key % numbCol).append(el);
    });

    $('.news-col').each(function () {
      var $this = $(this);
      if ($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
    });

    if (mainScroll) mainScroll.update();
  }
}

//zone-col
function initZenCollPage() {
  console.log('zol-col page');

  var lenFooterPath;

  $(document).ready(function () {
    setTimeout(function () {
      $('.wrap-banner-cont').eq(0).attr('data-anim', 'true')
    }, 500);
    setTimeout(function () {
      $('.zon-col-list').eq(0).attr('data-anim', 'true')
    }, 1300);

    if (document.querySelector('footer'))
      lenFooterPath = $('footer').offset().top - (window.innerHeight);

    setBgSvgPos();

    if (mainScroll) scrollFunc();
  });


  function setBgSvgPos() {
    $('.img-back svg').each(function (key, el) {
      var posX = Math.random() * (70 - 20) + 20;
      var posY = Math.random() * (70 - 20) + 20;
      var rotDeg = 270 * Math.random();
      $(el).css('transform', 'scale(0.7) translate(-' + posX + '%,-' + posY + '%) rotate(' + rotDeg + 'deg)');
    })
  }


  $(window).on('resize', function () {
    var mainOffset = $('main').offset().top;
    lenFooterPath = $('footer').offset().top - (window.innerHeight);

    document.getElementById('wrapper-bg-zone-col').style.opacity = 1 - (1 / (lenFooterPath / -mainOffset));
  });


  function scrollFunc() {
    mainScroll.addListener(function () {
      if(document.querySelector("main[data-page='/zones']")      ||
        document.querySelector("main[data-page='/collections']") ||
        document.querySelector("main[data-page^='/zones/']")     ||
        document.querySelector("main[data-page^='/collections/']")
      ) {
        var mainOffset = $('main').offset().top;

        document.getElementById('wrapper-bg-zone-col').style.opacity = 1 - (1 / (lenFooterPath / -mainOffset));
      }
    })
  }

  $(window).on('scroll', function (event) {
    if (!mainScroll &&
      (document.querySelector("main[data-page='/zones']")       ||
        document.querySelector("main[data-page='/collections']") ||
        document.querySelector("main[data-page^='/zones/']")     ||
        document.querySelector("main[data-page^='/collections/']")
      )) {
      var currScrolled = $(document).scrollTop();
      var mainOffset = $('main').offset().top - currScrolled;

      document.getElementById('wrapper-bg-zone-col').style.opacity = 1 - (1 / (lenFooterPath / -mainOffset));
    }
  });
}

//catalogue
function initCataloguePage() {
  console.log('Catalogue page');

  setTimeout(function () {
    $('.small-page-title').attr('data-anim', 'true')
  }, 300);
  setTimeout(function () {
    $('.wrap-catal').attr('data-anim', 'true')
  }, 500);
  setTimeout(function () {
    if (mainScroll) mainScroll.update();
  }, 100);

  if (window.innerWidth > 1024) {
    var activeZonColList = $('.zon-col-side-toggle a.active').attr('for');
    $('.zon-col-list-catal').hide();
    $('.zon-col-list-catal.' + activeZonColList).show()
  }


  $('.catal-filter-head').on('click', function () {
    var catalSide = $(this).closest('.catal-side');
    var filterHeadHeight = 85;
    if (window.innerWidth <= 640) filterHeadHeight = 55;

    if (catalSide.hasClass('relative')) {
      catalSide.attr('data-prevTop', catalSide.offset().top - $(document).scrollTop())
        .css('top', catalSide.offset().top - $(document).scrollTop())
        .toggleClass('pos-fix-fltr relative');

      catalSide.animate({
        top: 0,
        height: '100%'
      }, 400);
    }
    else {
      catalSide.animate({
        top: catalSide.attr('data-prevTop'),
        height: filterHeadHeight,
      }, {
        duration: 400,
        complete: function () {
          catalSide.toggleClass('pos-fix-fltr relative').css('top', 0);
        }
      });
    }

    $(document.body).toggleClass('overfl-h');
  });


  $('.disactive-item').on('click', function () {
    $(this).siblings('a').click();
  });


  $('ul.zon-col-list-catal li a').on('click', function (e) {
    e.preventDefault();
    $(this).closest('li').toggleClass('active');

    // UNDER ACTIVE ONLY ONE ELEMENT
    // var rootList = $(this).closest('ul.zon-col-list-catal');
    // $(rootList).find('li.active').removeClass('active');
    // $(this).closest('li').addClass('active');
  });

  //'.zon-col-side-toggle a:not(.active)'
  $('.zon-col-side-toggle a').on('click', function (e) {
    e.preventDefault();

    if (!$(this).hasClass('active')) {
      $('.zon-col-side-toggle a').toggleClass('active');
      $('.zon-col-list-catal').toggle(700);
      if (mainScroll) setTimeout(function () {
        mainScroll.update();
      }, 1000);
    }
  });

}

//contacts
function initContactsPage() {
  console.log('Contacts page');


  setTimeout(function () {
    $('#cont-text-r-t').attr('data-anim', 'true');
  }, 1000);
  setTimeout(function () {
    $('#wrap-cont-map').attr('data-anim', 'true');
  }, 1600);
  setTimeout(function () {
    initMap()
  }, 1200);

  if (mainScroll) scrollFunc();



  $(window).on('scroll', function () {
    if (!mainScroll && document.querySelector("main[data-page='/contacts']")) {
      var currScrolled = $(document).scrollTop();
      var mainOffset = $('main').offset().top - currScrolled;
      var lenFooterPath = $('footer').offset().top - (window.innerHeight);

      var wrapFormMail = $('#form-mail').offset().top - (window.innerHeight * 0.7) - currScrolled;
      var itemAnimContBot = $('.cont-bot .anim-img-corn-bg').offset().top - (window.innerHeight * 0.7) - currScrolled;


      if (0 > wrapFormMail) $('#form-mail').attr('data-anim', 'true');
      if (0 > itemAnimContBot) $('.cont-bot .anim-img-corn-bg').attr('data-anim', 'true');

      document.getElementById('wrapper-bg-contacts').style.opacity = (0.55 - (1 / (lenFooterPath / -mainOffset))) / 0.55; // 0.55 only for contacts bg
    }
  });


  function scrollFunc() {
    mainScroll.addListener(function () {
      if(document.querySelector("main[data-page='/contacts']")) {
        var wrapContMap = $('#wrap-cont-map').offset().top - (window.innerHeight * 0.7);
        var wrapImgContRightBot = $('.wrap-img-cont-r-b').offset().top - (window.innerHeight * 0.7);
        var wrapImgContBot = $('.wrap-cont-b').offset().top - (window.innerHeight * 0.7);
        // var wrapContTextRightTop= $('#cont-text-r-t').offset().top - (window.innerHeight*0.7);
        var wrapFormMail = $('#form-mail').offset().top - (window.innerHeight * 0.7);


        if (0 > wrapContMap) $('.wrap-cont-map').attr('data-anim', 'true');
        if (0 > wrapImgContRightBot) $('.wrap-img-cont-r-b').attr('data-anim', 'true');
        if (0 > wrapImgContBot) $('.wrap-cont-b').attr('data-anim', 'true');
        // if(0 > wrapContTextRightTop) $('#cont-text-r-t').addClass('show');
        if (0 > wrapFormMail) $('#form-mail').attr('data-anim', 'true');


        var lenFooterPath = $('footer').offset().top - (window.innerHeight * 0.1);

        document.getElementById('wrapper-bg-contacts').style.opacity = -(1700 - lenFooterPath) / 100 / 6;
      }
    });
  }


  function initMap() {
    var maxZoom = 5;
    var centerMap = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      minZoom: 2,
      center: centerMap,
      disableDefaultUI: true,
      styles: [
        {
          "featureType": "all",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "saturation": 36
            },
            {
              "color": "#000000"
            },
            {
              "lightness": 40
            }
          ]
        },
        {
          "featureType": "all",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "visibility": "on"
            },
            {
              "color": "#000000"
            },
            {
              "lightness": 16
            }
          ]
        },
        {
          "featureType": "all",
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 20
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 17
            },
            {
              "weight": 1.2
            }
          ]
        },
        {
          "featureType": "landscape",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 20
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 21
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 17
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 29
            },
            {
              "weight": 0.2
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 18
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 16
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 19
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 17
            }
          ]
        }
      ],
    });

    var marker = new google.maps.Marker({
      position: centerMap,
      icon: '../images/marker.png',
      map: map
    });
  }
}

//pres-design
function initPresDesignPage() {
  console.log('pres-design page');


  new Swiper('.wrap-swiper-press_design', {
    slidesPerView: 1,
    centeredSlides: true,
    speed: 700,
    spaceBetween: 240,
    followFinger: false,
    simulateTouch: false,
    autoHeight: true,
    effect: "coverflow",
    coverflow: {slideShadows: false},
    prevButton: '.item-log_reg-toggle.log',
    nextButton: '.item-log_reg-toggle.reg',
  });

  setTimeout(function () {
    $('.pres-des-conteiner').removeClass('hide')
  }, 500);


  $('.table-press-design .td span.wrap-for_arrow').on('click', function (e) {
    var keySort = $(this).closest('.td').attr('data-keySort');
    var neadSort = false;


    var presDesData = $(this).closest('.table-press-design').find('.tr.data');


    presDesData.sortDomElements(function (a, b) {
      var akey = $(a).attr(keySort);
      var bkey = $(b).attr(keySort);
      if (akey == bkey) return 0;
      if (akey < bkey) return -1;
      if (akey > bkey) {
        neadSort = true;
        return 1;
      }
    });


    $(this).closest('.thead-press-design').find('span.wrap-for_arrow').removeClass('down up');


    if (!neadSort) {
      presDesData.sortDomElements(function (b, a) {
        var akey = $(a).attr(keySort);
        var bkey = $(b).attr(keySort);
        if (akey == bkey) return 0;
        if (akey < bkey) return -1;
        if (akey > bkey) return 1;
      });

      $(this).removeClass('up').addClass('down');
    } else  $(this).removeClass('down').addClass('up');



    presDesData.each(function (key, el) {
      $(el).find('.numb').text(key + 1)
    });
  });
}

//privacy-policy
function initPrivacyPolicyPage() {
  console.log('privacy-policy page');

  setTimeout(function () {
    $('.wrap-privacy-policy').attr('data-anim', 'true')
  }, 300);
}

//finish-tissue
function initFinTishPage() {
  console.log('finish-tissue page');

  var swiperFinTis;

  setTimeout(function () {
    $('.small-page-title').attr('data-anim', 'true')
  }, 300);
  setTimeout(function () {
    $('.wrap-catal').attr('data-anim', 'true')
  }, 500);
  setTimeout(function () {
    if (mainScroll) mainScroll.update();
  }, 100);

  if (window.innerWidth > 1024) {
    var activeZonColList = $('.zon-col-side-toggle a.active').attr('for');
    $('.zon-col-list-catal').hide();
    $('.zon-col-list-catal.' + activeZonColList).show()
  }

  swiperFinTis = new Swiper('.catal-content-inner', {
    slidesPerView: 1,
    speed: 700,
    followFinger: false,
    simulateTouch: false,
    autoHeight: true,
    effect: "fade",
  });

  $('.zon-col-side-toggle a.arr-fin_tis').on('click', function (event) {
    event.preventDefault();

    if ($(this).hasClass('fin')) swiperFinTis.slidePrev();
    if ($(this).hasClass('tis')) swiperFinTis.slideNext();
  });



  $('.catal-filter-head').on('click', function () {
    var catalSide = $(this).closest('.catal-side');
    var filterHeadHeight = 85;
    if (window.innerWidth <= 640) filterHeadHeight = 55;

    if (catalSide.hasClass('relative')) {
      catalSide.attr('data-prevTop', catalSide.offset().top - $(document).scrollTop())
        .css('top', catalSide.offset().top - $(document).scrollTop())
        .toggleClass('pos-fix-fltr relative');

      catalSide.animate({
        top: 0,
        height: '100%'
      }, 400);
    }
    else {
      catalSide.animate({
        top: catalSide.attr('data-prevTop'),
        height: filterHeadHeight,
      }, {
        duration: 400,
        complete: function () {
          catalSide.toggleClass('pos-fix-fltr relative').css('top', 0);
        }
      });
    }

    $(document.body).toggleClass('overfl-h');
  });


  $('.disactive-item').on('click', function () {
    $(this).closest('.active').removeClass('active')
  });


  $('ul.zon-col-list-catal li a').on('click', function (e) {
    e.preventDefault();

    var offsetEl = $(this.getAttribute('href')).offset().top;

    if (mainScroll) mainScroll.scrollTo(0, offsetEl - 50 + mainScroll.offset.y, offsetEl / 2);
    else  $('html, body').animate({scrollTop: offsetEl - 50}, offsetEl / 2);
  });


  //'.zon-col-side-toggle a:not(.active)'
  $('.zon-col-side-toggle a').on('click', function (e) {
    e.preventDefault();

    if (!$(this).hasClass('active')) {
      $('.zon-col-side-toggle a').toggleClass('active');
      $('.zon-col-list-catal').toggle(700);
      if (mainScroll) setTimeout(function () {
        mainScroll.update();
      }, 1000);
    }
  });
}

//initDashboardPage
function initDashboardPage() {
  console.log('Profile page');

  var swiperProfile;

  setTimeout(function () {
    $('.small-page-title').attr('data-anim', 'true')
  }, 300);
  setTimeout(function () {
    $('.wrap-catal').attr('data-anim', 'true')
  }, 500);
  setTimeout(function () {
    if (mainScroll) mainScroll.update();
  }, 100);

  if (window.innerWidth > 1024) {
    var activeZonColList = $('.zon-col-side-toggle a.active').attr('for');
    $('.zon-col-list-catal').hide();
    $('.zon-col-list-catal.' + activeZonColList).show()
  }

  new Swiper('.wrap-profile-swiper', {
    slidesPerView: 1,
    centeredSlides: true,
    speed: 700,
    spaceBetween: 240,
    followFinger: false,
    simulateTouch: false,
    // autoHeight: true,
    effect: "coverflow",
    coverflow: {slideShadows: false},
    prevButton: '.item-log_reg-toggle.log',
    nextButton: '.item-log_reg-toggle.reg',
  });


  $('.row-short-data').on('click', function (event) {
    $(this).closest('.row-order_list').toggleClass('close open');

    // var self = this;
    // var prevH;
    // var int = setInterval(function(){
    //   console.log(prevH, $(self).closest('.row-order_list').height());
    //
    //   if(prevH != $(self).closest('.row-order_list').height()){
    //     swiperProfile.update();
    //     prevH = $(self).closest('.row-order_list').height();
    //   }
    //   else clearInterval(int);
    // }, 50);
    // swiperProfile.update();
    // setTimeout(function(){
    //   swiperProfile.update();
    // //   console.log(123)
    // //   swiperProfile.update();
    // //   // swiperProfile.updateContainerSize();
    // }, 300)

  })
}

// BASKET
function initBasketPage() {
  console.log('basket page');

  setTimeout(function () {
    if (mainScroll) mainScroll.update();
  }, 100);
  setTimeout(function () {
    $('.small-page-title').attr('data-anim', 'true')
  }, 300);
  setTimeout(function () {
    $('.wrap-catal').attr('data-anim', 'true')
  }, 500);


  $('.kick-ord_it').on('click', function (e) {
    var itemStash = $(this).closest('.item-detail-order-data-wrap_anim');
    var priceid = $(this).attr('data-priceid');
    basket.remove(priceid);
    itemStash.addClass('remove');

    setTimeout(function (e) {
      console.log('itemStash.remove start');
      itemStash.remove();
    }, 600);
  });

  $('.calc_it').on('click', function(e){
    if($(this).hasClass('disabled'))  return;

    var itemNumbValEl = $(this).siblings(".ord_it-numb-val");
    var priceOfItem = $(this).parents('.wrap-calc_price').find(".ord_it-price").find('span');
    var price_id = $(this).siblings(".ord_it-numb-val").attr('data-priceid') || false;
    var price = $(this).siblings(".ord_it-numb-val").attr('data-price') || false;
    var total = 0;


    var plusVal = 1;
    itemNumbValEl.removeClass('plus minus');
    if ($(this).hasClass('minus')) {
      plusVal = -1;
      setTimeout(function () {
        itemNumbValEl.addClass('minus')
      }, 1);
    } else {
      setTimeout(function () {
        itemNumbValEl.addClass('plus')
      }, 1);
    }
    var totalCnt = +itemNumbValEl.text()+plusVal;

    if(price_id){
      console.log('basket.update',price_id,totalCnt);
      basket.update(price_id,totalCnt);
    }

    if(price){
      total = parseFloat(price)*parseFloat(totalCnt);
    }
    itemNumbValEl.text(totalCnt);
    console.log('priceOfItem');
    console.log(priceOfItem);
    priceOfItem.text(total);

    var btnMinus = $(this).closest(".ord_it-numb").find('.calc_it.minus');

    if(+itemNumbValEl.text() <= 1)   btnMinus.addClass('disabled');
    else                             btnMinus.removeClass("disabled");
  });
}

// SHOWROOMS
function initShowroomsPage() {
  console.log('showrooms page');

  $('.dealers-col .item-dealers:eq(0)').attr('data-anim', 'true');

  var show_RSwip;
  var newsItems = [];
  var numbCol = 1;

  var rombData = {};

  var dealersList = document.getElementById('dealers-list');
  var carouselShowR = document.getElementById('carousel-show_r');

  rombData.wrap = document.getElementById('about-romb');
  rombData.rombRight = document.querySelector('#about-romb .romb-right');
  rombData.rombLeft = document.querySelector('#about-romb .romb-left');

  var mainShowR = document.getElementById('main-show_r');

  if (window.innerWidth > 1024) numbCol = 4;
  else if (window.innerWidth > 640) numbCol = 2;

  $(window).on({
    'resize': function () {
      if (window.innerWidth > 1024) {
        if (numbCol != 3) {
          numbCol = 4;
          initDealersGrid();
        }
      }
      else if (window.innerWidth > 640) {
        if (numbCol != 2) {
          numbCol = 2;
          initDealersGrid();
        }
      }
      else {
        numbCol = 1;
        initDealersGrid();
      }
    },
    'scroll': function () {
      if (!mainScroll && document.querySelector("main[data-page='/showrooms']")) {
        var currScrolled = $(document).scrollTop();
        var mainOffset = $('#about-romb').offset().top - currScrolled - window.innerHeight * 0.85;

        // DEALER LIST =========
        $(".item-dealers[data-anim='false']").each(function () {
          var thisOffset = $(this).offset().top - currScrolled - window.innerHeight * 0.85;
          if (thisOffset < 0) $(this).attr('data-anim', 'true');
        });
        // END DEALER LIST =========


        // ROMB =========
        var percentRombScroll = 1 - ($(rombData.wrap).offset().top - currScrolled) / window.innerHeight;
        if (percentRombScroll > 1) percentRombScroll = 1;
        var translateVal = 20 * percentRombScroll;


        $('.freedom-under-phil-text').css('opacity', (percentRombScroll - 0.3) * 2.1);
        rombData.wrap.style.transform = "rotate(45deg) scale(" + (0.7 + 0.3 * percentRombScroll) + ")";
        rombData.rombRight.style.transform = "translate(" + (-translateVal) + "px," + ( translateVal) + "px)";
        rombData.rombLeft.style.transform = "translate(" + ( translateVal) + "px," + (-translateVal) + "px)";
        //END  ROMB =========


        // mainShowR =======
        var mainShowROffset = $(mainShowR).offset().top - currScrolled - window.innerHeight + $(mainShowR).find('.phil-left').height() * 0.5;
        if (mainShowROffset < 0) {
          $(mainShowR).attr('data-anim', 'true');
        }

        var mainShowRTextOffset = $(mainShowR).find('.phil-right').offset().top - currScrolled - window.innerHeight;
        if (mainShowRTextOffset < 0) {
          $(mainShowR).find('.phil-right').attr('data-anim', 'true');
        }
        // END mainShowR ======
      }
    }
  });



  initDealersGrid();

  setTimeout(function () {
    $('.small-page-title').attr('data-anim', 'true')
  }, 300);
  setTimeout(function () {
    $('#wrap-letter-list').attr('data-anim', 'true')
  }, 200);
  setTimeout(function () {
    $('section#dealers').attr('data-anim', 'true')
  }, 800);
  setTimeout(function () {
    if (mainScroll) mainScroll.update()
  }, 100);

  if (mainScroll) scrollFunc();
  else {
    // DEALER LIST =========
    $(".item-dealers[data-anim='false']").each(function () {
      var thisOffset = $(this).offset().top - $(document).scrollTop() - window.innerHeight * 0.85;
      if (thisOffset < 0) $(this).attr('data-anim', 'true');
    });
    // END DEALER LIST =========
  }


  show_RSwip && show_RSwip.destroy();
  show_RSwip = new Swiper('.wrap-carousel-show_r', {
    slidesPerView: 1.6,
    loopAdditionalSlides: 2,
    centeredSlides: true,
    speed: 700,
    autoHeight: true,
    // autoplay: 4000,
    spaceBetween: 0,
    loop: true,
    // effect: "coverflow",
    coverflow: {slideShadows: false},
    onInit: function (swiper) {
      $(carouselShowR).find('.show_r-slide.swiper-slide-active')
    },
  });


  $(document).on('click', '.show_r-slide', function (event) {
    if ($(event.target).closest('.show_r-slide').hasClass('swiper-slide-prev')) show_RSwip.slidePrev();
    if ($(event.target).closest('.show_r-slide').hasClass('swiper-slide-next')) show_RSwip.slideNext();
  });


  var newsTypeList = $('#wrap-letter-list');
  newsTypeList.find('.curr-news-type').text(newsTypeList.find('ul.news-types-list li.active a').text());

  var checkShow = true;

  function scrollFunc() {
    mainScroll.addListener(function () {
      if(document.querySelector("main[data-page='/showrooms']")) {
        // DEALER LIST =========
        if (mainScroll.isVisible(dealersList)) {
          var percentRombScroll = (-($(rombData.wrap).offset().top - window.innerHeight) / window.innerHeight);
          var translateVal = 30 * percentRombScroll;


          if (checkShow) {
            checkShow = false;

            $(".dealers-col").each(function () {
              $(this).find(".item-dealers[data-anim='false']:eq(0)").attr('data-anim', 'true');
            });
          }

          setTimeout(function () {
            checkShow = true
          }, 600);
        }
        // END DEALER LIST =========


        // carouselShowR =======
        if (mainScroll.isVisible(carouselShowR)) {
          // var pxVisibledSwiper = -($(carouselShowR).offset().top - window.innerHeight);
          // var dispUpperSwiper = (pxVisibledSwiper < $(carouselShowR).height()*20/100);
          // var dispUnderSwiper = (pxVisibledSwiper > $(carouselShowR).height()*80/100+window.innerHeight);
          // if(dispUpperSwiper || dispUnderSwiper)   $(carouselShowR).addClass('hide');
          // else $(carouselShowR).removeClass('hide');
        }
        // END carouselShowR ======


        // ROMB =========
        if (mainScroll.isVisible(rombData.wrap)) {
          var percentRombScroll = (-($(rombData.wrap).offset().top - window.innerHeight) / window.innerHeight);
          if (percentRombScroll > 1) percentRombScroll = 1;
          var translateVal = 30 * percentRombScroll;


          $('.freedom-under-phil-text').css('opacity', (percentRombScroll - 0.3) * 2.1);
          rombData.wrap.style.transform = "rotate(45deg) scale(" + (0.7 + 0.3 * percentRombScroll) + ")";
          rombData.rombRight.style.transform = "translate(" + (-translateVal) + "px," + ( translateVal) + "px)";
          rombData.rombLeft.style.transform = "translate(" + ( translateVal) + "px," + (-translateVal) + "px)";
        }
        // END ROMB =========


        // mainShowR =======
        if (mainScroll.isVisible(mainShowR)) {
          var pxVisMainShowR = -($(mainShowR).offset().top - window.innerHeight);
          var dispUpperSwiper = (pxVisMainShowR > $(mainShowR).height() * 40 / 100);

          if (dispUpperSwiper) {
            $(mainShowR).attr('data-anim', 'true');
            $(mainShowR).find('.phil-right').attr('data-anim', 'true');
          }
        }
        // END mainShowR ======
      }
    })
  }

  $('#to-cont_main').on('click', function () {
    var durationScroll = Math.abs($('#main-show_r').offset().top) * 1;

    if (mainScroll) {
      mainScroll.scrollTo(0, mainScroll.offset.y + $('#main-show_r').offset().top - 100, durationScroll, function () {
        if (wavesBg_1) wavesBg_1.play();
      });
    }
    else {
      $('body').animate({scrollTop: $('#main-show_r').offset().top - 100}, durationScroll / 3);
    }
  });

  function initDealersGrid() {
    newsItems = $('#dealers-list .item-dealers');

    for (var i = 0; i < numbCol; i++) {
      $("#dealers-list").append("<div class='dealers-col'></div>");
    }

    newsItems.each(function (key, el) {
      $(".dealers-col").eq(key % numbCol).append(el);
    });

    $('.dealers-col').each(function () {
      var $this = $(this);
      if ($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
    });

    if (mainScroll) mainScroll.update();
  }
}


var swiperCard = [];
var swiperDim = [];
var swiperCardBig;
var swiperCurrDimVal = [];
var typeDim = 0;
var currActiveCardItem;
// CARD
function initProductCardPage() {

  $('.card_item-params').each(function (key) {
    var newListValue = $(this).find('ul.wrap-dimensions-values >li.active  ul.dimensions-values-item >li');

    $(this).find('ul.curr_dimensions_values li').each(function (key) {
      $(this).text($(newListValue[key]).text());
    });
  });

  $(window).on('resize', function () {
    cardModalSwip.forEach(function (el) {
      el.updateContainerSize()
    });
  });

  $('.wrap-curr_dim_val-swiper').each(function (key) {
    swiperCurrDimVal[key] = new Swiper(this, {
      slidesPerView: 1,
      centeredSlides: true,
      speed: 700,
      followFinger: false,
      simulateTouch: false,
      longSwipes: false,
      shortSwipes: false,
      effect: "fade",
    });
  });


  var cardModalSwip = [];
  $('.wrap-carousel-card').each(function (key) {
    cardModalSwip[key] && cardModalSwip[key].destroy();
    cardModalSwip[key] = new Swiper(this, {
      slidesPerView: 1.4,
      loopAdditionalSlides: 3,
      centeredSlides: true,
      speed: 700,
      nested: true,
      spaceBetween: 0,
      loop: true,
    });

    $(document).on('click', '.wrap-nav-img_coll .nav-arrow', function (event) {
      var indexOuterSwiper = $('.wrap-bigest-swiper .outer-slide.swiper-slide-active').index();
      if ($(event.target).hasClass('prev')) cardModalSwip[indexOuterSwiper].slidePrev();
      if ($(event.target).hasClass('next')) cardModalSwip[indexOuterSwiper].slideNext();
    });
  });

  $('#zones-modal').removeClass('hide').addClass('show');


  //  =====
  swiperCard[0] = new Swiper('.wrap-bigest-swiper', {
    slidesPerView: 1,
    speed: 700,
    initialSlide: 0,
    followFinger: false,
    simulateTouch: false,
    spaceBetween: 0,
    effect: "fade",
    fade: {crossFade: false}
  });

  swiperCard[1] = new Swiper('.wrap-swiper-related', {
    slidesPerView: 1,
    speed: 700,
    initialSlide: 0,
    autoHeight: true,
    followFinger: false,
    simulateTouch: false,
    longSwipes: false,
    shortSwipes: false,
    spaceBetween: 0,
  });

  $('.wrap-dim-swiper').each(function (key, el) {
    swiperDim[key] = new Swiper(el, {
      slidesPerView: 1,
      speed: 700,
      autoHeight: true,
      followFinger: false,
      simulateTouch: false,
      spaceBetween: 0,
      effect: 'fade',
    });
  });


  swiperCardBig = new Swiper('.wrap-card-params-right', {
    slidesPerView: 1,
    initialSlide: 0,
    speed: 700,
    autoHeight: true,
    followFinger: false,
    simulateTouch: false,
    longSwipes: false,
    shortSwipes: false,
    effect: 'fade',
    onInit: function (swiper) {
      currActiveCardItem = $('.wrap-card-params-right .card_item-params.swiper-slide-active');
      setTimeout(function () {
        swiper.update()
      }, 100);
    }
  });
  //  =====


  $('ul.card-varians-list >li').on('click', function (e) {
    if ($(this).hasClass('active'))  return;

    var indexCurr = $('ul.card-varians-list li.active').index();
    var indexNew = $(this).index();
    var newPhotoId = $(this).attr('data-photo');
    var curChildId = $(".swiper-slide.card_item-params[data-photo='" + newPhotoId + "'] ul.wrap-dimensions-values >li.active").attr('data-child');


    $('ul.card-varians-list li').eq(indexCurr).removeClass('active');
    $('ul.card-varians-list li').eq(indexNew).addClass('active');

    $('.wrap-card-view .wrap-curr-card-view').eq(indexCurr).toggleClass('hide show');
    $('.wrap-card-view .wrap-curr-card-view').eq(indexNew).toggleClass('hide show');


    var indexBigSwiperSlide = $(".wrap-bigest-swiper .outer-slide[data-photo='"+ newPhotoId +"']").index();
    swiperCard.forEach(function (el) {
      el.slideTo(indexBigSwiperSlide);
    });

    // slide all swipers =========
    $(".wrap-swiper-card_price .wrap-card-price").removeClass('active');
    $(".wrap-swiper-card_price .wrap-card-price[data-photo='" + newPhotoId + "'][data-child='" + curChildId + "']").addClass('active');


    var idCartSlide = $(".card_item-params[data-photo='" + newPhotoId + "'][data-child='" + curChildId + "']").index();


    swiperCardBig.slideTo(idCartSlide);
    //  ===========================
  });

  $('ul.wrap-dimensions-values >li').on('click', function () {
    // 1
    if ($(this).hasClass('active'))  return;


    var indexCurr = $(this).closest('.swiper-slide.card_item-params').find('ul.wrap-dimensions-values >li.active').attr('data-child');
    var indexNew = $(this).attr('data-child');
    var curPhotoId = $("ul.card-varians-list li.active").attr('data-photo');

    $("ul.wrap-dimensions-values >li.active").removeClass('active');
    $("ul.wrap-dimensions-values >li[data-child='" + indexNew + "']").addClass('active');

    $(this).siblings('li.active').removeClass('active');
    $(this).addClass('active');


    $(".wrap-swiper-card_price .wrap-card-price").removeClass('active');
    $(".wrap-swiper-card_price .wrap-card-price[data-photo='" + curPhotoId + "'][data-child='" + indexNew + "']").addClass('active');


    var idCartSlide = $(".card_item-params[data-photo='" + curPhotoId + "'][data-child='" + indexNew + "']").index();

    swiperCardBig.slideTo(idCartSlide);
  });

  $('.toggle-cent_inch .toggle-inner-length').on('click', function (e) {
    if ($(this).hasClass('active'))  return;

    $(this).siblings('.toggle-inner-length.active').removeClass('active');
    this.className += ' active';

    if ($(this).index() == 0) {
      swiperDim.forEach(function (el) {
        el.slidePrev()
      });
      typeDim = 0;
      swiperCurrDimVal.forEach(function (el) {
        el.slidePrev()
      });
    }
    else {
      swiperDim.forEach(function (el) {
        el.slideNext()
      });
      typeDim = 1;
      swiperCurrDimVal.forEach(function (el) {
        el.slideNext()
      });
    }

    $('.toggle-inner-length').removeClass('active');

    var self = this;
    $('.toggle-cent_inch').each(function () {
      $(this).find('.toggle-inner-length').eq($(self).index()).addClass('active');
    });
  });
}



$(document).on('click', '#order-now', function (e) {
  $('#modal-order').attr('data-anim', 'true');
  $(document.body).addClass('overfl-h');
});

$(document).on('submit', 'form.callback', function (e) {
  e.preventDefault();

  $('#modal-thank_you-message').removeClass('hide').addClass('show');
  $('body').addClass('overfl-h');
});

function showMainPopup() {
  $('#index-popup').addClass('show');
  $('body').toggleClass('overfl-h');
}

function initShowRMap() {
  // var maxZoom = 5;
  var centerMap = {lat: 44, lng: 13};
  var map = new google.maps.Map(document.getElementById('wrap-banner-img-box'), {
    zoom: 4,
    minZoom: 2,
    center: centerMap,
    disableDefaultUI: true,
    styles: [
      {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "saturation": 36
          },
          {
            "color": "#000000"
          },
          {
            "lightness": 40
          }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "visibility": "on"
          },
          {
            "color": "#000000"
          },
          {
            "lightness": 16
          }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 50
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 17
          },
          {
            "weight": 1.2
          }
        ]
      },
      {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 20
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 21
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 17
          }
        ]
      },
      {
        "featureType": "road",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      }
    ],
    scrollwheel: false,
    // navigationControl: false,
    // mapTypeControl: false,
    // scaleControl: false,
    // draggable: false,
  });

  var markersPos = [
    {lat: 42, lng: 12},       //Italy
    {lat: 50.46, lng: 30.52}, //Kyiv
    {lat: 40.36, lng: 47.1},  //Azerbaijan
    {lat: 47.32, lng: 58.44}, //Kazakstan
  ];


  for (var posM = 0; markersPos.length > posM; posM++) {
    new google.maps.Marker({
      position: markersPos[posM],
      icon: '../images/marker-s_r.png',
      map: map
    });
  }

  google.maps.event.addListenerOnce(map, 'idle', function () {
    $('#banner').removeClass('hide');
  });
}

$('input').on('keyup', function () {
  $(this).removeClass('input-error');
});

$('input').on('blur', function () {
  if (!$(this).hasClass('input-error'))  return;

  $('.input-error').removeClass('input-error');
});

$('.wrap-search input').on('focus blur', function () {
  if (window.innerWidth > 1024) $(this).closest('.wrap-search').toggleClass('full-w');
});

$('.drop-down').on('click', function () {
  $(this).toggleClass('open');
});

$('.drop-down li a').on('click', function (e) {
  e.preventDefault();

  var dropDown = $(this).closest('.drop-down');
  var dispCurrVal = $(dropDown).find('.curr-news-type');
  $(dropDown).find('li.active').removeClass('active');
  $(this).closest('li').addClass('active');

  $(dispCurrVal).text($(this).text());
});

$('.drop-item >a').on('click', function (event) {
  event.preventDefault();
  $(this).closest('.drop-item').toggleClass('show');
});

$('.wrap-left-nav-col-side >a').on('click', function (event) {
  event.preventDefault();
  $(this).closest('.wrap-left-nav-col-side').toggleClass('show');
});



$('.nav-icon').on('click', function () {
  $(this).toggleClass('open');
  $('.wrap-left-nav').toggleClass('show');
  $('.btn-top-menu.active').removeClass('active');
  $('.top-menu-box.show').removeClass('show');
  $('header').removeClass('show-top-menu')
    .toggleClass('show-left-menu');

  $(document.body).toggleClass('overfl-h');
});


$('.btn-top-menu').on('mouseenter', function () {

  var thisDropMenu = $('#' + this.getAttribute('for'));
  var newTopMenuHeight = thisDropMenu.find('.wrap-menus').height() + $('header').height();
  if (newTopMenuHeight > window.innerHeight) newTopMenuHeight = window.innerHeight;
  if (thisDropMenu.find('.forTopMenuScroll').length) topMenuScroll.setPosition(0, 0);


  if (!$('header').hasClass('show-top-menu')) {
    $('header').addClass('show-top-menu');

    thisDropMenu.removeClass('show');
    setTimeout(function () {
      thisDropMenu.addClass('show')
    }, 2);

    $('.btn-top-menu[for=' + this.getAttribute('for') + ']').addClass('active');
    document.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
    return;
  }

  if ($('.btn-top-menu.active')[0] != this) {
    $('.btn-top-menu.active').removeClass('active');
    $('.top-menu-box.show').removeClass('show');
    this.classList.add('active');

    thisDropMenu.addClass('show');
    document.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
  }
});

$('header').on('mouseleave', function () {
  hideTopMenu()
});

$('.nav-icon, .svg-main-logo, .lang-panel, .open-modal-login, .svg-stash').on('mouseenter', function () {
  hideTopMenu()
});

$('form#stash-order').on('submit', function (e) {
  e.preventDefault();

  $('#modal-order').attr('data-anim', 'false');
  $('#modal-thank_you').attr('data-anim', 'true');
  $(document.body).addClass('overfl-h');
});

// CLOSE MODAL ORDER
$(document).on('click', '#modal-order', function (event) {
  if (!$(event.target).closest('.inner-zone-col-modal').length) {
    $('#modal-order').attr('data-anim', 'false');
    $('body').toggleClass('overfl-h');
  }
});

$('#ty-ok').on('click', function (e) {
  e.preventDefault();

  // $('#modal-order').attr('data-anim', 'false');
  $('#modal-thank_you').attr('data-anim', 'false');
  $('body').toggleClass('overfl-h');
});

$('#ty-ok-p').on('click', function (e) {
  e.preventDefault();

  // $('#modal-order').attr('data-anim', 'false');
  $('#modal-thank_you_profile').attr('data-anim', 'false');
  $('body').toggleClass('overfl-h');
});

$('#ty-ok-def-f').on('click', function (e) {
  e.preventDefault();

  $('#modal-thank_you_default').attr('data-anim', 'false');
  $('body').toggleClass('overfl-h');
});

// CLOSE MODALS
$(document).on('click', '.zone-col-modal', function (event) {
  var isModalSider = !$(event.target).closest('.inner-zone-col-modal').length;

  if (isModalSider || $(event.target).hasClass('btn-close-modal')) {
    $(this).attr('data-anim', 'false');
    $('body').removeClass('overfl-h');


    if($(event.target).closest('main').length != 0 && !App.goPopupBack()){
      var pathToBack = location.pathname.substr(0, location.pathname.lastIndexOf('/'));
      App.goToPage(pathToBack);
    }


    // RESET AND CLEAR FORM DATA =========
    var self = this;

    setTimeout(function () {
      $(self).find('form').each(function () {
        this.reset();
        $(this).find('input.input-error').removeClass('input-error');
      });
    }, 500);
    //END RESET AND CLEAR FORM DATA =========
  }
});

$(document).on('click', '.open-modal-login', function (e) {
  e.preventDefault();

  $('#modal-log_reg').attr('data-anim', 'true');
  $('body').toggleClass('overfl-h');
});

document.addEventListener('click', function (event) {
  if ($('header').hasClass('show-left-menu') && $(event.target).hasClass('wrap-left-nav')) {

    $('header').removeClass('show-left-menu');
    $('.nav-icon').removeClass('open');
    $('.wrap-left-nav').removeClass('show');

    $(document.body).removeClass('overfl-h');
  }
});

//RESIZE TOPDROPMENU
$(window).on('resize', function () {
  var thisDropMenu = $('.top-menu-box.show');
  var newTopMenuHeight = thisDropMenu.find('.wrap-menus').height() + $('header').height();
  if (newTopMenuHeight > window.innerHeight) newTopMenuHeight = window.innerHeight;
  if (thisDropMenu.find('.forTopMenuScroll').length) topMenuScroll.setPosition(0, 0);
  document.getElementById('top-menu').style.height = newTopMenuHeight + 'px';
});

// SCROLL LISTENERS =========
function scrollFuncMain() {
  if (itemOffsetOurPhil !== true) itemOffsetOurPhil = $('.wrap-philosophy.a').offset().top - (window.innerHeight * 0.7);
  itemOffsetCollection = $('#shop-by-collection').offset().top - (window.innerHeight * 0.1);

  if (0 < itemOffsetCollection) {
    document.getElementById('wrapper-bg').style.opacity = (900 - itemOffsetCollection) / 600;
  }
  else {
    document.getElementById('wrapper-bg').style.opacity = 2.4 - (80 - itemOffsetCollection) / 730;
  }

  if (itemOffsetOurPhil < 0 && itemOffsetOurPhil !== true) {
    itemOffsetOurPhil = true;

    $('.wrap-philosophy.a').attr('data-anim', 'true');
    setTimeout(function () {
      $('.phil-right').attr('data-anim', 'true')
    }, 170);
  }


  if (mainScroll.isVisible(ourPhilosophyTitle)) $('#our-philosophy h3.section-title').attr('data-anim', 'true');


  if (mainScroll.isVisible(collCarous)) {
    $('#shop-by-collection h3.section-title').attr('data-anim', 'true');

    var pxVisibledSwiper = -($(collCarous).offset().top - window.innerHeight);
    var dispUpperSwiper = (pxVisibledSwiper > $(collCarous).height() * 40 / 100);

    if (dispUpperSwiper) $(shopByCollection).attr('data-anim', 'true');
  }


  if (mainScroll.isVisible(document.querySelector('#shop-by-cat'))) {
    var percViewCatTitle = (-($('#shop-by-cat h3.section-title').offset().top - window.innerHeight)) / window.innerHeight;
    var percViewCatTable = (-($('#shop-by-cat .cat-wrapper').offset().top - window.innerHeight)) / window.innerHeight;
    var percViewCatButtn = (-($('#shop-by-cat .wrap-btn-more').offset().top - window.innerHeight)) / window.innerHeight;


    if (percViewCatTitle > 0.2) $('#shop-by-cat h3.section-title').attr('data-anim', 'true');
    if (percViewCatTable > 0.25) {
      $("#shop-by-cat .cat[data-anim='false']").attr('data-anim', 'true');
      $("#shop-by-cat .cat-wrapper").attr('data-anim', 'true');
    }
    if (percViewCatButtn > 0.08) $('#shop-by-cat .wrap-btn-more').attr('data-anim', 'true');
  }
}

window.onload = function () {
  $('.item-fin_tis').each(function (key) {
    var self = this;
    setTimeout(function () {
      self.classList.remove('hide')
    }, 700 + 100 * key);
  });
}

function platformDef() {

  // vars to identify the platform
  var hl = $('html'),
    ua = navigator.userAgent;

  // desktop platform
  if (ua.search(/Trident/) > -1 || ua.search(/MSIE/) > -1) {
    hl.addClass('ie');
    return false;
  }

  // mobile platform
  if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(ua) ||
    /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(ua.substr(0, 4))) {
    hl.addClass('mobile-platform');
    return true;
  }
}

function hideTopMenu() {
  $('header').removeClass('show-top-menu');
  $('.btn-top-menu.active').removeClass('active');
  $('.top-menu-box.show').removeClass('show');
  document.getElementById('top-menu').style.height = 0;
}

function hideLeftMenu() {
  $('.nav-icon').removeClass('open');
  $('.wrap-left-nav').removeClass('show');
  $('.btn-top-menu.active').removeClass('active');
  $('.top-menu-box.show').removeClass('show');
  $('header').removeClass('show-left-menu');
  $(document.body).removeClass('overfl-h');
}

function blendModeDef() {
  /*! modernizr 3.5.0 (Custom Build) | MIT *
   * https://modernizr.com/download/?-backgroundblendmode-setclasses !*/
  !function (e, n, t) {
    function r(e, n) {
      return typeof e === n
    }

    function o() {
      var e, n, t, o, i, s, a;
      for (var l in C)if (C.hasOwnProperty(l)) {
        if (e = [], n = C[l], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length))for (t = 0; t < n.options.aliases.length; t++)e.push(n.options.aliases[t].toLowerCase());
        for (o = r(n.fn, "function") ? n.fn() : n.fn, i = 0; i < e.length; i++)s = e[i], a = s.split("."), 1 === a.length ? Modernizr[a[0]] = o : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = o), h.push((o ? "" : "no-") + a.join("-"))
      }
    }

    function i(e) {
      var n = x.className, t = Modernizr._config.classPrefix || "";
      if (_ && (n = n.baseVal), Modernizr._config.enableJSClass) {
        var r = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");
        n = n.replace(r, "$1" + t + "js$2")
      }
      Modernizr._config.enableClasses && (n += " " + t + e.join(" " + t), _ ? x.className.baseVal = n : x.className = n)
    }

    function s(e) {
      return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
        return n + t.toUpperCase()
      }).replace(/^-/, "")
    }

    function a(e, n) {
      return !!~("" + e).indexOf(n)
    }

    function l() {
      return "function" != typeof n.createElement ? n.createElement(arguments[0]) : _ ? n.createElementNS.call(n, "http://www.w3.org/2000/svg", arguments[0]) : n.createElement.apply(n, arguments)
    }

    function f(e, n) {
      return function () {
        return e.apply(n, arguments)
      }
    }

    function u(e, n, t) {
      var o;
      for (var i in e)if (e[i] in n)return t === !1 ? e[i] : (o = n[e[i]], r(o, "function") ? f(o, t || n) : o);
      return !1
    }

    function d(e) {
      return e.replace(/([A-Z])/g, function (e, n) {
        return "-" + n.toLowerCase()
      }).replace(/^ms-/, "-ms-")
    }

    function p(n, t, r) {
      var o;
      if ("getComputedStyle" in e) {
        o = getComputedStyle.call(e, n, t);
        var i = e.console;
        if (null !== o) r && (o = o.getPropertyValue(r)); else if (i) {
          var s = i.error ? "error" : "log";
          i[s].call(i, "getComputedStyle returning null, its possible modernizr test results are inaccurate")
        }
      } else o = !t && n.currentStyle && n.currentStyle[r];
      return o
    }

    function c() {
      var e = n.body;
      return e || (e = l(_ ? "svg" : "body"), e.fake = !0), e
    }

    function m(e, t, r, o) {
      var i, s, a, f, u = "modernizr", d = l("div"), p = c();
      if (parseInt(r, 10))for (; r--;)a = l("div"), a.id = o ? o[r] : u + (r + 1), d.appendChild(a);
      return i = l("style"), i.type = "text/css", i.id = "s" + u, (p.fake ? p : d).appendChild(i), p.appendChild(d), i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(n.createTextNode(e)), d.id = u, p.fake && (p.style.background = "", p.style.overflow = "hidden", f = x.style.overflow, x.style.overflow = "hidden", x.appendChild(p)), s = t(d, e), p.fake ? (p.parentNode.removeChild(p), x.style.overflow = f, x.offsetHeight) : d.parentNode.removeChild(d), !!s
    }

    function v(n, r) {
      var o = n.length;
      if ("CSS" in e && "supports" in e.CSS) {
        for (; o--;)if (e.CSS.supports(d(n[o]), r))return !0;
        return !1
      }
      if ("CSSSupportsRule" in e) {
        for (var i = []; o--;)i.push("(" + d(n[o]) + ":" + r + ")");
        return i = i.join(" or "), m("@supports (" + i + ") { #modernizr { position: absolute; } }", function (e) {
          return "absolute" == p(e, null, "position")
        })
      }
      return t
    }

    function g(e, n, o, i) {
      function f() {
        d && (delete N.style, delete N.modElem)
      }

      if (i = r(i, "undefined") ? !1 : i, !r(o, "undefined")) {
        var u = v(e, o);
        if (!r(u, "undefined"))return u
      }
      for (var d, p, c, m, g,
             y = ["modernizr", "tspan", "samp"]; !N.style && y.length;)d = !0, N.modElem = l(y.shift()), N.style = N.modElem.style;
      for (c = e.length, p = 0; c > p; p++)if (m = e[p], g = N.style[m], a(m, "-") && (m = s(m)), N.style[m] !== t) {
        if (i || r(o, "undefined"))return f(), "pfx" == n ? m : !0;
        try {
          N.style[m] = o
        } catch (h) {
        }
        if (N.style[m] != g)return f(), "pfx" == n ? m : !0
      }
      return f(), !1
    }

    function y(e, n, t, o, i) {
      var s = e.charAt(0).toUpperCase() + e.slice(1), a = (e + " " + b.join(s + " ") + s).split(" ");
      return r(n, "string") || r(n, "undefined") ? g(a, n, o, i) : (a = (e + " " + z.join(s + " ") + s).split(" "), u(a, n, t))
    }

    var h = [], C = [], S = {
      _version: "3.5.0",
      _config: {classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0},
      _q: [],
      on: function (e, n) {
        var t = this;
        setTimeout(function () {
          n(t[e])
        }, 0)
      },
      addTest: function (e, n, t) {
        C.push({name: e, fn: n, options: t})
      },
      addAsyncTest: function (e) {
        C.push({name: null, fn: e})
      }
    }, Modernizr = function () {
    };
    Modernizr.prototype = S, Modernizr = new Modernizr;
    var x = n.documentElement, _ = "svg" === x.nodeName.toLowerCase(), w = "Moz O ms Webkit",
      b = S._config.usePrefixes ? w.split(" ") : [];
    S._cssomPrefixes = b;
    var E = function (n) {
      var r, o = prefixes.length, i = e.CSSRule;
      if ("undefined" == typeof i)return t;
      if (!n)return !1;
      if (n = n.replace(/^@/, ""), r = n.replace(/-/g, "_").toUpperCase() + "_RULE", r in i)return "@" + n;
      for (var s = 0; o > s; s++) {
        var a = prefixes[s], l = a.toUpperCase() + "_" + r;
        if (l in i)return "@-" + a.toLowerCase() + "-" + n
      }
      return !1
    };
    S.atRule = E;
    var z = S._config.usePrefixes ? w.toLowerCase().split(" ") : [];
    S._domPrefixes = z;
    var P = {elem: l("modernizr")};
    Modernizr._q.push(function () {
      delete P.elem
    });
    var N = {style: P.elem.style};
    Modernizr._q.unshift(function () {
      delete N.style
    }), S.testAllProps = y;
    var k = S.prefixed = function (e, n, t) {
      return 0 === e.indexOf("@") ? E(e) : (-1 != e.indexOf("-") && (e = s(e)), n ? y(e, n, t) : y(e, "pfx"))
    };
    Modernizr.addTest("backgroundblendmode", k("backgroundBlendMode", "text")), o(), i(h), delete S.addTest, delete S.addAsyncTest;
    for (var T = 0; T < Modernizr._q.length; T++)Modernizr._q[T]();
    e.Modernizr = Modernizr
  }(window, document);
}

function initWaves() {
  // if(document.querySelector('body.showrooms'))  return;
  var svgWaveWrap = document.querySelector('h3.section-title:not(.no-wave):not(.modal)');
  var viewBoxHeight = 460;
  var viewBoxWidthStart = 40;
  var viewBoxWidth = 580;
  if (document.querySelector("main[data-page='/']")) {
    svgWaveWrap = document.querySelector('.wrap-philosophy');
    viewBoxWidthStart = 150;
    viewBoxWidth = 340;
    viewBoxHeight = 480;
  }
  if (document.querySelector("main[data-page='/showrooms']")) {
    svgWaveWrap = document.querySelector('#dealers');
  }
  if (document.querySelector("main[data-page='/showrooms']")) svgWaveWrap = document.querySelector('#waves-content');
  if (document.querySelector("main[data-page^='/catalogue']") ||
    document.querySelector("main[data-page='/press-design']") ||
    document.querySelector("main[data-page='/finish-tissue']") ||
    document.querySelector("main[data-page='/privacy-policy']") ||
    document.querySelector('body.profile') ||
    document.querySelector("main[data-page='/basket']")) {

    svgWaveWrap = document.querySelector('#top-waves');
    viewBoxHeight = 500;
  }


  if (!svgWaveWrap)  return;


  var type = /(canvas|webgl)/.test(url.type) ? url.type : 'svg';
  wavesBg_1 = new Two({
    type: Two.Types['svg'],
    fullscreen: false
  });


  wavesBg_1.appendTo(svgWaveWrap);


  $(svgWaveWrap).find('>svg:last-child').addClass('bg-wave hide');
  setTimeout(function () {
    $('.bg-wave').removeClass('hide')
  }, 100);

  $('.bg-wave').attr('viewBox', viewBoxWidthStart + ' 0 ' + viewBoxWidth + ' ' + viewBoxHeight);


  var mass = 100;
  var radius = wavesBg_1.height / 2.7;
  var strength = 0.002;
  var drag = 0.0;

  var background_1 = wavesBg_1.makeGroup();

  var physics = new Physics();
  var points = [];

  Two.Resolution = 13;

  for (var i = 0; i < Two.Resolution; i++) {

    var pct = i / Two.Resolution;
    var theta = pct * Math.PI * 2;//NO

    var ax = radius * Math.cos(theta);
    var ay = radius * Math.sin(theta);

    var variance = Math.random() * 0.48 + 0.73;

    var bx = variance * ax;
    var by = variance * ay;

    var origin = physics.makeParticle(mass, ax, ay);
    var particle = physics.makeParticle(Math.random() * mass * 0.8 + mass * 0.4, bx, by);
    var spring = physics.makeSpring(particle, origin, strength, drag, 0);

    origin.makeFixed();

    particle.shape = wavesBg_1.makeCircle(particle.position.x, particle.position.y);
    particle.shape.noStroke().fill = '#fff';
    particle.position = particle.shape.translation;

    points.push(particle.position);
  }


  var wave = [];
  for (var i = 0; i < 23; i++) {
    wave[i] = new Two.Path(points, true, true);
    wave[i].stroke = 'rgba(181, 99, 73, 0.3)';
    wave[i].fill = 'none';
    wave[i].scale = 1 - i * 0.04;
    wave[i].linewidth = 0.7 + i * 0.04;

    background_1.add(wave[i]);
  }

  resize();

  wavesBg_1
    .bind('resize', resize)
    .bind('update', function () {
      // if(document.querySelector('html.mobile-platform'))   wavesBg_1.pause();
      physics.update();
    })
    .play();


  function resize() {
    background_1.translation.set(wavesBg_1.width / 2, wavesBg_1.height / 2);
  }
}

function initLogRegSwiper() {
  var swiperLogReg = new Swiper('#modal-log_reg .wrap-swiper-log_reg', {
    slidesPerView: 1,
    initialSlide: 1,
    centeredSlides: true,
    speed: 700,
    spaceBetween: 140,
    roundLengths: true,
    // followFinger: false,
    simulateTouch: false,
    // autoHeight: true,
    effect: "coverflow",
    coverflow: {slideShadows: false},
    // prevButton: '.item-log_reg-toggle.log',
    // nextButton: '.item-log_reg-toggle.reg',
  });

  $('.wrap-log_reg-toggle .item-log_reg-toggle').on('click', function(){
    if($(this).hasClass('swiper-button-disabled'))  return;

    $(this).closest('.wrap-log_reg-toggle').find('.item-log_reg-toggle').removeClass('swiper-button-disabled');
    if($(this).hasClass('log')) { swiperLogReg.slideTo(1); $('.wrap-log_reg-toggle .item-log_reg-toggle').eq(0).addClass('swiper-button-disabled'); }
    else                        { swiperLogReg.slideTo(2); $('.wrap-log_reg-toggle .item-log_reg-toggle').eq(1).addClass('swiper-button-disabled'); }
  });


  $('.forgot-pwd').on('click', function(e){
    e.preventDefault();

    swiperLogReg.slideTo(0);
    $('.wrap-log_reg-toggle .item-log_reg-toggle').removeClass('swiper-button-disabled');
  });
}

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function checkValidForm(form) {
  var formIsValid = true;

  $(form).find('input').each(function (key, inputEl) {
    if (inputEl.value == '') {
      $(inputEl).addClass('input-error');
      formIsValid = false;
    }
    // if(this.getAttribute('type') == 'email' && !validateEmail(this.value)) $(this).addClass('input-error');
  });

  return formIsValid;
}

jQuery.fn.sortDomElements = (function () {
  return function (comparator) {
    return Array.prototype.sort.call(this, comparator).each(function (i) {
      this.parentNode.appendChild(this);
    });
  };
})();

var App = (function () {
  var thatClass = this,
      _showed = false,
      _catalogParams = {
        'sale': false,
        'zones': [],
        'collections': [],
        'page': 1,
      },
      _loadedPages = {},
      _backFromProduct;

  function _start() {
    _getCntBasket();
    $('body')

      .on('click', '[data-filter-name]', function (e) {

        var $el = $(this),
          $prnt = $el.parent(),
          type = $el.attr('data-filter-name'),
          val = $el.attr('data-filter-val'),
          pageNew = false;

        if(typeof _catalogParams[type] !== 'undefined') {
          if (type === 'sale') {
            var prevVal = JSON.stringify(_catalogParams.sale);
            _catalogParams.sale = (val === 'true') ? true : false;
            if (prevVal !== JSON.stringify(_catalogParams.sale)) {
              pageNew = true;
            }
            $prnt.find('li').removeClass('active');
            $el.addClass('active');
          }
          if (type === 'zones' || type === 'collections') {
            var rem = $prnt.hasClass('active') ? false : true,
                prevVal = JSON.stringify(_catalogParams[type]);
            if (rem) {
              var index = _catalogParams[type].indexOf(val);
              if (index > -1) {
                _catalogParams[type].splice(index, 1);
              }
            } else {
              _catalogParams[type].push(val);
            }
            if (prevVal !== JSON.stringify(_catalogParams[type])) {
              pageNew = true;
            }
          }
          if (pageNew) {
            _catalogParams.page = 1;
          }
          if (type === 'page') {
            _catalogParams.page = parseInt(val);
          }
          var link = '';
          $.each(_catalogParams, function (tp, vl) {
            link += (link === '') ? '?' : '';
            link += (link === '?') ? '' : '&';
            link += tp + '=' + vl;
          });

          // console.log('::', link, JSON.stringify(_catalogParams));
          page('/catalogue'+link);
        }
        return false;
      })

      .on('click', 'a', function (e) {
        // alert('click a');
        var $el = $(this),
            isLang = ($el.closest('.lang-panel').length) ? true : false,
            isSocial = ($el.closest('.wrap-login-social').length) ? true : false,
            link = $el.attr('href'),
            notInApp = ['http://', 'https://', '#', 'tel:', 'mailto:'],
            isRoute = true;
        for (var i = 0, l = notInApp.length; i < l; i++) {
          if (link.indexOf(notInApp[i]) > -1) {
            isRoute = false;
          }
        }
        if($el.attr('target') === '_blank'){
          isRoute = false;
        }
        if($el.attr('data-type') === 'notApp') {
          window.location.href = link;
          isRoute = false;
        }
        console.log('location.href', location.pathname, link)
        if(link.indexOf('/product/') !== -1){
          _backFromProduct = location.pathname;
        }
        if (isRoute && !isLang && !isSocial) {
          console.warn('внутренний переход на',link);
          page(link);

          e.preventDefault();
        } else if (isLang || isSocial) {
          window.location.href = link;
        }
        // return false;
      })

      .on('keyup','form[data-type="search"] input',function () {
        var $inp = $(this),
            val = $inp.val(),
            pattern = /[^\wа-яёєї'іÀ-ÿ ]+/gi,
            newV = val.replace(pattern ,'');
        $inp.val(newV);
        return false;
      })

      .on('submit','form[data-type="search"]',function () {
        var $form = $(this),
            serForm = $form.serialize();
        $('#search-live-box').html('');
        console.log('submit search: ',serForm);
        page('/search?'+serForm);
        return false;
      });
  }

  function _getCntBasket() {
    $.get('/api/basket/count').done(function (answer) {
      $('header .wrap-stash-ico').append('<i class="stash-cnt">'+answer+'</i>');
    })
  }
  function _hidePopup() {
    // hideTopMenu();
    // hideLeftMenu();
  }

  function _goPage(link) {
    page(link);
  }

  function _routes() {
    var prevPage = '/';

    console.log(thatClass,'<:|:>')
    _hidePopup();

    page.base('/');


    page('*', function (ctx, next) {
      console.log('PAGE ctx (*)', ctx.pathname)
      hideTopMenu();
      hideLeftMenu();
      // console.dir(ctx)
      // console.log(next)
      var prevPath = $('main').attr('data-page'),
      toggleHidenClass = function (isAdd) {
        if(isAdd) {
          clearInterval(intervalNewProdDot);
          hideElemsBeforeBack();

          if((ctx.pathname.indexOf('/collections/')  != -1 && (ctx.pathname.split("/").length - 1) == 3) ||
             (ctx.pathname.indexOf('/zones/')        != -1 && (ctx.pathname.split("/").length - 1) == 3) ||
              ctx.pathname.indexOf('/news/')         != -1                                               ||
              ctx.pathname.indexOf('/product/')      != -1                                               ||
              ctx.pathname.indexOf('/press-design') != -1
          )
          {
            hideHeader();
          }
        } else {
          //
        }
      },
      insertInHtml = function (obj) {
        prevPage = ctx.pathname;
        _editHeadHtml(obj.headHtml, function () {
          _editHeadSEO(obj.head);
          _editAfterFooter(obj.afterFooterHtml);
          _editBeforeHeader(obj.beforeHeaderHtml);
          _editContentHtml(obj.contentHtml, obj.dataPage, function () {
            setTimeout(function() {
              _reInit(function() {
                console.info('load done');
                toggleHidenClass(false);
                initPageAfterLoading();
                setTimeout(function() {
                  $('main').removeClass('loading');
                }, 250);
              });
              next();
            }, 0);
          });
        });
      };

      console.info('click *', prevPath, '===', ctx.canonicalPath);
      // if(prevPath === (ctx.pathname + '?' + ctx.querystring)){
      if(prevPath === ctx.canonicalPath){
        return;
      }

      // console.info('load start', prevPath, window.location.pathname, ctx.pathname);
      $('main').addClass('loading');
      // var needPageData = _loadedPages[ctx.pathname];
      var needPageData = _loadedPages[ctx.canonicalPath];

      if (!_.isEmpty(needPageData) && ctx.canonicalPath !== '/basket') { // если есть в сохраненных достаем из массива и это не страница корзины
        // console.info('this page is loaded in _loadedPages');
        toggleHidenClass(true);
        setTimeout(function () {
          insertInHtml(needPageData);
        }, 500);
      } else {                                                // если нету берем с сервера
        toggleHidenClass(true);
        $.get(ctx.canonicalPath).then(function (answer) {
          var $html = $('<div/>').append(answer),
            head = [
              {'name': 'title', 'value': $html.find('title:first').text(), 'attr': false},
              {'name': 'title', 'value': $html.find('meta[name="description"]').attr('content'), 'attr': 'content'},
            ],
            headHtml = $html.find('#header').html(),
            dataPage = $html.find('#content').attr('data-page'),
            contentHtml = $html.find('#content').html(),
            afterFooterHtml = $html.find('#after_footer').html(),
            beforeHeaderHtml = $html.find('#before_header').html();

          needPageData = {
            'head': head,
            'headHtml': headHtml,
            'dataPage': dataPage,
            'contentHtml': contentHtml,
            'afterFooterHtml': afterFooterHtml,
            'beforeHeaderHtml': beforeHeaderHtml
          };
          _loadedPages[ctx.canonicalPath] = needPageData;
          insertInHtml(needPageData);

        }).fail(function(mess) {
          console.warn('ajax error: ',mess,':', ctx, ':', prevPage);
          toggleHidenClass(false);
          $('#popup404').show();
          $('body').css({'position':'fixed','overflow':'hidden'});
          $('main').removeClass('loading');
          $('.message_link a').click(function(event) {
            var link = $(this).attr('href');
            event.preventDefault();
            _hidePopup();

            page.redirect(link);
          });
          $('.js-popup-close,.popup__overlay').click(function(event) {
            event.preventDefault();
            _hidePopup();

            page.redirect(prevPage);
          });
        });
      }
    });
    // page({ dispatch: true });

    // page('/', function (ctx, next) {
    //   _home(ctx, next);
    // });

    page('*', function (ctx, next){
      _error404(ctx, next);
    });

    page();

  }

  function _reInit(clbk) {
    // window.reinit();
    clbk();
  }

  function _home(ctx, clbk) {

    clbk();
  }

  function _error404(ctx, clbk) {

    clbk();
  }

  function _editHeadSEO(html) {
    console.info(html);
    _.forEach(html, function (e) {
      if (e.attr) {
        $(e.name).attr(e.attr, e.value);
      } else {
        $(e.name).text(e.value);
      }
    });
  }

  function _editAfterFooter(html, clbk) {
    $('#after_footer').html(html);
    // clbk();
  }
  function _editBeforeHeader(html, clbk) {
    $('#before_header').html(html);
    // clbk();
  }

  function _editHeadHtml(html, clbk) {
    $('.header-mob').html(html);
    clbk();
  }

  function _editContentHtml(html, pageName, clbk) {
    $('main .scroll-content > *').each(function (i,_el) {
      if(!$(_el).is('footer')){
        $(_el).remove();
      }
    });
    $('main .scroll-content footer').before(html);
    mainScroll.setPosition(0, 0);
    $('main').attr('data-page', pageName);
    clbk();
  }


  return {
    init: function () {
      _start();
      _routes();
    },
    getPages: function () {
      return _loadedPages;
    },
    goToPage: function (link) {
      _goPage(link);
    },
    goPopupBack: function () {
      console.log('_backFromProduct', _backFromProduct)
      if(_backFromProduct) {
        page(_backFromProduct);
        _backFromProduct = undefined;
        return true;
      }

      if(location.pathname.indexOf('product/') != -1) {
        page('/catalogue');
        return true;
      }
      return false;
    },
    goBack: function () {
      history.go(-1);
    }
  }
}());

App.init();