const express = require('express')
const mongoose = require("mongoose");
const bcrypt = require ('bcrypt')
const jwt = require ('jsonwebtoken')
const auth = require("./middlewares/auth");
const DB_URL = process.env.DB_URL || "mongodb://127.0.0.1:27017/auth"
const port = process.env.PORT || 5000
const userModel = require('./models/user')
const app = express()
app.use(express.json())
const user = require("./models/user")
const TOKEN_KEY =process.env.TOKEN_KEY||"heba" 

app.use("/welcome", auth, (req, res) => {
  console.log(req.user)
  res.status(200).send("Welcome 🙌 ");
})

//========register=========

app.post("/register", async (req, res) => {

    try {
        const { first_name, last_name, email, password } = req.body;

        if (!(email && password && first_name && last_name)) {
            res.status(400).send("All input is required");
        }
        const oldUser = await userModel.findOne({ email });

        if (oldUser) {
            return res.status(409).send("User Already Exist. Please Login");
        }

        encryptedPassword = await bcrypt.hash(password, 10);

        const user = await userModel.create({
            first_name,
            last_name,
            email: email.toLowerCase(),
            password: encryptedPassword,
        });

        // Create token 
        const token = jwt.sign(
            { user_id: user._id, email },
             TOKEN_KEY,
        );
       
        user.token = token;
        res.status(201).json(user);
    } catch (err) {
        console.log(err);
    }
});
//==========================login==================

app.post("/login", async (req, res) => {

    try {
     
      const { email, password } = req.body;
      //validation
      if (!(email && password)) {
        res.status(400).send("All input is required");
      }
      // Validate if user exist in our database
      const user = await userModel.findOne({ email });
  
      if (user && (await bcrypt.compare(password, user.password))) {
        // Create token
        const token = jwt.sign(
          { user_id: user._id, email },
            TOKEN_KEY,
          {
            expiresIn: "2h",
          }
        );
               
        
        user.token = token; 
        res.status(200).json(user);
      }
      res.status(400).send("Invalid Credentials");
    } catch (err) {
      console.log(err);
    }
  });
  //===================== welcome ==========================================

 









//====================================================

mongoose.connect(DB_URL, (err) => {
    if (!err) return console.log("database connected");
    console.log("err")
})


app.listen(port,(err=>{
    if (!err) return console.log(`server starts at port  ${port} `);
    console.log('err')
}
    ))  