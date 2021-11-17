$(document).ready(function() {
    let filter = document.getElementById('kantineSelect');
    let snacks = document.getElementsByClassName('snack-card');
    let drinks = document.getElementsByClassName('drink-card');

    filter.onchange = function() {
        let x = document.getElementById("kantineSelect").value;
        console.log(snacks[1]);
        console.log(drinks[0]);

        if (x == "all") {
            for(let i = 0; i < snacks.length; i++){console.log(snacks[i]); snacks[i].style.display = 'block';}
            for(let i = 0; i < drinks.length; i++){console.log(drinks[i]); drinks[i].style.display = 'block';}
            
        }
        if (x == "snack") {
            for(let i = 0; i < snacks.length; i++){snacks[i].style.display = 'block';}
            for(let i = 0; i < drinks.length; i++){drinks[i].style.display = 'none';}
        }
        if (x == "drink") {
            for(let i = 0; i < snacks.length; i++){snacks[i].style.display = 'none';}
            for(let i = 0; i < drinks.length; i++){drinks[i].style.display = 'block';}
        }
    }
});