define(
    [
        'ko',
        'uiComponent'
    ],
    function (ko, Component) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'AB_OrderTypes/view/custom-order-types'
            },
            initialize: function () {
                this._super();
            },
            isDisplayOption: function () {
                return true;
            }
        });
    }
);
