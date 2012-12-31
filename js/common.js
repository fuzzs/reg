function loginPost(email, password)
{
    formData = "email="+escape(email)+"&password="+escape(password);
    //$('#debug').append(formData);

    $.ajax({
        url: "http://reglo.local/ajax.php/loginajaxcontroller/login/",
        type: "post",
        data: formData,
        context: document.body,
        dataType: "html",
        success: function(data){
            // redirect vers la page de base.
            //window.location = "http://reglo.local/index.php/article/";
            $('#debug').html(data);
        }
    });
}