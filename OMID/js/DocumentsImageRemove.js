/**
 * Created by Lenovo on 7/4/2017.
 */
$(".remove").click(function(){
    index--;

    $(this).parent().children(".imageThumb").hide();
    $(this).hide();


});

