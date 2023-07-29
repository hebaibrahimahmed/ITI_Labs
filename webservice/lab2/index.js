const { ApolloServer, gql } = require("apollo-server");
const postType = require("./Schema/post");
const userType = require("./Schema/user");
const postControl = require("./Controller/post");
const userControl = require("./Controller/user");
const mongoose = require("mongoose");

const dataControl = gql`
  type Query {
    posts: [Post!]
    users: [User!]
    userPosts: [Post!]
  }
  type Mutation{
    createUser(input:String):User
    createPost(name:String):Post
  }
`;

const server = new ApolloServer({
  typeDefs: [dataControl,postType, userType],
  resolvers:{
    Mutation:{
      createUser :
        userControl.addUser(),
      createPost:postControl.addPost(),
    },
    Query: {
      posts: postControl.getPosts(),
      users: userControl.getAllusers(),
      userPosts: userControl.getPostsOfUser('642424f01c0e4eb388b2dc58'),
    },
    
  }
});


mongoose.connect("mongodb://127.0.0.1:27017/webServicesLabs2");
mongoose.connection.on("connected", function () {
  console.log("Connected To DB");
});

server.listen(5000).then((port) => {
  console.log("listening on port 5000");
});
