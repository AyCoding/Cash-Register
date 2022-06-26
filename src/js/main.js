let buttonMinus = document.querySelectorAll('.minus');
let buttonPlus = document.querySelectorAll('.plus');
let compteur = document.querySelectorAll('.number');
let tdCount = document.querySelectorAll('.td-count');
let count = 0;


for (let i = 0; i < buttonMinus.length; i++) {
    buttonMinus[i].addEventListener('click', () => {
        // console.log('ButtonMinus')
        count--
        compteur[i].innerHTML = count;
    })

    buttonPlus[i].addEventListener('click', () => {
        // console.log('ButtonPlus')
        count++
        compteur[i].innerHTML = count;
    })
}

let tableTr = document.querySelectorAll('.tr');
let tableTd = document.querySelectorAll('td');

for (let p = 0; p < tableTr.length; p++){
    // console.log(tableTr[p])
    // console.log("TR")
}

for (let n = 0; n < tableTd.length; n++){
    console.log(tableTd[n])
}