jQuery(function ($) {
  $("#filter").submit(function () {
    $.ajax({
      type: "POST",
      url: "https://nwt.fdev.by/wp-admin/admin-ajax.php", // обработчик
      data: {
        action: "myfilter",
        // data: filter.serialize(), // данные
        func_value: $("#func").val(),
        region_value: $("#region").val(),
        employment_value: $("#employment").val(),
      },
      beforeSend: function () {
        $(".filter-submit").val("Ищем...");
        // alert('типо меняем кнопку');
      },
      success: function (data) {
        // filter.find( 'button' ).text( 'Применить фильтр' ); // возвращаеи текст кнопки
        // alert('OK');
        $(".filter-submit").val("Поиск");
        $(".wrap-block-vacancies").html(data);
      },
    });
    return false;
  });
});
