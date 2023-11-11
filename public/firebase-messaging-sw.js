importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyBV9vsc0d6MjY_cLPtetk0vkONJHWxu2uA",
    authDomain: "bueno-networks.firebaseapp.com",
    databaseURL: "https://bueno-networks-default-rtdb.firebaseio.com",
    projectId: "bueno-networks",
    storageBucket: "bueno-networks.appspot.com",
    messagingSenderId: "576611354702",
    appId: "1:576611354702:web:9bdb831e6a45ef28e41b1f",
    measurementId: "G-0GXWBT61L0"
});

const messaging = firebase.messaging();