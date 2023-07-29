

function showmsg(){

    console.log("Hello world");
}

var Timeout;

function StartTimeout()

{
    Timeout = setTimeout(showmsg,3000);

}

function ClearTimeout()

clearTimeout(Timeout)

//////////////////////////////////////////////////////

//(1)

var btn=document.getElementById('name');
btn.onclick=function validation()
{
 var tex=document.getElementById('textname')

 var letter= /^[A-Za-z]+$/
 if(tex.value.match(letter))
 {
    alert("True")
 }}
 
//////////////////////////////////////////////////
//(2)

var interval;

 function startClock()
 {
 interval= setInterval(function(){
     var date= new Date();
     document.getElementById("clock").innerHTML=date.toLocaleTimeString();
     },1000)
 }

 function stopClock(){
    clearInterval(interval)
   }


////////////////////////////////////////////////////

  function openWidow()
 {    open("page.html","_blank");
}
var Fname =document.forms['form']['Fname'];
var name_required =document.getElementById('Uname');

////////////////////////////////////////////////////////////
function validated() {

    var pw1 = document.getElementById("Pass").value;
    
if(Fname.value.length < 9){
    Fname.style.border="2px solid red";
    name_required.style.display="block";
     Fname.focus();
    return false;
}
if(Fname == "") {  
    document.getElementById("Uname")
   return false;  
  }  
}
/////////////////////////////////////////////////////

var btn=document.getElementById('Subm');
btn.onclick=function addEtobody()
{
let h1=document.createElement('h1');
h1.textContent='Welcome';
document.body.appendChild(h1);
}

    
