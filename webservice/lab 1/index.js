const mongoose = require('mongoose');
const restify = require('restify');
const server = restify.createServer({})
const ajv = require('ajv');
const postRoute=require('./Routes/post');
const commentRoute = require('./Routes/comment');
const userRoutes = require('./Routes/user');
server.use(restify.plugins.bodyParser());

//Routes
postRoute.applyRoutes(server,'/posts');
commentRoute.applyRoutes(server,'/comments');
userRoutes.applyRoutes(server,'/users');


server.listen(5000,()=>{console.log("Server is listening on port 5000")});
mongoose.connect('mongodb://127.0.0.1:27017/webServicesLabs');
mongoose.connection.on('connected',function(){
    console.log("Connected To DB");
});