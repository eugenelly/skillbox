'use strict';

let mouse = {
        X: 0,
        Y: 0,
        CX: 0,
        CY: 0
    },
    block = {
        X: mouse.X,
        Y: mouse.Y,
        CX: mouse.CX,
        CY: mouse.CY
    },
    img = '/i/anonymous.jpg',

    block_query = $('.block'),
    mouseMove = function (e) {
        mouse.X = (e.pageX - $(this).offset().left) - block_query.width() / 2;
        mouse.Y = (e.pageY - $(this).offset().top) - block_query.height() / 2;
    },
    mouseLeave = function () {
        mouse.X = mouse.CX;
        mouse.Y = mouse.CY;
    }


block_query
    .mouseleave(mouseLeave)
    .mousemove(mouseMove)


setInterval(function () {

    block.CY += (mouse.Y - block.CY) / 12;
    block.CX += (mouse.X - block.CX) / 12;

    $('.block .circleLight').css(
        'background', 'radial-gradient(circle at ' + mouse.X + 'px ' + mouse.Y + 'px, #fff, transparent)'
    );
    block_query.css(
        {transform: 'scale(1.03) translate(' + (block.CX * 0.05) + 'px, ' + (block.CY * 0.05) + 'px) rotateX(' + (block.CY * 0.05) + 'deg) rotateY(' + (block.CX * 0.05) + 'deg)'}
    );

}, 20);


$('.slider .item').each(function () {

    $(this).addClass('active');

    $(this).prepend(
        $('<div>', {class: 'blur', style: 'background-image: url(' + img + ');'}),
        $('<div>', {class: 'bg', style: 'background-image: url(' + img + ');'})
    )

    block_query.css('background-image', 'url(' + img + ')')
})