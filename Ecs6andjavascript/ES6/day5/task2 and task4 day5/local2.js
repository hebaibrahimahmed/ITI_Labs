

//task2 day5

function check(){
    var user=document.getElementById("ele").value;
    var pas=document.getElementById("pas").value;
    var checkbo=document.getElementById("checkbox");
    
    if(checkbo.checked){
       alert("Add username and password Successfully");
       localStorage.setItem("username",user);
        localStorage.setItem("password",pas); 
    //    var getuser=localStorage.getItem("username");
    //     var getpas=localStorage.getItem("password");
    //     document.getElementById("ele").value=getuser;
    //     document.getElementById("pas").value=getpas;
    }
    else{
    alert("remove username and password Successfully");
    localStorage.removeItem("username");
    localStorage.removeItem("password");
    

}}
////////////////////////////  task4 day5

persons=[
    {
        "id" :"12",
        "name":"heba",
        "Age" :25,
        "Address":"sohag",
        "Skill":["palying football","reading","painting"],
        "IsLeader" :true,
    },
    {
        "id" :"124",
        "name":"ahmed",
        "Age" :23,
        "Address":"assiut",
        "Skill":["music","reading","painting"],
        "IsLeader" :true,
    },
    {
        "id" :"125",
        "name":"micheal",
        "Age" :22,
        "Address":" ",
        "Skill":["palying","reading","painting"],
        "IsLeader" :true,
    }
]
console.log(persons[0].name);
console.log(persons[1].name);