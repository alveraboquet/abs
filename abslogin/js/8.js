(window.webpackJsonp=window.webpackJsonp||[]).push([[8],{"0Inu":function(t,n,e){"use strict";e.d(n,"a",function(){return l});var i=e("AytR"),o=e("mLlc"),a=e("fXoL"),c=e("tk/3");let l=(()=>{class t{constructor(t){this.http=t,this.api=i.a.apiUrl}getPackageList(){return this.http.get(this.api+"api/package")}getProjectList(t){let n=Object(o.e)(t);return this.http.get(this.api+"api/project?"+n)}getProjectDetailById(t){let n=Object(o.e)(t);return this.http.get(this.api+"api/project/detail?"+n)}getPackageById(t){return this.http.get(this.api+"api/package/detail?package_id="+t)}}return t.\u0275fac=function(n){return new(n||t)(a.Yb(c.b))},t.\u0275prov=a.Ib({token:t,factory:t.\u0275fac,providedIn:"root"}),t})()},Fvwb:function(t,n,e){"use strict";e.d(n,"a",function(){return l});var i=e("AytR"),o=e("mLlc"),a=e("fXoL"),c=e("tk/3");let l=(()=>{class t{constructor(t){this.http=t,this.api=i.a.apiUrl}getWalletDetails(){return this.http.get(this.api+"api/wallet/balance")}getWalletStatement(t){return this.http.get(this.api+"api/wallet/statement?type="+t)}getTotalIncome(){return this.http.get(this.api+"api/wallet/total-income-summary")}getWithdrawProcessFee(){return this.http.get(this.api+"api/withdraw/processing-fee")}getWithdrawHistory(t){let n=Object(o.e)(t);return this.http.get(this.api+"api/withdraw/statement?"+n)}getTopupHistory(t){let n=Object(o.e)(t);return this.http.get(this.api+"api/wallet/topup?"+n)}getStatementHistory(t){let n=Object(o.e)(t);return this.http.get(this.api+"api/wallet/statement?"+n)}pTransferWallet(t){return this.http.post(this.api+"api/wallet/transfer",t)}pDirectTopUp(t){return this.http.post(this.api+"api/wallet/topup",t)}pWithdrawWallet(t){return this.http.post(this.api+"api/withdraw/create",t)}pConvertWallet(t){return this.http.post(this.api+"api/wallet/convert",t)}}return t.\u0275fac=function(n){return new(n||t)(a.Yb(c.b))},t.\u0275prov=a.Ib({token:t,factory:t.\u0275fac,providedIn:"root"}),t})()},KvIV:function(t,n,e){"use strict";e.d(n,"a",function(){return l});var i=e("AytR"),o=e("mLlc"),a=e("fXoL"),c=e("tk/3");let l=(()=>{class t{constructor(t){this.http=t,this.api=i.a.apiUrl}getStakingList(t){let n=Object(o.e)(t);return this.http.get(this.api+"api/staking/list?"+n)}getStakingDetailById(t){let n=Object(o.e)(t);return this.http.get(this.api+"api/staking?"+n)}getStakingSummary(){return this.http.get(this.api+"api/staking/summary")}getStakingStatement(t){let n=Object(o.e)(t);return this.http.get(this.api+"api/staking/statement?"+n)}getROIGraph(){return this.http.get(this.api+"api/roi/summary")}getCommisionInfo(){return this.http.get(this.api+"api/user/commission-summary")}createStaking(t){return this.http.post(this.api+"api/staking/create",t)}}return t.\u0275fac=function(n){return new(n||t)(a.Yb(c.b))},t.\u0275prov=a.Ib({token:t,factory:t.\u0275fac,providedIn:"root"}),t})()},fZqX:function(t,n,e){"use strict";e.r(n),e.d(n,"PanelModule",function(){return D});var i=e("ofXK"),o=e("tyNb"),a=e("mLlc"),c=e("fXoL"),l=e("XPT/"),r=e("S0xR"),s=e("XnyR"),g=e("sYmb"),b=e("0Inu"),d=e("GUDH");function p(t,n){if(1&t&&(c.Rb(0,"span",14),c.Ec(1),c.fc(2,"translate"),c.Rb(3,"b"),c.Ec(4),c.Qb(),c.Qb()),2&t){const t=c.ec();c.zb(1),c.Gc(" ",c.gc(2,2,"login.welcome"),"\xa0,\xa0"),c.zb(3),c.Fc(null==t.user?null:t.user.name)}}function h(t,n){1&t&&(c.Rb(0,"a",15),c.Rb(1,"div",16),c.Nb(2,"i",17),c.Rb(3,"span",14),c.Ec(4),c.fc(5,"translate"),c.Qb(),c.Qb(),c.Qb()),2&t&&(c.zb(4),c.Fc(c.gc(5,1,"header.notifications")))}function f(t,n){if(1&t){const t=c.Sb();c.Rb(0,"a",18),c.bc("click",function(){return c.wc(t),c.ec().logout()}),c.Rb(1,"div",16),c.Nb(2,"i",19),c.Rb(3,"span",14),c.Ec(4),c.fc(5,"translate"),c.Qb(),c.Qb(),c.Qb()}2&t&&(c.zb(4),c.Fc(c.gc(5,1,"header.logout")))}function m(t,n){1&t&&(c.Rb(0,"a",20),c.Rb(1,"div",16),c.Rb(2,"span",21),c.Ec(3),c.fc(4,"translate"),c.Qb(),c.Qb(),c.Qb()),2&t&&(c.zb(3),c.Fc(c.gc(4,1,"button.login_now")))}function u(t,n){if(1&t&&(c.Rb(0,"a",22),c.Rb(1,"div",16),c.Rb(2,"span",14),c.Ec(3),c.fc(4,"translate"),c.Qb(),c.Nb(5,"i",25),c.Qb(),c.Qb()),2&t){const t=c.ec(2);c.lc("routerLink",t.state.menu_path),c.zb(3),c.Fc(c.gc(4,2,t.state.menu_title))}}function _(t,n){if(1&t&&(c.Rb(0,"div",2),c.Rb(1,"a",22),c.Nb(2,"i",23),c.Qb(),c.Cc(3,u,6,4,"a",24),c.Qb()),2&t){const t=c.ec();c.zb(1),c.lc("routerLink",t.state.path),c.zb(2),c.kc("ngIf",t.state.right_menu)}}function v(t,n){if(1&t&&(c.Rb(0,"span",31),c.Ec(1),c.fc(2,"translate"),c.Rb(3,"b"),c.Ec(4),c.Qb(),c.Qb()),2&t){const t=c.ec(2);c.zb(1),c.Gc(" ",c.gc(2,2,"login.welcome"),"\xa0,\xa0"),c.zb(3),c.Fc(null==t.user?null:t.user.name)}}function M(t,n){if(1&t&&(c.Rb(0,"span",31),c.Ec(1),c.fc(2,"translate"),c.Rb(3,"b"),c.Ec(4),c.Qb(),c.Qb()),2&t){const t=c.ec(2);c.zb(1),c.Gc(" ",c.gc(2,2,"lang.total_project"),"\xa0:\xa0"),c.zb(3),c.Fc(null==t.project?null:t.project.length)}}function C(t,n){1&t&&(c.Rb(0,"span",31),c.Ec(1),c.fc(2,"translate"),c.Qb()),2&t&&(c.zb(1),c.Gc(" ",c.gc(2,1,"lang.staking_reminder"),""))}function w(t,n){1&t&&(c.Rb(0,"span",31),c.Ec(1),c.fc(2,"translate"),c.Qb()),2&t&&(c.zb(1),c.Gc(" ",c.gc(2,1,"lang.welcome-to"),""))}function O(t,n){if(1&t){const t=c.Sb();c.Rb(0,"div"),c.Rb(1,"div",26),c.Rb(2,"span",27),c.Ec(3),c.Qb(),c.Rb(4,"a",28),c.bc("click",function(){return c.wc(t),c.ec().onLoginModal()}),c.Nb(5,"i",29),c.Qb(),c.Qb(),c.Cc(6,v,5,4,"span",30),c.Cc(7,M,5,4,"span",30),c.Cc(8,C,3,3,"span",30),c.Cc(9,w,3,3,"span",30),c.Qb()}if(2&t){const t=c.ec();c.zb(3),c.Fc(t.state.title),c.zb(3),c.kc("ngIf",t.state.home&&t.logged_in),c.zb(1),c.kc("ngIf",t.state.project),c.zb(1),c.kc("ngIf",t.state.staking),c.zb(1),c.kc("ngIf",t.state.abs)}}let P=(()=>{class t{constructor(t,n,e,i,o,a){this.service=t,this.translate=n,this.mService=e,this.pService=i,this.router=o,this.jwt=a,this.state={title:"",path:"",rightMenu:""},this.isMobile=!1}ngOnInit(){this.service.getState().subscribe(t=>{t.title=this.translate.instant(t.title),this.state=t,this.state.title==this.translate.instant("header.kyc")&&this.refreshkyc()}),this.pService.getProjectList({size:20}).subscribe(t=>{this.project=t.data}),this.onResize(),null==this.jwt.accessToken||this.jwt.tokenExpired(this.jwt.accessToken)?this.logged_in=!1:null==this.jwt.accessToken||this.jwt.tokenExpired(this.jwt.accessToken)||(this.logged_in=!0,this.mService.getUserDetails().subscribe(t=>{this.user=t[0]}))}refreshkyc(){this.mService.getMemberKyc().subscribe(t=>{t&&(this.kyc=t[0])})}logout(){this.mService.memberLogout({}).subscribe(),this.jwt.onLogout(),this.router.navigateByUrl("login")}onLoginModal(){this.logged_in||(this.loginModal={title:"ABS",type:3,subtitle:"button.login_now",desc:[{content:"error.pls_loginfor"}],btn:{label:"button.login_now"}})}onResize(){let t=window.innerWidth;this.isMobile=t<=768}scrollHandler(t){var n=this.getYPosition(t);const e=document.querySelector(".header");this.isMobile&&n>20?(e.classList.remove("add_bg"),e.classList.add("add_bg")):e.classList.remove("add_bg")}getYPosition(t){return t.target.scrollTop}}return t.\u0275fac=function(n){return new(n||t)(c.Mb(r.a),c.Mb(g.e),c.Mb(l.a),c.Mb(b.a),c.Mb(o.c),c.Mb(s.a))},t.\u0275cmp=c.Gb({type:t,selectors:[["app-header"]],hostBindings:function(t,n){1&t&&c.bc("resize",function(t){return n.onResize(t)},!1,c.vc)("scroll",function(t){return n.scrollHandler(t)},!1,c.uc)},decls:14,vars:7,consts:[[1,"header"],[1,"-onlyweb"],[1,"d-flex","align-items-center","justify-content-between"],[1,"header-left","d-flex","align-items-center"],["src","/assets/logo/logo-05.png","width","84px"],["class","right_title",4,"ngIf"],[1,"header-right","d-flex","align-items-center"],["routerLink","/profile/notifications",4,"ngIf"],[3,"click",4,"ngIf"],["routerLink","/login",4,"ngIf"],[1,"-onlymobile"],["class","d-flex align-items-center justify-content-between ",4,"ngIf"],[4,"ngIf"],[3,"modal","confirm","close"],[1,"right_title"],["routerLink","/profile/notifications"],[1,"right_menu"],[1,"icon-icon-13",2,"color","#40bbff"],[3,"click"],[1,"icon-icon-40",2,"color","#ff0707"],["routerLink","/login"],[1,"right_title",2,"font-size","16px"],[3,"routerLink"],[1,"icon-icon-05","back_arrow"],[3,"routerLink",4,"ngIf"],[1,"icon-icon-07","back_arrow"],[1,"top_nav","d-flex","align-items-center","justify-content-between"],[1,"title"],["routerLink","/profile/notifications",3,"click"],[1,"icon-icon-13","notif-icon"],["class","sub-title",4,"ngIf"],[1,"sub-title"]],template:function(t,n){1&t&&(c.Rb(0,"div",0),c.Rb(1,"div",1),c.Rb(2,"div",2),c.Rb(3,"div",3),c.Nb(4,"img",4),c.Cc(5,p,5,4,"span",5),c.Qb(),c.Rb(6,"div",6),c.Cc(7,h,6,3,"a",7),c.Cc(8,f,6,3,"a",8),c.Cc(9,m,5,3,"a",9),c.Qb(),c.Qb(),c.Qb(),c.Rb(10,"div",10),c.Cc(11,_,4,2,"div",11),c.Cc(12,O,10,5,"div",12),c.Qb(),c.Qb(),c.Rb(13,"app-pop-out",13),c.bc("confirm",function(){return n.loginModal=void 0})("close",function(){return n.loginModal=void 0}),c.Qb()),2&t&&(c.zb(5),c.kc("ngIf",n.logged_in),c.zb(2),c.kc("ngIf",n.logged_in),c.zb(1),c.kc("ngIf",n.logged_in),c.zb(1),c.kc("ngIf",!n.logged_in),c.zb(2),c.kc("ngIf",n.state.path),c.zb(1),c.kc("ngIf",!n.state.path),c.zb(1),c.kc("modal",n.loginModal))},directives:[i.m,d.a,o.f],pipes:[g.d],styles:[".header[_ngcontent-%COMP%]{position:fixed;top:0;width:100%;padding:20px 5% 20px 4%;background-color:#00178a;z-index:11;display:block;height:auto;overflow-y:scroll}.header[_ngcontent-%COMP%]   .header-left[_ngcontent-%COMP%]   img[_ngcontent-%COMP%]{width:84px;margin:0 40px 0 0}.header[_ngcontent-%COMP%]   .header-left[_ngcontent-%COMP%]   span[_ngcontent-%COMP%]{font-size:16px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;color:#fff}.header[_ngcontent-%COMP%]   .header-right[_ngcontent-%COMP%]   a[_ngcontent-%COMP%]{margin-right:40px}.right_menu[_ngcontent-%COMP%]{display:flex;align-items:center}.right_menu[_ngcontent-%COMP%]   .right_title[_ngcontent-%COMP%]{font-size:14px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;color:#fff}.right_menu[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:16px;margin-right:10px;color:#40bbff;line-height:normal}.title[_ngcontent-%COMP%]{font-size:24px;font-weight:700;color:#000}.sub-title[_ngcontent-%COMP%], .title[_ngcontent-%COMP%]{font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal}.sub-title[_ngcontent-%COMP%]{font-size:14px;font-weight:400;color:#585858;display:inline-block;max-width:70%;margin-top:6px}.notif-icon[_ngcontent-%COMP%]{font-size:18px}.back_arrow[_ngcontent-%COMP%], .notif-icon[_ngcontent-%COMP%]{color:#00178a;cursor:pointer}.back_arrow[_ngcontent-%COMP%]{font-size:16px}.kyc_status[_ngcontent-%COMP%]   .kyc_tag[_ngcontent-%COMP%]{min-width:60px;padding:3px 5px;border-radius:3px;border:1px solid #e7e7e7;font-size:12px;text-align:center;color:#c1c1c1}.kyc_status[_ngcontent-%COMP%]   .kyc_label[_ngcontent-%COMP%], .kyc_status[_ngcontent-%COMP%]   .kyc_tag[_ngcontent-%COMP%]{font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal}.kyc_status[_ngcontent-%COMP%]   .kyc_label[_ngcontent-%COMP%]{font-size:13px;color:#000;margin-right:10px}@media screen and (max-width:768px){.header[_ngcontent-%COMP%]{min-height:unset;position:fixed;top:0;width:100%;padding:18px 20px;background:unset;margin:0;z-index:10}.header.add_bg[_ngcontent-%COMP%]{background-color:#fff;box-shadow:0 2px 15px -2px rgba(0,0,0,.3)}.top_nav[_ngcontent-%COMP%]{width:100%}.right_menu[_ngcontent-%COMP%]{display:flex;align-items:center}.right_menu[_ngcontent-%COMP%]   .right_title[_ngcontent-%COMP%]{font-size:14px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;text-align:right;color:#00178a}.right_menu[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:10px;margin-left:6px;margin-right:0;color:#afafaf;line-height:normal}}"]}),t})();var k=e("Fvwb"),x=e("KvIV");function y(t,n){if(1&t&&c.Nb(0,"img",52),2&t){const t=c.ec(2);c.mc("src","/assets/image/ranking/0",null==t.user?null:t.user.rankings.id,".png",c.zc)}}const R=function(){return["/profile/1"]},Q=function(){return["/profile/2"]},z=function(){return["/profile/1/topup"]},j=function(){return["/profile/2/withdrawal-history"]};function L(t,n){if(1&t&&(c.Rb(0,"div",27),c.Rb(1,"div",28),c.Rb(2,"div",29),c.Nb(3,"img",30),c.Qb(),c.Rb(4,"div",31),c.Rb(5,"span"),c.Ec(6),c.Qb(),c.Cc(7,y,1,1,"img",32),c.Qb(),c.Rb(8,"div",33),c.Rb(9,"span"),c.Ec(10),c.fc(11,"translate"),c.Rb(12,"b"),c.Ec(13),c.Qb(),c.Qb(),c.Qb(),c.Rb(14,"div",34),c.Rb(15,"div",35),c.Rb(16,"a",36),c.Rb(17,"div",37),c.Rb(18,"span"),c.Ec(19),c.fc(20,"translate"),c.Qb(),c.Rb(21,"div",38),c.Rb(22,"div"),c.Ec(23),c.fc(24,"number"),c.Qb(),c.Nb(25,"i",4),c.Qb(),c.Qb(),c.Qb(),c.Qb(),c.Rb(26,"div",35),c.Rb(27,"a",36),c.Rb(28,"div",37),c.Rb(29,"span"),c.Ec(30),c.fc(31,"translate"),c.Qb(),c.Rb(32,"div",38),c.Rb(33,"div"),c.Ec(34),c.fc(35,"number"),c.Qb(),c.Nb(36,"i",4),c.Qb(),c.Qb(),c.Qb(),c.Qb(),c.Qb(),c.Qb(),c.Rb(37,"div",39),c.Nb(38,"div",40),c.Rb(39,"div",39),c.Rb(40,"a",36),c.Rb(41,"div",41),c.Rb(42,"div",42),c.Nb(43,"i",43),c.Rb(44,"div",44),c.Rb(45,"div"),c.Ec(46),c.fc(47,"translate"),c.Qb(),c.Qb(),c.Qb(),c.Nb(48,"i",4),c.Qb(),c.Qb(),c.Rb(49,"a",36),c.Rb(50,"div",41),c.Rb(51,"div",42),c.Nb(52,"i",45),c.Rb(53,"div",44),c.Rb(54,"div"),c.Ec(55),c.fc(56,"translate"),c.Qb(),c.Rb(57,"span"),c.Ec(58),c.fc(59,"translate"),c.Qb(),c.Qb(),c.Qb(),c.Nb(60,"i",4),c.Qb(),c.Qb(),c.Qb(),c.Nb(61,"div",40),c.Qb(),c.Rb(62,"div",46),c.Rb(63,"div",47),c.Rb(64,"div",48),c.Nb(65,"i",49),c.Rb(66,"span"),c.Ec(67),c.fc(68,"translate"),c.Qb(),c.Qb(),c.Rb(69,"div"),c.Ec(70),c.fc(71,"number"),c.Qb(),c.Qb(),c.Rb(72,"div",47),c.Rb(73,"div",48),c.Nb(74,"i",50),c.Rb(75,"span"),c.Ec(76),c.fc(77,"translate"),c.Qb(),c.Qb(),c.Rb(78,"div"),c.Ec(79),c.fc(80,"number"),c.Qb(),c.Qb(),c.Rb(81,"div",47),c.Rb(82,"div",48),c.Nb(83,"i",51),c.Rb(84,"span"),c.Ec(85),c.fc(86,"translate"),c.Qb(),c.Qb(),c.Rb(87,"div"),c.Ec(88),c.fc(89,"number"),c.Qb(),c.Qb(),c.Qb(),c.Qb()),2&t){const t=c.ec();c.zb(6),c.Fc(null==t.user?null:t.user.name),c.zb(1),c.kc("ngIf",null==t.user?null:t.user.rankings.id),c.zb(3),c.Gc(" ",c.gc(11,21,"lang.current_ranking"),"\xa0:\xa0"),c.zb(3),c.Fc(2==t.language?null==t.user?null:t.user.rankings.name_cn:null==t.user?null:t.user.rankings.name),c.zb(3),c.kc("routerLink",c.oc(54,R)),c.zb(3),c.Gc(" ",c.gc(20,23,"wallet.1"),""),c.zb(4),c.Gc("$ ",c.hc(24,25,t.wallet_info.wallet_1,"1.4-4"),""),c.zb(4),c.kc("routerLink",c.oc(55,Q)),c.zb(3),c.Gc(" ",c.gc(31,28,"wallet.2"),""),c.zb(4),c.Gc("$ ",c.hc(35,30,t.wallet_info.wallet_2,"1.4-4"),""),c.zb(6),c.kc("routerLink",c.oc(56,z)),c.zb(6),c.Gc(" ",c.gc(47,33,"header.topup-now"),""),c.zb(3),c.kc("routerLink",c.oc(57,j)),c.zb(6),c.Gc(" ",c.gc(56,35,"header.withdraw-history"),""),c.zb(3),c.Gc(" ",c.gc(59,37,"lang.wallet_withdral_desc"),""),c.zb(9),c.Gc(" ",c.gc(68,39,"lang.group-staking"),""),c.zb(3),c.Gc("$ ",c.hc(71,41,null==t.stake_info?null:t.stake_info.group_staking,"1.4-4"),""),c.zb(6),c.Gc(" ",c.gc(77,44,"lang.group-commission"),""),c.zb(3),c.Gc("$ ",c.hc(80,46,null==t.stake_info?null:t.stake_info.group_commission,"1.4-4"),""),c.zb(6),c.Gc(" ",c.gc(86,49,"lang.direct-commission"),""),c.zb(3),c.Gc("$ ",c.hc(89,51,null==t.stake_info?null:t.stake_info.direct_commission,"1.4-4"),"")}}let I=(()=>{class t{constructor(t,n,e,i,o){this.router=t,this.jwt=n,this.mService=e,this.wService=i,this.tService=o,this.logged_in=!1,this.wallet_info={wallet_1:0,wallet_2:0,wallet_3:0,wallet_4:0}}ngOnInit(){switch(Object(a.d)("language")){case"en":this.language=1;break;case"cn":this.language=2;break;default:this.language=1}null==this.jwt.accessToken||this.jwt.tokenExpired(this.jwt.accessToken)?this.logged_in=!1:null==this.jwt.accessToken||this.jwt.tokenExpired(this.jwt.accessToken)||(this.logged_in=!0,this.mService.getUserDetails().subscribe(t=>{this.user=t[0]}),this.wService.getWalletDetails().subscribe(t=>{t.forEach(t=>{this.wallet_info[`wallet_${t.type}`]=t.balance})}),this.tService.getCommisionInfo().subscribe(t=>{this.stake_info=t}))}onLoginModal(){this.logged_in||(this.loginModal={title:"ABS",type:3,subtitle:"button.login_now",desc:[{content:"error.pls_loginfor"}],btn:{label:"button.login_now"}})}}return t.\u0275fac=function(n){return new(n||t)(c.Mb(o.c),c.Mb(s.a),c.Mb(l.a),c.Mb(k.a),c.Mb(x.a))},t.\u0275cmp=c.Gb({type:t,selectors:[["app-nav"]],decls:65,vars:9,consts:[[1,"btm-navigation"],["routerLinkActive","nav-selected","routerLink","/home",1,"nav-section"],[1,"icon-icon-16","icon"],["translate",""],[1,"icon-icon-07"],["routerLinkActive","nav-selected","routerLink","/project",1,"nav-section"],[1,"icon-icon-17","icon"],["routerLinkActive","nav-selected","routerLink","/staking",1,"nav-section",3,"ngClass","click"],[1,"icon-icon-18","icon"],["routerLinkActive","nav-selected","routerLink","/abs",1,"nav-section"],[1,"icon-icon-45","icon"],[1,"-onlymobile"],["routerLinkActive","nav-selected","routerLink","/profile",1,"nav-section",3,"ngClass","click"],[1,"icon-icon-20","icon"],[1,"-onlyweb"],["routerLinkActive","nav-selected","routerLink","/profile/my-team",1,"nav-section",2,"border-top","none",3,"ngClass","click"],[1,"icon-icon-37","icon"],["routerLinkActive","nav-selected","routerLink","/profile/kyc",1,"nav-section",3,"ngClass","click"],[1,"icon-icon-33","icon"],["routerLinkActive","nav-selected","routerLink","/profile/feedback-center",1,"nav-section",3,"ngClass","click"],[1,"icon-icon-39","icon"],["routerLinkActive","nav-selected","routerLink","/profile/invitation",1,"nav-section",3,"ngClass","click"],[1,"icon-icon-38","icon"],["routerLinkActive","nav-selected","routerLink","/profile/settings",1,"nav-section",3,"ngClass","click"],[1,"icon-icon-36","icon"],["class","web-left-navigation -onlyweb",4,"ngIf"],[3,"modal","confirm","close"],[1,"web-left-navigation","-onlyweb"],[1,"nav_profile_details"],[1,"circle_img"],["src","/assets/image/BG-10.png","alt","logo"],[1,"username","d-flex","align-items-center","justify-content-center"],["alt","ranking",3,"src",4,"ngIf"],[1,"current_ranking"],[1,"wallet_list"],[1,"wallet_item"],[3,"routerLink"],[1,"d-flex","align-items-center","justify-content-between"],[1,"d-flex","align-items-center"],[1,"wallet_action"],[1,"divider"],[1,"wallet_action_item","d-flex","align-items-center","justify-content-between"],[1,"wai_left"],[1,"icon-icon-43",2,"color","#013a75","margin-right","16px"],[1,"wai_inner"],[1,"icon-icon-41",2,"color","#5087e6","margin-right","18px"],[1,"sales_list"],[1,"summary_item","d-flex","align-items-center","justify-content-between"],[1,"summary_left"],[1,"icon-icon-18",2,"color","#699af2"],[1,"icon-icon-34",2,"color","#2a6bb3"],[1,"icon-icon-35",2,"color","#34d594"],["alt","ranking",3,"src"]],template:function(t,n){1&t&&(c.Rb(0,"div",0),c.Rb(1,"div",1),c.Rb(2,"div"),c.Nb(3,"i",2),c.Rb(4,"span",3),c.Ec(5,"header.home"),c.Qb(),c.Qb(),c.Nb(6,"i",4),c.Qb(),c.Rb(7,"div",5),c.Rb(8,"div"),c.Nb(9,"i",6),c.Rb(10,"span",3),c.Ec(11,"header.project-new"),c.Qb(),c.Qb(),c.Nb(12,"i",4),c.Qb(),c.Rb(13,"div",7),c.bc("click",function(){return n.onLoginModal()}),c.Rb(14,"div"),c.Nb(15,"i",8),c.Rb(16,"span",3),c.Ec(17,"header.staking-new"),c.Qb(),c.Qb(),c.Nb(18,"i",4),c.Qb(),c.Rb(19,"div",9),c.Rb(20,"div"),c.Nb(21,"i",10),c.Rb(22,"span",3),c.Ec(23,"header.about-abs"),c.Qb(),c.Qb(),c.Nb(24,"i",4),c.Qb(),c.Rb(25,"div",11),c.Rb(26,"div",12),c.bc("click",function(){return n.onLoginModal()}),c.Rb(27,"div"),c.Nb(28,"i",13),c.Rb(29,"span",3),c.Ec(30,"header.personal"),c.Qb(),c.Qb(),c.Nb(31,"i",4),c.Qb(),c.Qb(),c.Rb(32,"div",14),c.Rb(33,"div",15),c.bc("click",function(){return n.onLoginModal()}),c.Rb(34,"div"),c.Nb(35,"i",16),c.Rb(36,"span",3),c.Ec(37,"header.my-team"),c.Qb(),c.Qb(),c.Nb(38,"i",4),c.Qb(),c.Rb(39,"div",17),c.bc("click",function(){return n.onLoginModal()}),c.Rb(40,"div"),c.Nb(41,"i",18),c.Rb(42,"span",3),c.Ec(43,"header.kyc"),c.Qb(),c.Qb(),c.Nb(44,"i",4),c.Qb(),c.Rb(45,"div",19),c.bc("click",function(){return n.onLoginModal()}),c.Rb(46,"div"),c.Nb(47,"i",20),c.Rb(48,"span",3),c.Ec(49,"header.feedback-center"),c.Qb(),c.Qb(),c.Nb(50,"i",4),c.Qb(),c.Rb(51,"div",21),c.bc("click",function(){return n.onLoginModal()}),c.Rb(52,"div"),c.Nb(53,"i",22),c.Rb(54,"span",3),c.Ec(55,"header.invitation"),c.Qb(),c.Qb(),c.Nb(56,"i",4),c.Qb(),c.Rb(57,"div",23),c.bc("click",function(){return n.onLoginModal()}),c.Rb(58,"div"),c.Nb(59,"i",24),c.Rb(60,"span",3),c.Ec(61,"header.settings"),c.Qb(),c.Qb(),c.Nb(62,"i",4),c.Qb(),c.Qb(),c.Qb(),c.Cc(63,L,90,58,"div",25),c.Rb(64,"app-pop-out",26),c.bc("confirm",function(){return n.loginModal=void 0})("close",function(){return n.loginModal=void 0}),c.Qb()),2&t&&(c.zb(13),c.kc("ngClass",n.logged_in?"":"disable_nav"),c.zb(13),c.kc("ngClass",n.logged_in?"":"disable_nav"),c.zb(7),c.kc("ngClass",n.logged_in?"":"disable_nav"),c.zb(6),c.kc("ngClass",n.logged_in?"":"disable_nav"),c.zb(6),c.kc("ngClass",n.logged_in?"":"disable_nav"),c.zb(6),c.kc("ngClass",n.logged_in?"":"disable_nav"),c.zb(6),c.kc("ngClass",n.logged_in?"":"disable_nav"),c.zb(6),c.kc("ngIf",n.logged_in),c.zb(1),c.kc("modal",n.loginModal))},directives:[o.e,o.d,g.a,i.k,i.m,d.a,o.f],pipes:[g.d,i.e],styles:[".btm-navigation[_ngcontent-%COMP%]{height:100%;align-items:center;position:fixed;bottom:0;width:230px;z-index:10;background:#f8f8f8;padding:94px 20px 50px;overflow-y:auto}.btm-navigation[_ngcontent-%COMP%]::-webkit-scrollbar{width:2px;height:100px}.btm-navigation[_ngcontent-%COMP%]::-webkit-scrollbar-thumb{background-color:#00178a}.nav-section[_ngcontent-%COMP%]{display:flex;justify-content:space-between;align-items:center;cursor:pointer;outline:none;-webkit-user-select:none;user-select:none;border:none;border-bottom:1px solid #e7e7e7;padding:16px 0}.nav-section[_ngcontent-%COMP%]:first-of-type{border-top:1px solid #e7e7e7}.nav-section[_ngcontent-%COMP%] > div[_ngcontent-%COMP%]{display:flex;align-items:center}.nav-section[_ngcontent-%COMP%] > div[_ngcontent-%COMP%] > i[_ngcontent-%COMP%]{margin-bottom:0}.nav-section[_ngcontent-%COMP%] > div[_ngcontent-%COMP%] > span[_ngcontent-%COMP%]{font-size:14px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;color:#013a75}.disable_nav[_ngcontent-%COMP%]{margin:0 -20px;padding:16px 20px;background-color:#e7e7e7;opacity:.5}.icon-icon-07[_ngcontent-%COMP%]{font-size:9px;display:block;visibility:visible}.icon[_ngcontent-%COMP%]{margin-right:18px;color:#00178a;font-size:16px;line-height:normal}.nav-selected[_ngcontent-%COMP%]{background:none}@media screen and (max-width:992px){.btm-navigation[_ngcontent-%COMP%]{display:flex;justify-content:space-around;height:76px;align-items:center;position:fixed;bottom:0;width:100%;background:#00178a;padding:0 10px}.nav-section[_ngcontent-%COMP%]{text-align:center;padding:0;border:none!important}.nav-section[_ngcontent-%COMP%] > div[_ngcontent-%COMP%]{display:grid}.nav-section[_ngcontent-%COMP%] > div[_ngcontent-%COMP%] > i[_ngcontent-%COMP%]{margin:0 0 10px;font-size:16px;color:#5363af}.nav-section[_ngcontent-%COMP%] > div[_ngcontent-%COMP%] > span[_ngcontent-%COMP%]{font-size:11px;font-weight:400;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;text-align:center;color:#7584cb}.disable_nav[_ngcontent-%COMP%]{margin:0;padding:0;background-color:unset;opacity:.3}.icon-icon-07[_ngcontent-%COMP%]{display:none;visibility:hidden}.icon[_ngcontent-%COMP%]{margin:0}.nav-selected[_ngcontent-%COMP%]{background:none}.nav-selected[_ngcontent-%COMP%]   div[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{color:#fff}.nav-selected[_ngcontent-%COMP%]   div[_ngcontent-%COMP%]   span[_ngcontent-%COMP%]{font-weight:700;color:#fff}.footer[_ngcontent-%COMP%]{display:none}}@media screen and (min-width:992px){.web-left-navigation[_ngcontent-%COMP%]{padding:94px 20px 50px}.not_logged_in[_ngcontent-%COMP%], .web-left-navigation[_ngcontent-%COMP%]{position:fixed;height:100%;bottom:0;right:0;overflow-y:auto;z-index:10;width:250px;background:#fff;box-shadow:0 5px 10px 0 rgba(0,0,0,.1)}.not_logged_in[_ngcontent-%COMP%]   div[_ngcontent-%COMP%]{background:rgba(0,0,0,.1);height:100%;width:100%;display:flex;align-items:center;justify-content:center}.not_logged_in[_ngcontent-%COMP%]   span[_ngcontent-%COMP%]{font-size:16px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;color:#013a75;opacity:.5;padding:0 10%;text-align:center}.web-left-navigation[_ngcontent-%COMP%]::-webkit-scrollbar{width:2px;height:100px}.web-left-navigation[_ngcontent-%COMP%]::-webkit-scrollbar-thumb{background-color:#00178a}.nav_profile_details[_ngcontent-%COMP%]   .circle_img[_ngcontent-%COMP%]{margin:0 auto 16px;width:60px;height:60px;border-radius:100%;box-shadow:0 5px 10px 0 rgba(0,0,0,.1);border:4px solid #fff;background-color:#d8d8d8}.nav_profile_details[_ngcontent-%COMP%]   .circle_img[_ngcontent-%COMP%]   img[_ngcontent-%COMP%]{margin:auto;width:100%;border-radius:100%;object-fit:cover;object-position:center}.nav_profile_details[_ngcontent-%COMP%]   .username[_ngcontent-%COMP%]{font-size:16px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;text-align:center;color:#00178a;margin-bottom:8px}.nav_profile_details[_ngcontent-%COMP%]   .username[_ngcontent-%COMP%]   img[_ngcontent-%COMP%]{width:16px;height:16px;margin:0 0 0 10px}.nav_profile_details[_ngcontent-%COMP%]   .current_ranking[_ngcontent-%COMP%]{font-size:12px;font-weight:400;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;text-align:center;color:#585858;margin-bottom:18px}.nav_profile_details[_ngcontent-%COMP%]   .wallet_list[_ngcontent-%COMP%]{border-top:1px solid #e7e7e7}.nav_profile_details[_ngcontent-%COMP%]   .wallet_list[_ngcontent-%COMP%]   .wallet_item[_ngcontent-%COMP%]{padding:15px 0;border-bottom:1px solid #e7e7e7}.nav_profile_details[_ngcontent-%COMP%]   .wallet_list[_ngcontent-%COMP%]   .wallet_item[_ngcontent-%COMP%]:last-of-type{border-bottom:none}.nav_profile_details[_ngcontent-%COMP%]   .wallet_list[_ngcontent-%COMP%]   .wallet_item[_ngcontent-%COMP%]   span[_ngcontent-%COMP%]{font-size:12px;font-weight:400;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;text-align:center;color:#013a75}.nav_profile_details[_ngcontent-%COMP%]   .wallet_list[_ngcontent-%COMP%]   .wallet_item[_ngcontent-%COMP%]   div[_ngcontent-%COMP%]{font-size:13px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;text-align:right;color:#00178a}.nav_profile_details[_ngcontent-%COMP%]   .wallet_list[_ngcontent-%COMP%]   .wallet_item[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:9px;color:grey;margin-left:10px;line-height:normal}.nav_profile_details[_ngcontent-%COMP%]   .wallet_statement[_ngcontent-%COMP%]{padding:11px;border-radius:0 0 3px 3px;background-color:#00178a;font-size:13px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;text-align:center;color:#e7e7e7;margin:30px 0;cursor:pointer}.wallet_action[_ngcontent-%COMP%]{margin:0}.wallet_action[_ngcontent-%COMP%]   .divider[_ngcontent-%COMP%]{height:6px;margin:0 -20px;background-color:#f8f8f8}.wallet_action[_ngcontent-%COMP%]   .wallet_action_item[_ngcontent-%COMP%]{padding:20px;margin:0 -20px;border-bottom:1px solid #e7e7e7}.wallet_action[_ngcontent-%COMP%]   a[_ngcontent-%COMP%]:last-of-type   .wallet_action_item[_ngcontent-%COMP%]{border-bottom:none}.wallet_action[_ngcontent-%COMP%]   .wallet_action_item[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:9px;color:grey;line-height:normal}.wallet_action[_ngcontent-%COMP%]   .wai_left[_ngcontent-%COMP%]{display:flex;align-items:center;max-width:90%}.wallet_action[_ngcontent-%COMP%]   .wai_left[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:16px;color:#013a75;line-height:normal;margin-right:10px}.wallet_action[_ngcontent-%COMP%]   .wai_inner[_ngcontent-%COMP%]   div[_ngcontent-%COMP%]{font-size:12px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;color:#013a75}.wallet_action[_ngcontent-%COMP%]   .wai_inner[_ngcontent-%COMP%]   span[_ngcontent-%COMP%]{font-size:11px;font-weight:400;font-stretch:normal;font-style:normal;line-height:1.18;letter-spacing:normal;color:grey;display:block;padding-top:2px}.sales_list[_ngcontent-%COMP%]   .summary_item[_ngcontent-%COMP%]{padding:18px 0;border-bottom:1px solid #e7e7e7}.sales_list[_ngcontent-%COMP%]   .summary_item[_ngcontent-%COMP%]   div[_ngcontent-%COMP%]{font-size:13px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;text-align:right;color:#00178a}.sales_list[_ngcontent-%COMP%]   .summary_item[_ngcontent-%COMP%]   .summary_left[_ngcontent-%COMP%]{display:flex;align-items:center}.sales_list[_ngcontent-%COMP%]   .summary_item[_ngcontent-%COMP%]   .summary_left[_ngcontent-%COMP%]   span[_ngcontent-%COMP%]{font-size:12px;font-weight:400;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;color:#013a75;text-align:left;max-width:79px}.sales_list[_ngcontent-%COMP%]   .summary_item[_ngcontent-%COMP%]   .summary_left[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{width:28px;font-size:16px;color:#34d594;text-align:left}}"]}),t})();var E=e("AytR");function N(t,n){if(1&t&&c.Nb(0,"img",13),2&t){const t=c.ec(2);c.lc("src",t.s3+t.modal.image,c.zc)}}function S(t,n){if(1&t){const t=c.Sb();c.Rb(0,"div",1),c.Rb(1,"div",2),c.Rb(2,"div",3),c.Rb(3,"span",4),c.Ec(4),c.Qb(),c.Rb(5,"i",5),c.bc("click",function(){return c.wc(t),c.ec().onModalClose()}),c.Qb(),c.Qb(),c.Rb(6,"div",6),c.Rb(7,"div",7),c.Cc(8,N,1,1,"img",8),c.Rb(9,"div",9),c.Ec(10),c.Qb(),c.Nb(11,"div",10),c.Qb(),c.Qb(),c.Rb(12,"div",11),c.Rb(13,"button",12),c.bc("click",function(){return c.wc(t),c.ec().onModalClose()}),c.Ec(14," button.view-more "),c.Qb(),c.Qb(),c.Qb(),c.Qb()}if(2&t){const t=c.ec();c.zb(4),c.Gc(" ",t.modal.title," "),c.zb(4),c.kc("ngIf",""!=t.modal.image),c.zb(2),c.Gc(" ",t.modal.ann_title," "),c.zb(1),c.kc("innerHTML",t.modal.ann_content,c.xc),c.zb(2),c.mc("routerLink","/profile/notifications/",t.modal.id,"")}}let G=(()=>{class t{constructor(t){this.translate=t,this.result=new c.n,this.close=new c.n,this.s3=E.a.s3Url,this.selectLang=""}ngOnInit(){this.selectLang=Object(a.d)("language")}onResult(t){this.result.emit(t),this.close.emit()}onModalClose(){this.close.emit()}}return t.\u0275fac=function(n){return new(n||t)(c.Mb(g.e))},t.\u0275cmp=c.Gb({type:t,selectors:[["app-announcement-modal"]],inputs:{modal:"modal"},outputs:{result:"result",close:"close"},decls:1,vars:1,consts:[["class","modal",4,"ngIf"],[1,"modal"],[1,"modal-container"],[1,"modal-header"],["translate",""],[1,"icon-icon-04",3,"click"],[1,"modal-body"],[1,"ann_modal_wrap"],["class","announcement_img","alt","Announcement",3,"src",4,"ngIf"],["translate","",1,"desc_title"],[1,"desc_text",3,"innerHTML"],[1,"modal-footer"],["translate","",1,"btn-main",3,"routerLink","click"],["alt","Announcement",1,"announcement_img",3,"src"]],template:function(t,n){1&t&&c.Cc(0,S,15,5,"div",0),2&t&&c.kc("ngIf",n.modal)},directives:[i.m,g.a,o.d],styles:[".modal-body[_ngcontent-%COMP%]{text-align:center;padding:0 20px 24px!important;max-height:50vh;overflow:auto}.ann_modal_wrap[_ngcontent-%COMP%]   img.announcement_img[_ngcontent-%COMP%]{width:100%;margin:0 auto 20px;object-fit:cover;object-position:center;border-radius:5px}.desc_title[_ngcontent-%COMP%]{font-size:16px;font-weight:700;line-height:normal;color:#024f23;margin-bottom:12px}.desc_text[_ngcontent-%COMP%], .desc_title[_ngcontent-%COMP%]{font-stretch:normal;font-style:normal;letter-spacing:normal;text-align:left}.desc_text[_ngcontent-%COMP%]{font-size:13px;font-weight:400;line-height:1.23;color:#444;display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden;text-overflow:ellipsis;height:5em}.modal[_ngcontent-%COMP%]{background:rgba(0,0,0,.6509803921568628);display:flex}.modal-header[_ngcontent-%COMP%]{border-bottom:0;display:flex;align-items:center;justify-content:space-between}.modal-header[_ngcontent-%COMP%]   span[_ngcontent-%COMP%]{font-size:16px;font-weight:700;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;color:#000}.modal-header[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:14px;cursor:pointer;color:#afafaf;line-height:normal}.modal-header[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]:hover{color:#00178a}.modal-container[_ngcontent-%COMP%]{margin:auto;width:40%;border-radius:3px;box-shadow:0 2px 10px 0 rgba(0,0,0,.3);background-color:#f8f8f8}.modal-body[_ngcontent-%COMP%]   .icon-icon-11[_ngcontent-%COMP%]{font-size:30px;color:#3df239}.modal-body[_ngcontent-%COMP%]   .icon-icon-12[_ngcontent-%COMP%]{font-size:30px;color:#ff3030}.modal-body[_ngcontent-%COMP%]   .body-title[_ngcontent-%COMP%]{font-size:24px;font-weight:700;line-height:normal;color:#000;margin:15px 0 10px}.modal-body[_ngcontent-%COMP%]   .body-desc[_ngcontent-%COMP%], .modal-body[_ngcontent-%COMP%]   .body-title[_ngcontent-%COMP%]{font-stretch:normal;font-style:normal;letter-spacing:normal}.modal-body[_ngcontent-%COMP%]   .body-desc[_ngcontent-%COMP%]{font-size:14px;font-weight:400;line-height:1.29;color:#585858}.modal-footer[_ngcontent-%COMP%]{border-top:0;justify-content:center;padding-top:10px;padding-bottom:32px}@media screen and (max-width:992px){.modal-container[_ngcontent-%COMP%]{width:85%}.modal-body[_ngcontent-%COMP%]   .body-desc[_ngcontent-%COMP%]{padding:0}.kyc_wrap[_ngcontent-%COMP%]   img[_ngcontent-%COMP%]{width:150px;margin:32px auto 22px;object-fit:cover;object-position:center;border-radius:3px}}"]}),t})();const A=function(t,n){return{"full-panel":t,"web-hide_right":n}},T=function(t){return{"hide-nav":t}},F=[{path:"",component:(()=>{class t{constructor(t,n,e,i,o){this.mService=t,this.service=n,this.cdRef=e,this.jwt=i,this.router=o,this.logged_in=!1,this.showed="false",this.state={title:"",path:""}}ngOnInit(){this.service.getState().subscribe(t=>{this.state=t}),this.router.events.subscribe(t=>{t instanceof o.b&&this.mService.getVersion().subscribe(t=>{(null==localStorage.getItem(Object(a.c)("Version"))||localStorage.getItem(Object(a.c)("Version"))!=t.value)&&(localStorage.setItem(Object(a.c)("Version"),t.value),location.reload())})}),null==this.jwt.accessToken||this.jwt.tokenExpired(this.jwt.accessToken)?this.logged_in=!1:null==this.jwt.accessToken||this.jwt.tokenExpired(this.jwt.accessToken)||(this.logged_in=!0),null==localStorage.getItem(Object(a.c)("displayed_ann"))&&localStorage.setItem(Object(a.c)("displayed_ann"),"false"),this.showed=localStorage.getItem(Object(a.c)("displayed_ann")),this.logged_in&&"false"==this.showed&&(this.onAnnouncementModal(),localStorage.setItem(Object(a.c)("displayed_ann"),"true"))}ngAfterViewChecked(){this.cdRef.detectChanges()}onAnnouncementModal(){var t="en"==Object(a.d)("language")?"1":"2";this.mService.getLatestAnn(t).subscribe(t=>{var n,e;if(t.id){var i="";""!=t.image&&(i=t.image,t.image.split("|").length>1&&(i=t.image.split("|")[0])),this.announcementModal={title:"header.notification",id:t.id,image:i,ann_title:null===(n=t.languages[0])||void 0===n?void 0:n.title,ann_content:null===(e=t.languages[0])||void 0===e?void 0:e.message}}})}}return t.\u0275fac=function(n){return new(n||t)(c.Mb(l.a),c.Mb(r.a),c.Mb(c.h),c.Mb(s.a),c.Mb(o.c))},t.\u0275cmp=c.Gb({type:t,selectors:[["app-panel"]],decls:5,vars:8,consts:[[1,"panel",3,"ngClass"],[3,"ngClass"],[3,"modal","close","result"]],template:function(t,n){1&t&&(c.Nb(0,"app-header"),c.Rb(1,"div",0),c.Nb(2,"router-outlet"),c.Qb(),c.Nb(3,"app-nav",1),c.Rb(4,"app-announcement-modal",2),c.bc("close",function(){return n.announcementModal=void 0})("result",function(){return n.announcementModal=void 0}),c.Qb()),2&t&&(c.zb(1),c.kc("ngClass",c.qc(3,A,n.state.path,!n.logged_in)),c.zb(2),c.kc("ngClass",c.pc(6,T,n.state.path)),c.zb(1),c.kc("modal",n.announcementModal))},directives:[P,i.k,o.h,I,G],styles:[".panel[_ngcontent-%COMP%]{height:100%;padding-bottom:0;padding-top:70px;margin-left:230px;margin-right:250px}.web-hide_right[_ngcontent-%COMP%]{margin-right:0}@media screen and (max-width:992px){.panel[_ngcontent-%COMP%]{height:100%;padding-top:0;margin:0}.hide-nav[_ngcontent-%COMP%]{display:none;visibility:hidden}.full-panel[_ngcontent-%COMP%]{padding-bottom:0!important;padding-top:70px}}"]}),t})(),children:[{path:"home",loadChildren:()=>Promise.all([e.e(1),e.e(9)]).then(e.bind(null,"XgfC")).then(t=>t.HomeModule)},{path:"project",loadChildren:()=>Promise.all([e.e(1),e.e(0),e.e(7)]).then(e.bind(null,"WtEw")).then(t=>t.ProjectModule)},{path:"staking",loadChildren:()=>Promise.all([e.e(1),e.e(0),e.e(17)]).then(e.bind(null,"wsSH")).then(t=>t.StakingModule)},{path:"abs",loadChildren:()=>Promise.all([e.e(1),e.e(12)]).then(e.bind(null,"XcDO")).then(t=>t.AbsModule)},{path:"profile",loadChildren:()=>Promise.all([e.e(0),e.e(6)]).then(e.bind(null,"XDa0")).then(t=>t.ProfileModule)},{path:"",redirectTo:"home",pathMatch:"full"}]}];let W=(()=>{class t{}return t.\u0275fac=function(n){return new(n||t)},t.\u0275mod=c.Kb({type:t}),t.\u0275inj=c.Jb({imports:[[o.g.forChild(F)],o.g]}),t})();var X=e("7PmN");let D=(()=>{class t{}return t.\u0275fac=function(n){return new(n||t)},t.\u0275mod=c.Kb({type:t}),t.\u0275inj=c.Jb({imports:[[i.b,W,g.c,X.a]]}),t})()}}]);