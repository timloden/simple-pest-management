"use strict";

// When document is ready replaces the need for onload
jQuery(function ($) {
  // Grab your button (based on your posted html)
  $('.global-message .close').click(function (e) {
    // Do not perform default action when button is clicked
    e.preventDefault();
    /* If you just want the cookie for a session don't provide an expires
     Set the path as root, so the cookie will be valid across the whole site */

    Cookies.set('global-message', 'closed', {
      expires: 7
    });
  });
});
"use strict";

var lazyLoadInstance = new LazyLoad({});
"use strict";

var pestTypeButtons = document.querySelectorAll('.pest-type-button');
var pestTypeContents = document.querySelectorAll('.pest-type-content');

var clearActiveButtons = function clearActiveButtons() {
  pestTypeButtons.forEach(function (button) {
    button.classList.remove('active');
  });
};

var clearActiveContent = function clearActiveContent() {
  pestTypeContents.forEach(function (content) {
    content.classList.add('d-none');
  });
};

var setActiveContent = function setActiveContent(type) {
  var id = "".concat(type, "-info");
  var activeContent = document.getElementById(id);
  activeContent.classList.remove('d-none');
};

if (pestTypeContents.length > 0 && pestTypeButtons.length > 0) {
  pestTypeButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      clearActiveButtons();
      clearActiveContent();
      event.target.classList.add('active');
      setActiveContent(event.target.id);
    });
  });
}