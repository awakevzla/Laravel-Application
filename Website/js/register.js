function register()
{
  var data = $('#register').serialize();

  $.ajax({
    url: api.concat('/user'),
    method: 'POST',
    data: data
  })
  .done(function(response) {

    if(response !== undefined && response !== null)
    {
      var user = JSON.parse(response);

      if(user.type === 'Farmer')
      {
        window.location.href = '/#/registerfarm';
      }
    }
    else
    {
      helper.showErrors("We're currently down for maintenance. Try again later!");
    }
  })
  .fail(function(jqXHR, textStatus) {
    helper.showErrors(jqXHR.responseText);
  });
}
