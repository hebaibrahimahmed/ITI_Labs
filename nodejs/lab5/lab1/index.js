//node index.js add title=title1 body=body1
//node index.js edit id=1 title=title1 body=body1
//
//node index.js remove id=1


const helpers = require('./helpers')

function prepareData(data) {

    const preparedData = data.reduce((prev,elm,index,arr)=>{
       
        const[key, value] = elm.split('='); 
        prev[key] = value
        return prev 
    }, {}) 

    return preparedData;
}


function main(cmdArgs){

const [, ,operation, ...data] = cmdArgs
const preparedData = prepareData(data)
console.log(operation)


    switch(operation){
      case "add":
          helpers.add(preparedData)
        break;
    
      case "edit":
           helpers.edit(preparedData)
        break;

      case "list":
           helpers.list(preparedData)
        break;
    
      case "remove":
            helpers.remove(preparedData)
        break;
      case "check":
            helpers.check(preparedData)
        break;
      case "uncheck":
            helpers.uncheck(preparedData)
        break;
      default:
        break;
    }  
}

main(process.argv)




