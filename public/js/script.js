$(function(){
    $('.videos .video a').on('click', function(){
        let link = $(this).attr('href');
        $('.modal .modal-content .modal-body iframe').attr('src',link)
        console.log(link);
    });

    $('.Quizz a').click(function(e){
        e.preventDefault();
    });


    /**upload photo  */
    $('#upload_btn').on('click',function(e){
        e.preventDefault();
        if($('#upload_btn').attr("class") !== 'btn btn-success btn-block mt-1'){
           $('#img_file').trigger('click');
        }else{
            $('#form').submit();
        }
    });

    $('#img_file').on('change',function(){
        let image_value = $(this).val();
        $('#upload_btn').html("<i class='fas fa-cloud-upload-alt'></i> Save");
        $('#upload_btn').attr("class" ,'btn btn-success btn-block mt-1');
    });

    //**form submit ajax img*/

    $('#form').on('submit',function(e){
        e.preventDefault();

        $.ajax({
            url: '/profile',
            type: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType : false,
            cache : false,
            processData : false,
            success: function(data) {
                console.log(data);
                $("#message").text(data.message);
                $("#uploaded_image").html(data.uploaded_image);
            },
        });
    });
    //**form submit ajax info*/

    $('#form_info').on('submit',function(e){
        e.preventDefault();

        $.ajax({
            url: '/profile',
            type: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType : false,
            cache : false,
            processData : false,
            success: function(data) {
                // console.log(data);
                $("#message").css('display','block');
                $("#message").text(data.message);
                $("#error_info").css('display','none');

            },
            error: function (){
                $("#error_info").css('display','block');
                $("#message").css('display','none');

            }
        });
    });

    $('#send_email_button').on('click', function(e){
        e.preventDefault();

        $.ajax({
            url: '/contact',
            type: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType : false,
            cache : false,
            processData : false,
            success: function(data) {
                // console.log(data);

                $("#name").val('');
                $("#email").val('');
                $("#subject").val('');
                $("#message_in").val('');

                $("#message").css('display','block');
                $("#message").text(data.message);
            }
        });
    })


});

