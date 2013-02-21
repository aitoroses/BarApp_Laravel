var object = 'login/check.php';
var content = 'fieldset p';
 
    $.post(object, { js: true }, function(data) {
        $(content).html('');
        $(content).append(data);
    });