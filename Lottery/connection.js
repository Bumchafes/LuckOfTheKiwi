var io = require("socket.io-client");

function connect()
{
    
        console.log('connect');
        console.log(socket.connected);
        socket.emit('Send Message Lottery');
  
    
}
