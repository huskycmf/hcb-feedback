define([
    "dojo/_base/declare",
    "hc-backend/layout/main/content/package",
    "dojo/i18n!./nls/Package",
    "xstyle/css!./css/feedback.css"
], function(declare, _Package, translation) {
    return declare("FeedbackPackage", [ _Package ], {
        title: translation['packageTitle']
    });
});
