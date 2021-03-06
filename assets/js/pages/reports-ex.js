/**
 * Created by SANEK333 on 08.10.2015.
 */
var global = {
    dadata: {
        key: '54da3aafbc833c05409561f10b0a46ae5fe1c32b'
    }
}
function suggestions($el, type, key, onSelect) {
    var select = null;
    switch (type) {
        case 'PARTY':
            select = function (suggestion) {
                var data = suggestion.data;
                if (key) {
                    if (key == 'unrestricted_value' || key == 'value') {
                        $el.val(suggestion[key]);
                    } else if ($.isArray(key)){
                        var value = data[key[0]];
                        for (var i = 1; i < key.length; i++)
                            value = value[key[i]];
                        $el.val(value);
                        if (onSelect)
                            onSelect(suggestion);
                    } else {
                        key = key.split('.');
                        var value = data[key[0]];
                        for (var i = 1; i < key.length; i++)
                            value = value[key[i]];
                        $el.val(value);
                        if (onSelect)
                            onSelect(suggestion);
                    }
                }
            }
            break;
    }
    if (!select && onSelect)
        select = function (suggestion) {
            onSelect(suggestion);
        }
    $el.suggestions({
        serviceUrl: "https://dadata.ru/api/v2",
        token: global.dadata.key,
        type: type,
        count: 5,
        onSelect: select
    });

}

$(document).ready(function () {
    $(document).find('head').append('<!--[if lt IE 10]><script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script> <![endif]-->');
    var form = $('[data-role="excel"]');
    if (form.length) {
        suggestions(form.find('[data-role="fullName"]'), 'PARTY', 'name.full_with_opf',function (suggestion) {
            form.find('[data-role="ogrn"]').val(suggestion.data.ogrn);
            form.find('[data-role="inn"]').val(suggestion.data.inn);
        });
        suggestions(form.find('[data-role="ogrn"]'), 'PARTY', 'ogrn');
        suggestions(form.find('[data-role="inn"]'), 'PARTY', 'inn');
    } else {
        form = $('[data-role="word"]');
        if (form.length) {
            suggestions(form.find('[data-role="address"]'), 'ADDRESS');
            suggestions(form.find('[data-role="chairman"]'), 'NAME');
            suggestions(form.find('[data-role="secretary"]'), 'NAME');
            suggestions(form.find('[data-role="name"]'), 'PARTY');
        }
    }
})