require('./bootstrap');

// mobile menu config
// const btn = document.querySelector('.mobile-menu-button')
// const menu = document.querySelector('.mobile-menu')

// btn.addEventListener('click', function(){
//     menu.classList.toggle('hidden')
// })

$(function(){
    $(".mobile-menu-button").on('click', function(e){
        e.preventDefault()
        $('.mobile-menu').toggle('slow')
    })
})