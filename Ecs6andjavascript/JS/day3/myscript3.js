alert("hello")

//1
//function onlyAlphabets() {

   // var regex = /^[a-zA-Z]*$/;
   // if (regex.test(document.f.nm.value)) {
      //  return true;
    //} else {
        //document.getElementById("notification").innerHTML = "Alphabets Only";
        //return false;
    //}
  
  //}
  //1
  function allLetter(inputtxt)
  {
    fullName = document.getElementById('name').value;
    console.log(fullName);
    var letters = /^([a-z|A-Z]{3,})$/;
   if(letters.test(fullName))
     { 
         document.getElementById("all").innerHTML = "mrhhhbaaaa bel 3'alieee";   
     } else
     { alert("message");  }
  }
  //2
 var interval;
 function start()
{
   interval= setInterval(function (){
var date=new Date();
document.getElementById("clock").innerHTML=date.toLocaleTimeString(); },1000)
}

function day()
{
    setInterval(function()
    {
        var date1 =new Date();
document.getElementById("day").innerHTML=date1.toLocaleDateString();
    },1000)
}
function stop(){
clearInterval(interval)
}


//3
var win;
function gonew()
{
     setTimeout(function(){
        win =  open("newbage.html","blank")
    },3000)
    
}
function exittt(){
    win.close();
}
//5
function ScrollV(){
    scrollBy(100,200);
 }
 
 setInterval(ScrollV,2000);
 //

