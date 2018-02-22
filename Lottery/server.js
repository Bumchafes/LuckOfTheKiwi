var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require("socket.io-client");


function connect()
{
    var socket = io.connect("http://localhost:3000");
    socket.emit('Send Message Lottery');
}
connect();

server.listen(process.env.PORT || 3002);
console.log('socket.io Lottery running on port 3002 ...');





