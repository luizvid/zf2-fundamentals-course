<?php
return array(
    'controllers' => array(
        'invokables' => array(
        ),
        'factories' => array(
            'market-post-controller' => 'Market\Factory\PostControllerFactory',
            'market-index-controller' => 'Market\Factory\IndexControllerFactory',
            'market-view-controller' => 'Market\Factory\ViewControllerFactory',
            'market-delete-controller' => 'Market\Factory\DeleteControllerFactory',
        ),
        'aliases' => array(
            'alt' => 'market-view-controller',
        ),
    ),
    'service_manager' => array(
        'services' => array(
            'date-expires' => array(5, 10, 15, 20, 25),
        ),
        'factories' => array(
            'market-post-form' => 'Market\Factory\PostFormFactory',
            'market-post-filter' => 'Market\Factory\PostFormFilterFactory',
            'listings-table' => 'Market\Factory\ListingsTableFactory',
            'area-codes-table' => 'Market\Factory\WorldCityAreaCodesTableFactory',
            'market-delete-form' => 'Market\Factory\DeleteFormFactory',
            'market-delete-filter' => 'Market\Factory\DeleteFormFilterFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller'    => 'market-index-controller',
                        'action'        => 'index'
                    )
                )
            ),
            'market' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/market',
                    'defaults' => array(
                        'controller'    => 'market-index-controller',
                        'action'        => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'slash' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => 'market-index-controller',
                                'action' => 'index',
                            )
                        ),
                    ),
                    'view' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/view[/]',
                            'defaults' => array(
                                'controller' => 'market-view-controller',
                                'action' => 'index',
                            )
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'main' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => 'main[/][:category]',
                                    'defaults' => array(
                                        'action'        => 'index'
                                    )
                                )
                            ),
                            'item' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => 'item[/][:itemId]',
                                    'defaults' => array(
                                        'action'    => 'item'
                                    ),
                                    'constraints' => array(
                                        'itemId' => '[0-9]*'
                                    )
                                )
                            )
                        )
                    ),
                    'post' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/post[/]',
                            'defaults' => array(
                                'controller'    => 'market-post-controller',
                                'action'        => 'index'
                            )
                        )
                    ),
                    'delete' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/delete[/]',
                            'defaults' => array(
                                'controller'    => 'market-delete-controller',
                                'action'        => 'index'
                            )
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        ),
    ),
);
