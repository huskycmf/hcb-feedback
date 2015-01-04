<?php
return array(
    'routes' => array(
        'hc-backend' => array(
            'child_routes' => array(
                'feedback' => include __DIR__ . '/router/feedback.config.php'
            )
        )
    )
);
