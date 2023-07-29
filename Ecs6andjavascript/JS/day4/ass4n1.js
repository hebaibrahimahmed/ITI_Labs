//1
var clear1,clear2,temp;
function Do(currentImage)
{
 var chan =1;
 var curr=currentImage
 clearInterval(clear2)
 clear1=setInterval(function(){
 curr.style.opacity = chan;
        chan=chan-0.3;
        temp=chan;
    },100)
}
            

  function unDo(currentImage){
  
    var chan=temp;
    var curr=currentImage;
    clearInterval(clear1)
    clear2=setInterval(function(){
        curr.style.opacity = chan;
        chan=chan+0.3;
    },100)
  }