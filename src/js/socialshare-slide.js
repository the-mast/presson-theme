(function() {
    var social_share_header = new Headroom(document.querySelector("#social_share_header"), {
        tolerance: 5,
        offset: 60,
        classes: {
            initial: "animated",
            pinned: "slideDown",
            unpinned: "slideUp",
        }
    });
    social_share_header.init();
}());