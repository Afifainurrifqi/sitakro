// Service Worker Register 

if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register('service-worker.js')
            .then(registration => {
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            })
            .catch(err => {
                console.log('ServiceWorker registration failed: ', err);
            });
    });
}

// PWA Button Installation

let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
});

const installButton = document.getElementById('installAffan');
const installWrap = document.getElementById('installWrap');

if (installButton) {
    function updateInstallButton() {
        if (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true) {
            installButton.textContent = 'Installed';
            installWrap.style.display = 'none';
        } else {
            installButton.textContent = 'Install Now';
            installWrap.style.display = 'block';
        }
    }

    installButton.addEventListener('click', async () => {
        if (installButton.textContent === 'Installed') {
            return;
        }

        if (deferredPrompt) {
            deferredPrompt.prompt();
            const {
                outcome
            } = await deferredPrompt.userChoice;
            if (outcome === 'accepted') {
                installButton.textContent = 'Installed';
                installWrap.style.display = 'none';
            } else {
                installButton.textContent = 'Install Now';
            }
            deferredPrompt = null;
        }
    });

    updateInstallButton();
    window.matchMedia('(display-mode: standalone)').addEventListener('change', updateInstallButton);
}