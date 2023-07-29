//console.log("hello")
import users from './users.json'
console.log(users.length);
// let myName :string   -- myName =getname()
//function mulyoi(n1:number , n2:number){ return n1*n2}

////==============================que 1====================================


let sortTheArray = users.sort((a, b) => (a.username > b.username ? -1 : 1));
console.log(sortTheArray)

//let sortTheArray = users.sort((a, b) => a.localeCompare(b, "username", { username: true }));
//console.log(sortTheArray)



//================================que 2================================

parseInt("5")
//(latitude, longitude) [(-37.1496, 81.1496) ... (-68.6102, 62.5342)]

var arr1 = users.filter((user)=>
  parseFloat(user.address.geo.lat)>= -37.1496
&& parseFloat(user.address.geo.lat)<= -68.6102
&& parseFloat(user.address.geo.lat)<= 81.1496
&& parseFloat(user.address.geo.lat)>= 62.5342
)
console.log(arr1)

// let arr1 = users.filter(function(lat,lng) =>
// {
// users.forEach(function (name){

//     if (( users.address.geo.lat =-37.1496, 81.1496) &&( users.address.geo.lng =-68.6102, 62.5342) )

//     console.log(name)

//     return arr1;
// })
// })

//===========================que3======================================



let geolocation:string[]= users.map(user=>
 `ID:${user.id} -->https://google.map?d=${user.address.geo.lat}. ${user.address.geo.lng}`)

console.log(geolocation)



//============================que 4=====================================

class Person {
    name: string;
    address: string;
    phoneNumber: string;
    emailAddress: string;

    constructor(name: string, address: string, phoneNumber: string, emailAddress: string) {
        this.name = name;
        this.address = address;
        this.phoneNumber = phoneNumber;
        this.emailAddress = emailAddress;
    }

    toString():string { 
        return `Class Name : Person\nName : ${this.name}`; 
    } 
}

//==============================================================

class Employee extends Person { 

    office: string ; 
    salary: number ; 
    dateHired: Date ;  

    constructor(name :string , address :string , phoneNumber :string , emailAddress :string , office :string , salary :number , dateHired :Date ){  

        super(name , address , phoneNumber , emailAddress);  

        this.office= office ;  
        this.salary= salary ;  
        this.dateHired= dateHired ;     

    }     

    toString():string{     

        return `Class Name : Employee\nName ${this.name}\nOffice ${this.office}\nSalary ${this.salary}\nDate Hired ${this.dateHired}`;     

    }  
} 

//=======================================================
class Faculty extends Employee{ 
officeHours: number ;
rank: string ;
constructor(name: string , address: string , phoneNumber: string , emailAddress: string , officeHours: number , rank: string,office:string,salary:number,dateHired:Date)
{          
    super(name,address,phoneNumber,emailAddress,office,salary,dateHired); 
    this.officeHours=officeHours;        
    this.rank=rank; 
}
toString():string{
return `Class Name Faculty \nName ${this.name}\nOffice Hours ${this.officeHours}\nRank ${this.rank}`;     
}             
}       

//=======================================================

class Staff extends Employee
{   
title: String;
constructor(name: string , address: string , phoneNumber: string , emailAddress: string , officeHours: number , rank: string,office:string,salary:number,dateHired:Date,title:string)
{
super(name,address,phoneNumber,emailAddress,office,salary,dateHired); 
 this .title=title 
}  
toString():string
{     
return `Class Name Staff \nName${this . name}\nt`
}
}


