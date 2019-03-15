if ("Notification" in window) {
    console.log("Browser accepts notifications!");
    Notification.requestPermission();
}

window.Echo.channel('public_notifications').listen('.NotificationSent', (data) => {
    console.log(data);
    var msg = data.message;

    if(data.type=="info"){
        if (Notification.permission === "granted") {
            var notification = new Notification(msg);
            setTimeout(notification.close.bind(notification), 4000);
        }
    }
});
