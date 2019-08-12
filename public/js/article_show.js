$(document).ready(function () {
    $('.js-like-article').on('click',function(e){
        e.preventDefault();
        $link =$(e.currentTarget);
        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');
        $.ajax({
            url:$link.attr('href'),
            method:'POST'
        }).done(function (data) {
            $('.js-like-article-count').html(data.heart);
        })

    })
})