
const express = require('express'); 
const port = process.env.PORT || 5000;
const app= express();
app.use(express.json())
const {title}=require('process')
const fs = require ('fs')
const helpers = require('./helpers')
const FILE_path = process.env.FILE_path || './db.json'
const {request}=require('http')

/// ===========add====================

app.post('/todo', (req, res) =>{
    helpers.add(req.body)
    res.send(`is added`)
})
    
//================edit==================
app.put('/todo/:id', (req,res) =>
{
    const preparedData={
        id:req.params.id,
        title:req.body.title,
        body:req.body.body,
        checked:req.body
        }
   helpers.edit(preparedData);
    res.send("edit success")
})

//===========list==================

app.get('/todo/:type', (req,res) =>
{
  const preparedData ={

  type:req.params.type

  }
 const list = helpers.list(preparedData)
 res.send(list)

})

//============delete===================

    app.delete('/todo/:id',(req,res)=>{
        const preparedData={
            id:req.params.id,
            }
       helpers.remove(preparedData);
        res.send("delete success")
    })


app.listen(port,(err=>{
    if (!err) return console.log(`server starts at port  ${port} `);
    console.log('err')
}
    ))  

