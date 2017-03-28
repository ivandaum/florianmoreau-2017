var transitions = new DOMtransitions()
var app = new App()
app.bind()

function scroll() {
    requestAnimationFrame(scroll)

    app.currentScrolling += ( 0 - app.currentScrolling ) * 0.2
    app.scroll += app.currentScrolling / 5;

    if(app.scroll <= 0) app.scroll += (0 - app.scroll) * 0.5
    var maxHeight = document.querySelector('#app').offsetHeight - window.innerHeight
    if(app.scroll >= maxHeight) app.scroll += (maxHeight - app.scroll) * 0.5


    TweenMax.to(app.app,0.05,{transform:'translate(0,' + (-app.scroll) + 'px'})

    if(document.querySelectorAll('.single-background').length < 1) return

    var percent = app.scroll/document.querySelector('#app').offsetHeight
    var top = 60 - (20 * percent)
    top = window.innerHeight * (top/100)
    top += app.scroll
    TweenMax.to('.single-background',0.1,{top:top+'px'})
}

scroll()


setTimeout(function() {
    app.init()
},500)
