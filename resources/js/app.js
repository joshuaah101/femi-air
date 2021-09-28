require('./bootstrap');

//mobile menu config
const btn = document.querySelector('.mobile-menu-button')
const menu = document.querySelector('.mobile-menu')

btn.addEventListener('click', function(){
    menu.classList.toggle('hidden')
})

// $(function(){
//     $(".mobile-menu-button").on('click', function(){
//         $('.mobile-menu').toggle('slow')
//     })
// })

const one_way = document.querySelector('.radio-one')
const return_trip = document.querySelector('.radio-return')
const return_field = document.querySelector('#hide-rDate')

return_trip.addEventListener('click', function(){
    return_field.classList.remove('hidden')
})

one_way.addEventListener('click', function(){
    return_field.classList.add('hidden')
})

