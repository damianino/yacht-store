$(function(){

});

function showModal(){
    $('.modal-bg').first().fadeIn(200);
    $('.offer-modal').css('transform','scale(1.2)');
}

function hideModal(){
    $('.offer-modal').css('transform','scale(0.2)');
    $('.modal-bg').first().fadeOut(200);
}
