$('.count').each(function(){
  $(this).prop('Counter', 0).animate({
    Counter: $(this).text()
  },{
    duration: 1600,
    easing: 'swing',
    step: function (now) {
      $(this).text(Math.ceil(now));
    }
  })
})
