var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require("socket.io-client");


function connect(){
    var socket = io.connect("http://localhost:3000");
    socket.emit("Send Message", "hello world");
    console.log('im in...');

}
connect();
//socket.emit("Send Message","Hello World");
server.listen(process.env.PORT || 3001);
console.log('socket.io client running on port 3001 ...');





