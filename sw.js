/*
Copyright 2016 Google Inc.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/

(function() {
  'use strict';

  var filesToCache = [
  '.',
  'index.html',
  'sw.js',
  'https://code.jquery.com/jquery-3.3.1.min.js',
  'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
  'error_pages/HTTP404.html',
  'img/roadworks-1.png',
  'img/roadworks-sat.png',
  'img/loading.gif',
  'img/exclamation-1.png',
  'img/exclamation-sat.png',
  'img/closure-1.png',
  'img/cctv-1.png',
  'img/cctv-sat.png',
  'img/cams.png',
  'img/traffic.png',
  'img/incidents.png',
  'img/roundel.gif',
  'img/bus_stops.png',
  'img/London-Buses-roundel-logo52.png',
  'img/train_stops.png',
  'img/tram_stops.png',
  'img/buses.png',
  'img/underground_20.png',
  'img/underground.png',
  'img/underground_52.png',
  'img/overground.png',
  'img/overground_52.png',
  'img/tflrail.png',
  'img/tflrail_52.png',
  'img/dlr.png',
  'img/dlr_52.png',
  'img/tramlink.png',
  'img/tramlink_52.png',
  'img/river_pier.png',
  'img/river_52.png',
  'img/rail.png',
  'img/rail_52.png',
  'img/London_AirLine_Roundel_52.png',
  'img/red-pushpin.png',
  'util/style.css',
  'util/icon120.png',
  'util/icon192.png',
  'util/icon256.png',
  'util/icon512.png',
  'util/video.php',
  'util/loadvid.php',
  'util/image.php',
  'util/loadimg.php',
  'util/arrivals.php',
  'util/loadstop.php',
  'util/offline.html',
  'util/route-list.php',
  'util/search.php',
  'util/stop-list.php',
  'contact/privacypolicy.html',
  'https://api.tfl.gov.uk/Place/Type/JamCam/?app_id=<YOUR_APPID>&app_key=<YOUR_APPKEY>'
];
var staticCacheName = 'tfljamcams-cache-v201902212200';
var cacheWhitelist = ['util','cdnjs.cloudflare.com','code.jquery.com','img','error_pages'];

self.addEventListener('install', function(event) {
  console.log('SW registered, caching static assets');
  event.waitUntil(
    caches.open(staticCacheName)
    .then(function(cache) {
		/*console.log('Clearing cache');
		trimCache(staticCacheName, 0);*/
      return cache.addAll(filesToCache);
    })
  );
  if ('storage' in navigator && 'estimate' in navigator.storage) {
		navigator.storage.estimate().then(estimate => {
			const usage = estimate.usage;
			const quota = estimate.quota;
			const percentUsed = Math.round(usage / quota * 100);
			const usageInMib = Math.round(usage / (1024 * 1024));
			const quotaInMib = Math.round(quota / (1024 * 1024));
			
			console.log(`Cache consuming ${usageInMib}MB out of ${quotaInMib}MB used (${percentUsed}%)`);
			
	});}
});

self.addEventListener('message', function (event) {
  if (event.data.action === 'skipWaiting') {
    self.skipWaiting();
  }
});

function trimCache(cacheName, maxItems) {
  caches.open(cacheName).then(function(cache) {
    cache.keys().then(function(keys) {
      if (keys.length > maxItems) {
		  if (cacheWhitelist.indexOf(keys) === -1) {
			  cache.delete(keys[0]).then(trimCache(cacheName, maxItems));
          /*return cache.delete(key);*/
        }
        
      }
	  cache.addAll(filesToCache);
    });
  });
}

self.addEventListener('message', event => {
  if (event.data.command == 'trimCaches') {
    trimCache(staticCacheName, 35);
    /*trimCache(staticCacheName, 20);*/
  }
});

self.addEventListener('fetch', function(event) {
  /*console.log('Fetch event for ', event.request.url);*/
  
  /*let request = event.request,
      acceptHeader = request.headers.get('Accept');*/

  /* JSON Requests*/

  /*if (acceptHeader.indexOf('application/json') !== -1) {
  //console.log('Json Request:',event.request.url);
  event.respondWith(
    caches.open(staticCacheName).then(function(cache) {
      return cache.match(event.request).then(function(response) {
        var fetchPromise = fetch(event.request).then(function(networkResponse) {
          //if we got a response from the cache, update the cache
          if (response) {
			//console.log('Removing from cache',event.request.url);
			trimCache(staticCacheName, 27);
		  
			//console.log('Updating Cache:',event.request.url);
            cache.put(event.request, networkResponse.clone());
          }
          return networkResponse;
        });
		
		

        // respond from the cache, or the network
        return response || fetchPromise;
      });
    }).catch(function(error) {

	  //Respond with custom offline page
	  console.log('Error, ', error);
        return caches.match('util/offline.html');
    })
  );
 
  }else{*/
	/*console.log('Standard Request:',event.request.url);*/
	event.respondWith(
    caches.match(event.request).then(function(response) {
		 if (response) {
        /*console.log('Found ', event.request.url, ' in cache');*/
        return response;
		}
      return fetch(event.request)

      .then(function(response) {
		  
		var response2 = response.clone();

  /*Respond with custom 404 page*/
  if (response.status === 404) {
            return caches.match('error_pages/HTTP404.html');
          }

  return caches.open(staticCacheName).then(function(cache) {
    /*console.log('Updating cache with',event.request.url);*/
    /*  cache.put(event.request.url, response.clone());*/
    return response;
  });
});

    }).catch(function(error) {

	  /*Respond with custom offline page*/
	  console.log('Error, ', error);
        return caches.match('util/offline.html');
    })
  );  
	  
});
  /*delete unused caches*/
  self.addEventListener('activate', function(event) {
  console.log('Activating new service worker...');

  var cacheWhitelist = [staticCacheName];

  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

var deferredPrompt;

self.addEventListener('beforeinstallprompt', e => {
  e.userChoice.then(choiceResult => {
    ga('send', 'event', 'A2H', choiceResult.outcome);      
  });
});

/*self.addEventListener('beforeinstallprompt', function (e) {
  // Prevent Chrome 67 and earlier from automatically showing the prompt
  ///e.preventDefault();
  // Stash the event so it can be triggered later.
  ///deferredPrompt = e;

  //showAddToHomeScreen();
  /*setTimeout(function(){
    // Show the prompt.
	console.log('Activate add to home screen!');
    showAddToHomeScreen();
	},60000);
});*/



function showAddToHomeScreen() {

  var a2hsBtn = document.querySelector(".ad2hs-prompt");

  a2hsBtn.style.display = "block";

  a2hsBtn.addEventListener("click", addToHomeScreen);

}

function addToHomeScreen() {  var a2hsBtn = document.querySelector(".ad2hs-prompt");  /* hide our user interface that shows our A2HS button */
  a2hsBtn.style.display = 'none';  /* Show the prompt */
  deferredPrompt.prompt();  /* Wait for the user to respond to the prompt */
  deferredPrompt.userChoice
    .then(function(choiceResult){

  if (choiceResult.outcome === 'accepted') {
    console.log('User accepted the A2HS prompt');
  } else {
    console.log('User dismissed the A2HS prompt');
  }

  deferredPrompt = null;

});}

})
();
