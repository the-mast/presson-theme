function scrollEvent() {
    var body = document.getElementsByClassName("archive")[0];
    var masthead = document.getElementById("masthead");
    if (body != undefined) {
        if (body.scrollTop == 0) {
            masthead.classList.remove('opaque');
        } else {
            masthead.classList.add('opaque');
        }
    }
};