$(function(){
    $('.videos .video a').on('click', function(){
        let link = $(this).attr('href');
        $('.modal .modal-content .modal-body iframe').attr('src',link)
        console.log(link);
    });
});

