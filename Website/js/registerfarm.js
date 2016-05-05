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

    }, 300);

    function register()
    {
      var data = $('#register').serialize();

      $.ajax({
        url: api.concat('/farm'),
        method: 'POST',
        data: data
      })
      .done(function(response) {
        if(response !== undefined && response !== null)
        {
          $farm = JSON.parse(response);
        }
      })
      .fail(function(jqXHR, textStatus) {
        helper.showErrors(jqXHR.responseText);
      });

      setTimeout(
        function()
        {
          updateUser();
        }, 500);
      }

      function updateUser()
      {
        //var data = JSON.stringify($user)
        $user.password_confirmation = $user.password;
        $user.farmid = $farm.id;

        console.log($user);

        $.ajax({
          url: api.concat('/user'),
          method: 'POST',
          data: $user
        })
        .done(function(response) {

          if(response !== undefined && response !== null)
          {
            alert("Yeah!");
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
