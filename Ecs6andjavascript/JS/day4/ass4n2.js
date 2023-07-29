//1
function col(){
    var arr=["red","blue","yellow","green","black"];
        var rs=document.getElementsByClassName("ne");
        for(var i=0;i<rs.length;i++){
        var ch=Math.floor(Math.random()*5);
        rs[i].style.color=arr[ch];
        var cha=Math.floor(Math.random()*5);
        rs[i].style.backgroundColor=arr[cha];


        }
}

function back(){
    var ar=["green","red","yellow","blue"];
    var sp=document.getElementsByClassName("ne");
    for(var i=0;i<sp.length;i++){
        var rm=Math.floor(Math.random()*5);
        sp[i].style.backgroundColor=ar[rm];
    }

}
