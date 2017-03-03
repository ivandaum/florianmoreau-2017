var App = function() {}

App.prototype.bind = function() {
    document.querySelector('.close-nav').addEventListener('click', transitions.toggleNav)
    document.querySelector('.open-nav').addEventListener('click', transitions.toggleNav)
}
