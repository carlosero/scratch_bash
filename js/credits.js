function add_credits(credits, element) {
  $.ajax({
    method: "POST",
    url: "/?action=add_credits",
    data: { credits: credits }
  })
    .done(function( credits ) {
      $(element).html(credits);
  });
}

function subtract_credits(credits, element) {
  $.ajax({
    method: "POST",
    url: "/?action=subtract_credits",
    data: { credits: credits }
  })
    .done(function( credits ) {
      $(element).html(credits);
  });
}
