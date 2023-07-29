const { rejects } = require("assert");
const fs = require("fs");
const { parse, resolve } = require("path");



/////////////////////////////////////////////////////////////////////////////////////////

function asyncReadFile(filePath, encoding){
    return new Promise((resolve, rejects)=>{
        fs.readFile(filePath , encoding, (err, data)=>{
            if(!err) return resolve(data);
            return rejects(err)
        })
        
    })
}


///////////////////////////////////////////////////////////////////////////////////////


function asyncWriteFile(filePath, data){
    return new Promise((resolve, rejects)=>{
        fs.writeFile(filePath , data, (err)=>{
            if (!err) return resolve();
            return rejects(err);
        })
    })

}


////////////////////////////////////////////////////////////////////////////////////


function asyncExists(filePath) {
    return new Promise((resolve, reject)=>{
        fs.exists(filePath, (exist)=>{
            if(!exist) return reject(exist);
            return resolve(exist)
        })
    })
    
}
///////////////////////////////////////////////////////////////////////////////////



// if (!fs.existsSync('./db.json')) {

//     fs.writeFileSync('./db.json', JSON.stringify([]))

// }

// const fs = require('fs')


  async function check (){
   if ((await asyncExists("./db.json"))==false){
  await asyncWriteFile("./db.json", "[]");

   }

  }
//============== add function =========== 

async function add(data) {
    const todosString = await asyncReadFile('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)
    let last = todoList.length + 1
    todoList.forEach(elm => {

        if (elm.id == last) {

            last++
        }
    });
    const todo = {
        id: last,
        title: data.title,
        body: data.body,
        checked: false
    }
    todoList.push(todo)

    await asyncWriteFile('./db.json', JSON.stringify(todoList, null, 2))
    // asyncWrite('./db.json', JSON.stringify(todoList))
}

//===========  edit function  ==============

async function edit(data) {

    const todosString = await asyncReadFile('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)

    todoList.map((elm) => {
        if (elm.id == data.id) {

            elm.title = data.title
            elm.body = data.body
        }})

        await asyncWriteFile('./db.json', JSON.stringify(todoList, null, 2))
    }
//========== list function ================

async function list(data) {

    const todosString = await asyncReadFile('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)

    //console.log("heba")

    if (data.type == "ALL") {
        console.log(todoList)
    }

    else if (data.type == "checked") {
        console.log(todoList.filter(elm => elm.checked))
    }

    else (data.type == "unchecked")

    {
        console.log(todoList.filter(elm => !elm.checked))

    }

}
//========== remove function =============


async function remove(data) {

    const todosString = await asyncReadFile('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)

    todoList.map((element, index) => {
        if (element.id == data.id) {
            todoList.splice(index, 1)
        }
    })

    await asyncWriteFile('./db.json', JSON.stringify(todoList, null, 2))
}

///// check ///

async function check(data) {

   const todosString = await asyncReadFile('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)


    todoList.filter((elm) => {
        if (elm.id == data.id) {
            elm.checked = true

        }})

        await asyncWriteFile('./db.json', JSON.stringify(todoList, null, 2))
        
    }

///// uncheck ///

async function uncheck(data) {

  const todosString = await asyncReadFile('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)


    todoList.filter((elm) => {
        if (elm.id == data.id) {
            elm.checked = false

        }})

        await asyncWriteFile('./db.json', JSON.stringify(todoList, null, 2))
    }


module.exports = {
    add, edit, list, remove, check, uncheck
}


////////////////////////////////////////////////////////////////