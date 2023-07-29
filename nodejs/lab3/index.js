const express = require("express");
const mongoose = require("mongoose");
const PORT = process.env.PORT || 5001;
const app = express();
app.use(express.json());


//////////////////////////////////////////////

mongoose.connect("mongodb://127.0.0.1:27017/logginng", (err) => {
  if (!err) return console.log("Databases connect successfuly :))");
  console.log(err);
});

const userroutes = require("./routes/user");
const postroutes = require("./routes/post");
app.use("/user", userroutes);
app.use("/post", postroutes);

app.listen(PORT,(err=>{
    if (!err) return console.log(`server starts at port  ${PORT} `);
    console.log('err')
}
    ))  








