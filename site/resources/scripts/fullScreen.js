let currentImg = -1;
const images = $('.carImage');

function changeFooter() {
    let tmp = parseInt(currentImg) + 1;
    $('#footer').text(tmp + " of " + images.length); 
}

$('#prev').on('click', function() {
    if(currentImg <= 0) currentImg = images.length;
    $('#fullsize').attr('src', images[--currentImg].src);
    changeFooter();
});

$('#next').on('click', function() {
    if(currentImg == images.length - 1) currentImg = -1;
    $('#fullsize').attr('src', images[++currentImg].src);
    changeFooter();
});

$('.carImage').on('click', function() {
    currentImg = $(this).attr('id');
    $('#fullpage').css('display', 'block');
    $('#fullsize').attr('src', images[currentImg].src);
    $('body').css('overflow', 'hidden');
    $('html, body').animate({scrollTop: '0'}, 300);
    changeFooter();
});

function closeImage() {
    $('body').css('overflow', 'visible');
    $("#fullpage").css('display', 'none');
}

$('#close').click(closeImage);
$('#background').click(closeImage);