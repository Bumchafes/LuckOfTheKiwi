var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require("socket.io-client");
var socket = io.connect("http://localhost:5025");

socket.emit("Send Message","Hello World");
server.listen(process.env.PORT || 3000);
console.log('socket.io client running on port 5000 ...');





