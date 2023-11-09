/*! For license information please see app.js.LICENSE.txt */
!function(t){var e={};function r(n){if(e[n])return e[n].exports;var o=e[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=t,r.c=e,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)r.d(n,o,function(e){return t[e]}.bind(null,o));return n},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="/",r(r.s=0)}([function(t,e,r){r(1),t.exports=r(3)},function(t,e,r){document.addEventListener("admin:init",(function(){Vue.component("notifications-window",r(2).default)}))},function(t,e,r){"use strict";r.r(e);function n(t){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function o(){o=function(){return t};var t={},e=Object.prototype,r=e.hasOwnProperty,i=Object.defineProperty||function(t,e,r){t[e]=r.value},a="function"==typeof Symbol?Symbol:{},u=a.iterator||"@@iterator",s=a.asyncIterator||"@@asyncIterator",c=a.toStringTag||"@@toStringTag";function f(t,e,r){return Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{f({},"")}catch(t){f=function(t,e,r){return t[e]=r}}function l(t,e,r,n){var o=e&&e.prototype instanceof p?e:p,a=Object.create(o.prototype),u=new O(n||[]);return i(a,"_invoke",{value:L(t,r,u)}),a}function d(t,e,r){try{return{type:"normal",arg:t.call(e,r)}}catch(t){return{type:"throw",arg:t}}}t.wrap=l;var h={};function p(){}function v(){}function y(){}var m={};f(m,u,(function(){return this}));var g=Object.getPrototypeOf,_=g&&g(g(j([])));_&&_!==e&&r.call(_,u)&&(m=_);var w=y.prototype=p.prototype=Object.create(m);function x(t){["next","throw","return"].forEach((function(e){f(t,e,(function(t){return this._invoke(e,t)}))}))}function b(t,e){var o;i(this,"_invoke",{value:function(i,a){function u(){return new e((function(o,u){!function o(i,a,u,s){var c=d(t[i],t,a);if("throw"!==c.type){var f=c.arg,l=f.value;return l&&"object"==n(l)&&r.call(l,"__await")?e.resolve(l.__await).then((function(t){o("next",t,u,s)}),(function(t){o("throw",t,u,s)})):e.resolve(l).then((function(t){f.value=t,u(f)}),(function(t){return o("throw",t,u,s)}))}s(c.arg)}(i,a,o,u)}))}return o=o?o.then(u,u):u()}})}function L(t,e,r){var n="suspendedStart";return function(o,i){if("executing"===n)throw new Error("Generator is already running");if("completed"===n){if("throw"===o)throw i;return k()}for(r.method=o,r.arg=i;;){var a=r.delegate;if(a){var u=E(a,r);if(u){if(u===h)continue;return u}}if("next"===r.method)r.sent=r._sent=r.arg;else if("throw"===r.method){if("suspendedStart"===n)throw n="completed",r.arg;r.dispatchException(r.arg)}else"return"===r.method&&r.abrupt("return",r.arg);n="executing";var s=d(t,e,r);if("normal"===s.type){if(n=r.done?"completed":"suspendedYield",s.arg===h)continue;return{value:s.arg,done:r.done}}"throw"===s.type&&(n="completed",r.method="throw",r.arg=s.arg)}}}function E(t,e){var r=e.method,n=t.iterator[r];if(void 0===n)return e.delegate=null,"throw"===r&&t.iterator.return&&(e.method="return",e.arg=void 0,E(t,e),"throw"===e.method)||"return"!==r&&(e.method="throw",e.arg=new TypeError("The iterator does not provide a '"+r+"' method")),h;var o=d(n,t.iterator,e.arg);if("throw"===o.type)return e.method="throw",e.arg=o.arg,e.delegate=null,h;var i=o.arg;return i?i.done?(e[t.resultName]=i.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=void 0),e.delegate=null,h):i:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,h)}function S(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function C(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function O(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(S,this),this.reset(!0)}function j(t){if(t){var e=t[u];if(e)return e.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var n=-1,o=function e(){for(;++n<t.length;)if(r.call(t,n))return e.value=t[n],e.done=!1,e;return e.value=void 0,e.done=!0,e};return o.next=o}}return{next:k}}function k(){return{value:void 0,done:!0}}return v.prototype=y,i(w,"constructor",{value:y,configurable:!0}),i(y,"constructor",{value:v,configurable:!0}),v.displayName=f(y,c,"GeneratorFunction"),t.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===v||"GeneratorFunction"===(e.displayName||e.name))},t.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,y):(t.__proto__=y,f(t,c,"GeneratorFunction")),t.prototype=Object.create(w),t},t.awrap=function(t){return{__await:t}},x(b.prototype),f(b.prototype,s,(function(){return this})),t.AsyncIterator=b,t.async=function(e,r,n,o,i){void 0===i&&(i=Promise);var a=new b(l(e,r,n,o),i);return t.isGeneratorFunction(r)?a:a.next().then((function(t){return t.done?t.value:a.next()}))},x(w),f(w,c,"Generator"),f(w,u,(function(){return this})),f(w,"toString",(function(){return"[object Generator]"})),t.keys=function(t){var e=Object(t),r=[];for(var n in e)r.push(n);return r.reverse(),function t(){for(;r.length;){var n=r.pop();if(n in e)return t.value=n,t.done=!1,t}return t.done=!0,t}},t.values=j,O.prototype={constructor:O,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(C),!t)for(var e in this)"t"===e.charAt(0)&&r.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=void 0)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var e=this;function n(r,n){return a.type="throw",a.arg=t,e.next=r,n&&(e.method="next",e.arg=void 0),!!n}for(var o=this.tryEntries.length-1;o>=0;--o){var i=this.tryEntries[o],a=i.completion;if("root"===i.tryLoc)return n("end");if(i.tryLoc<=this.prev){var u=r.call(i,"catchLoc"),s=r.call(i,"finallyLoc");if(u&&s){if(this.prev<i.catchLoc)return n(i.catchLoc,!0);if(this.prev<i.finallyLoc)return n(i.finallyLoc)}else if(u){if(this.prev<i.catchLoc)return n(i.catchLoc,!0)}else{if(!s)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return n(i.finallyLoc)}}}},abrupt:function(t,e){for(var n=this.tryEntries.length-1;n>=0;--n){var o=this.tryEntries[n];if(o.tryLoc<=this.prev&&r.call(o,"finallyLoc")&&this.prev<o.finallyLoc){var i=o;break}}i&&("break"===t||"continue"===t)&&i.tryLoc<=e&&e<=i.finallyLoc&&(i=null);var a=i?i.completion:{};return a.type=t,a.arg=e,i?(this.method="next",this.next=i.finallyLoc,h):this.complete(a)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),h},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.finallyLoc===t)return this.complete(r.completion,r.afterLoc),C(r),h}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.tryLoc===t){var n=r.completion;if("throw"===n.type){var o=n.arg;C(r)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,r){return this.delegate={iterator:j(t),resultName:e,nextLoc:r},"next"===this.method&&(this.arg=void 0),h}},t}function i(t,e,r,n,o,i,a){try{var u=t[i](a),s=u.value}catch(t){return void r(t)}u.done?e(s):Promise.resolve(s).then(n,o)}function a(t){return function(){var e=this,r=arguments;return new Promise((function(n,o){var a=t.apply(e,r);function u(t){i(a,n,o,u,s,"next",t)}function s(t){i(a,n,o,u,s,"throw",t)}u(void 0)}))}}var u=function(t,e,r,n,o,i,a,u){var s,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=r,c._compiled=!0),n&&(c.functional=!0),i&&(c._scopeId="data-v-"+i),a?(s=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),o&&o.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(a)},c._ssrRegister=s):o&&(s=u?function(){o.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:o),s)if(c.functional){c._injectStyles=s;var f=c.render;c.render=function(t,e){return s.call(e),f(t,e)}}else{var l=c.beforeCreate;c.beforeCreate=l?[].concat(l,s):[s]}return{exports:t,options:c}}({name:"NotificationsWindow",props:["messages_route","count_of_new_route","message_url_route","set_as_read_route"],data:function(){return{items:[],count:0,url:null}},mounted:function(){var t=this;axios.get(this.messages_route).then((function(e){return t.items=e.data})),axios.get(this.count_of_new_route).then((function(e){return t.count=e.data})),this.url=this.message_url_route,document.addEventListener("admin_notifications_update",this.updateItems)},beforeDestroy:function(){document.removeEventListener("admin_notifications_update",this.updateItems)},methods:{updateItems:function(){var t=this;return a(o().mark((function e(){return o().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,axios.get(t.messages_route);case 2:return t.items=e.sent.data,e.next=5,axios.get(t.count_of_new_route);case 5:if(t.count=e.sent.data,!t.count){e.next=9;break}return e.next=9,t.toggleSound();case 9:case"end":return e.stop()}}),e)})))()},readed:function(t){var e=this;return a(o().mark((function r(){return o().wrap((function(r){for(;;)switch(r.prev=r.next){case 0:return r.next=2,axios.post(e.set_as_read_route,{_token:exec("token"),id:t});case 2:case"end":return r.stop()}}),r)})))()},toggleSound:function(){var t=this;return a(o().mark((function e(){var r;return o().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return r=t.$refs.audio,e.next=3,r.play();case 3:case"end":return e.stop()}}),e)})))()}}},(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("li",{staticClass:"nav-item dropdown"},[r("a",{staticClass:"nav-link",attrs:{"data-toggle":"dropdown",href:"#","aria-expanded":"false"}},[r("i",{staticClass:"far fa-comments"}),t._v(" "),t.count?r("span",{staticClass:"badge badge-danger navbar-badge"},[t._v("\n            "+t._s(t.count)+"\n            "),r("audio",{ref:"audio",attrs:{preload:"auto"}},[r("source",{attrs:{src:"/vendor/bfg-admin-notifications/beep.mp3"}})])]):t._e()]),t._v(" "),r("div",{staticClass:"dropdown-menu dropdown-menu-lg dropdown-menu-right",staticStyle:{left:"inherit",right:"0px"}},[t._l(t.items,(function(e,n){return[r("a",{key:e.id+"-item-notification",staticClass:"dropdown-item",attrs:{href:e.link?e.link:"javascript:void(0)"}},[r("div",{staticClass:"media"},[r("div",{staticClass:"media-body"},[r("h3",{staticClass:"dropdown-item-title"},[t._v("\n                            "+t._s(e.title)+"\n                            "),r("span",{class:"float-right text-sm "+(e.read_at?"text-success":"text-danger"),on:{click:function(r){return r.preventDefault(),r.stopPropagation(),t.readed(e.id)}}},[r("i",{staticClass:"fas fa-star"})])]),t._v(" "),r("p",{staticClass:"text-sm"},[t._v(t._s(e.text))]),t._v(" "),r("p",{staticClass:"text-sm text-muted"},[r("i",{staticClass:"far fa-clock mr-1"}),t._v(" "+t._s(e.created_at)+"\n                        ")])])])]),t._v(" "),r("div",{key:e.id+"-item-notification-divider",staticClass:"dropdown-divider"})]})),t._v(" "),t.url?r("a",{staticClass:"dropdown-item dropdown-footer",attrs:{href:t.url}},[t._v("See All Messages")]):t._e()],2)])}),[],!1,null,"2d3feb64",null);e.default=u.exports},function(t,e){}]);