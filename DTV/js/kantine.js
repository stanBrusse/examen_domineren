$(document).ready(function () {
function kantineFilter() {
    var x = document.getElementById("kantineSelect").value;
    if(x == "all"){
        document.getElementById('snack').style.display = 'block';
        document.getElementById('drink').style.display = 'block';
    }
    if(x == "snack"){
        document.getElementById('snack').style.display = 'block';
        document.getElementById('drink').style.display = 'none';
    }
    if(x == "drink"){
        document.getElementById('drink').style.display = 'block';
        document.getElementById('snack').style.display = 'none';
    }
  }

});