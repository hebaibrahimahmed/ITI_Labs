const fs = require('fs');

const path = './db.JSon';


if (!fs.existsSync('./db.json')) {

    fs.writeFileSync('./db.json', JSON.stringify([]))

}


//============== add function =========== 



function add(data) {

    const todosString = fs.readFileSync('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)
    let last =  todoList.length + 1
    todoList.forEach(elm => {
        
        if(elm.id== last){

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

    fs.writeFileSync('./db.json', JSON.stringify(todoList))
}

//===========  edit function  ==============

function edit(data) {

    const todosString = fs.readFileSync('./db.json', 'utf8')

    const todoList = JSON.parse(todosString)

    todoList.map((elm) => {
        if (data.id = elm.id) {

            elm.title = data.title
            elm.body = data.body

        }
    }
    )

    fs.writeFileSync('./db.json', JSON.stringify(todoList))
}
//========== list function =============

function list(data) {

    const todosString = fs.readFileSync('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)

    console.log("heba")

if (data.type=="ALL")
     {        
         return(todoList)
    }

   else if (data.type=="checked")
    {
        return (todoList.filter(elm =>elm.checked))
    }

    else (data.type=="unchecked")
  
  {
    return(todoList.filter(elm =>!elm.checked))

  }

}
//========== remove function =============


function remove(data) {
    
    const todosString = fs.readFileSync('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)

    todoList.map((elm) => {
      if (data.id == elm.id) {
        todoList.splice(data.id - 1, 1)
      } } )

    fs.writeFileSync('./db.json', JSON.stringify(todoList))
  }

///// check ///

function check(data) {

    const todosString = fs.readFileSync('./db.json', 'utf8')

    const todoList = JSON.parse(todosString)

    todoList.filter((elm) => {
        if (elm.id == data.id) {
            elm.checked = true

        }})

        fs.writeFileSync('./db.json', JSON.stringify(todoList, null, 2))
    }

///// uncheck ///

function uncheck(data) {

    const todosString = fs.readFileSync('./db.json', 'utf8')

    const todoList = JSON.parse(todosString)

    todoList.filter((elm) => {
        if (elm.id == data.id) {
            elm.checked = false

        }})

        fs.writeFileSync('./db.json', JSON.stringify(todoList, null, 2))
    }


module.exports = {
    add, edit, list, remove, check, uncheck
}
