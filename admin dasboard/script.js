const themeToggler = document.querySelector(".theme-toggler");

// theme 

themeToggler.addEventListener('click',()=>{

    document.body.classList.toggle('dark-theme-variables');
})