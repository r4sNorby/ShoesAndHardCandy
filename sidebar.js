/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function openNav() {
    var x = document.getElementById("sidebar");
    if (x.style.width === "0px") {
        document.getElementById("sidebar").style.width = "200px";
        document.getElementById("main").style.marginLeft = "200px";
    }
}

function closeNav() {
    var x = document.getElementById("sidebar");
    if (x.style.width === "200px") {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "200px";
    }
}

function toggle() {
    var x = document.getElementById("sidebar");

    var y = window.matchMedia("(max-width: 650px)");
    
    // For testing
    /*if (y.matches) {
        document.body.style.backgroundColor = "yellow";
    } else {
        document.body.style.backgroundColor = "pink";
    }*/

    if (y.matches) {
        if (x.style.width === "40px") {
            x.style.width = "175px";
        } else if (x.style.width === "175px") {
            x.style.width = "40px";
        } else {
            x.style.width = "175px";
        }
    } else {
        if (x.style.width === "45px") {
            x.style.width = "200px";
            //y.style.marginLeft = "0px";
        } else if (x.style.width === "200px") {
            x.style.width = "45px";
            //y.style.marginLeft = "200px";
        } else {
            x.style.width = "200px";
        }
    }
}
