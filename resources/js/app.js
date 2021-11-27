require('./bootstrap')
import Chart from 'chart.js/auto'

//mobile menu config
const btn = document.querySelector('.mobile-menu-button')
const menu = document.querySelector('.mobile-menu')

btn.addEventListener('click', function () {
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

// This code helps in checking if the url search contains the currently provided link name
var getPara = (linkName) => {
    var result = null, tmp = [];
    var items = location.search.substr(1).split("&");
    for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[1] === linkName) result = decodeURIComponent(tmp[1]);
    }
    return result;
}

window.onload = (() => {
    //hide the return date field on the ticket page
    if (getPara('ticket')) {
        //hideInformationField()
        showInformationField()
    }

    //hide the return field from the welcome page
    if (window.location.pathname == '/') {
        hideReturnField()
    }

    //hide the checkout panel on the checkout page
    if (getPara('checkout')) {
        hideCheckoutPane()
    }

    if (getPara('admin')) {
        const ctx = document.getElementById('passengerInfo').getContext('2d')
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Adult', 'Child', 'Infant'],
                datasets: [{
                    label: 'Passenger chart',
                    data: [55, 30, 15],
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 0.2)',
                        // 'rgba(54, 162, 235, 0.2)',
                        'orange',
                        'pink',
                        'green'
                    ],
                    borderColor: [
                        // 'rgba(255, 99, 132, 1)',
                        // 'rgba(54, 162, 235, 1)',
                        'orange',
                        'pink',
                        'green'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        })
    }
    if (getPara('dash') || getPara('user')) {
        if ($('#mostVisitedChart').length) {
            const ctx = document.getElementById('mostVisitedChart').getContext('2d')
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Lagos', 'Abuja', 'Kaduna'],
                    datasets: [{
                        label: 'Most visited',
                        data: [55, 30, 15],
                        backgroundColor: [
                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            'orange',
                            'pink',
                            'green'
                        ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            'orange',
                            'pink',
                            'green'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            })
            hideReturnField()
        }
    }
})

//show ticket page information field

const showInformationField = () => {
    if (reservationForm)
        reservationForm.addEventListener('submit', (e) => {
            e.preventDefault()
            setTimeout(function () {
                informationField.classList.remove('hidden')
            }, 3000)
            setTimeout(function () {
                hideReservationForm()
            }, 3000)
        })
}

function hideCheckoutPane() {
    checkoutPane.classList.add('hidden')
}

function hideReturnField() {
    if (return_field) return_field.classList.add('hidden')
}

const hideInformationField = () => {
    informationField.classList.add('hidden')
}

if (tripOption)
    tripOption.addEventListener('change', () => {
        return_field.classList.toggle('hidden')
    })

const hideReservationForm = () => {
    reservationForm.classList.add('hidden')
}

var stateFrom = document.querySelector('#stateFrom')
var stateTo = document.querySelector('#stateTo')
var reservationBtn = document.querySelector('#reservationBtn')

// busSelect.addEventListener('click', function(){
//     checkoutPane.classList.toggle('hidden')
//     console.log('clicked')
// })

if (stateTo)
    stateTo.addEventListener('change', (e) => {
        e.preventDefault()
        if (stateFrom.value == stateTo.value) {
            reservationBtn.classList.add('hidden')
            alert("Error! you can't possibly travel to the same state")
            stateFrom.focus()
            return false
        } else {
            reservationBtn.classList.remove('hidden')
        }
    })


//using jquery to control elapsed date
$(function () {
    var dtToday = new Date()
    var month = dtToday.getMonth() + 1
    var day = dtToday.getDate()
    var year = dtToday.getFullYear()

    if (month < 10)
        month = '0' + month.toString()
    if (day < 10)
        day = '0' + day.toString()

    var maxDate = year + '-' + month + '-' + day

    //or instead
    // var maxDate = dtToday.toISOString().substring(0, 10)

    // console.log("Today's date is "+ maxDate)
    $('#departureDate').attr('min', maxDate)
    $('#returningDate').attr('min', maxDate)

})
