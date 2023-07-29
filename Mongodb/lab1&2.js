
use iti

db.getCollection('instructors').find({})

db.instructors.insertOne({firstName:"Heba",lastName:"Ibrahim"}) 

db.instructors.insertOne({firstName:,lastName:})//error 


let instructorsArray=[{_id:6,firstName:"noha",lastName:"hesham",

                age:21,salary:3500,

                address:{city:"cairo",street:10,building:8},

                courses:["js","mvc","signalR","expressjs"]},

                

                {_id:7,firstName:"mona",lastName:"ahmed",

                age:21,salary:3600,

                address:{city:"cairo",street:20,building:8},

                courses:["es6","mvc","signalR","expressjs"]},

                

                {_id:8,firstName:"mazen",lastName:"mohammed",

                age:21,salary:7040,

                address:{city:"Ismailia",street:10,building:8},

                courses:["asp.net","mvc","EF"]},

                

                {_id:9,firstName:"ebtesam",lastName:"hesham",

                age:21,salary:7500,

                address:{city:"mansoura",street:14,building:3},

                courses:["js","html5","signalR","expressjs","bootstrap"]}

				,

				{

	"_id": 10,

	"firstName": "badr",

	"lastName": "ahmed",

	"age": 22.0,

	"salary": 5550.0,

	"address": {

		"city": "cairo",

		"street": 10.0,

		"building": 8.0

	},

	"courses": [

		"sqlserver",

		"mvc",

		"signalR",

		"asp.net"

	]

},

{

	"_id": 2,

	"firstName": "mona",

	"lastName": "mohammed",

	"age": 21.0,

	"salary": 3600.0,

	"address": {

		"city": "mansoura",

		"street": 20.0,

		"building": 18.0

	},

	"courses": [

		"es6",

		"js",

		"mongodb",

		"expressjs"

	]

},

{

	"_id": 3,

	"firstName": "mazen",

	"lastName": "ali",

	"age": 30.0,

	"salary": 7010.0,

	"address": {

		"city": "cairo",

		"street": 10.0,

		"building": 5.0

	},

	"courses": [

		"asp.net",

		"mvc",

		"EF"

	]

},

{

	"_id":4,

	"firstName": "ebtesam",

	"lastName": "ahmed",

	"age": 28.0,

	"salary": 6200.0,

	"address": {

		"city": "mansoura",

		"street": 14.0,

		"building": 7.0

	},

	"courses": [

		"js",

		"html5",

		"signalR",

		"expressjs",

		"bootstrap",

		"es6"

	]

}

                ];


db.instructors.insertMany(instructorsArray)

db.getCollection('instructors').find() //display all the collection

db.getCollection('instructors').findOne() //display one or the firstName i had added

db.getCollection('instructors').find().constructor.name // DBQuery

db.instructors.find({}).forEach((document)=>{print(document)}); // our table was shown

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
use iti
let instructors =db.instructors.find({},{salary:1}).toArray();



let count =db.instructors.find({},{salary:1}).count();
let avg=0;

let sum=0;

 min=instructorsArray[0].salary;
 max=0;
db.instructors.find().forEach((document)=>{
    
  

            if(document.salary>max)

            {

                max=document.salary

            }

            if(document.salary<min)

            {

                min=document.salary

            }

        //sumSal(object.salary)

        count++;

});

avg=sum/count;

print(min);

print(max);

print(sum);

print(avg);

print(count);

--------------------------------------day2--------------------------------------------------- 

use iti

db.instructors.find(); //display 



//db.instructors.find({salary:{$exists:true},{$gt:4000}},{salary:1});



db.instructors.find({salary:{$gt:4000}},{firstName:1,salary:1}); //display instructors with salary gt 4000



db.instructors.find({age:{$lte:25}})  /// find the instructors with ages less than or equal 25.



db.instructors.find({"address.city":"mansoura","address.street":

    {$in:[10, 14]}},{firstName:1,address:1,salary:1}) // to display the inst in mansoura , street 14,10



//////////////////////////////////////////////////////



 db.instructors.find({courses:{$all:["js","jquery"]}},{firstName:1,courses:1}); // no records / there is no jquery course

 db.instructors.find();

 

 /////////////////////////////////////////////////

db.instructors.find({"courses":{$exists:true}},{}).forEach((document) => {



print(document.firstName +" "+ document.courses.length)



    });



////////////////////////////////////////////////////////////////

    

db.instructors.find({"firstName":{$exists:true},"lastName":{$exists:true},"age":

{$exists:true}},{firstName:1,lastName:1,age:1}).sort({firstName:-1,lastName:-1})

db.instructors.find().forEach((object)=>{

    

        print(`fullName: ${object.firstName} ${object.lastName} ${object.age}` )

    })

    

     

///////////////////////////////////////////////////////////////

      

      db.instructors.deleteOne({firstName:"ebtesam"}); // to delete ins ebtesam

      

///////////////////////////////////////////////////////////

      

 db.instructors.updateMany({}, {

  $set:{Active:true} 

})



db.instructors.find();

///////////////////////////////////////////////////////////



db.instructors.updateMany({firstName:"mazen",lastName:"mohammed",courses:"EF"},{$set:{"courses.$":"jquery"}})

      // to add jquery to courses 



db.instructors.find();

  



//////////////////////////////////////////////////////

 

db.instructors.updateMany({firstName:"noha",lastName:"hesham"},{$addToSet:{courses:"jquery"}})



////////////////////////////////////////////////////



db.instructors.deleteMany({firstName:"ahmed",lastName:"mohamed"},{$unset:{courses:""}})



////////////////////////////////////////////////////

db.instructors.updateMany({courses:3},

{

  $inc: {

    salary:-500

  }

})

/////////////////////////////////



   

   db.instructors.updateMany({},

{

  $rename: {

    address: "fulladdress"

  }

})



  db.instructors.find(); 

   

  /////////////////////////////////////////

 

   db.instructors.updateOne({ firstName:"noha"}, // to change noha's address to 20

{

  $set: {

   "address.street":20

  }

})



db.instructors.findOne({"firstName":"noha"})

 ///// ////////////////////////////////////////////// 

   

   

   

   

      

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

     

    

    

    





     

                   

                   

                   

                   

                    

                    
































