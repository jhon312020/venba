 
 /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("fillterDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.filterShow')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}




// $(".carousel").swipe({

//       swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

//         if (direction == 'left') $(this).carousel('next');
//         if (direction == 'right') $(this).carousel('prev');

//       },
//       allowPageScroll:"vertical"

//     });