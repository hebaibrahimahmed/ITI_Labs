const fs = require('fs');
const { resolve } = require('path');
const path = './db.JSon';


/////////////////////////////////////////////////////////////////////////////////////////
// function asyncReadFile(path, encoding) {
//     return new promise((resolve, reject) => {
//         fs.readFile(path, encoding, (err, data) => {
//             if (!err) { return resolve(data) }
//             reject(err)
//         })
//     }
//     )
// }
/////////////////////////////////////////////////


// function asyncexists(path) {

//     return new promise((resolve, reject) =>

//         fs.exists(path, (exists) => {
//             if (!exists) resolve(exists)

//             reject(err)
//         })
//     )
// }
////////////////////////////////////////////////////////////////////

// function asyncWrite(path, data) {
//     return new promise((resolve, reject) => {
//         fs.writeFile(path, data, (err) => {
//             if (err) { return reject(err) }
//             resolve
//         }
//         )})}


///////////////////////////////////////////////////////////////////////////////////



// if (!fs.existsSync('./db.json')) {

//     fs.writeFileSync('./db.json', JSON.stringify([]))

// }

// const fs = require('fs')




//============== add function =========== 

function add(data) {

    if (!fs.existsSync('./db.json')) {

 fs.writeFileSync('./db.json', JSON.stringify([]))
    
    }
    const todosString = fs.readFileSync('./db.json', 'utf8')
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

    fs.writeFileSync('./db.json', JSON.stringify(todoList, null, 2))
    // asyncWrite('./db.json', JSON.stringify(todoList))
}

//===========  edit function  ==============

function edit(data) {

    const todosString = fs.readFileSync('./db.json', 'utf8')

    const todoList = JSON.parse(todosString)

    todoList.map((elm) => {
        if (elm.id == data.id) {

            elm.title = data.title
            elm.body = data.body
        }})

        fs.writeFileSync('./db.json', JSON.stringify(todoList, null, 2))
    }
//========== list function ================

function list(data) {

    const todosString = fs.readFileSync('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)

    console.log("heba")

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


function remove(data) {

    const todosString = fs.readFileSync('./db.json', 'utf8')
    const todoList = JSON.parse(todosString)
    todoList.map((element, index) => {
        if (element.id == data.id) {
            todoList.splice(index, 1)
        }
    })

    fs.writeFileSync('./db.json', JSON.stringify(todoList, null, 2))
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


////////////////////////////////////////////////////////////////