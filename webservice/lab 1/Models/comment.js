const mongoose = require("mongoose");

const commentSchema = new mongoose.Schema({
  body: String,
  post: { type: mongoose.Schema.Types.ObjectId, ref: "post" },
});
const comment = mongoose.model("comment", commentSchema);
module.exports = comment;
