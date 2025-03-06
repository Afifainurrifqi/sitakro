"use strict";

document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        const clockdivs = document.getElementsByClassName("clockdiv");
        const countdownData = [];

        for (let i = 0; i < clockdivs.length; i++) {
            countdownData.push({
                el: clockdivs[i],
                time: new Date(clockdivs[i].getAttribute('data-date')).getTime(),
                days: 0,
                hours: 0,
                minutes: 0,
                seconds: 0
            });
        }

        const countdownFunction = setInterval(() => {
            let allCountdownsComplete = true;

            for (let i = 0; i < countdownData.length; i++) {
                const now = new Date().getTime();
                const distance = countdownData[i].time - now;

                countdownData[i].days = Math.floor(distance / (1000 * 60 * 60 * 24));
                countdownData[i].hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                countdownData[i].minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                countdownData[i].seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (distance < 0) {
                    countdownData[i].el.querySelector('.days').innerHTML = 0;
                    countdownData[i].el.querySelector('.hours').innerHTML = 0;
                    countdownData[i].el.querySelector('.minutes').innerHTML = 0;
                    countdownData[i].el.querySelector('.seconds').innerHTML = 0;
                } else {
                    allCountdownsComplete = false;
                    countdownData[i].el.querySelector('.days').innerHTML = countdownData[i].days;
                    countdownData[i].el.querySelector('.hours').innerHTML = countdownData[i].hours;
                    countdownData[i].el.querySelector('.minutes').innerHTML = countdownData[i].minutes;
                    countdownData[i].el.querySelector('.seconds').innerHTML = countdownData[i].seconds;
                }
            }

            if (allCountdownsComplete) {
                clearInterval(countdownFunction);
            }
        }, 1000);
    }
});