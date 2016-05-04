var helper = {

  isObject: function(val) {
    return val instanceof Object;
  },
  getFirstElement: function(array) {
    if  ((array[0] != null) && (array[0] != undefined)){
      return array[0];
    }
    return array;
  }
};

function sendRequest(data, url, type) {

  $.ajax({
    url: api.concat(url),
    method: type,
    data: data
  })
  .done(function(data) {
    return data;
  })
  .fail(function(jqXHR, textStatus) {
    showErrors(jqXHR.responseText);
  });
}

function submitForm(id, url, newUrl)
{
  var data = $('#' + id).serialize();
  var response = sendRequest(data, url, "POST", newUrl);

  if(response !== undefined)
  {
    window.location.href = '/#/' + newUrl;
  }
}

function showErrors(errors)
{
  var data = JSON.parse(errors);
  data = JSON.parse(data);

  var string = String(data.error).split('.,').join('.<br>');

  $('#errors').addClass("alert alert-danger");
  $('#errors').html('<p>' + string + '</p>');

}
