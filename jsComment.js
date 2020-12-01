// alert("laod correct");

$(function() {
    $(".close").click(function () {
      $(this).parent(".bad").fadeOut(500);
      $(this).parent(".good").fadeOut(500);
    });
  });