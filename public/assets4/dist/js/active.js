// -----------------------------------------------------------------
// Template Name: Affan - PWA Mobile HTML Template
// Template Author: Designing World
// Template Author URL: https://themeforest.net/user/designing-world
// Last Updated: 23 Dec, 2022
// -----------------------------------------------------------------

// -------------------------------------------
// 1.0 Template Features Code
//      1.1 Setting Button Trigger
//      1.2 Password Visibility
//      1.3 Prevent Default 'a' Click
// 2.0 Third Party Plugins Activation
//      2.1 Dropdown Menu
//      2.2 Tiny Slider
//      2.3 Isotope
//      2.4 Image Gallery
//      2.5 Counter Up
//      2.6 Range Slider
//      2.7 Data Table
//      2.8 Password Meter
// 3.0 Bootstrap Toast & Tooltips Activation
// 4.0 Miscellaneous Features Code
// 5.0 Preloader Activation
// ------------------------------------------

// ------------------------------------
// Chapter 1.0: Template Features Code
// ------------------------------------

'use strict';

document.addEventListener('DOMContentLoaded', function () {

    // 1.1 => Setting Button Trigger

    let settingButton = document.getElementById('settingTriggerBtn');
    let settingCard = document.getElementById('settingCard');
    let settingOverlay = document.getElementById('setting-popup-overlay');
    let settingCardClose = document.getElementById('settingCardClose');

    function toggleSettings() {
        settingCard.classList.toggle('active');
        settingOverlay.classList.toggle('active');
    }

    function closeSettings() {
        settingCard.classList.remove('active');
        settingOverlay.classList.remove('active');
    }

    if (settingButton) {
        settingButton.addEventListener('click', toggleSettings);
    }

    if (settingCardClose) {
        settingCardClose.addEventListener('click', closeSettings);
    }


    // 1.2 => Password Visibility

    let passWord = document.getElementById('password-visibility');

    if (passWord) {
        passWord.addEventListener('click', function () {
            let passInput = document.getElementById('psw-input');
            if (passInput) {
                passWord.classList.toggle('active');
                passInput.type = (passInput.type === 'password') ? 'text' : 'password';
            }
        });
    }

    // 1.3 => Prevent Default 'a' Click

    let emptyLinks = document.querySelectorAll('a[href="#"]');

    emptyLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
        });
    });

    // 1.4 => Copyright Full Year

    let copyrightYear = document.getElementById("copyrightYear");

    if (copyrightYear) {
        const year = new Date().getFullYear();
        copyrightYear.textContent = year;
    }

    // ============================================
    // Chapter 2.0: Third Party Plugins Activation
    // ============================================

    // 2.1.0 => Dropdown Menu (This code is dependent on [slideToggle.min.js] plugin).

    let dropdownTarget = document.querySelectorAll('.sidenav-nav li ul');
    let dropdownTargetLen = dropdownTarget.length;

    if (dropdownTargetLen > 0) {
        for (let i = 0; i < dropdownTargetLen; i++) {
            let classTarget = dropdownTarget[i].previousElementSibling;
            classTarget.classList.add('nav-url');
        }

        let navUrl = document.querySelectorAll('.nav-url');
        let navUrlLen = navUrl.length;

        for (let i = 0; i < navUrlLen; i++) {
            navUrl[i].insertAdjacentHTML('beforeend', '<span class="dropdown-icon"><i class="bi bi-chevron-down"></i></span>');
            navUrl[i].addEventListener('click', function () {
                this.classList.toggle('dd-open');
            });
        }

        let sidenavNav = document.querySelector('.sidenav-nav');
        sidenavNav.addEventListener('click', function (e) {
            if (e.target.classList.contains('nav-url')) {
                let nextTarget = e.target.nextElementSibling;
                slideToggle(nextTarget, 400);
            }
        });
    }

    // 2.2.1 => Tiny Slider One (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.tiny-slider-one-wrapper').length > 0) {
        tns({
            container: '.tiny-slider-one',
            items: 1,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 1000,
            mouseDrag: true,
            controlsText: [('<i class="bi bi-chevron-left"></i>'), ('<i class="bi bi-chevron-right"></i>')]
        });
    }

    // 2.2.2 => Tiny Slider Two (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.tiny-slider-two-wrapper').length > 0) {
        tns({
            container: '.tiny-slider-two',
            items: 1,
            slideBy: 'page',
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayButtonOutput: false,
            speed: 1000,
            mouseDrag: true,
            controls: false,
            nav: true
        });

        let tns3dots = document.querySelectorAll('.tiny-slider-two-wrapper .tns-nav > button');
        let dotLength = tns3dots.length;
        document.getElementById('totaltnsDotsCount').innerHTML = dotLength;

        for (let i = 0; i < dotLength; i++) {
            tns3dots[i].innerHTML = i + 1;
        }
    }

    // 2.2.3 => Tiny Slider Three (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.tiny-slider-three-wrapper').length > 0) {
        tns({
            container: '.tiny-slider-three',
            items: 1,
            gutter: 10,
            center: true,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 1000,
            mouseDrag: true,
            controls: false,
            nav: false,
            edgePadding: 40
        });
    }

    // 2.2.4 => Testimonial Slides One (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.testimonial-slide-one-wrapper').length > 0) {
        tns({
            container: '.testimonial-slide',
            items: 1,
            gutter: 10,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 800,
            mouseDrag: true,
            controls: false,
            nav: true
        });
    }

    // 2.2.5 => Testimonial Slides Two (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.testimonial-slide-two-wrapper').length > 0) {
        tns({
            container: '.testimonial-slide2',
            items: 2,
            center: true,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 800,
            mouseDrag: true,
            controls: true,
            nav: false,
            controlsText: [('<i class="bi bi-chevron-left"></i>'), ('<i class="bi bi-chevron-right"></i>')]
        });
    }

    // 2.2.6 => Testimonial Slides Three (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.testimonial-slide-three-wrapper').length > 0) {
        tns({
            container: '.testimonial-slide3',
            items: 1,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 800,
            mouseDrag: true,
            controls: false,
            nav: true,
            navPosition: 'bottom'
        });
    }

    // 2.2.7 => Partner Slides One (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.partner-logo-slide-wrapper').length > 0) {
        tns({
            container: '.partner-slide',
            items: 3,
            gutter: 12,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 1000,
            mouseDrag: true,
            controls: false,
            nav: true,
            navPosition: 'bottom'
        });
    }

    // 2.2.8 => Partner Slides Two (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.partner-logo-slide-wrapper-2').length > 0) {
        tns({
            container: '.partner-slide2',
            items: 3,
            gutter: 12,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 1000,
            mouseDrag: true,
            controls: false,
            nav: true,
            navPosition: 'bottom'
        });
    }

    // 2.2.9 => Image Gallery Slides (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.image-gallery-slides-wrapper').length > 0) {
        tns({
            container: '.image-gallery-carousel',
            center: true,
            items: 2,
            gutter: 16,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 750,
            mouseDrag: true,
            controls: false,
            nav: false
        });
    }

    // 2.2.10 => Product Gallery Slides (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.product-gallery-wrapper').length > 0) {
        tns({
            container: '.product-gallery',
            items: 1,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 750,
            mouseDrag: true,
            controls: false,
            nav: true,
            navPosition: 'bottom'
        });
    }

    // 2.2.11 => Chat Users Slides (This code is dependent on [tiny-slider.js] plugin).

    if (document.querySelectorAll('.chat-user-status-slides-wrapper').length > 0) {
        tns({
            container: '.chat-user-status-slides',
            items: 5,
            gutter: 8,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            speed: 750,
            mouseDrag: true,
            controls: false,
            nav: false,
            responsive: {
                480: {
                    items: 7
                },
                576: {
                    items: 7
                },
                768: {
                    items: 8
                },
                992: {
                    items: 10
                },
                1200: {
                    items: 10
                }
            }
        });
    }

    // 2.3 Isotope [This code depends on {Imagesloaded & Isotope} plugins.]

    let masonryWrapper = document.querySelector('.masonry-content-wrapper');

    if (masonryWrapper) {
        imagesLoaded(masonryWrapper, function () {
            let iso = new Isotope(masonryWrapper, {
                itemSelector: '.portfolio-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.portfolio-item'
                }
            });

            let filtersElem = document.querySelector('.filters-button-group');

            if (filtersElem) {
                filtersElem.addEventListener('click', function (event) {
                    if (!matchesSelector(event.target, 'button')) {
                        return;
                    }
                    let filterValue = event.target.getAttribute('data-filter');
                    iso.arrange({
                        filter: filterValue
                    });
                });
            }

            let buttonGroups = document.querySelectorAll('.filters-button-group');
            let buttonGroupslen = buttonGroups.length;

            for (let i = 0; i < buttonGroupslen; i++) {
                let buttonGroup = buttonGroups[i];
                radioButtonGroup(buttonGroup);
            }

            function radioButtonGroup(buttonGroup) {
                buttonGroup.addEventListener('click', function (event) {
                    if (!matchesSelector(event.target, 'button')) {
                        return;
                    }
                    buttonGroup.querySelector('.active').classList.remove('active');
                    event.target.classList.add('active');
                });
            }
        });
    }

    // 2.4 => Image Gallery (This code is dependent on [venobox.min.js] plugin).

    if (document.querySelectorAll('.gallery-img').length > 0) {
        window.addEventListener('load', function () {
            new VenoBox({
                selector: '.image-zooming-in-out',
                numeration: true,
                infinigall: true,
                share: true,
                overlayColor: 'rgba(15,7,15,0.75)',
                ratio: '4x3',
                spinner: 'pulse',
                titleStyle: 'transparent',
                toolsBackground: '#ea4c62',
                toolsColor: '#ffffff',
                navSpeed: 400
            });
        });
    }

    // 2.5 => Counter Up (This code is dependent on [index.js] plugin).

    if (document.querySelectorAll('.counter').length > 0) {
        let counterUp = window.counterUp.default;

        let callback = entries => {
            entries.forEach(entry => {
                let counterElement = entry.target
                if (entry.isIntersecting && !counterElement.classList.contains('is-visible')) {
                    counterUp(counterElement, {
                        duration: 2000,
                        delay: 20
                    });
                    counterElement.classList.add('is-visible');
                }
            });
        }

        let IO = new IntersectionObserver(callback, {
            threshold: 1
        });

        let counterUpClass = document.querySelectorAll('.counter');
        let counterUpClassLen = counterUpClass.length;

        for (let i = 0; i < counterUpClassLen; i++) {
            IO.observe(counterUpClass[i]);
        }
    }

    // 2.6.1 => ion Range Slider One (This code is dependent on [rangeslider.min.js] plugin).

    let ionRangeSlider1 = document.getElementById('ionRangeSlider1');

    if (ionRangeSlider1) {
        ionRangeSlider(ionRangeSlider1);
    }

    // 2.6.2 => ion Range Slider Two (This code is dependent on [rangeslider.min.js] plugin).

    let ionRangeSlider2 = document.getElementById('ionRangeSlider2');

    if (ionRangeSlider2) {
        ionRangeSlider(ionRangeSlider2);
    }

    // 2.7 => Data Table (This code is dependent on [vanilla-dataTables.min.js] plugin).

    let dataTable1 = document.getElementById('dataTable');

    if (dataTable1) {
        new DataTable(dataTable1, {
            perPage: 10,
            perPageSelect: [10, 20, 30, 40, 50],
            searchable: true,
            sortable: true,
            fixedHeight: false,
            prevText: '<i class="bi bi-arrow-left-short"></i>',
            nextText: '<i class="bi bi-arrow-right-short"></i>',
            labels: {
                placeholder: 'Search',
                perPage: '{select}',
                noRows: 'No data!',
                info: '{start} to {end} entries'
            }
        });
    }

    // 2.8 => Password Meter (This code is dependent on [pswmeter.js] plugin).

    let passwordInputId = document.getElementById('psw-input');
    let pswmeter = document.getElementById('pswmeter');

    if (passwordInputId && pswmeter) {
        pswmeter.style.display = 'none';

        passwordInputId.addEventListener('keyup', function () {
            pswmeter.style.display = 'block';
        });

        passwordStrengthMeter({
            containerElement: '#pswmeter',
            passwordInput: '#psw-input',
            height: 4,
            borderRadius: 4,
            pswMinLength: 10
        });
    }

    // =================================================
    // Chapter 3.0 Bootstrap Toast & Tooltips Activation
    // =================================================

    // Tooltip Activation

    let affanTooltip = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = affanTooltip.map(function (tooltip) {
        return new bootstrap.Tooltip(tooltip);
    });

    // Toast Activation

    let affanToast = [].slice.call(document.querySelectorAll('.toast'));
    let toastList = affanToast.map(function (toast) {
        return new bootstrap.Toast(toast);
    });
    toastList.forEach(toast => toast.show());

    // ===========================
    // Chapter 4.0 Miscellaneous
    // ==========================

    // Toast Showing Function

    let toastBtn = document.getElementById('toast-showing-btn');

    if (toastBtn) {
        toastBtn.addEventListener('click', function () {
            let affanToast = [].slice.call(document.querySelectorAll('.toast'));
            let toastList = affanToast.map(function (toast) {
                return new bootstrap.Toast(toast);
            });
            toastList.forEach(toast => toast.show());
        });
    }

    // Toast Animation: This function creates the line animation effect on a toast.

    window.onload = function toastAnimation() {
        let toasts = document.querySelectorAll('.toast-autohide');

        toasts.forEach(toast => {
            toast.insertAdjacentHTML('beforeend', '<span class="toast-autohide-animation"></span>');
            let toastDuration = toast.getAttribute('data-bs-delay');
            let animationSpan = toast.querySelector('.toast-autohide-animation');
            if (animationSpan) {
                animationSpan.style.animationDuration = toastDuration + 'ms';
            }
        });
    };

    // Add "form-control-clicked" class, when the user clicks the input element.

    let formControlInputs = document.querySelectorAll('.form-control, .form-select');

    formControlInputs.forEach(input => {
        input.addEventListener('click', function () {
            this.classList.add('form-control-clicked');
        });
    });

    // When the user clicks on the element, the active class is added to understand the active status.

    let activeEffects = document.querySelectorAll('.active-effect');

    activeEffects.forEach(element => {
        element.addEventListener('click', function () {
            activeEffects.forEach(el => el.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Image gallery items favorite icon click function.

    let favIcons = document.querySelectorAll('.single-gallery-item .fav-icon');

    favIcons.forEach(icon => {
        icon.addEventListener('click', function () {
            this.classList.toggle('active');
        });
    });

    // Chat page calling button functions.

    let chatWrapper = document.getElementById('chat-wrapper');
    let videoButton = document.getElementById('videoCallingButton');
    let videoPopup = document.getElementById('videoCallingPopup');
    let videoDecline = document.getElementById('videoCallDecline');
    let callingButton = document.getElementById('callingButton');
    let callingPopup = document.getElementById('callingPopup');
    let callDecline = document.getElementById('callDecline');

    function callingScreenAdd() {
        chatWrapper.classList.add('calling-screen-active');
    }

    function callingScreenRemove() {
        chatWrapper.classList.remove('calling-screen-active');
    }

    if (videoButton && videoDecline) {
        videoButton.addEventListener('click', function () {
            videoPopup.classList.add('screen-active');
            callingScreenAdd();
        });

        videoDecline.addEventListener('click', function () {
            videoPopup.classList.remove('screen-active');
            callingScreenRemove();
        });
    }

    if (callingButton && callDecline) {
        callingButton.addEventListener('click', function () {
            callingPopup.classList.add('screen-active');
            callingScreenAdd();
        });

        callDecline.addEventListener('click', function () {
            callingPopup.classList.remove('screen-active');
            callingScreenRemove();
        });
    }

    // Offline/Online Detection Demo Button Code (Please remove this code, when your website is ready to go live.)

    let offlineBtn = document.querySelector('.offline-detection');
    let onlineBtn = document.querySelector('.online-detection');

    if (offlineBtn || onlineBtn) {
        let alertShowingId = document.getElementById('internetStatus');

        function showAlert(message, backgroundColor) {
            alertShowingId.style.display = 'block';
            alertShowingId.style.backgroundColor = backgroundColor;
            alertShowingId.innerText = message;

            setTimeout(function () {
                alertShowingId.style.display = 'none';
            }, 5000);
        }

        if (offlineBtn) {
            offlineBtn.addEventListener('click', function () {
                showAlert('Oops! No internet connection.', '#ea4c62');
            });
        }

        if (onlineBtn) {
            onlineBtn.addEventListener('click', function () {
                showAlert('Your internet connection is back.', '#00b894');
            });
        }
    }

    // ======================
    // Chapter 5.0 Preloader
    // ======================

    let preloader = document.getElementById('preloader');

    if (preloader) {
        window.addEventListener('load', function () {
            let fadeOut = setInterval(function () {
                if (!preloader.style.opacity) {
                    preloader.style.opacity = 1;
                }
                if (preloader.style.opacity > 0) {
                    preloader.style.opacity -= 0.1;
                } else {
                    clearInterval(fadeOut);
                    preloader.remove();
                }
            }, 20);
        });
    }

});