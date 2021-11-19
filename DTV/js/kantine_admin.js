$(document).ready(function () {
    const btn_remove = document.getElementById("remove");
    const btn_change = document.getElementById("change");
    const btn_create = document.getElementById("create");

    let remove = document.getElementById("kantine-remove");
    let change = document.getElementById("kantine-change");
    let create = document.getElementById("kantine-create");
    remove.style.display = "none";
    change.style.display = "none";
    create.style.display = "none";

    btn_create.onclick = function () {
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
    btn_remove.onclick = function () {
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
    btn_change.onclick = function () {
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
});