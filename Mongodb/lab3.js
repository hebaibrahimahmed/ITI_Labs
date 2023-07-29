use inventory

db.employee.find();
db.department.find();

/////////////////////////////////--------1-------//////
db.employee.aggregate([
  {
    $lookup: {
      from: "department",
      localField:"department_id",
      foreignField: "department_id",
      as: "depName",
    },
},
  
  {$project:{_id:0,"full_name":1,"depName.department_description":1}},
  
])
///////////////////////////////-----------question 2&4---------///////////////////////////////////
  
db.employee.find({position_title:"VP Country Manager"},{_id:0,full_name:1,salary:1})
db.product.find({brand_name:"Washington"},{product_name:1,brand_name:1})

/////////////////////////////////////////////-----------3----------//////////////////////////////

db.customer.aggregate([
  {
    $lookup: {

      from:"region",
      localField:"address.customer_region_id",
      foreignField:"region_id",
      as:"regionName",

    },

  },

  {

  $project:{

      "fullname":1,
      "regionName.sales_region":1,
      "_id":0
  }

  },

 ])

 
 
 
 
 
 
 
 
 
 
 
 





