var transitions = new DOMtransitions()
var app = new App()
app.bind()

function scroll() {

    if(window.innerWidth < 1155) return

    requestAnimationFrame(scroll)

    app.currentScrolling -= (app.currentScrolling/10);
    app.scroll += app.currentScrolling / 2;


    var maxHeight = document.querySelector('#app').offsetHeight - window.innerHeight;
    if(app.scroll <= 0) app.scroll += (0 - app.scroll) * 0.5;
    if(app.scroll >= maxHeight) app.scroll += (maxHeight - app.scroll) * 0.5;
    document.querySelector(app.app).style.transform = 'translate(0,' + (-app.scroll) + 'px';


    var percentScrolled = app.scroll/(document.querySelector('#app').offsetHeight - window.innerHeight);
    var hackingBarMaxHeight = document.querySelector('.scroll-hacking').offsetHeight;

    var addToScroll = 100 * (app.scroll / maxHeight);

    var scrollingBar = (hackingBarMaxHeight * percentScrolled) - addToScroll;
    document.querySelector('.scroll-dragging').style.transform = 'translate(0,' + scrollingBar + 'px';

    // IF THERE IS A BACKGROUND ON SINGLE
    if(document.querySelectorAll('.single-background').length < 1) return

    var top = 60 - (20 * percentScrolled);
    top = window.innerHeight * (top/100);
    top += app.scroll;

    document.querySelector('.single-background').style.top = top + 'px';
}

scroll()


setTimeout(function() {
    app.init()
},500)
