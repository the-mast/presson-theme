function scrollEvent() {
  var body = document.scrollingElement; 
  var pressonhead = document.getElementById('pressonhead');

  if (body !== undefined) {
      if (body.scrollTop == 0) {
          pressonhead.classList.remove('opaque');
        } else {
          pressonhead.classList.add('opaque');
        }
    }
};
