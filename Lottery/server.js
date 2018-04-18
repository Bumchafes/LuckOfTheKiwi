var express = require('express');
//var connection = require('./connection.js');
var app = express();
var server = require('http').createServer(app);
var io = require("socket.io-client");
var socket = null;

//connnection = connect();

server.listen(process.env.PORT || 3002);
console.log('socket.io Lottery running on port 3002 ...');
socket = io.connect("http://localhost:3000");
//connection.connect();
socket.on('connect', function(){
    console.log('connect');
    console.log(socket.connected);
    socket.emit('Send Message Lottery');   
});






    /*
    console.log('after connection attempt');
    socket.connect();
    console.log(socket.connected);
    socket.emit('Send Message Lottery');
*/












