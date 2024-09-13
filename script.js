document.addEventListener('DOMContentLoaded', function() {
  var bookingButton = document.getElementById('booking-button');

  bookingButton.addEventListener('click', function() {
    window.location.href = 'index.html';
  });
});

ScrollReveal({
  reset: true,
  distance: '80px',
  duration: 2000,
  delay: 200
});

ScrollReveal().reveal('.quality2, .topic', {origin: 'top'});
ScrollReveal().reveal('.side-pic, .heading, .collection_heading, .features-heading', {origin: 'bottom'});
ScrollReveal().reveal('.quality3, .about-img', {origin: 'left'});
ScrollReveal().reveal('.cars_container, .quality1 .topic', {origin: 'right'});
