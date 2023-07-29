const { Router } = require('express');
const express = require ('express');
const {resourceLimits}= require('worker_threads');
// const {populate} = require('../models/post');
const postModel = require('../models/post')
const router = express.Router()

//==========================================================

router.get('/', (req,res)=>
{
    postModel.find({}, (err,posts)=>
    {
if (!err){
    return  res.json(posts)
}
res.status(500).json(err)
    }) 
    populate('author');
})

router.get('/', (req,res)=>

{
    const id = req.params.id
    res.send(`getting data of post ${id}`)

})

///////
//================== create post ============================

router.post("/add",(req,res)=>{
    const post = {
        ...req.body,
    }
    console.log("test");
    postModel.create(post,(err,createdpost)=>{
        if(!err) return res.json(createdpost)
        res.status(500).send(err)
    })
})


//====================list all==========================

router.get('/',(req,res)=>{
    postModel.find({},(err,posts) => { 
        if(!err){
            return res.json(posts)
        }
        res.status(500).json(err)
    })
})



//================find one =================================

router.get("/:id",(req,res)=>{
    const id = req.params.id
    postModel.find({_id:id},(err,post)=>{
        if(!err){
            return res.json(post)
        }
        res.status(500).json(err) 
    })
})

//=======================update all ==========================

router.patch('/:id',(req, res) => {
    const id = req.params.id
    const updates = req.body
    postModel.findByIdAndUpdate(id,updates,(err,post)=>{
            if(!err) return res.json(post)
            res.status(500).send(err)
        })
})
//======================delete all ============================

router.delete('/:id',(req,res) => {
    const id = req.params.id
    postModel.findByIdAndDelete({_id:id},(err,post)=>{
        if(!err) return res.json(post)
        res.status(500).send(err)
    })
})

module.exports = router;