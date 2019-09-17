Date.prototype.yyyymmdd = function() 
{
    var yyyy = this.getFullYear().toString();
    var mm = (this.getMonth()+1).toString(); 
    var dd  = this.getDate().toString();
    return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]);
};

Date.prototype.mmddyyyy = function() 
{
    var yyyy = this.getFullYear().toString();
    var mm = (this.getMonth()+1).toString(); 
    var dd  = this.getDate().toString();
    return (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]) + "-" + yyyy;
};


$.fn.enabled = function(isenabled){
    if(isenabled)
        this.prop("disabled", false);
    else
        this.prop("disabled", true);
}

function scroll_top() 
{
    $('html,body').animate({
        scrollTop: $(".entry").offset().top
    }, 'slow');
}

$('.dpyear').datepicker({
    minViewMode: 2,
    format: 'yyyy',
    autoclose: true,
    orientation: "bottom auto"
});

jQuery.expr[':'].regex = function(elem, index, match) {
    var matchParams = match[3].split(','),
        validLabels = /^(data|css):/,
        attr = {
            method: matchParams[0].match(validLabels) ? 
                        matchParams[0].split(':')[0] : 'attr',
            property: matchParams.shift().replace(validLabels,'')
        },
        regexFlags = 'ig',
        regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
    return regex.test(jQuery(elem)[attr.method](attr.property));
}