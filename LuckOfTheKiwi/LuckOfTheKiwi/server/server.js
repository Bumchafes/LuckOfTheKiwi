var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io').listen(server);
user = [];
connections = [];

server.listen(process.env.PORT || 3000);
console.log('socket.io server running on port 3000 ...');

app.get('/', function(req, res){
    res.sendFile(process.cwd() + '/index.html');
   
});

io.sockets.on('connection', function(socket){
    // Openning
    connections.push(socket);
    console.log('ConnectedL %s sockets connected', connections.length);

    // Disconnect
    socket.on('disconnect', function(data){
    connections.splice(connections.indexOf(socket), 1);
    console.log('Disconnected: %s sockets connected', connections.length);

    });

    // send message
    socket.on('Send Message', function(data){
        io.sockets.emit('New Message',{msg:data});
    });
    // private message
    socket.on('private', function(data){
        
    });

    //test
    socket.on('flag', function(data){
        console.log('stars and stripes');
        io.sockets.emit('New Message', {msg:'stars and stripes'});
    });
});
