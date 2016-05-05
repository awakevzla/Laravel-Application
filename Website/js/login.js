function loginMan()
{
  var data = $('#login').serialize();

  $.ajax({
    url: 'http://hhapi.com/login'),
    method: 'POST',
    data: data
  })
  .done(function(response) {

    if(response !== undefined && response !== null)
    {
      $user = JSON.parse(response);

      if($user.type === 'Farmer')
      {
        if($user.farmid === undefined)
        {
          window.location.href = '/#/registerfarm';
        }
        else
        {
          window.location.href = '/#/farm/admin/dashboard';
        }
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
