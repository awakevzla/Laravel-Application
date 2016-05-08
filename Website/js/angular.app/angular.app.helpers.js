var helper = {

  down: "We're currently down for maintenance. Try again later!",
  unauthorized: "You're not authorized to view this page!",

  isObject: function(val) {
    return val instanceof Object;
  },
  getFirstElement: function(array) {
    if  ((array[0] != null) && (array[0] != undefined)){
      return array[0];
    }
    return array;
  },
  sendRequest: function(data, url, type)
  {
    $.ajax({
      url: $api.concat(url),
      method: type,
      data: data
    })
    .done(function(data) {
      return data;
    })
    .fail(function(jqXHR, textStatus) {
      this.showErrors(jqXHR.responseText);
    });
  },
  showErrors: function(errors)
  {
    var data = errors;
    var string = errors;

    try {
      data = JSON.parse(errors);
      try {
        data = JSON.parse(data);
        string = String(data.error).split('.,').join('.<br>');
      }
      catch(err) {
        string = String(data.error).split('.,').join('.<br>');
      }
    }
    catch(err) {
      console.log(errors);
    }

    $('#errors').addClass("alert alert-warning");
    $('#errors').html('<p>' + string + '</p>');
  },
  showInfo: function(message)
  {
    $('#errors').addClass("alert alert-info");
    $('#errors').html('<p>' + message + '</p>');
  }
};

function submitForm(id, url, newUrl)
{
  var data = $('#' + id).serialize();
  var response = helper.sendRequest(data, url, "POST", newUrl);

  if(response !== undefined)
  {
    window.location.href = '/#/' + newUrl;
  }
}
