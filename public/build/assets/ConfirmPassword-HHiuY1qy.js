import{T as m,r as d,o as c,d as p,b as o,u as a,w as r,F as u,Z as f,a as e,n as _,f as w,h as b}from"./app-CdfzWFsh.js";import{A as g}from"./AuthenticationCard-CoOZYcsu.js";import{_ as h}from"./AuthenticationCardLogo-DpuRWbo3.js";import{_ as x}from"./InputError-BMiFFoZm.js";import{_ as v}from"./InputLabel-m9x6qG8T.js";import{_ as y}from"./PrimaryButton-CsBXS4-9.js";import{_ as V}from"./TextInput-CNI3ujjg.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const C=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),$={class:"flex justify-end mt-4"},q={__name:"ConfirmPassword",setup(k){const s=m({password:""}),t=d(null),n=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),t.value.focus()}})};return(A,i)=>(c(),p(u,null,[o(a(f),{title:"Secure Area"}),o(g,null,{logo:r(()=>[o(h)]),default:r(()=>[C,e("form",{onSubmit:b(n,["prevent"])},[e("div",null,[o(v,{for:"password",value:"Password"}),o(V,{id:"password",ref_key:"passwordInput",ref:t,modelValue:a(s).password,"onUpdate:modelValue":i[0]||(i[0]=l=>a(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),o(x,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),e("div",$,[o(y,{class:_(["ms-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:r(()=>[w(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{q as default};
