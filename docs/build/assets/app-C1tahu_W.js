const r=document.querySelector(".header__language"),n=document.querySelector(".header__language-dropdown"),o=document.querySelector(".header__language-current"),t=document.querySelector(".header__burger-icon-close"),l=document.querySelector(".header__burger-icon-open"),u=document.querySelector(".header__burger-menu");let e=!1;r.addEventListener("mouseover",()=>{n.style.display="flex",o.classList.add("header__language-current--active")});r.addEventListener("mouseout",()=>{n.style.display="none",o.classList.remove("header__language-current--active")});window.toggleBurgerMenu=()=>{e=!e,t.style.display=e?"none":"block",l.style.display=e?"block":"none",u.style.display=e?"flex":"none",document.body.classList.toggle("modal-open")};