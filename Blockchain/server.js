var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require("socket.io-client");



server.listen(process.env.PORT || 3002);
console.log('socket.io Lottery running on port 3002 ...');
socket = io.connect("http://localhost:3000");

socket.on('connect', function(){
    console.log('connect');
    console.log(socket.connected);
    socket.emit('Send Message Blockchain');
    console.log(socket.connected);
});





