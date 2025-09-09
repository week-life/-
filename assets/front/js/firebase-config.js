
const firebaseConfig = {
	apiKey: "AIzaSyDAxSw8gVJM9xVSI5D2Tv9KrH8_tBq4KTA",
    authDomain: "deanak-85967.firebaseapp.com",
    projectId: "deanak-85967",
    storageBucket: "deanak-85967.appspot.com",
    messagingSenderId: "971024814218",
    appId: "1:971024814218:web:469c64033086272bad5d73"
};
firebase.initializeApp(firebaseConfig);

// Initialize Cloud Firestore through Firebase
var db = firebase.firestore();

// Disable deprecated features
db.settings({
	timestampsInSnapshots: true
});