'use strict';

window.onload = () => {
    // объект Поле
    let field = $('.field');
    let fieldSizeX;
    let fieldSizeY;

    let rFieldY;

    // объект Мяч
    let ball = $('.ball');
    let ballRadius = ball.width() / 2;

    ball.on('click', function (ev) {
        if ((Math.pow(ev.offsetX - ballRadius, 2) + Math.pow(ev.offsetY - ballRadius, 2)) <= Math.pow(ballRadius, 2)) {

            fieldSizeX = window.innerWidth;
            fieldSizeY = window.innerHeight;

            rFieldY = Math.floor(Math.random() * (fieldSizeY - ballRadius * 2 + 1));

            if (parseInt(ball.css('left').replace('px', ''))) {
                ball.animate({
                    left: 0,
                    top: rFieldY + 'px',
                }, 2000);
            } else {
                ball.animate(
                    {
                        left: fieldSizeX - ballRadius * 2 + 'px',
                        top: rFieldY + 'px',
                    }, 2000);
            }

            setTimeout(() => {
                if ((rFieldY >= fieldSizeY / 2 - fieldSizeY * 0.1) &&
                    (rFieldY <= fieldSizeY / 2 + fieldSizeY * 0.1)) {
                    alert('Гол!');
                }
            }, 2000);
        }
    });
}