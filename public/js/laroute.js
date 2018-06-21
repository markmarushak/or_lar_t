(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"home","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":null,"action":"\App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"cache-clear","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"view-clear","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"route-clear","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service","name":"affiliate-service","action":"App\Http\Controllers\Affiliate\AffiliateController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/compaigns","name":"compaigns","action":"App\Http\Controllers\Affiliate\AffiliateController@compaigns"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/affiliates-partners","name":"affiliates-partners","action":"App\Http\Controllers\Affiliate\AffiliatePartnerController@index"},{"host":null,"methods":["POST"],"uri":"affiliate-service\/affiliates-partners\/delete","name":"delete-affiliate-partner","action":"App\Http\Controllers\Affiliate\AffiliatePartnerController@delete"},{"host":null,"methods":["POST"],"uri":"affiliate-service\/affiliates-partners\/show","name":"show-affiliates-partners","action":"App\Http\Controllers\Affiliate\AffiliatePartnerController@show"},{"host":null,"methods":["POST"],"uri":"affiliate-service\/affiliates-partners\/get","name":"get-affiliate-partner","action":"App\Http\Controllers\Affiliate\AffiliatePartnerController@getAffiliatePartner"},{"host":null,"methods":["POST"],"uri":"affiliate-service\/affiliates-partners\/edit","name":"edit-affiliate-partner","action":"App\Http\Controllers\Affiliate\AffiliatePartnerController@edit"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/affiliates-partners\/add-affiliates-partners","name":"add-affiliates-partners","action":"App\Http\Controllers\Affiliate\AffiliatePartnerController@add"},{"host":null,"methods":["POST"],"uri":"affiliate-service\/affiliates-partners\/add-affiliates-partners","name":"add-affiliates-partners-store","action":"App\Http\Controllers\Affiliate\AffiliatePartnerController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/email-bulk-split","name":"email-bulk-split","action":"App\Http\Controllers\Affiliate\AffiliateController@emailBulkSplit"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/email-bulk-split\/data-filters-rules","name":"data-filters-rules","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/email-bulk-split\/data-filters-rules\/add","name":"data-filters-rules-add","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@add"},{"host":null,"methods":["POST"],"uri":"affiliate-service\/email-bulk-split\/data-filters-rules\/add","name":"data-filters-rules-store","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/data-filters-rules\/edit\/{data_filters_rules_id}\/{data_filters_rules_description}\/connection","name":"connection","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@connection"},{"host":null,"methods":["PUT"],"uri":"affiliate-service\/data-filters-rules\/edit\/{data_filters_rules_id}\/{data_filters_rules_description}\/connection\/update","name":"connection-update","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@updateConnectDb"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/data-filters-rules\/edit\/{data_filters_rules_id}\/{data_filters_rules_description}\/form-builder","name":"form-builder","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@formbuilder"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/data-filters-rules\/edit\/{data_filters_rules_id}\/{data_filters_rules_description}","name":"data-filters-rules-edit","action":"App\Http\Controllers\Affiliate\AffiliateController@dataFiltersRules"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/data-filters-rules\/edit\/{data_filters_rules_id}\/{data_filters_rules_description}\/data-base-fields","name":"data-base-fields","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@dataBaseFields"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/data-filters-rules\/edit\/{data_filters_rules_id}\/{data_filters_rules_description}\/data-filters-rules-data","name":"data-filters-rules-data","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@dataFiltersRulesData"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/data-filters-rules\/edit\/{data_filters_rules_id}\/{data_filters_rules_description}\/output-overview","name":"output-overview","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@outputOverview"},{"host":null,"methods":["GET","HEAD"],"uri":"affiliate-service\/data-filters-rules\/edit\/{data_filters_rules_id}\/{data_filters_rules_description}\/output-overview-single\/{single_id?}","name":"output-overview-single","action":"App\Http\Controllers\Affiliate\DataFilterRuleController@outputOverviewSingle"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

