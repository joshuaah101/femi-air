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

window.onload = ()=>{
    return_field.classList.add('hidden')
}

return_trip.addEventListener('click', function(){
    return_field.classList.remove('hidden')
})

one_way.addEventListener('click', function(){
    return_field.classList.add('hidden')
})

//using jquery to control elapsed date
$(function(){
    var dtToday = new Date()

    var month = dtToday.getMonth() + 1
    var day = dtToday.getDate()
    var year = dtToday.getFullYear()

    if(month < 10)
        month = '0' + month.toString()
    if(day < 10)
        day = '0' + day.toString()

    var maxDate = year + '-' + month + '-' + day

    //or instead
    // var maxDate = dtToday.toISOString().substring(0, 10)

    // alert("Today's date is "+ maxDate)
    $('#departureDate').attr('min', maxDate)
    $('#returningDate').attr('min', maxDate)
})