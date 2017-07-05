/**
 * Created by Lenovo on 7/4/2017.
 */
function GetJobGroup(ServiceCategoryId)
{
    var url = '../UpdateJobGroups/'+ ServiceCategoryId;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("JobGroupId").innerHTML = this.responseText;
            GetSkill(document.getElementById("JobGroupId").value);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();


}
