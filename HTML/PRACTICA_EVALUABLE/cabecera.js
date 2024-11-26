window.addEventListener('scroll', function() { 
    var title = document.getElementsById('header'); 
    if (window.scrollY > 100) { title.classList.add('scroll-change'); 
        } else { title.classList.remove('scroll-change'); 
    } 
});
