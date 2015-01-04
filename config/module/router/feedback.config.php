<?php
return array(
    'type' => 'literal',
    'options' => array(
        'route' => '/feedback'
    ),
    'may_terminate' => false,
    'child_routes' => array(
        'delete' => array(
            'type' => 'literal',
            'options' => array(
                'route' => '/delete'
            ),
            'may_terminate' => false,
            'child_routes' => array(
                'delete' => array(
                    'type' => 'method',
                    'options' => array(
                        'verb' => 'post',
                        'defaults' => array(
                            'controller' =>
                                'HcbFeedback-Controller-Collection-Delete'
                        )
                    )
                )
            )
        ),
        'list' => array(
            'type' => 'method',
            'options' => array(
                'verb' => 'get'
            ),
            'may_terminate' => false,
            'child_routes' => array(
                'show' => array(
                    'type' => 'XRequestedWith',
                    'options' => array(
                        'with' => 'XMLHttpRequest',
                        'defaults' => array(
                            'controller' =>
                                'HcbFeedback-Controller-Collection-List'
                        )
                    )
                )
            )
        )
    )
);
