<div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'>
    </script>

    <?php

        //echo validation_errors();
        echo form_open('Ministrant/CheckNewJobExperiencesInfo/'.$MinistrantId);
        echo "<table border = '0'>";

        echo "<tr>";
        echo "<td>دسته:</td>";
        echo "<td><select name='ServiceCategoryId' onchange='GetJobGroup(this.value)'>
                        <option value='NOT_SELECTED'".set_select('ServiceCategoryId', 'NOT_SELECTED')." >---</option>
        ";

        foreach($ServiceCategories as $Servicerow){
            echo "<option value='".$Servicerow->ServiceCategoryId."'".  set_select('ServiceCategoryId', $Servicerow->ServiceCategoryId , ($DefaultServiceCategoryId==$Servicerow->ServiceCategoryId)?TRUE:False)."</option>".$Servicerow->ServiceCategoryName;
        }

        echo "</select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td>". form_error('ServiceCategoryId')." </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>گروه شغلی:</td>";
        echo "<td><select name='JobGroupId' id='JobGroupId' onchange='GetSkill(this.value)'>
                    <option value='NOT_SELECTED'".set_select('JobGroupId', 'NOT_SELECTED', (!$DefaultJobGroupId)?TRUE:False)." >---</option>
    ";

        foreach($JobGroups as $Jrow){
            echo "<option value='".$Jrow->JobGroupId."'".  set_select('JobGroupId', $Jrow->JobGroupId , ($DefaultJobGroupId==$Jrow->JobGroupId)?TRUE:False)."</option>".$Jrow->JobGroupName;
        }

        echo "</select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>مهارت:</td>";
        echo "<td><select name='SkillId' id='SkillId'>
                    <option value='NOT_SELECTED'".set_select('SkillId', 'NOT_SELECTED', (!$DefaultSkillId)?TRUE:False)." >---</option>
    ";

        foreach($Skills as $Skillrow){
            echo "<option value='".$Skillrow->SkillId."'".  set_select('SkillId', $Skillrow->SkillId , ($DefaultSkillId==$Skillrow->SkillId)?TRUE:False)."</option>".$Skillrow->SkillName;
        }

        echo "</select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> ". form_error('SkillId')."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>کارفرما:</td>";
        echo "<td>". form_input(array('id'=>'Employer','name'=>'Employer', 'value'=> set_value('Employer')))."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>تلفن:</td>";
        echo "<td>". form_input(array('id'=>'Phone','name'=>'Phone', 'value'=> set_value('Phone')))."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td>". form_error('Phone')." </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>آدرس:</td>";
        echo "<td>". form_textarea(array('id'=>'Address','name'=>'Address', 'value'=> set_value('Address')))."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";



        echo "<tr>";
        echo "<td>کشور:</td>";
        echo "<td><select name='CountryId' onchange='GetState(this.value)'>
                    <option value='NOT_SELECTED'".set_select('CountryId', 'NOT_SELECTED')." >---</option>
    ";

        foreach($Countries as $Crow){
            echo "<option value='".$Crow->CountryId."'".  set_select('CountryId', $Crow->CountryId , ('ایران'==$Crow->CountryName)?TRUE:False)."</option>".$Crow->CountryName;
        }

        echo "</select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td>  ". form_error('CountryId')."</td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>استان:</td>";
        echo "<td><select name='StateId' id='StateId' onchange='GetCity(this.value)'>
                <option value='NOT_SELECTED'".set_select('StateId', 'NOT_SELECTED', (!$DefaultStateId)?TRUE:False)." >---</option>
";

        foreach($States as $Srow){
            echo "<option value='".$Srow->StateId."'".  set_select('StateId', $Srow->StateId , ($DefaultStateId==$Srow->StateId)?TRUE:False)."</option>".$Srow->StateName;
        }

        echo "</select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>شهر:</td>";
        echo "<td><select name='CityId' id='CityId'>
                <option value='NOT_SELECTED'".set_select('CityId', 'NOT_SELECTED', (!$DefaultCityId)?TRUE:False)." >---</option>
";

        foreach($Cities as $Cityrow){
            echo "<option value='".$Cityrow->CityId."'".  set_select('CityId', $Cityrow->CityId , ($DefaultCityId==$Cityrow->CityId)?TRUE:False)."</option>".$Cityrow->CityName;
        }

        echo "</select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> ". form_error('CityId')."</td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>تاریخ شروع:</td>";

        echo "<td><select name='StartMonth'>
                    <option value='NOT_SELECTED'".set_select('StartMonth', 'NOT_SELECTED', TRUE)." >---</option>
    ";
        for($i=1;$i<13;$i++){
            echo "<option value='".$i."'".  set_select('StartMonth', $i ,False)."</option>".$i;
        }

        echo "</select><br/>ماه</td>";

        echo "<td><select name='StartYear'>
                    <option value='NOT_SELECTED'".set_select('StartYear', 'NOT_SELECTED', TRUE)." >---</option>
    ";
        for($i=1346;$i<1396;$i++){
            echo "<option value='".$i."'".  set_select('StartYear', $i , False)."</option>".$i;
        }

        echo "</select><br/>سال</td>";
        echo "<td> </td>";
        echo "<td></td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>تاریخ پایان:</td>";

        echo "<td><select name='EndMonth'>
                        <option value='NOT_SELECTED'".set_select('EndMonth', 'NOT_SELECTED', TRUE)." >---</option>
        ";
        for($i=1;$i<13;$i++){
            echo "<option value='".$i."'".  set_select('EndMonth', $i ,False)."</option>".$i;
        }

        echo "</select><br/>ماه</td>";

        echo "<td><select name='EndYear'>
                        <option value='NOT_SELECTED'".set_select('EndYear', 'NOT_SELECTED', TRUE)." >---</option>
        ";
        for($i=1346;$i<1396;$i++){
            echo "<option value='".$i."'".  set_select('EndYear', $i , False)."</option>".$i;
        }

        echo "</select><br/>سال</td>";
        echo "<td>".form_checkbox('NotOverYet', 'accept')."در حال حاضر مشغول به فعالیت هستم.</td>";
        echo "<td>". form_error('EndYear')." </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>توضیحات:</td>";
        echo "<td>". form_textarea(array('id'=>'Comment','name'=>'Comment', 'value'=> set_value('Comment')))."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";


    echo "<tr>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td>". form_submit(array('id'=>'Save','value'=>'ذخیره'))."</td>";
        echo "</tr>";
        echo "</table>";
        echo form_close();



    ?>
</div>

<script src="<?php echo base_url();?>js/JobExperienceGetCity.js"></script>
<script src="<?php echo base_url();?>js/GetState.js"></script>
<script src="<?php echo base_url();?>js/GetJobGroup.js"></script>
<script src="<?php echo base_url();?>js/GetSkill.js"></script>









</script>