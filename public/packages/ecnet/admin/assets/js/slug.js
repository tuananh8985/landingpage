/*
jQuery Slug 1.0
===============

jQuery Slug is a powerful plugin that makes it easy to transform strings into slugs.

*/
DEBUG = null;
(function($) {

    // Default map of accented and special characters to ASCII characters
    // credits: CakePHP
    var transliteration = {
        'À|Ẩ|Ấ|Ầ|Ẫ|Ậ|Á|Ả|Ạ|Â|Ã|Ä|Å|Ǻ|Ā|Ă|Ą|Ǎ|Ả|Ạ|Ặ': 'a',
        'à|ầ|ấ|ẫ|ậ|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª|ả|ạ|ặ': 'a',
        'Ç|Ć|Ĉ|Ċ|Č': 'c',
        'ç|ć|ĉ|ċ|č': 'c',
        'Ð|Ď|Đ': 'd',
        'ð|ď|đ': 'd',
        'È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě|Ể|Ẹ|Ẽ|Ề|Ế|Ệ|Ễ': 'e',
        'è|é|ê|ë|ē|ĕ|ė|ę|ě|ể|ẹ|ẽ|ề|ế|ệ|ễ': 'e',
        'Ĝ|Ğ|Ġ|Ģ': 'g',
        'ĝ|ğ|ġ|ģ': 'g',
        'Ĥ|Ħ': 'h',
        'ĥ|ħ': 'h',
        'Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|Ỉ': 'i',
        'ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|ỉ': 'i',
        'Ĵ': 'j',
        'ĵ': 'j',
        'Ķ': 'k',
        'ķ': 'k',
        'Ĺ|Ļ|Ľ|Ŀ|Ł': 'l',
        'ĺ|ļ|ľ|ŀ|ł': 'l',
        'Ñ|Ń|Ņ|Ň': 'n',
        'ñ|ń|ņ|ň|ŉ': 'n',
        'Ò|Ó|Õ|Ơ|Ớ|Ờ|Ợ|Ở|Ồ|Ộ|Ỗ|Ố|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ': 'o',
        'o|ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ỗ|ổ|ộ': 'o',
        'Ŕ|Ŗ|Ř': 'r',
        'ŕ|ŗ|ř': 'r',
        'Ś|Ŝ|Ş|Š': 's',
        'ś|ŝ|ş|š|ſ': 's',
        'Ţ|Ť|Ŧ|T': 't',
        'ţ|ť|ŧ': 't',
        'Ù|Ú|Ư|Ử|Ữ|Ự|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ|Ủ': 'u',
        'ù|ú|û|ũ|ư|ử|ữ|ự|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ|ủ': 'u',
        'Ý|Ÿ|Ŷ': 'y',
        'ý|ÿ|ŷ': 'y',
        'Ŵ': 'w',
        'ŵ': 'w',
        'Ź|Ż|Ž': 'z',
        'ź|ż|ž': 'z',
        'ƒ': 'f'
    };

    /**
    * Returns a string with all spaces converted to underscores (by default), accented
    * characters converted to non-accented characters, and non word characters removed.
    * credits: CakePHP
    */
    $.slug = function(string, replacement, map) {

        if($.type(replacement) == 'undefined') {
            replacement = '-';
        } else if($.type(replacement) == 'object') {
            map = replacement;
            replacement = '-';
        }

        transliteration['[^a-zA-Z0-9]'] = replacement;

        if(!map) {
            map = {};
        }

        map = $.extend({}, transliteration, map, {
            "\\s+": replacement
        });

        var slug = string;
        $.each(map, function(index, value) {
            var re = new RegExp(index, "g");
            slug = slug.replace(re, value);
        });

        return slug;

    };


    $.fn.slug = function(options) {

        var settings = $.extend({}, {
            'target': null,
            'event': 'keyup',
            'replacement': '-',
            'map': null,
            'callback': null
        }, options);

        if($.type(options) == 'function') {
            settings['callback'] = options;
        }

        this.each(function() {
            var $this = $(this);

            $this.bind(settings['event'] + ' jquery-slug-bind', function() {
                var val = $this.val();

                slug = $.slug(val, settings['replacement'], settings['map']);
                if(settings['target']) {
                    _setVal(settings['target'], slug);
                }

                if(settings['callback']) {
                    settings['callback'].apply($this, [slug, val]);
                }
            });

            $this.trigger('jquery-slug-bind');

        });
    }

    var _setVal = function(target, value) {
        var $target = $(target);
        if($target.is(':input')) {
            $target.val(value);
        } else {
            $target.text(value);
        }
    }

})(jQuery);