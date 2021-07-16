// mobile menu config
const btn = document.querySelector('.mobile-menu-button')
const menu = document.querySelector('.mobile-menu')

btn.addEventListener('click', function(){
    menu.classList.toggle('hidden')
})

//configure trip type radio
const radioOne = document.querySelector(".radio-one")
const radioReturn = document.querySelector(".radio-return")
const hideRdate = document.querySelector("#hide-rDate")


window.onload = function(){
    hideRdate.classList.add('hidden')
}

radioOne.addEventListener('click', function(){
    hideRdate.classList.add('hidden')
})

radioReturn.addEventListener('click', function(){
    hideRdate.classList.remove('hidden')
})


$(function(){

})
