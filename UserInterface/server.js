var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require("socket.io-client");


function connect()
{
    var socket = io.connect("http://localhost:3000");
    socket.emit('Send Message UI');
}
connect();

server.listen(process.env.PORT || 3003);
console.log('socket.io client running on port 3003 ...');





