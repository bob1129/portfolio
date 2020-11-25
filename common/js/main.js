$(function () {

  /*
  関数概要：.menu_btnクリック時処理
  引数：なし
  戻り値：なし
  */
  $('.menu_btn').on('click', function () {
    $('nav').toggleClass('on');
  })

  $('.menu_body ul li a').on('click', function () {
    $('nav').toggleClass('on');
  })

});