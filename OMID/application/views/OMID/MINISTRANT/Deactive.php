<div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'>
    </script>


    <?php

        //echo validation_errors();
        echo form_error('CurrentPass');
        $attributes = array('id' => 'DeactiveForm');
        echo form_open('Ministrant/CheckDeactiveInfo',$attributes);
        echo "<div>";
        echo "<fieldset>";
        echo "<table border = '0'>";
        echo "<tr>";
        echo "<td>لطفا علت لغو عضویت را انتخاب نمایید:</td>";
        echo "<td><select name='DeactiveReason' id='DeactiveReason'>
                <option value='NOT_SELECTED'".set_select('DeactiveReason', 'NOT_SELECTED', TRUE)." >---</option>
                <option value='TEMPORARY'".  set_select('DeactiveReason', ' TEMPORARY' )." >لغو عضویت، موقت است.</option>
                <option value='MANY_MESSAGES_REQUESTS' ". set_select('DeactiveReason', 'MANY_MESSAGES_REQUESTS')." >پیامها و درخواستهای زیادی دریافت میکنم.</option>
                <option value='DONT_KNOW_HOW_USE' ". set_select('DeactiveReason', 'DONT_KNOW_HOW_USE')." >نحوه استفاده از سیستم را نمی دانم.</option>
                <option value='DONT_FIND_USEFUL' ". set_select('DeactiveReason', 'DONT_FIND_USEFUL')." >برای من مفید نبوده است.</option>
                <option value='PRIVACY_CONCERN' ". set_select('DeactiveReason', 'PRIVACY_CONCERN')." >نگران حریم شخصی ام هستم.</option>
                <option value='ACCOUNT_HACKED' ". set_select('DeactiveReason', 'ACCOUNT_HACKED')." >حساب کاربری من هک شده است.</option>
                <option value='DONT_FEEL_SAFE' ". set_select('DeactiveReason', 'DONT_FEEL_SAFE')." >احساس امنیت نمیکنم</option>
                <option value='HAVE_ANOTHER_ACCOUNT' ". set_select('DeactiveReason', 'HAVE_ANOTHER_ACCOUNT')." >حساب کاربری دیگری دارم.</option>
             

                </select></td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>توضیحات:</td>";
        echo "<td>". form_textarea(array('id'=>'Comment','name'=>'Comment'))."</td>";
        echo "<td>". form_error('DeactiveReason')." </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td>". form_button(array('name'=>'Next','content'=>'مرحله بعد','class'=>'next action-button'))."</td>";
    //form_submit(array('id'=>'Deactive','value'=>'لغو عضویت'))
        echo "</tr>";
        echo "</table>";
        echo "</fieldset>";

        echo "<fieldset>";
        echo "<table>";
        echo "<tr>";
        echo "<td>کلمه عبور :</td>";
        echo "<td>". form_password(array('id'=>'CurrentPass','name'=>'CurrentPass'))."</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> ". form_error('CurrentPass')."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "<td>". form_submit(array('name'=>'submit','value'=>'لغو عضویت','class'=>'submit action-button'))."</td>";
        //form_submit(array('id'=>'Deactive','value'=>'لغو عضویت'))
        echo "</tr>";

        echo "</table>";
        echo "</fieldset>";
        echo "</div>";
        echo form_close();



    ?>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/DeactiveStepForm.css">

<script src="<?php echo base_url();?>js/DeactiveStepForm.js"></script>

