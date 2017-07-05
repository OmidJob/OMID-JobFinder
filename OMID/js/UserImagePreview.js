/**
 * Created by Lenovo on 7/4/2017.
 */
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#ProfileImage').prop('src', e.target.result).show();
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#UserImage").change(function () {
    readURL(this);
    $('#ProfileImage').show();
    $("[name='RemovedImage']").val(0);
    //document.getElementById("RemovedImage").value=0;
});

$("#UserImage").click(function () {

    $('#ProfileImage').attr('src','');
});


$('#ProfileImage').click(function(){

    $('#UserImage').replaceWith($('#UserImage').clone(true));
    $('#ProfileImage').hide();

});
