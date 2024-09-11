import{T as b,r as h,o as i,d as r,b as t,w as e,a as l,e as v,f as n,u as a,F as $,g as x,t as k,n as A}from"./app-CdfzWFsh.js";import{_ as N}from"./ActionMessage-BRc-PHt6.js";import{_ as j}from"./Modal-Chs-oeUS.js";import{_ as P}from"./Checkbox-BW6HlPoJ.js";import{_ as U}from"./ConfirmationModal-BcBesiNi.js";import{_ as L}from"./DangerButton-BQIM1e7J.js";import{_ as T}from"./DialogModal-CcjnApvS.js";import{_ as M}from"./FormSection-DlqGzWDR.js";import{_ as z}from"./InputError-BMiFFoZm.js";import{_ as w}from"./InputLabel-m9x6qG8T.js";import{_ as S}from"./PrimaryButton-CsBXS4-9.js";import{_ as C}from"./SecondaryButton-DjZo2p8u.js";import{S as E}from"./SectionBorder-DviX-Wut.js";import{_ as Y}from"./TextInput-CNI3ujjg.js";import"./SectionTitle-CWjM_H-p.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const q={class:"col-span-6 sm:col-span-4"},G={key:0,class:"col-span-6"},H={class:"mt-2 grid grid-cols-1 md:grid-cols-2 gap-4"},J={class:"flex items-center"},K={class:"ms-2 text-sm text-gray-600"},O={key:0},Q={class:"mt-10 sm:mt-0"},R={class:"space-y-6"},W={class:"break-all"},X={class:"flex items-center ms-2"},Z={key:0,class:"text-sm text-gray-400"},ee=["onClick"],se=["onClick"],te=l("div",null," Please copy your new API token. For your security, it won't be shown again. ",-1),oe={key:0,class:"mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 break-all"},ne={class:"grid grid-cols-1 md:grid-cols-2 gap-4"},ae={class:"flex items-center"},le={class:"ms-2 text-sm text-gray-600"},Ae={__name:"ApiTokenManager",props:{tokens:Array,availablePermissions:Array,defaultPermissions:Array},setup(m){const c=b({name:"",permissions:m.defaultPermissions}),d=b({permissions:[]}),y=b({}),g=h(!1),p=h(null),f=h(null),I=()=>{c.post(route("api-tokens.store"),{preserveScroll:!0,onSuccess:()=>{g.value=!0,c.reset()}})},F=u=>{d.permissions=u.abilities,p.value=u},V=()=>{d.put(route("api-tokens.update",p.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>p.value=null})},D=u=>{f.value=u},B=()=>{y.delete(route("api-tokens.destroy",f.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>f.value=null})};return(u,o)=>(i(),r("div",null,[t(M,{onSubmitted:I},{title:e(()=>[n(" Create API Token ")]),description:e(()=>[n(" API tokens allow third-party services to authenticate with our application on your behalf. ")]),form:e(()=>[l("div",q,[t(w,{for:"name",value:"Name"}),t(Y,{id:"name",modelValue:a(c).name,"onUpdate:modelValue":o[0]||(o[0]=s=>a(c).name=s),type:"text",class:"mt-1 block w-full",autofocus:""},null,8,["modelValue"]),t(z,{message:a(c).errors.name,class:"mt-2"},null,8,["message"])]),m.availablePermissions.length>0?(i(),r("div",G,[t(w,{for:"permissions",value:"Permissions"}),l("div",H,[(i(!0),r($,null,x(m.availablePermissions,s=>(i(),r("div",{key:s},[l("label",J,[t(P,{checked:a(c).permissions,"onUpdate:checked":o[1]||(o[1]=_=>a(c).permissions=_),value:s},null,8,["checked","value"]),l("span",K,k(s),1)])]))),128))])])):v("",!0)]),actions:e(()=>[t(N,{on:a(c).recentlySuccessful,class:"me-3"},{default:e(()=>[n(" Created. ")]),_:1},8,["on"]),t(S,{class:A({"opacity-25":a(c).processing}),disabled:a(c).processing},{default:e(()=>[n(" Create ")]),_:1},8,["class","disabled"])]),_:1}),m.tokens.length>0?(i(),r("div",O,[t(E),l("div",Q,[t(j,null,{title:e(()=>[n(" Manage API Tokens ")]),description:e(()=>[n(" You may delete any of your existing tokens if they are no longer needed. ")]),content:e(()=>[l("div",R,[(i(!0),r($,null,x(m.tokens,s=>(i(),r("div",{key:s.id,class:"flex items-center justify-between"},[l("div",W,k(s.name),1),l("div",X,[s.last_used_ago?(i(),r("div",Z," Last used "+k(s.last_used_ago),1)):v("",!0),m.availablePermissions.length>0?(i(),r("button",{key:1,class:"cursor-pointer ms-6 text-sm text-gray-400 underline",onClick:_=>F(s)}," Permissions ",8,ee)):v("",!0),l("button",{class:"cursor-pointer ms-6 text-sm text-red-500",onClick:_=>D(s)}," Delete ",8,se)])]))),128))])]),_:1})])])):v("",!0),t(T,{show:g.value,onClose:o[3]||(o[3]=s=>g.value=!1)},{title:e(()=>[n(" API Token ")]),content:e(()=>[te,u.$page.props.jetstream.flash.token?(i(),r("div",oe,k(u.$page.props.jetstream.flash.token),1)):v("",!0)]),footer:e(()=>[t(C,{onClick:o[2]||(o[2]=s=>g.value=!1)},{default:e(()=>[n(" Close ")]),_:1})]),_:1},8,["show"]),t(T,{show:p.value!=null,onClose:o[6]||(o[6]=s=>p.value=null)},{title:e(()=>[n(" API Token Permissions ")]),content:e(()=>[l("div",ne,[(i(!0),r($,null,x(m.availablePermissions,s=>(i(),r("div",{key:s},[l("label",ae,[t(P,{checked:a(d).permissions,"onUpdate:checked":o[4]||(o[4]=_=>a(d).permissions=_),value:s},null,8,["checked","value"]),l("span",le,k(s),1)])]))),128))])]),footer:e(()=>[t(C,{onClick:o[5]||(o[5]=s=>p.value=null)},{default:e(()=>[n(" Cancel ")]),_:1}),t(S,{class:A(["ms-3",{"opacity-25":a(d).processing}]),disabled:a(d).processing,onClick:V},{default:e(()=>[n(" Save ")]),_:1},8,["class","disabled"])]),_:1},8,["show"]),t(U,{show:f.value!=null,onClose:o[8]||(o[8]=s=>f.value=null)},{title:e(()=>[n(" Delete API Token ")]),content:e(()=>[n(" Are you sure you would like to delete this API token? ")]),footer:e(()=>[t(C,{onClick:o[7]||(o[7]=s=>f.value=null)},{default:e(()=>[n(" Cancel ")]),_:1}),t(L,{class:A(["ms-3",{"opacity-25":a(y).processing}]),disabled:a(y).processing,onClick:B},{default:e(()=>[n(" Delete ")]),_:1},8,["class","disabled"])]),_:1},8,["show"])]))}};export{Ae as default};
