const mongoose = require("mongoose");

const postSchema = new mongoose.Schema({
    title:String,
    body:String,
    user:{type: mongoose.Schema.Types.ObjectId,ref:"user"}
})
const post = mongoose.model("post", postSchema);
module.exports = post;