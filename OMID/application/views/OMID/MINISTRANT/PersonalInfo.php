<div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php

    foreach($PersonalInfo as $row){
        //echo validation_errors();
        echo form_open_multipart('Ministrant/CheckPersonalInfo/'.$row->MinistrantId.'/'.$row->NumberOfFiles);
        echo "<table border = '0'>";
        echo "<tr>";
        echo "<td>نام:</td>";
        echo "<td>". form_input(array('id'=>'FirstName','name'=>'FirstName', 'value'=> $row->MinistrantFirstName))."</td>";
        echo "<td>". form_hidden(array('RemovedImage'  => 0))."</td>";

        $ImageAddress=base_url().'images/OMID/NoPhoto.png';
        if($row->ImageName)
            $ImageAddress=base_url().'images/OMID/Ministrant/'.$SessionData['UserId'].'/Personal/'.$row->ImageName;

        echo "<td rowspan='2'>
              <div  style='width: 60px; height: 60px;'>
                <img id='ProfileImage' src=".$ImageAddress." alt='...' style='width: 60px; height: 60px;'>
			  
			  </div>
			  
			  <div>
				
			    <input type='file' id='UserImage' name='UserImage' >
			    <button  type='button' name='Remove' id='Remove' >حذف</button>
				
			  </div>
              </td>";

        echo "<td> ". form_error('UserImage')."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>نام خانوادگی:</td>";
        echo "<td>". form_input(array('id'=>'LastName','name'=>'LastName', 'value'=> $row->MinistrantLastName))."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>جنسیت:</td>";
        echo "<td><select name='Sex' onchange='GetMilitaryServiceStatus(this.value)'>
                <option value='NOT_SELECTED'".set_select('Sex', 'NOT_SELECTED', ($row->Sex!='MAN' && $row->Sex!='WOMAN')?TRUE:False)." >---</option>
                <option value='MAN'".set_select('Sex', 'MAN', ($row->Sex=='MAN')?TRUE:False)." >مرد</option>
                <option value='WOMAN' ". set_select('Sex', 'WOMAN', ($row->Sex=='WOMAN')?TRUE:False)." >زن</option>
             
                </select></td>";

        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>وضعیت تاهل:</td>";
        echo "<td><select name='MaritalStatus'>
                <option value='NOT_SELECTED'".set_select('MaritalStatus', 'NOT_SELECTED', ($row->MaritalStatus!='SINGLE' && $row->MaritalStatus!='MARRIED')?TRUE:False)." >---</option>
                <option value='SINGLE'".  set_select('MaritalStatus', 'SINGLE', ($row->MaritalStatus=='SINGLE')?TRUE:False)." >مجرد</option>
                <option value='MARRIED' ". set_select('MaritalStatus', 'MARRIED', ($row->MaritalStatus=='MARRIED')?TRUE:False)." >متاهل</option>
             
                </select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>وضعیت نظام وظیفه:</td>";
        echo "<td><select name='MilitaryServiceStatus' id='MilitaryServiceStatus'>
                <option value='NOT_SELECTED'".set_select('MilitaryServiceStatus', 'NOT_SELECTED', ($row->MilitaryServiceStatus!='NOT_SERVED' && $row->MilitaryServiceStatus!='ONGOING'&& $row->MilitaryServiceStatus!='EXEMPTED'&& $row->MilitaryServiceStatus!='EDUCATIONAL_EXTEPTION'&& $row->MilitaryServiceStatus!='COMPLETED')?TRUE:False)." >---</option>
                <option value='NOT_SERVED'".  set_select('MilitaryServiceStatus', 'NOT_SERVED', ($row->MilitaryServiceStatus=='NOT_SERVED')?TRUE:False)." >مشمول</option>
                <option value='ONGOING' ". set_select('MilitaryServiceStatus', 'ONGOING', ($row->MilitaryServiceStatus=='ONGOING')?TRUE:False)." >در حال انجام</option>
                <option value='EXEMPTED' ". set_select('MilitaryServiceStatus', 'EXEMPTED', ($row->MilitaryServiceStatus=='EXEMPTED')?TRUE:False)." >معاف دائم</option>
                <option value='EDUCATIONAL_EXTEPTION' ". set_select('MilitaryServiceStatus', 'EDUCATIONAL_EXTEPTION', ($row->MilitaryServiceStatus=='EDUCATIONAL_EXTEPTION')?TRUE:False)." >معافیت تحصیلی</option>
                <option value='COMPLETED' ". set_select('MilitaryServiceStatus', 'COMPLETED', ($row->MilitaryServiceStatus=='COMPLETED')?TRUE:False)." >انجام شده</option>
             
                </select></td>";
        echo "<td>". form_error('MilitaryServiceStatus')." </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>ملیت:</td>";
        echo "<td><select name='NationalityId'>
                <option value='NOT_SELECTED'".set_select('NationalityId', 'NOT_SELECTED', (!$row->NationalityId)?TRUE:False)." >---</option>
";

        foreach($Countries as $Crow){
            echo "<option value='".$Crow->CountryId."'".  set_select('NationalityId', $Crow->CountryId , ($row->NationalityId==$Crow->CountryId)?TRUE:False)."</option>".$Crow->CountryName;
        }
                
        echo "</select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>تاریخ تولد:</td>";
        echo "<td><select name='DayOfBirth'>
                <option value='NOT_SELECTED'".set_select('DayOfBirth', 'NOT_SELECTED', (!$row->NationalityId)?TRUE:False)." >---</option>
";
        for($i=1;$i<32;$i++){
            echo "<option value='".$i."'".  set_select('DayOfBirth', $i , ($row->DayOfBirth==$i)?TRUE:False)."</option>".$i;
        }

        echo "</select><br/>روز</td>";

        echo "<td><select name='MonthOfBirth'>
                <option value='NOT_SELECTED'".set_select('MonthOfBirth', 'NOT_SELECTED', (!$row->NationalityId)?TRUE:False)." >---</option>
";
        for($i=1;$i<13;$i++){
            echo "<option value='".$i."'".  set_select('MonthOfBirth', $i , ($row->MonthOfBirth==$i)?TRUE:False)."</option>".$i;
        }

        echo "</select><br/>ماه</td>";

        echo "<td><select name='YearOfBirth'>
                <option value='NOT_SELECTED'".set_select('YearOfBirth', 'NOT_SELECTED', (!$row->NationalityId)?TRUE:False)." >---</option>
";
        for($i=1346;$i<1396;$i++){
            echo "<option value='".$i."'".  set_select('YearOfBirth', $i , ($row->YearOfBirth==$i)?TRUE:False)."</option>".$i;
        }

        echo "</select><br/>سال</td>";
        echo "<td>". form_error('DayOfBirth')." </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>خود را توصیف نمایید:</td>";
        echo "<td>". form_textarea(array('id'=>'Dsc','name'=>'Dsc', 'value'=> $row->MinistrantDsc))."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>تصویر مدارک شناسایی خود را آپلود نمایید (حداکثر 4تصویر):</td>";
        echo "<td> <input id='Documents' name='Documents[]' type='file' multiple></td>";
        echo "<td> <div id='DocumentsImage'>

                    <span class='pip' id='1'>
                        <img class='imageThumb' id='img1' src='' title=''/>
                         <br/><span class='remove' id='rmv1'>Remove image</span>
                    </span>
                    
                    <span class='pip' id='2'>
                        <img class='imageThumb' id='img2' src='' title=''/>
                         <br/><span class='remove' id='rmv2'>Remove image</span>
                    </span>
                    
                    <span class='pip' id='3'>
                        <img class='imageThumb' id='img3' src='' title=''/>
                         <br/><span class='remove' id='rmv3'>Remove image</span>
                    </span>
                    
                    <span class='pip' id='4'>
                        <img class='imageThumb' id='img4' src='' title=''/>
                         <br/><span class='remove' id='rmv4'>Remove image</span>
                    </span>
                    </div> </td>";
        echo "<td>". form_error('Documents')." </td>";
        echo "<td>". form_hidden(array('DocumentsFolder'  => $row->DocumentsFolder))." </td>";
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
    }


    ?>
</div>
<script src="<?php echo base_url();?>js/ShowDocumentsImage.js"></script>
<script src="<?php echo base_url();?>js/UserImagePreview.js"></script>
<script src="<?php echo base_url();?>js/UserImageRemove.js"></script>
<script src="<?php echo base_url();?>js/GetMilitaryServiceStatus.js"></script>
<script src="<?php echo base_url();?>js/DocumentsImagePreview.js"></script>
<script src="<?php echo base_url();?>js/DocumentsImageRemove.js"></script>
<script>
    $(".imageThumb").each(function() {
        $(this).hide();
    });
    $(".remove").each(function() {
        $(this).hide();
    });




    var ImgCounter=parseInt("<?php echo ($row->NumberOfFiles)?$row->NumberOfFiles:0; ?>");
    var ImagNameStr="<?php echo ($row->DocumentsFolder)?$row->DocumentsFolder:''; ?>";
    var ImageAddress="<?php echo base_url().'images/OMID/'.$SessionData['PersonTypeId'].'/'.$SessionData['UserId'].'/Personal/Documents/';?>";
    var index=1;
    var ImagNames=ImagNameStr.split("***");
    for(index; index<=ImgCounter  ; index++){
        var ImgId="#img"+(index);
        var RmvId="#rmv"+(index);
        var ImgSrc=ImageAddress+ImagNames[index];
        $(ImgId).attr("src",ImgSrc);
        $(ImgId).show();
        $(RmvId).show();


    }
    index--;


</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/DocumentsImagePreview.css">

