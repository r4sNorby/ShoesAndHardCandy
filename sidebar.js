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
    var y = document.getElementById("main");
    if (x.style.width === "200px") {
        x.style.width = "0px";
        y.style.marginLeft = "0px";
    } else {
        x.style.width = "200px";
        y.style.marginLeft = "200px";
    }
}

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}