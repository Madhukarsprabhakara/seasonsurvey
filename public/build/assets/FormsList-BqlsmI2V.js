import{o as l,d as c,b as t,a as e,F as g,g as f,w as a,t as o,f as d,u as r,G as u,n as p}from"./app-CdfzWFsh.js";import{_ as m}from"./NavLink-C0SOgI5P.js";import h from"./FormsListHeader-BgYZu_zG.js";import{S as x,r as y,M as b,b as _,g as w}from"./EllipsisVerticalIcon-CGpe5f0t.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./use-text-value-B8jWN5Pr.js";const v={role:"list",class:"divide-y divide-gray-100"},k={class:"min-w-0"},B={class:"flex items-start gap-x-3"},F={class:"text-sm font-semibold leading-6 text-gray-900"},j={key:0,class:"[statuses[project.status], 'mt-0.5 whitespace-nowrap rounded-md px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset']"},C={key:1,class:"[statuses[project.status], 'mt-0.5 whitespace-nowrap rounded-md px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset']"},L={class:"mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500"},M={class:"whitespace-nowrap text-xs font-extralight"},N=e("svg",{viewBox:"0 0 2 2",class:"h-0.5 w-0.5 fill-current"},[e("circle",{cx:"1",cy:"1",r:"1"})],-1),O={class:"truncate"},S={class:"flex flex-none items-center gap-x-4"},V=["href"],z={class:"sr-only"},D=e("span",{class:"sr-only"},"Open options",-1),E={class:"sr-only"},T={class:"sr-only"},$={class:"sr-only"},Q={__name:"FormsList",setup(G){return(i,H)=>(l(),c(g,null,[t(h),e("ul",v,[(l(!0),c(g,null,f(i.$page.props.surveys,s=>(l(),c("li",{key:s.id,class:"flex items-center justify-between gap-x-6 py-5"},[e("div",k,[e("div",B,[t(m,{href:i.route("forms.fields",{survey:s.id}),active:i.route().current("forms.fields",{survey:s.id})},{default:a(()=>[e("p",F,o(s.title),1)]),_:2},1032,["href","active"]),s.is_open?(l(),c("p",j,"Open")):(l(),c("p",C,"Closed"))]),e("div",L,[t(m,{href:i.route("surveytable.show",{global_id:s.global_id}),active:i.route().current("surveytable.show",{global_id:s.global_id})},{default:a(()=>[e("span",M,o(s.survey_data_count)+" responses ",1)]),_:2},1032,["href","active"]),N,e("p",O,o(s.rules_count)+" active rules",1)])]),e("div",S,[e("a",{href:i.route("surveys.show",{global_id:s.global_id}),target:"_blank",class:"hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block"},[d("Open link"),e("span",z,", "+o(s.is_open),1)],8,V),t(r(w),{as:"div",class:"relative flex-none"},{default:a(()=>[t(r(x),{class:"-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900"},{default:a(()=>[D,t(r(y),{class:"h-5 w-5","aria-hidden":"true"})]),_:1}),t(u,{"enter-active-class":"transition ease-out duration-100","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:a(()=>[t(r(b),{class:"absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"},{default:a(()=>[t(r(_),null,{default:a(({active:n})=>[e("a",{href:"#",class:p([n?"bg-gray-50":"","block px-3 py-1 text-sm leading-6 text-gray-900"])},[d("Edit"),e("span",E,", "+o(s.is_open),1)],2)]),_:2},1024),t(r(_),null,{default:a(({active:n})=>[e("a",{href:"#",class:p([n?"bg-gray-50":"","block px-3 py-1 text-sm leading-6 text-gray-900"])},[d("Move"),e("span",T,", "+o(s.is_open),1)],2)]),_:2},1024),t(r(_),null,{default:a(({active:n})=>[e("a",{href:"#",class:p([n?"bg-gray-50":"","block px-3 py-1 text-sm leading-6 text-gray-900"])},[d("Delete"),e("span",$,", "+o(s.is_open),1)],2)]),_:2},1024)]),_:2},1024)]),_:2},1024)]),_:2},1024)])]))),128))])],64))}};export{Q as default};
