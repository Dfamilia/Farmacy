/** GLOBAL FUNCTIONS */  

// clean the login form
  function cleanLogin(ele) {
    ele.closest("form").reset();
  }

// init project
$(document).ready(function () {
  // Show Login modal
  $("#myModal").modal({ show: true, backdrop: "static" });
});
