Parse.initialize("ARKNOchu6ZJ851F3ofbuz1HYcAm6KjBZoj5D5wUo", "A0hhrBYZA4SGFus82faRzlkEjMZqMqmK1qHmqRR0");
$("#signin").css('display', "none");
$("#signup").css('display', "none");
var currentUser = Parse.User.current();
if (currentUser) { // 로그인 되어있으면
  // do stuff with the user
  $("#userinfo").css('display', "block"); // 유저 드랍다운 메뉴 표시
  $("#username").text(currentUser.getUsername());
  // $("#username").text(); // 유저 ID 표시
} else { // 비로그인 상태이면
  $("#signin").css('display', "inline-block"); // Sign In 버튼 표시
  $("#signup").css('display', "inline-block"); // Sign Up 버튼 표시
}
$('#drop_logout').click(function(e){ // 로그아웃
  Parse.User.logOut();
  currentUser = Parse.User.current();
  window.location.reload();
});