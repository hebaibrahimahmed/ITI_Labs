
function getData() {
    var xhttp = new XMLHttpRequest();
    var f_name, l_name, img
    var id = document.getElementById("id").value
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var dataAfterConvert = JSON.parse(this.responseText)
            for (var i in dataAfterConvert.data) {
                if (dataAfterConvert.data[i].id == id) {
                    document.getElementById("f_name").innerHTML = "firstName : " + dataAfterConvert.data[i].first_name
                    document.getElementById("l_name").innerHTML = "secondName : " + dataAfterConvert.data[i].last_name
                    document.getElementById("img").src = dataAfterConvert.data[i].avatar
                }
            }
        }
    }


    xhttp.open("GET", "https://reqres.in/api/users", true);
    xhttp.send();
}




function showSelect() {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var dataAfterConvert = JSON.parse(this.responseText)
            for (var i in dataAfterConvert.data) {
                document.getElementById("selection").innerHTML += `<option>${dataAfterConvert.data[i].first_name}</option>`
            }
        }
    }


    xhttp.open("GET", "https://reqres.in/api/users", true);
    xhttp.send();
}

function showData() {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var dataAfterConvert = JSON.parse(this.responseText)
            for (var i in dataAfterConvert.data) {
                var selc = document.getElementById("selection")

                if (selc.options[selc.selectedIndex].text == dataAfterConvert.data[i].first_name){
                    document.getElementById("ff_name").innerHTML = "firstName : " + dataAfterConvert.data[i].first_name
                    document.getElementById("ll_name").innerHTML = "secondName : " + dataAfterConvert.data[i].last_name
                    document.getElementById("iimg").src = dataAfterConvert.data[i].avatar
                }
                            
            }
        }
    }


    xhttp.open("GET", "https://reqres.in/api/users", true);
    xhttp.send();
}
