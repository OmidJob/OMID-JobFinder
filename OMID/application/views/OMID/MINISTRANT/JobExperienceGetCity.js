/**
 * Created by Lenovo on 7/4/2017.
 */
function GetCity(StateId)
{
    var url = '../UpdateCities/'+ StateId;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("CityId").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();


}
