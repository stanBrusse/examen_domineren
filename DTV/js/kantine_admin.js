$(function () {

    var temp = "SNACK";
    var mySelect = document.getElementById('categorieSel');

    for (var i, j = 0; i = mySelect.options[j]; j++) {
        if (i.value == temp) {
            mySelect.selectedIndex = j;
            break;
        }
    }

});
