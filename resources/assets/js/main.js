document.addEventListener('DOMContentLoaded', function () {
  //var trigger = document.querySelector('.hamburger');
  var overlay = document.querySelector('.overlay');
  var isClosed = false;

  /*trigger.addEventListener('click', function () {
    hamburger_cross();
  });

  function hamburger_cross() {
    if (isClosed) {
      overlay.style.display = 'none';
      trigger.classList.remove('is-open');
      trigger.classList.add('is-closed');
      isClosed = false;
    } else {
      overlay.style.display = 'block';
      trigger.classList.remove('is-closed');
      trigger.classList.add('is-open');
      isClosed = true;
    }
  }*/


  //var offcanvasToggle = document.querySelectorAll('[data-toggle=\'offcanvas\']');
  var wrapper = document.getElementById('wrapper');
  wrapper.classList.add('toggled');

  /*for (var i = 0; i < offcanvasToggle.length; i++) {
    offcanvasToggle[i].addEventListener('click', function () {
      wrapper.classList.toggle('toggled');
    });
  }*/

  var dropdown = document.getElementsByClassName('dropdown-toggle');
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener('click', function() {
      this.classList.toggle('active');
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === 'block') {
        dropdownContent.style.display = 'none';
      } else {
        dropdownContent.style.display = 'block';
      }
    });
  } 
}); 