<?php
return array(
    'router' => array(
        'routes' => array(
            'mapster.rest.entities' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/entities[/:entities_id]',
                    'defaults' => array(
                        'controller' => 'mapster\\V1\\Rest\\Entities\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'mapster.rest.entities',
        ),
    ),
    'zf-rest' => array(
        'mapster\\V1\\Rest\\Entities\\Controller' => array(
            'listener' => 'mapster\\V1\\Rest\\Entities\\EntitiesResource',
            'route_name' => 'mapster.rest.entities',
            'route_identifier_name' => 'entities_id',
            'collection_name' => 'entities',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'mapster\\V1\\Rest\\Entities\\EntitiesEntity',
            'collection_class' => 'mapster\\V1\\Rest\\Entities\\EntitiesCollection',
            'service_name' => 'entities',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'mapster\\V1\\Rest\\Entities\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'mapster\\V1\\Rest\\Entities\\Controller' => array(
                0 => 'application/vnd.mapster.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'mapster\\V1\\Rest\\Entities\\Controller' => array(
                0 => 'application/vnd.mapster.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'mapster\\V1\\Rest\\Entities\\EntitiesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'mapster.rest.entities',
                'route_identifier_name' => 'entities_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'mapster\\V1\\Rest\\Entities\\EntitiesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'mapster.rest.entities',
                'route_identifier_name' => 'entities_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'mapster\\V1\\Rest\\Entities\\EntitiesResource' => array(
                'adapter_name' => 'mapster',
                'table_name' => 'entities',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'mapster\\V1\\Rest\\Entities\\Controller',
                'entity_identifier_name' => 'id',
            ),
        ),
    ),
);
