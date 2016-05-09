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
    try {
      delete data.created;
      delete data.updated;
    }
    catch(err) {

    }

    return $.ajax({
      url: $api.concat(url),
      method: type,
      data: data
    });
  },
  parseJson: function(string)
  {
      data = JSON.parse(string);

      try {
        data = JSON.parse(data);
      }
      catch(err) {

      }

      return data;
  },
  showRequestErrors: function(errors)
  {
    var data = this.parseJson(errors);
    var string = String(data.error).split('.,').join('.<br>');
    this.showError(string);
  },
  showSuccess: function(message)
  {
    $('#errors').addClass("alert alert-success alert-dismissible");
    $('#errors').html('<p>' + message + '</p>');
  },
  showError: function(message)
  {
    $('#errors').addClass("alert alert-danger alert-dismissible");
    $('#errors').html('<p>' + message + '</p>');
  },
  showWarning: function(message)
  {
    $('#errors').addClass("alert alert-warning alert-dismissible");
    $('#errors').html('<p>' + message + '</p>');
  },
  showInfo: function(message)
  {
    $('#errors').addClass("alert alert-info alert-dismissible");
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
