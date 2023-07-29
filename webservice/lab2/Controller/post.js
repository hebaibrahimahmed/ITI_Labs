const postModel = require('../Models/post');

async function getPosts(){
    const posts= await postModel.find({});
    return posts;
    }

    async function addPost(){
        const newPost={
            title:"Post",
            body:"add post one",
            user:"642424f01c0e4eb388b2dc58"
        };
    const post = await postModel.create(newPost);
    return post;
    }
module.exports = {getPosts,addPost};