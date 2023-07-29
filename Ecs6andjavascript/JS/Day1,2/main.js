document.write("welcome to my site");

let person = prompt("Please enter your name", "Heba Ibrahim");

if (person != null) {
  "Welcome " + person + "! Heba Ibrahim?";
}


function cToF(celsius) 
{
  var cTemp = celsius;
  var cToFahr = cTemp * 9 / 5 + 32;
  return cToFahr;
}
console.log(cToF(36))

function FtoC(fahrenheit){
    let celcius = fahrenheit*5/9 -32;
    return celcius;
}
console.log(FtoC(20))

function max_of_three(x, y, z) 
 {
  max_val = 0;
  if (x > y)
  {
    max_val = x;
  } else
  {
    max_val = y;
  }
  if (z > max_val) 
  {
    max_val = z;
  }
  return max_val;
}

let num=12;

for(a=1; a<=12; a++){

const output=num*5;

console.log(output);
}

var obj={
    "firstName":"Heba",
    "age": "25",
    "address":"15.omar makram",
    "phone": "01143711036",
    "Track": "OS",
}   
 
//////////////////////////////////////////////////

Day2


 var arr = ["hello", "hi","welcome", "plz click here","hello", "hi","welcome", "hello", "hi","thanks","hello"];

   var i = Math.ceil(Math.random()*10); 
  document.write (arr[i])

/////////////////////////////////////////////////


   var d = new Date()

 function showDate()
 {
  document.write(d.toLocaleDateString()) 
  document.write(d.toLocaleTimeString()) 
 }

 //////////////////////////////////////////////////

var arr= new Array (1,2,3,2,3,5,4,4,5,6)
function getnum( arr2 , num){

  var count =0;
  for (var i = 0; i<10 ; i++)
  {
    if (arr[0]==num)
    count ++
    
  }
return count;
}
var result = getnum(arr,4)
document.write(result);
console.log(result);

/////////////////////////////////////////////
var arr= new Array ("h","g","s","r")
function removeitem( arr2 , ch){


  for (var i = 0; i<10 ; i++)
  {
    if (arr2[i]==ch) 
    {
      arr2.splice(i,1);
    }
  }
}
removeitem(arr,"h");

for (var i = 0; i<4 ; i++)
{
  document.write (arr[i]);
}
///////////////////////////////////////////////////////

var arr= new Array (1,9,3,6,7,5,4,8,5,6)
function MaxOfNum(arr2){
var max ;
max=arr2[0];
  for (var i = 0; i<10 ; i++)
  {
    if (max<arr2[i]) 
    {
     max=arr2[i]
    }
  }
  return max;
}
 var a = MaxOfNum(arr);

  document.write(a);























