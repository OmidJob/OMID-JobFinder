/**
 * Created by Lenovo on 7/4/2017.
 */
function GetState(CountryId)
{
    if(CountryId=='NOT_SELECTED'){
        document.getElementById("StateId").selectedIndex = 0;
        document.getElementById("StateId").disabled = true;

        document.getElementById("CityId").selectedIndex = 0;
        document.getElementById("CityId").disabled = true;
    }

    else{
        document.getElementById("StateId").value="<?php echo ($DefaultStateId)?$DefaultStateId:'NOT_SELECTED'; ?>";
        document.getElementById("StateId").disabled = false;

        document.getElementById("CityId").value="<?php echo ($DefaultCityId)?$DefaultCityId:'NOT_SELECTED'; ?>";
        document.getElementById("CityId").disabled = false;
    }

}
