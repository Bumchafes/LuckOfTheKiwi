var axpress = require('express');
var jwt = require('jsonwebtoken');
const app = express();


//localhost:3000/api
app.get('api', function(res, req){
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
    })
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

app.listen(3000, function(){
    console.log('App listening on port 3000!');
});