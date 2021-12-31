/** GLOBAL FUNCTIONS */
$(function () {
  // clean the login form
  function cleanLogin(ele) {
    ele.closest("form").reset();
  }

  $("#cancelAddToInventory").click(function () {
    console.log("kekl;sdf");
    $('input[type="text"], input[type="date"], input[type="number"]').val("");
  });
});
