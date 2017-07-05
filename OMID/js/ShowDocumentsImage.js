/**
 * Created by Lenovo on 7/4/2017.
 */
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

