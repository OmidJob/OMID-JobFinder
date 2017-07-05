/**
 * Created by Lenovo on 7/4/2017.
 */
function GetMilitaryServiceStatus(SexId)
{

    if(SexId=='WOMAN') {

        document.getElementById("MilitaryServiceStatus").selectedIndex = 5;
        document.getElementById("MilitaryServiceStatus").disabled = true;
    }

    else if(SexId=='MAN' || SexId=='NOT_SELECTED') {
        document.getElementById("MilitaryServiceStatus").value="<?php echo ($row->MilitaryServiceStatus)?$row->MilitaryServiceStatus:'NOT_SELECTED'; ?>";
        document.getElementById("MilitaryServiceStatus").disabled = false;


    }



}

