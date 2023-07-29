function change_type(){
    var test=document.getElementById("tran");
    var img=document.getElementById("img");
    i=document.getElementById("tran");
    if(test.type=="text"){
        test.type="Password";
        img.src="pic/2874802.png"
    }
    else{
        test.type="text";
        img.src="pic/2710718.png"
    }
}