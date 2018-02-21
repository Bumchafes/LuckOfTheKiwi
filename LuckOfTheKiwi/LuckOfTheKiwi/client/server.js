var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require("socket.io-client");


function connect()
{
    console.log("Connceting to client...");
    var socket = io.connect("http://localhost:3000");
    console.log("client connected...");
    socket.emit('Send Message');
    socket.emit('flag');
}
connect();

server.listen(process.env.PORT || 3001);
console.log('socket.io client running on port 3001 ...');





