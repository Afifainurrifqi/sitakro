// --------------------------------------------------------
// Template Name: Affan - PWA Mobile HTML Template
// Author: Designing World
// Author URL: https://themeforest.net/user/designing-world
// --------------------------------------------------------

const staticCacheName = 'cache-v1.7.0';
const dynamicCacheName = 'runtimeCache-v1.7.0';

// Assets to pre-cache
const precacheAssets = [
    '/',
    'js/pwa.js',
    'manifest.json',
    'fallback.html'
];

// Install Event: Caching static assets
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(staticCacheName).then(cache => {
            return cache.addAll(precacheAssets);
        })
    );
});

// Activate Event: Clearing old caches
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.filter(key => key !== staticCacheName && key !== dynamicCacheName)
                    .map(key => caches.delete(key))
            );
        })
    );
});

// Fetch Event: Responding to network requests
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request).then(cacheRes => {
            // Return cached response or fetch from network
            return cacheRes || fetch(event.request).then(fetchRes => {
                return caches.open(dynamicCacheName).then(cache => {
                    cache.put(event.request, fetchRes.clone());
                    return fetchRes;
                });
            });
        }).catch(() => {
            // Return fallback page when offline
            return caches.match('fallback.html');
        })
    );
});
