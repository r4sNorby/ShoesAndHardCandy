/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Complain if no checkboxes were checked
$(document).ready(function () {
    $('#delete').click(function () {
        checked = $("input[type=checkbox]:checked").length;

        if (!checked) {
            alert("You must check at least one checkbox.");
            return false;
        }

    });
});