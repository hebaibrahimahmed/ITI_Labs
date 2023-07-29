const mongoose = require("mongoose");
const userschema = new mongoose.Schema({
  firstname: { type: String, minlength: 4, require: true },
  lastname: String,
  email: { type: String, unique: true, match: /.+@.+\..+/ },
  age: Number,
});

const usermodel = mongoose.model("user", userschema);

module.exports = usermodel;




// const mongos = require('mongoose')



// const userSchema = new mongoose.Schema({

//     firstName:{ type:String ,minlength:4, require:true  }, //schematype
//     lastName:String,
//     email:{type:String, unique:true  , match:/.+@.+\..+ / },
//     age:Number
// })

// const UserModel=mongos.Model ('user',userSchema) // user for table name and we define also the schema


// module.exports=UserModel