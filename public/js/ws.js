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
    console.log(e);
}