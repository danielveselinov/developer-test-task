$('.filter').on('click', function () {
    let filter = $(this).attr("data-type");
    $('#settings > div').fadeOut();
    $('#settings > [data-type="'+filter+'"]').fadeIn();  
});