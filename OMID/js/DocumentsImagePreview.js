/**
 * Created by Lenovo on 7/4/2017.
 */
$("#Documents").on("change", function(e) {
    var files = e.target.files,
        filesLength = files.length;


    if((index+filesLength)>4){
        alert("تعداد فایل های انتخاب شده بیشتر از تعداد مجاز است!");
        return;
    }

    for (var i = 0; i < filesLength; i++) {
        var f = files[i];
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
            var file = e.target;

            $(".imageThumb").each(function() {

                if ($(this).is(':hidden')) {
                    var HiddenId=$(this).parent().attr('id');
                    var ImgId="#img"+(HiddenId);
                    var RmvId="#rmv"+(HiddenId);
                    var ImgSrc=e.target.result;
                    $(ImgId).attr("src",ImgSrc);
                    $(ImgId).show();
                    $(RmvId).show();

                    index++;
                    return false;
                } else {
                    // handle visible state
                }
            });





        });

        fileReader.readAsDataURL(f);

    }


});
