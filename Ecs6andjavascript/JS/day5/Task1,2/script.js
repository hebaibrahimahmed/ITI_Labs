
///////////////////////////////////////////////////////////////////////////

(1)

function getData(){
    var xhttp= new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4)
        {
            var dataAfterConvert=JSON.parse(this.responseText);
            console.log(dataAfterConvert[0].userId);
        }
    }

    xhttp.open("GET","https://jsonplaceholder.typicode.com/posts",true);
    xhttp.send();

}

function setData()
{
   var data= document.getElementById("txtName").value; 
 localStorage.setItem("userData",data)
 //sessionStorage.setItem("userData",JSON.stringify())

 alert("Data Saved!!")
}

function getData()
{
 var input = document.getElementById("txtName");
 var input1 = document.getElementById("password");
 var data= localStorage.getItem("userData")//localStorage.getItem("userData");
 input.value=data;
}
///////////////////////////////////////////////////////////////////////

//(2)

function saveData(){

    
    const remembMe = document.getElementById("Rememberme"),
         nameInput = document.getElementById("username");
         passData = document.getElementById("password");

if (remembMe.checked ) {
   // remembMe.setAttribute("checked", "checked");
      localStorage.username = nameInput.value ;
      localStorage.password = passData.value; 
} else {
   // remembMe.removeAttribute("checked");
    localStorage.removeItem("username");
    localStorage.removeItem("password");
}

function setData() {
    if (remembMe.checked) {
        localStorage.username = nameInput.value;
        localStorage.password = passData.value;
        //localStorage.checkbox = remembMe.value;
    } else {
        localStorage.username = "";
        localStorage.password = "";
       // localStorage.checkbox = "";
    }

}}

////////////////////////////////////////////////////////////

// //(3)

// var obj= {
//     firstName:"Ahmed",
//     lastName:"Mohamed",
//     age:25,
//      ID :111,
//      ISLeader: true,
//     Skills : ["softskills","leadershipskills"],
//     //  Skills = new Array("softskills", "leadershipskills","presentationskills"), 
//      address: gomhuria,
//  phones:[123,456,7789],
//  //"getFullName":function(){

//  }
// console.log(obj.firstName);
// console.log(obj.address);
// console.log(obj.age)


////////////////////////////////////////////////////////////////////

