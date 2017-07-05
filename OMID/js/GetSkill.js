/**
 * Created by Lenovo on 7/4/2017.
 */
function GetSkill(JobGroupId)
{
    var url = '../UpdateSkills/'+ JobGroupId;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("SkillId").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();


}
