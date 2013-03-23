/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function User()
{
    var arID;
    var articleViewState; // supports states: list, detail, edit
    var currTargetState;
    var toSelf;
    var articleContent;
    var articleTitle;
    var currPage;
    
    return User;
}


User.setSelf = function (user)
{
    this.toSelf = user;
}


User.getSubscriberList = function ()
{   

    
    $.ajax({
        url: "http://reglo.local/ajax.php/userajaxcontroller/getsubscribers/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#subscriberList').html(data);
        //$('#articleContainer').append(data);
    });
}
    
User.register = function (name, email, pass)
{
    formData = "name="+encodeURIComponent(name)+"&email="+encodeURIComponent(email)+"&pass="+encodeURIComponent(pass);
    $('#debug').append(formData);
    
    $.ajax({
        url: "http://reglo.local/ajax.php/articleajaxcontroller/savearticle/",
        type: "post",
        data: formData,
        context: document.body,
        dataType: "html",
        success: function(data){
            $('#debug').append(data);
            //TODO: show success message.
            //$('#articleContainer').append(data);
        }
    });
    
    $.ajax({
        url: "http://reglo.local/ajax.php/userajaxcontroller/getsubscribers/",
        context: document.body,
        dataType: "html"
    }).done(function(data){
        $('#subscriberList').html(data);
        //$('#articleContainer').append(data);
    });
}


var usr = new User();
