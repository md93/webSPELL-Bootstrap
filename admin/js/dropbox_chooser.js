$(document).ready(function() {
    $('#db-chooser').on("DbxChooserSuccess", function(e) {
        e = e.originalEvent;
        
        i=0;
        var dropboxfiletype = "";
        jQuery.each(e.files, function() {
            dropboxfiletype = (e.files[i].link).substr((e.files[i].link).length - 3).toLowerCase();
                
            if(dropboxfiletype == "jpg" || dropboxfiletype == "png" || dropboxfiletype == "gif") { 
                $("#dropbox-table tr:last").after('<tr><td><input type="checkbox" value="'+e.files[i].link+'" name="pictures[]" checked="checked" /></td><td><a href="'+e.files[i].link+'" target="_blank">'+e.files[i].name+'</a></td><td><input type="text" name="name[]" size="40" value="'+e.files[i].name+'" /></td><td><input type="text" name="comment[]" size="40" /></td></tr>');
            }
            else alert(e.files[i].name+" is not .jpg, .png or .gif - it will not be added.");
            i++;
        });
    });
});