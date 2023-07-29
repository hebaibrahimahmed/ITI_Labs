"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
//console.log("hello")
const users_json_1 = __importDefault(require("./users.json"));
console.log(users_json_1.default.length);
// let myName :string   -- myName =getname()
//function mulyoi(n1:number , n2:number){ return n1*n2}
////==============================que 1====================================
let sortTheArray = users_json_1.default.sort((a, b) => (a.username > b.username ? -1 : 1));
console.log(sortTheArray);
//let sortTheArray = users.sort((a, b) => a.localeCompare(b, "username", { username: true }));
//console.log(sortTheArray)
//================================que 2================================
//(latitude, longitude) [(-37.1496, 81.1496) ... (-68.6102, 62.5342)]
var arr1 = users_json_1.default.filter((user) => user.address.geo.lat >= "-37.1496"
    && user.address.geo.lat <= "-68.6102"
    && user.address.geo.lat <= "81.1496"
    && user.address.geo.lat >= "62.5342");
console.log(arr1);
// let arr1 = users.filter(function(lat,lng) =>
// {
// users.forEach(function (name){
//     if (( users.address.geo.lat =-37.1496, 81.1496) &&( users.address.geo.lng =-68.6102, 62.5342) )
//     console.log(name)
//     return arr1;
// })
// })
//===========================que3======================================
let geolocation = users_json_1.default.map(user => `ID:${user.id} -->https://google.map?d=${user.address.geo.lat}. ${user.address.geo.lng}`);
console.log(geolocation);
//============================que 4=====================================
class Person {
    constructor(name, address, phoneNumber, emailAddress) {
        this.name = name;
        this.address = address;
        this.phoneNumber = phoneNumber;
        this.emailAddress = emailAddress;
    }
    toString() {
        return `Class Name : Person\nName : ${this.name}`;
    }
}
//==============================================================
class Employee extends Person {
    constructor(name, address, phoneNumber, emailAddress, office, salary, dateHired) {
        super(name, address, phoneNumber, emailAddress);
        this.office = office;
        this.salary = salary;
        this.dateHired = dateHired;
    }
    toString() {
        return `Class Name : Employee\nName ${this.name}\nOffice ${this.office}\nSalary ${this.salary}\nDate Hired ${this.dateHired}`;
    }
}
//=======================================================
class Faculty extends Employee {
    constructor(name, address, phoneNumber, emailAddress, officeHours, rank, office, salary, dateHired) {
        super(name, address, phoneNumber, emailAddress, office, salary, dateHired);
        this.officeHours = officeHours;
        this.rank = rank;
    }
    toString() {
        return `Class Name Faculty \nName ${this.name}\nOffice Hours ${this.officeHours}\nRank ${this.rank}`;
    }
}
//=======================================================
class Staff extends Employee {
    constructor(name, address, phoneNumber, emailAddress, officeHours, rank, office, salary, dateHired, title) {
        super(name, address, phoneNumber, emailAddress, office, salary, dateHired);
        this.title = title;
    }
    toString() {
        return `Class Name Staff \nName${this.name}\nt`;
    }
}
