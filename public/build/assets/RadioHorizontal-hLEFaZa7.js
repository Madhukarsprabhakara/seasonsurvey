import{q as m,o as a,d,a as s,t as n,F as p,g as u,b as f,k as g,bC as q,u as r}from"./app-CdfzWFsh.js";import{u as h}from"./surveyStore-Bx34tdNY.js";import{_ as y}from"./InputError-BMiFFoZm.js";const x={class:"mb-6"},b={class:"text-md font-bold text-gray-900"},v={class:"mt-2"},k=s("legend",{class:"sr-only"},"Notification method",-1),F={class:"space-y-4 ml-2 sm:flex sm:items-center sm:space-x-10 sm:space-y-0"},w={key:"option_id.id",class:"flex items-center"},B=["id","name","value"],N=["for"],D={__name:"RadioHorizontal",props:["qid"],setup(c){const e=c,i=h();return m(()=>i.fields["a_"+e.qid.id],o=>{i.addFormFields("a_"+e.qid.id,`${o}`)},{deep:!0}),(o,l)=>(a(),d("div",x,[s("label",b,n(e.qid.question_details.title),1),s("fieldset",v,[k,s("div",F,[(a(!0),d(p,null,u(e.qid.question_option_ids,t=>(a(),d("div",w,[g(s("input",{id:"s_"+t.id,name:t.id,"onUpdate:modelValue":l[0]||(l[0]=_=>r(i).fields["a_"+e.qid.id]=_),value:t.option_detail.question_option_id,key:"option_id.id",type:"radio",class:"h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600"},null,8,B),[[q,r(i).fields["a_"+e.qid.id]]]),s("label",{for:"s_"+t.id,class:"ml-3 block text-sm font-normal leading-6 text-gray-700"},n(t.option_detail.title),9,N)]))),128))]),f(y,{message:o.$page.props.errors["a_"+e.qid.id],class:"mt-2"},null,8,["message"])])]))}};export{D as default};
