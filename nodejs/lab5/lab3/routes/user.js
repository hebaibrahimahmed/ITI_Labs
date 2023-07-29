const express = require('express')
const router = express.Router()
const mongoose = require('mongoose')
const UserModel = require('../models/user')

//================== create user ============================

router.post("/", async(req,res)=>{
    try {
        const user ={
        ...req.body 
        }
        UserModel.create(user,(err,createduser)=>{
            if(!err) return res.json(createduser);
        
        });
    } catch (err) {
        res.status(500).send(err);
    }
})
    // const user = {
    //     ... req.body,
    // }
    // UserModel.create(user,(err,createduser)=>{
    //     if(!err) return res.json(createduser)
    //     res.status(500).send(err)
//     })
//  })


//====================list all==========================
reuter.get('/',async (req ,res)=>{
try {
    const users =   await userModel.find({});
    return res.json(users);
  } catch (err) {
      res.status(500).send(err)
  }


//     UserModel.find({},(err,users) => { 
//         if(!err){
//             return res.json(users)
//         }
//         res.status(500).json(err)
//     })
 })



//================find one =================================

router.get("/:id",(req,res)=>{

    try{
        ({_id: req.params.id}, (err, user)=>{
            if(!err) return res.json(user);
    })}

    catch(err)
    {res.status(500).send(err)}

})
//     const id = req.params.id
//     UserModel.find({_id:id},(err,user)=>{
//         if(!err){
//             return res.json(user)
//         }
//         res.status(500).json(err) 
//     })
//})

//=======================update all ==========================

reuter.put('/:id',async (req ,res)=>{

    try {
        userModel.updateOne({_id: req.params.id},{ 
            firstName: req.body.firstName,
            lastName: req.body.lastName,
            email: req.body.email,
            age: req.body.age},(err, user)=>{
            if(!err) return res.json(user);
           
        })
    } catch (err) {
        res.status(500).send(err)
    }
   
})
//======================delete all ============================

router.delete('/:id',(req,res) => {
    try {
        userModel.findByIdAndDelete({_id: req.params.id},(err, user)=>{
            if(!err) return res.json(user);
            
        })
    } catch (err) {
        res.status(500).send(err)
    }
        
    })
    
    
//     const id = req.params.id
//     UserModel.findByIdAndDelete({_id:id},(err,user)=>{
//         if(!err) return res.json(user)
//         res.status(500).send(err)
//     })
//})

module.exports = router;