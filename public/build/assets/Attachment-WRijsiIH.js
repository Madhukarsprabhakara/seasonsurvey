import{u}from"./surveyStore-Bx34tdNY.js";import{r as f,q as p,o as r,d as a,a as e,t as d,u as s,e as _}from"./app-CdfzWFsh.js";const g={class:"col-span-full"},h={for:"cover-photo",class:"block text-md font-bold leading-6 text-gray-900"},m={class:"mt-2 flex justify-center rounded-lg border border-dashed bg-gray-100 border-gray-900/25 px-6 py-10"},x={class:"text-center"},v=e("svg",{class:"mx-auto h-12 w-12 text-gray-300",viewBox:"0 0 24 24",fill:"currentColor","aria-hidden":"true"},[e("path",{"fill-rule":"evenodd",d:"M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z","clip-rule":"evenodd"})],-1),y={class:"mt-4 flex text-sm leading-6 text-gray-600"},b={for:"file-upload",class:"relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"},q=e("span",null,"Upload a file",-1),w=["name"],B=["value"],k=e("p",{class:"pl-1"},"(Only one file)",-1),A=e("p",{class:"text-xs leading-5 text-gray-600"},"PDF files up to 10MB",-1),F={__name:"Attachment",props:["qid"],setup(n){const o=n;f("");const t=u();return p(()=>t.fields[o.qid.id],i=>{t.addFormFields("file_upload_"+o.qid.id,`${i}`)},{deep:!0}),(i,l)=>(r(),a("div",g,[e("label",h,d(o.qid.question_details.title),1),e("div",m,[e("div",x,[v,e("div",y,[e("label",b,[q,e("input",{id:"file-upload",name:"file_upload_"+s(t).fields[o.qid.id],onInput:l[0]||(l[0]=c=>s(t).fields[o.qid.id]=c.target.files[0]),type:"file",class:"sr-only"},null,40,w),s(t).form.progress?(r(),a("progress",{key:0,value:s(t).form.progress.percentage,max:"100"},d(s(t).form.progress.percentage)+"% ",9,B)):_("",!0)]),k]),A])])]))}};export{F as default};
