$(function(){
    rl = reviews.length;
    cr = 0;
});

function rightArrowReviews(){
    old = $('.review-container').first();
    neww = $('.review-container').first().clone().css('left', '100%').prependTo('.reviews-section-container').first();
    $('.reviewer-name').first().text(reviews[Math.abs(cr+1)%rl]['name']);
    $('.reviewer-city').first().text(reviews[Math.abs(cr+1)%rl]['city']);
    $('.review').first().text(reviews[Math.abs(cr+1)%rl]['text']);
    old.animate({left:'-50%'}, 300, function(){this.remove();});
    neww.animate({left:'25%'}, 300);
    cr++;
}

function leftArrowReviews(){
    old = $('.review-container').first();
    neww = $('.review-container').first().clone().css('left', '-50%').prependTo('.reviews-section-container').first();
    $('.reviewer-name').first().text(reviews[(rl+cr-1)%rl]['name']);
    $('.reviewer-city').first().text(reviews[(rl+cr-1)%rl]['city']);
    $('.review').first().text(reviews[(rl+cr-1)%rl]['text']);
    old.animate({left:'100%'}, 300, function(){this.remove();});
    neww.animate({left:'25%'}, 300);
    cr--;
}