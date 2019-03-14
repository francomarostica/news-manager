if ("Notification" in window) {
    Notification.requestPermission();
}

var wsuri = "ws://newsmanager.test.com:2083";

console.log("WS Initialized");

var ws = new WebSocket(wsuri);
ws.onopen = function(e){
    console.log("Connected");
    var msg = {
        name : "guest"
    };
    ws.send(JSON.stringify(msg));
}

ws.onerror = function(e){
    console.log(e);
}

ws.onmessage = function(e){
    //console.log(e.data);
    var data = JSON.parse(e.data);
    var msg = data.message;
    var msgType = data.type;

    if (Notification.permission === "granted") {
        if(msgType=="notification"){
            var notification = new Notification(msg);
            setTimeout(notification.close.bind(notification), 4000);
        }
    }
}