function requestBlood() {
    var blood_group = document.getElementById("blood_group_request").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("donor_list").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "bank.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("blood_group=" + blood_group + "&submit_request=1");
}