$(document).ready(function() {
  $('.fa-bars').click(function() {
    $(this).toggleClass('fa-times');
    $('.nav').toggleClass('nav-toggle');
  });

  $(window).on('load scroll', function() {
    $('.fa-bars').removeClass('fa-times');
    $('.nav').removeClass('nav-toggle');

    if ($(window).scrollTop() > 10) {
      $('header').addClass('header-active');
    } else {
      $('header').removeClass('header-active');
    }
  });

  $('.facility').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
      enabled: true
    }
  });

  // Function to handle the appointment button click
  function handleMakeAppointmentClick(event) {
    event.preventDefault(); // Prevent the form from submitting (if you are using a form)

    // Show the dialog box using fadeIn
    $('#dialogBox').fadeIn();

    // Wait for 2 seconds before redirecting to another section of the page
    setTimeout(function() {
      window.location.href = "index.html#contact"; // Replace "index.html#contact" with the desired URL
    }, 2000); // 2 seconds (2000 milliseconds)
  }

  // Add a click event listener to the "make appointment" button
  $('.button').click(handleMakeAppointmentClick);

  // Function to handle the close button click
  $('#closeButton').click(function() {
    // Hide the dialog box using fadeOut
    $('#dialogBox').fadeOut();
  });
});
