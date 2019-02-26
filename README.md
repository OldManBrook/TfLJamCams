# TfLJamCams - <a href="https://www.tfljamcams.net" target="_blank">https://www.tfljamcams.net</a>


### Introduction

`TfLJamCams` is a Google Maps project that shows Traffic Cameras, Live Road Incidents and Real-Time departures for public Transport in London. Using Geo-Location shows local Public transport stops within 0.5km.

It is available as a PWA for installation to the home screen on mobile devices or as a standard web page. 
A service worker is deployed and a local cache stored for PWA use.


### Pre-Requisites

The following API keys are required for the API data calls.
- Google Maps Javscript API - <a href="https://cloud.google.com/maps-platform/" target="_blank">https://cloud.google.com/maps-platform/</a>

- TfL Open Data App Key <a href="https://tfl.gov.uk/info-for/open-data-users/" target="_blank">https://tfl.gov.uk/info-for/open-data-users/</a>

- National Rail App Key - <a href="https://lite.realtime.nationalrail.co.uk/OpenLDBWS/" target="_blank">https://lite.realtime.nationalrail.co.uk/OpenLDBWS/</a>


### Example API Calls

TfL Bus Route 23 Stop Points - <a href="https://api.tfl.gov.uk/line/23/stoppoints" target="_blank">https://api.tfl.gov.uk/line/23/stoppoints</a>

London Underground Central Line Stations - <a href="https://api.tfl.gov.uk/line/central/stoppoints" target="_blank">https://api.tfl.gov.uk/line/central/stoppoints</a>

London JamCams - <a href="https://api.tfl.gov.uk/Place/Type/JamCam/" target="_blank">https://api.tfl.gov.uk/Place/Type/JamCam/</a>

Live Incidents - <a href="https://api.tfl.gov.uk/Road/All/Disruption?startDate=2019-02-23&endDate=2019-02-24" target="_blank">https://api.tfl.gov.uk/Road/All/Disruption?startDate=YYYY-MM-DD&endDate=YYYY-MM-DD</a>

National Rail Departures - <a href="https://lite.realtime.nationalrail.co.uk/OpenLDBWS/" target="_blank">https://lite.realtime.nationalrail.co.uk/OpenLDBWS/</a>


### Methods

Traffic Cameras are loaded via an AJAX call to the TfL API. Both video and Image URL's are supplied by a standard JSON request. A button at the top of the page switches between Image and Video feeds and also shows a count of available feeds.

Image buttons are provided along the bottom of the screen to load Bus Stops by Route number, TfL Stations by line name.

TfL data is fed directing from the JSON feed after processing to format the map markers.
Underground Lines are shown in a drop-down list and Bus routes are held in an autocomplete array on the page.

National Rail data is supplied via a SOAP XML request and uses a dedicated PHP file to output a JSON feed in a similar format to the TfL feed for uniformity.

An autocomplete search function is provided and contains an array of Camera names, London National Rail stations, London Towns, London Areas and London Boroughs. This is stored as an array within the page as database calls were causing excessive server load.


### References

<a href="https://github.com/railalefan/phpOpenLDBWS" target="_blank">https://github.com/railalefan/phpOpenLDBWS</a>


### Javacript Sources

jquery.easy-autocomplete.min.js<br />
https://code.jquery.com/jquery-3.3.1.min.js<br />
https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js<br />
https://www.google.com/recaptcha/api.js?hl=en<br />

