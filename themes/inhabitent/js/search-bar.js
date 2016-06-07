/**
* search-bar.js
*/

// SEARCH BAR
jQuery(document).ready(function($) {
  $('.fa-search').on('click', function() {
    $('input[type=search]').toggle('slow');
  });
});
