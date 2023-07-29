const restify = require('restify');
const Router = require('restify-router').Router;
const router =new Router();
const postModel= require('../Models/post');
const commentModel= require('../Models/comment');

router.get('/',restify.plugins.conditionalHandler([{
    version:'1.0.0',
    handler:[
        async (req,res)=>{
            try{
              const posts = await postModel.find({});
                res.send(posts);
            }catch(err){
                res.send(err);
            }
        }
    ]
}]))

router.post('/',restify.plugins.conditionalHandler([{
    version:'1.0.0',
    handler:[
        async (req,res)=>{
            try{
                const newPost={
                    ...req.body
                }
                const posts = await postModel.create(newPost);
                res.json("Created Sucssfully");
            }catch(err){
                res.json(err);
            }
        }
    ]
}]))


router.get('/:postid/comments',restify.plugins.conditionalHandler([{
    version:'1.0.0',
    handler:[
        
        async (req, res) =>{
            try{
                const comments=await commentModel.find({post:req.params.postid});
                res.send(comments);
            }catch(err){
                res.send(err);
            }
        }
    ]
}
]));

module.exports = router;