<?php
return array(
    'HcbFeedback-Controller-Collection-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' =>
                'HcbFeedback-Service-Collection-FetchQbBuilder',
            'viewModel' => 'HcbFeedback-Paginator-ViewModel-JsonModel'
        )
    ),

    'HcbFeedback-Controller-Collection-Delete' => array(
        'parameters' => array(
            'inputData' => 'HcbFeedback-Data-Collection-Entities-ByIds',
            'serviceCommand' => 'HcbFeedback-Service-Collection-Delete',
            'jsonResponseModelFactory' =>
                'HcbFeedback-Json-View-StatusMessageDataModelFactory'
        )
    )
);
