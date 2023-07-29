////////////////////////////////////////////// 1)

class Rectangle {

    width:number
    height:number

    constructor (a:number, b:number)
    {

       this.width=a
       this.height=b
        
    }

     Circumference()
    {
        return (2 * (this.width + this.height));
    }
  
  static  whoiam()
{  
     console.log("iam arectangle");
}

};

/////////////////////////////////////////////////////////////////////////////   2)
class square extends Rectangle
{
  num:number;

    constructor(c:number)
    {
        super(c,c)
        this.width=this.height=c;
    }
    whoiam()
        {

            console.log("Im a square")
        }

        Circumference()
    {
        return ((this.num*2));
    }

}

//var rect= new Rectangle(2,3); 
//rect.Circumference();

//var squ=new square(3);
//square.displayName();

//////////////////////////////////////////////////////////////////////////// 3)

class Point {
  x: number;
  y: number;
  constructor(a: number, b: number) {
      this.x = a;
      this.y = b;
  }

  length (p1:Point ) {

       var ln:number=Math.sqrt((this.x + p1.y) + (this.y+p1.y));
       return ln;
      
  }

};


var p1 = new Point(0, 10);
var p2 = new Point(10, 20);
var p3 = p1.length (p2); 


////////////////////////////////////////////// 3)

///⦁	Types annotation, union types

var numberOne:number=10;
var fullName:string="heba ibrahim";
var isActive:boolean=true;


// ⦁	Function with typed arguments and return type.

function test(x:number, y:number){

     var l= x + y;
     return l; 
      }

function Fullname(firstName = "Will", lastName: string) {
    return firstName + " " + lastName;
  }
   

// ⦁	Function overriding

 var squ=new square(3);
 square.whoiam();


// ⦁	Interfaces & classes & inheritance
class Person
{
    personName:string;
    constructor(name)
    {
        this.personName=name;
    }
}

class Employee extends Person
{
    empCode;
    constructor(name,code)
    {
        super(name);
        this.empCode=code;
    }
}


// ⦁	Generics

function getArray(items:any[]):any[]
{
    return new Array().concat(items);
}

var numericArray=getArray([10,20,30,40]);

var stringArray=getArray(["Ahmed","Mohamed","Salma"]);

numericArray.push("Ahmed");
stringArray.push(20);

// ⦁	Enums

enum user{
    name="Ahmed",
    age=30,
    id
}