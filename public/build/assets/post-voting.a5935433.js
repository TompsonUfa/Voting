import{v as u,c as d}from"./validation.bb0d0616.js";const l=document.querySelector(".block-wrapper"),p=l.querySelectorAll("input[type='radio']"),m=l.querySelector(".btn-post-voting");m.addEventListener("click",function(){if(u(p)){let r=[];const a=document.querySelectorAll(".question");for(let e=0;e<a.length;e++){const o=a[e],n=o.dataset.questionId,s=o.querySelector("input[type='radio']:checked").dataset.vote,i={questionId:n,questionVote:s};r.push(i)}let t=document.createElement("p"),c=new bootstrap.Modal("#exampleModal");$.ajax({url:"",headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},method:"POST",typeData:"json",data:{userVoices:r},error:function(e){let o=e.responseJSON.errors,n=1;t.style.color="red";for(let s of Object.values(o))t.innerHTML+=n+") "+s+"<br>",n++},success:function(e){t.innerHTML=e.success}}),$("#exampleModal .modal-body").html(t),c.show()}});d();