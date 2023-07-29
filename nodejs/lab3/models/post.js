const { default: mongoose } = require('mongoose')
const mongos = require('mongoose')

const postSchema = new mongoose.Schema(
    {
     title: String,
     body : String,
     auther: {type:mongos.Schema.Types.ObjectId, ref:"user" } 
    }
)

const postModel = mongos.model('post',postSchema)

module.exports = postModel 