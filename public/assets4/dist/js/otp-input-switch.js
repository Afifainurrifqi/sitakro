"use strict";

let otpInput = document.querySelectorAll(".otp-input-group")[0];

// Add an event listener for the 'keyup' event
otpInput.addEventListener("keyup", function (e) {
    let t = e.target,
        n = parseInt(t.attributes.maxlength.value, 10),
        a = t.value.length;
    
    if (a >= n) {
        for (let r = t; (r = r.nextElementSibling) && r != null;) {
            if (r.tagName.toLowerCase() === "input") {
                r.focus();
                break;
            }
        }
    } else if (a === 0) {
        for (let u = t; (u = u.previousElementSibling) && u != null;) {
            if (u.tagName.toLowerCase() === "input") {
                u.focus();
                break;
            }
        }
    }
});
