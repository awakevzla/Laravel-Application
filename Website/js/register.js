function register()
{
  var data = $('#register').serialize();
  $cache.password = data.password;

  $.ajax({
    url: $api.concat('/user'),
    method: 'POST',
    data: data
  })
  .done(function(response) {

    if(response !== undefined && response !== null)
    {
      $user = JSON.parse(response);
      $user.password = $cache.password;

      if($user.type === 'Farmer')
      {
        window.location.href = '/#/registerfarm';
      }
      else
      {
        window.location.href = '/#/login';
      }
    }
    else
    {
      helper.showErrors(helper.down);
    }
  })
  .fail(function(jqXHR, textStatus) {
    helper.showErrors(jqXHR.responseText);
  });
}

$('legend').addClass('animated slideInLeft');
