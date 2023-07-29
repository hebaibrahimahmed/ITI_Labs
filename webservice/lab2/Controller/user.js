const userModel =require('../Models/user');
const postModel = require('../Models/post');

async function getAllusers(){
    const users=await userModel.find({});
    return users;
}

async function getPostsOfUser(userId){
const posts=await  postModel.find({user:userId});
return posts;
}
async function addUser(){
    const newUser={
        firstName:"heba",
        lastName:"ibrahim"
    };
const user = await userModel.create(newUser);
return user;
}
module.exports ={getAllusers,getPostsOfUser,addUser}