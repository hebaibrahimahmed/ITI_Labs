const restify = require('restify');
const Router = require('restify-router').Router;
const router =new Router();
const userModel=require('../Models/user');
const postModel = require('../Models/post');

router.get('/:userid/posts',restify.plugins.conditionalHandler([{
    version:'1.0.0',
    handler:[
        async (req,res)=>{
            try{
                const posts = postModel.find({user:req.param.userid});
                res.send(posts);
            }catch(err){
                res.send(err);
            }
        }
    ]
}]))

module.exports = router;