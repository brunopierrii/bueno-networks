const { initializeApp } = require('firebase/app')
const { getMessaging, getToken, onMessage } = require('firebase/messaging');

const firebaseConfig = {
    apiKey: "AIzaSyBV9vsc0d6MjY_cLPtetk0vkONJHWxu2uA",
    authDomain: "bueno-networks.firebaseapp.com",
    databaseURL: "https://bueno-networks-default-rtdb.firebaseio.com",
    projectId: "bueno-networks",
    storageBucket: "bueno-networks.appspot.com",
    messagingSenderId: "576611354702",
    appId: "1:576611354702:web:9bdb831e6a45ef28e41b1f",
    measurementId: "G-0GXWBT61L0"
};

const app = initializeApp(firebaseConfig);

const messaging = getMessaging(app)

getToken(messaging, {
    vapidKey: 'BKeYfa30ID6kmsuRpmHv_7jxs79t3iwbWhwztH5N_h9Sm2d56TCuu3JrkG3J7gV_P0CiHEiZ58qokWVvG6sH3A8'
})
    .then((currentToken) => {
        if (currentToken) {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            let xhrSetup = new XMLHttpRequest();
            xhrSetup.open('POST', '/store-token');
            xhrSetup.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhrSetup.setRequestHeader('Content-Type', 'application-json');
            let data = JSON.stringify({
                token: currentToken
            });
            xhrSetup.send(data);

            xhrSetup.onload = () => {
                if (xhrSetup.status >= 200 && xhrSetup.status < 300) {
                    console.log(xhrSetup.responseText);
                } else {
                    console.log(xhrSetup);
                }
            }

        } else {
            console.log('No registration token available. Request permission to generate one.');
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        console.error(err)
    });

if ('serviceWorker' in navigator) {
    navigator.serviceWorker
        .register('/firebase-messaging-sw.js', { scope: '/' })
        .then((registration) => {
            onMessage(messaging, (payload) => {

                const notificationTitle = payload.notification.title;
                const notificationOptions = {
                    body: payload.notification.body,
                };

                new Notification(notificationTitle, notificationOptions);

            });

        })
}