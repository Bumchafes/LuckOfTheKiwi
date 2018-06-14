var express = require('express');
var jwt = require('jsonwebtoken');
var app = express();
var rpc = require('node-json-rpc');

var options = {
    // int port of rpc server, default 5080 for http or 5433 for https
    port: 30333,
    // string domain name or ip of rpc server, default '127.0.0.1'
    host: '10.100.10.44',
    // string with default path, default '/'
    path: '/',
    // boolean false to turn rpc checks off, default true
    strict: true
  };
   
// Create a server object with options
var client = new rpc.Client(options);


//localhost:3000/api
app.get('/api', function(res, req){
    res.json({
        text: 'my api!'
    });
});

//localhost:3000/api/login
app.post('/api/login', function(req, res){
    const user = {id:3};
    const token = jwt.sign({user}, 'my_secret_key');
    res.json({
        token: token
    });
});

//localhost:3000/api/protected
app.get('/api/protected', checkToken, function(req, res){
    jwt.verify(req.token, 'my_secret_key', function(err, data){
            if(err){
              res.sendStatus(403);
            }
            else{
                res.json({
                text: 'this is protected',
                data: data
            });
        }
    });
});

app.get('/api/rpctrigger', checkToken, function(req, res){
    jwt.verify(req.token, 'my_secret_key', function(err, data){
            if(err){
              res.sendStatus(403);
            }
            else{
                makeCall();
                res.json({
                text: 'this is rpctrigger',
                data: data
            });
        }
    });
});

app.get('/api/audit', checkToken, function(req, res){
    jwt.verify(req.token, 'my_secret_key', function(err, data){
            if(err){
              res.sendStatus(403);
            }
            else{
                makeCallAudit();
                res.json({
                text: 'this is an Audit',
                data: data
            });
        }
    });
});

//checkToken function
function checkToken(req, res, next){
    const bearerHeader = req.headers["authorization"];
    if(typeof bearerHeader !== 'undefined'){
        const bearer = bearerHeader.split(" ");
        const bearerToken = bearer[1];
        req.token = bearerToken;
        next();
    }
    else{
        res.sendStatus(403);
    }
}


   
function makeCall(){
        client.call(
          {
            "jsonrpc": "2.0",
            "method": "invoke",
            "params": ["f06fe9c09df4b80656779a1225ce33acc21add65",[
                {
                "type": "String",
                "value": "buy"
                },
                {
                "type":"String",
                "value": "Customer265"
                },
                {
                "type":"String",
                "value": "1"
                }
                ]
            ],
            "id": 1
        },
          function (err, res) {
            // Did it all work ?
            if (err) { console.log("recieved error " + err); }
            else { console.log("sever said: " + JSON.stringify(res)); }
          }
        );
        
      
  }

  function makeCallAudit(){
    
    client.call(
        {
          "jsonrpc": "2.0",
          "method": "invoke",
          "params": ["f06fe9c09df4b80656779a1225ce33acc21add65",[
              {
              "type": "String",
              "value": "buy"
              },
              {
              "type":"String",
              "value": "Auditor Access"
              },
              {
              "type":"String",
              "value": "1"
              }
              ]
          ],
          "id": 1
      },
        function (err, res) {
          // Did it all work ?
          if (err) { console.log("recieved error " + err); }
          else { console.log("sever said: " + JSON.stringify(res)); }
        }
      );
      
    
}


app.listen(3000, function(){
    console.log('App listening on port 3000!');
});