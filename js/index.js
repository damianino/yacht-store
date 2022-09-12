function main(){
    console.log('DOM Loaded');
    $('#sidebarTrigger').mouseenter(showSidebar);
    $('#sidebar').mouseleave(hideSidebar);
    updatePrice();
    $('body').scroll(function() {
        if ( $('body').scrollTop() >= 600 ) {$('#cornerLogo').fadeIn(200);
        } else {$('#cornerLogo').fadeOut(200);}
    });
}

function hideSidebar(){
    $('#navPills').fadeOut(200);
    $('#sidebar').delay(100).animate({width:"0px"},'fast');
    $('#itemPageLogo').fadeIn(200);
    if ( $('body').scrollTop() >= 600 ) $('#cornerLogo').fadeIn(200);
    $('#sidebarTrigger').show();
}

function showSidebar(){
    $('#cornerLogo').fadeOut(200);
    $('#itemPageLogo').fadeOut(200);
    $('#sidebar').animate({width:"100px"},'fast');
    $('#navPills').delay(100).fadeIn(200);
    $('#sidebarTrigger').hide();
}

function postReview(){
    var name = $('#name').val();
    $('#name').val("");
    var city = $('#city').val();
    $('#city').val("");
    var text = $('#text').val();
    $('#text').val("");
    $.post('reviews/post', {'name':name,'city':city,'text':text});
}

function formatPrice(price){
    price = String(price).trim();
    let res = '';
    let three = 0;
    for (let i = price.length-1; i >= 0; i--){
        if (three < 3){
          res = price[i]+ res;
          three++;
        }else{
          res = price[i] + ' ' + res;
          three = 1;
        }
    }
    return res;
}

function updatePrice(){
    $('.price').each(function(){
        console.log($(this).text());
        $(this).text(formatPrice($(this).text())+' €');
    });
}

function hideModal(){
    $('.offer-modal').css('transform','scale(0.2)');
    $('.modal-bg').first().fadeOut(200);
}

$('document').ready(main);

