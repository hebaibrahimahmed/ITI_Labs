const mongoose = require("mongoose");
const userSchema = new mongoose.Schema({
    userName:String,
    email:String,
    password:String,
    comment:[{type: mongoose.Schema.Types.ObjectId,ref:"comment"}]
})
const user = mongoose.model("user", userSchema);
module.exports = user;