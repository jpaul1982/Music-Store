$.noConflict();
$(document).ready(function () {
  $(".hamburger").click(() => {
    $body = $("body");
    curState = $body.attr("data-menu");
    if (curState == "inactive") {
      $body.attr("data-menu", "active");
    } else {
      $body.attr("data-menu", "inactive");
    }
  });

  $(".hero-slider").slick({
    dots: false,
    arrows: false,
    infinite: true,
    cssEase: "ease-in-out",
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
  });

  //ajax filtering
  $(document).on("submit", "[data-js-form=filter]", function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      data: data,
      type: "post",
      success: function (result) {
        $("#target").html(result);
      },
      error: function (result) {
        console.warn("error :" + result);
      },
    });
  });
});

console.log('hello from script js');