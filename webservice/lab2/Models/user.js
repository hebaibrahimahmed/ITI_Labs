const mongoose = require("mongoose");
const userSchema = new mongoose.Schema({
    firstName:String,
    lastName:String
});
const user = mongoose.model("user", userSchema);
module.exports = user;