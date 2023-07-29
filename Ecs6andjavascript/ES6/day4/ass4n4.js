var p=document.getElementById("pi");
var e=document.getElementById("pe"); 
var questionsection=document.getElementById("question"); 
var narry=["What's something that no one would guess about you?","What do you believe in?","If you could be doing anything, anywhere right now, what and where would it be?","What do you wish you had done differently in your life?","What are you doing to improve yourself?","What's one thing you've had to overcome in your life?","What's the most important thing to you?","What did you learn about yourself from your previous relationships?","How do you handle being in a bad mood?","What do you wish someone would ask you?"]
var index=0;
questionsection.innerHTML= narry[0];
function next(){
    index++;
    if(index==10)
        index=0;
    questionsection.innerHTML= narry[index];
}
function previous(){
    index--;
    if(index==-1)
        index=9;
    questionsection.innerHTML= narry[index];
}