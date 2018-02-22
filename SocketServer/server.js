var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io').listen(server);
user = [];
connections = [];

var morgan = require("morgan");

app.get('/', function(req, res){
    res.sendFile(process.cwd() + '/index.html');   
});

app.use(morgan("dev"));

server.listen(process.env.PORT || 3000);
console.log('socket.io server running on port 3000 ...');

io.sockets.on('connection', function(socket){
    // Openning
    console.log('Connecting ...');
    connections.push(socket);
    console.log('Connected: %s sockets connected', connections.length);

    // Disconnect
    socket.on('disconnect', function(data){
    console.log('disconnecting ...');
    connections.splice(connections.indexOf(socket), 1);
    console.log('Disconnected: %s sockets connected', connections.length);
    });

    // send message
    socket.on('Send Message', function(data){
        console.log("Message Emiting From Interface");
        io.sockets.emit('New Message',{msg:data});
    });

    socket.on('Send Message UI', function(data){
        console.log("UI Connected");
        io.sockets.emit('New Message',{msg:data});
    });

    socket.on('Send Message Lottery', function(data){
        console.log("Lottery Connected");
        io.sockets.emit('New Message',{msg:data});
    });

    socket.on('Send Message Blockchain', function(data){
        console.log("Blockchain Connected");
        io.sockets.emit('New Message',{msg:data});
    });

    // private message
    socket.on('private', function(data){
        
    });

    //test
    socket.on('flag', function(data){
        console.log('Message Emiting From Interface');
        io.sockets.emit('New Message', {msg:'stars and stripes'});
    });
});
