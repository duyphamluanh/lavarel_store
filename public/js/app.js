// $( document ).ready(function() {
//     console.log( "ready!" );
//     $("[id^=checkbox_]").click(function() {
//        console.log($(this).parent().parent().parent().children(':first-child').text()) ;
//        $.ajax({
//         url: "/admin/menu/changeactivestatus",
//         data: {id : $(this).parent().parent().parent().children(':first-child').text()},
//       }).done(function() {
//         $( this ).attr('checked', !$( this ).attr('checked') )
//       });
//     });
// });
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if(confirm('Delete?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function(result){
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert("Lỗi không xóa được");
                }
            }
        })
    }
}

// Upload files
$('#upload').change(function(){
    var form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function(result){
            if(result.error === false){
                $('#image_show').html('<a style="display: block; width: auto;" href="'+result.url
                    +'" target="_blank">'
                    +'<img style="display: block" class="mx-auto mt-3" src="'+result.url
                    +'" /><a/>')
                $('#file').val(result.url);
            }else{
                alert('Upload không thành công');
            }
            
        }

    });
});
