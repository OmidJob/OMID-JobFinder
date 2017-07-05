/**
 * Created by Lenovo on 7/4/2017.
 */
$('#Remove').click(function(e)
{
    // $('#UserImage').val("");
    $('#ProfileImage').attr("src","<?php echo base_url().'images/OMID/NoPhoto.png';?>");
    $("[name='RemovedImage']").val("<?php echo $row->ImageName; ?>" );

})
