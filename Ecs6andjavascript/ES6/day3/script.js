//window.alert("Hello world")
// var isDeleted=confirm("Are you sure to delete this student ?")
// console.log(isDeleted)

//Timing functions
function showMsg()
{
    console.log("Hello World");
}
//setTimeout(showMsg,4000);
// var timeOut=setTimeout(function(){
//     console.log("Hello world");
//     //showMsg();
// },3000)

// clearTimeout(timeOut)


//setInterval(showMsg,2000);
// var interval;
// function startClock()
// {
// interval=    setInterval(function(){
//     var date= new Date();
//     document.getElementById("clock").innerHTML=date.toLocaleTimeString();
//     },1000)
// }

// function stopClock(){
//     clearInterval(interval)
// }

//open ("url","name or attribute (_blank by defualt)","specifications (width,height,menubar ,..)","Replace history")
// function openWidow()
// {
//     open("https://www.iti.gov.eg","_blank","width=300,height=300,top=50,left=50");
// }

function scrollPageTo()
{
 scrollTo(100,200);
}

function scrollPageBy()
{
 scrollBy(100,200);
}

function goToITI()
{
    location.href="https://www.iti.gov.eg";
}

//location.protocol
//location.search
//location.pathname
//location.hostname

function locationAssign()
{
 location.assign('https://www.iti.gov.eg');
}

function locationReplace()
{
 location.replace('https://www.iti.gov.eg');
}

function displayScreenWidth()
{
 console.log("Screen width is",screen.width);
}

function displayScreenAvailWidth(){
 console.log("Screen Avail Width is ",screen.availWidth)
}
function displayScreenHeight()
{
 console.log("Screen Height is ",screen.height);
}

function displayScreenAvailHeight()
{
 console.log("Scrren avail height is ",screen.availHeight)
}