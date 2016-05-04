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
          $('#state').append('<option value=' + name + '>' + name + '</option>');
        }
      });
    });

  }, 300);


  //https://raw.githubusercontent.com/therebelrobot/countryjs/master/data/afghanistan.json
