function registerFarm()
{
  var data = $('#register').serialize();

  $.when(helper.sendRequest(data, '/farm', 'POST')).done(function(farm){
    if(farm !== undefined)
    {
      $farm = farm;
      updateUser(farm.id);
    }
    else
    {
      helper.showErrors('helper.down');
      console.log('Couldn\'t register a farm entity, or didn\'t get the proper response.');
    }
  });
}

function updateUser(farmid)
{
  $user.farmid = farmid;

  $.when(helper.sendRequest($user, '/user', 'PUT')).done(function(user){
    if(user !== undefined)
    {
      user = $user;
      window.location.href = '/#/farm/dashboard';
    }
    else
    {
      helper.showErrors(helper.down);
      console.log('Couldn\'t update a user entity, or didn\'t get the proper response.');
    }
  });
}

// Preliminary things required to render the view.
setTimeout(
  function()
  {
    $.getJSON("json/countries.json", function(data)
    {
      for (i = 0; i < data.countries.length; i++)
      {
        var name = String(data.countries[i].name);
        $('#country').append('<option value="' + name + '">' + name + '</option>');
      }
    });

    $("#country").change(function()
    {
      $('#state').empty();

      var filename = $("#country").val().toLowerCase();
      filename = String(filename).split(' ').join('_');

      $.getJSON("json/countries/" + filename + ".json", function(data)
      {
        for (i = 0; i < data.provinces.length; i++)
        {
          var name = String(data.provinces[i]);
          $('#state').append('<option value="' + name + '">' + name + '</option>');
        }
      });
    });

    setTimeout(
      function()
      {
        $('#country option[value=Canada]').change();
      }, 100);

    }, 150);
