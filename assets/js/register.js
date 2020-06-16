$(document).ready(function () {
  $("#hideLogin").click(function () {
    $("#loginForm").hide();
    $("#registerForm").show();
    $("#loginContainer").css("z-index", "1");
  });

  $("#hideRegister").click(function () {
    $("#loginForm").show();
    $("#registerForm").hide();
    $("#loginContainer").css("z-index", "3");
  });
});
