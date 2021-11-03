require('./bootstrap');

//mobile menu config
const btn = document.querySelector('.mobile-menu-button')
const menu = document.querySelector('.mobile-menu')

btn.addEventListener('click', function(){
    menu.classList.toggle('hidden')
})

//trip option details
const tripOption = document.querySelector('#trip-option')
const return_field = document.querySelector('#hide-rDate')
const reservationForm = document.querySelector('#reservationForm')
const informationField = document.querySelector('#informationField')

//handling the bus selection and checklist field
const busSelect = document.querySelector('#selectBusBox')
const checkoutPane = document.querySelector('#checkoutPane')

//on document load, do the following
window.onload = (() => {
    //hide the return date field on the ticket page
    if(window.location.pathname == '/ticket'){
        //hideInformationField()
        showInformationField()
    }
    
    //hide the return field from the welcome page
    if(window.location.pathname == '/'){
        hideReturnField()
    }

    //hide the checkout panel on the checkout page
    if(window.location.pathname == '/checkout'){
        hideCheckoutPane()
    }
})

//show ticket page information field

const showInformationField = () => {
    reservationForm.addEventListener('submit', (e) => {
        e.preventDefault()
        setTimeout(function(){
            informationField.classList.remove('hidden')
        }, 3000)
        setTimeout(function(){
            hideReservationForm()
        }, 3000)
    })
}

function hideCheckoutPane(){
    checkoutPane.classList.add('hidden')
}

function hideReturnField(){
    return_field.classList.add('hidden')
}

const hideInformationField = () => {
    informationField.classList.add('hidden')
}

tripOption.addEventListener('change', () => {
    return_field.classList.toggle('hidden')
})

const hideReservationForm = () => {
    reservationForm.classList.add('hidden')
}


// busSelect.addEventListener('click', function(){
//     checkoutPane.classList.toggle('hidden')
//     console.log('clicked')
// })



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

    // console.log("Today's date is "+ maxDate)
    $('#departureDate').attr('min', maxDate)
    $('#returningDate').attr('min', maxDate)

})