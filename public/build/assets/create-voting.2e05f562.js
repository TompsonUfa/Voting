import{v as m,c as h}from"./validation.24480dca.js";const y=document.querySelector(".btn-create-voting");y.addEventListener("click",function(){const a=document.querySelector(".create-voting"),o=a.querySelectorAll("input[type='text']");if(m(o)){let r=[];const u=document.querySelector("#name").value,s=document.querySelector("#type").value,n=document.querySelectorAll(".choice");for(let e=0;e<n.length;e++){const t={id:n[e].dataset.choiceNumber,challenger:n[e].querySelector("#challenger").value,desc:n[e].querySelector("#desc").value};r.push(t)}const d={name:u,type:s,choice:r};var c=document.createElement("p"),i=new bootstrap.Modal("#exampleModal");$.ajax({url:"",headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},method:"POST",typeData:"json",data:{voting:d},error:function(e){let t=e.responseJSON.errors,l=1;c.style.color="red";for(let v of Object.values(t))c.innerHTML+=l+") "+v+"<br>",l++},success:function(e){for(let t=0;t<o.length;t++)o[t].value="",o[t].classList.remove("is-valid");c.innerHTML=e.success}}),$("#exampleModal .modal-body").html(c),i.show()}});h();