var background = '#000';
var padding = 3;
console.log('%cPortfolio made with ☕️ by Ivan Daum', 'padding:' + padding +'px; background: ' + background + '; color: #fff');
console.log('%chttp://ivandaum.fr', 'padding:' + padding +'px; background: ' + background + '; color: #fff');
console.log('%chttp://twitter.com/ivndn', 'padding:' + padding +'px; background: ' + background + '; color: #fff');
console.log('');


var transitions = new DOMtransitions()
var app = new App();
var scrollbarClicked = false;
var mouseY = 0;
var scrollingBar = 0;
app.bind()

function scroll() {

    if(window.innerWidth < 1155) return
    var maxHeight = document.querySelector('#app').offsetHeight - window.innerHeight;


    requestAnimationFrame(scroll)

    if(app.scrollTo) {
        app.scroll += (mouseY - app.scroll) * 0.1;
    } else {
        app.currentScrolling -= (app.currentScrolling/10);
        app.scroll += app.currentScrolling / 2;
    }


    if(app.scroll <= 0) app.scroll += (0 - app.scroll) * 0.5;
    if(app.scroll >= maxHeight) app.scroll += (maxHeight - app.scroll) * 0.5;

    document.querySelector(app.app).style.transform = 'translate(0,' + (-app.scroll) + 'px';



    if(document.querySelector('#app').offsetHeight < window.innerHeight * 1.2) return;

    var percentScrolled = app.scroll/(document.querySelector('#app').offsetHeight - window.innerHeight);

    var hackingBarMaxHeight = document.querySelector('.scroll-hacking').offsetHeight;
    var addToScroll = 100 * (app.scroll / maxHeight);

    scrollingBar = (hackingBarMaxHeight * percentScrolled) - addToScroll;

    document.querySelector('.scroll-dragging').style.transform = 'translate(0,' + scrollingBar + 'px';



    // IF THERE IS A BACKGROUND ON SINGLE
    if(document.querySelectorAll('.single-background').length >= 1) {

        var top = 60 - (20 * percentScrolled);
        top = window.innerHeight * (top/100);
        top += app.scroll;

        document.querySelector('.single-background').style.top = top + 'px';

    }

    if(document.querySelectorAll('.single .title.content-container').length >= 1) {
        top = 200 + (500 * percentScrolled);
        document.querySelector('.single .title.content-container').style.top = top + 'px';
    }

    if(document.querySelectorAll('.section-container-title').length >= 1) {
        top = 200 - (400 * percentScrolled);
        document.querySelector('.section-container-title').style.top = top + 'px';
    }

}

scroll()


setTimeout(function() {
    app.init()
},500)
