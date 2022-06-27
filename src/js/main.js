// VARIABLES SELECTIONS HTML
let buttonMinus = document.querySelectorAll('.minus');
let buttonPlus = document.querySelectorAll('.plus');
let compteur = document.querySelectorAll('.number');
let tdCount = document.querySelectorAll('.td-count');
let total = document.querySelector('#total');
let productPrice = document.querySelectorAll('.price');
let tableTr = document.querySelectorAll('.tr');

// VARIABLE COMPTEUR
let count = [];


for (let i = 0; i < buttonMinus.length; i++) {
    buttonMinus[i].addEventListener('click', () => {
        // console.log('ButtonMinus')
        count--
        compteur[i].innerHTML = count;
        let totalprice = productPrice[i].innerText * compteur[i].innerHTML
        total.innerHTML = totalprice + "€"
    })

    buttonPlus[i].addEventListener('click', () => {
        // console.log('ButtonPlus')
        count++
        compteur[i].innerHTML = count;
        let totalprice = productPrice[i].innerText * compteur[i].innerHTML
        total.innerHTML = totalprice + "€"
    })
}


// for (let l = 0; l < productPrice.length; l++) {
//     console.log(productPrice[l].innerText)
//
// }