"use strict";

console.log('custom js');
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