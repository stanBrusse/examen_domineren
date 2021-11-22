$(document).ready(function () {
    let remove = document.getElementById("kantine-remove");
    let change = document.getElementById("kantine-change");
    let create = document.getElementById("kantine-create");
    remove.style.display = "none";
    change.style.display = "none";
    create.style.display = "none";
});

    function create(id) {
        let main = document.getElementById("kantine-main");
        let remove = document.getElementById("kantine-remove");
        let change = document.getElementById("kantine-change");
        let create = document.getElementById("kantine-create");
        if (main.style.display === "none" && create.style.display === "block") {
            remove.style.display = "none";
            change.style.display = "none";
            create.style.display = "none";
            main.style.display = "block";
        } else {
            main.style.display = "none";
            remove.style.display = "none";
            change.style.display = "none";
            create.style.display = "block";
        }
    }
    function remove(id) {
        let main = document.getElementById("kantine-main");
        let remove = document.getElementById("kantine-remove");
        let change = document.getElementById("kantine-change");
        let create = document.getElementById("kantine-create");
        if (main.style.display === "none" && remove.style.display === "block") {
            remove.style.display = "none";
            change.style.display = "none";
            create.style.display = "none";
            main.style.display = "block";
        } else {
            main.style.display = "none";
            change.style.display = "none";
            create.style.display = "none";
            remove.style.display = "block";
        }
    }
    function change(id) {
        let main = document.getElementById("kantine-main");
        let remove = document.getElementById("kantine-remove");
        let change = document.getElementById("kantine-change");
        let create = document.getElementById("kantine-create");
        if (main.style.display === "none" && change.style.display === "block") {
            remove.style.display = "none";
            change.style.display = "none";
            create.style.display = "none";
            main.style.display = "block";
        } else {
            main.style.display = "none";
            remove.style.display = "none";
            create.style.display = "none";
            change.style.display = "block";
        }
    }
