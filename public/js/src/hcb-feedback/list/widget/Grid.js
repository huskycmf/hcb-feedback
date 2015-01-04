define([
    "dojo/_base/declare",
    "dojo/_base/lang",
    "hcb-feedback/store/FeedbackStore",
    "dgrid/OnDemandGrid",
    "dgrid/extensions/ColumnHider",
    "dgrid/extensions/ColumnResizer",
    "dgrid/extensions/DijitRegistry",
    "hc-backend/dgrid/_Selection",
    "hc-backend/dgrid/_Refresher",
    "hc-backend/dgrid/columns/timestamp",
    "hc-backend/dgrid/columns/editor",
    "dgrid/Keyboard",
    "dgrid/selector",
    "dojo/i18n!../../nls/List"
], function(declare, lang, FeedbackStore,
            OnDemandGrid, ColumnHider, ColumnResizer, DijitRegistry,
            _Selection, _Refresher, timestamp, editor, Keyboard,
            selector, translation) {

    return declare('hcb-feedback.list.widget.Grid',
                   [ OnDemandGrid, ColumnHider, ColumnResizer,
                     Keyboard, _Selection, _Refresher, DijitRegistry ], {
        //  summary:
        //      Grid widget for displaying all available feedback messages
        //      as list
        store: FeedbackStore,
        columns: [
            selector({ label: "", width: 40, selectorType: "checkbox" }),

            {label: translation['idLabel'],
             field: 'id', hidden: true,
             sortable: false, resizable: false},

            {label: translation['phoneLabel'],
             field: 'phone', hidden: false,
             sortable: false, resizable: false},

            {label: translation['emailLabel'],
             field: 'email', hidden: false,
             sortable: false, resizable: false},

            {label: translation['nameLabel'],
             field: 'name', hidden: false,
             sortable: false,  resizable: false},

            {label: translation['messageLabel'],
                field: 'message', hidden: false,
                sortable: false,  resizable: false}
        ],

        loadingMessage: translation['loadingMessage'],
        noDataMessage: translation['noDataMessage'],

        showHeader: true,
        allowTextSelection: true
    });
});
