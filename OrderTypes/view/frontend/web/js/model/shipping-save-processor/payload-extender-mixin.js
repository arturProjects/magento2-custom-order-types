define(['jquery', 'underscore', 'mage/utils/wrapper'], function ($, _, wrapper) {
    'use strict';
    return function (payloadExtender) {
        return wrapper.wrap(payloadExtender, function (originalPayloadExtender, payload) {
            originalPayloadExtender(payload);
            _.extend(payload.addressInformation.extension_attributes,
                {
                    'custom_order_type': $('[name="order-type"]:checked').val()
                }
            );
        });
    };
});
