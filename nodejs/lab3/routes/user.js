const express = require('express')
const router = express.Router()
const mongoose = require('mongoose')
const UserModel = require('../models/user')

//================== create user ============================

router.post("/",(req,res)=>{
    const user = {
        ... req.body,
    }
    UserModel.create(user,(err,createduser)=>{
        if(!err) return res.json(createduser)
        res.status(500).send(err)
    })
})


//====================list all==========================

router.get('/',(req,res)=>{
    UserModel.find({},(err,users) => { 
        if(!err){
            return res.json(users)
        }
        res.status(500).json(err)
    })
})



//================find one =================================

router.get("/:id",(req,res)=>{
    const id = req.params.id
    UserModel.find({_id:id},(err,user)=>{
        if(!err){
            return res.json(user)
        }
        res.status(500).json(err) 
    })
})

//=======================update all ==========================

router.patch('/:id',(req, res) => {
    const id = req.params.id
    const updates = req.body
    UserModel.findByIdAndUpdate(id,updates,(err,user)=>{
            if(!err) return res.json(user)
            res.status(500).send(err)
        })
})
//======================delete all ============================

router.delete('/:id',(req,res) => {
    const id = req.params.id
    UserModel.findByIdAndDelete({_id:id},(err,user)=>{
        if(!err) return res.json(user)
        res.status(500).send(err)
    })
})

module.exports = router;