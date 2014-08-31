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
            'mapster.rest.universes' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/universes[/:universes_id]',
                    'defaults' => array(
                        'controller' => 'mapster\\V1\\Rest\\Universes\\Controller',
                    ),
                ),
            ),
            'mapster.rest.universe-versions' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/universe_versions[/:universe_versions_id]',
                    'defaults' => array(
                        'controller' => 'mapster\\V1\\Rest\\UniverseVersions\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'mapster.rest.entities',
            1 => 'mapster.rest.universes',
            2 => 'mapster.rest.universe-versions',
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
            'collection_query_whitelist' => array(
                0 => 'name',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'mapster\\V1\\Rest\\Entities\\EntitiesEntity',
            'collection_class' => 'mapster\\V1\\Rest\\Entities\\EntitiesCollection',
            'service_name' => 'entities',
        ),
        'mapster\\V1\\Rest\\Universes\\Controller' => array(
            'listener' => 'mapster\\V1\\Rest\\Universes\\UniversesResource',
            'route_name' => 'mapster.rest.universes',
            'route_identifier_name' => 'universes_id',
            'collection_name' => 'universes',
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
            'entity_class' => 'mapster\\V1\\Rest\\Universes\\UniversesEntity',
            'collection_class' => 'mapster\\V1\\Rest\\Universes\\UniversesCollection',
            'service_name' => 'universes',
        ),
        'mapster\\V1\\Rest\\UniverseVersions\\Controller' => array(
            'listener' => 'mapster\\V1\\Rest\\UniverseVersions\\UniverseVersionsResource',
            'route_name' => 'mapster.rest.universe-versions',
            'route_identifier_name' => 'universe_versions_id',
            'collection_name' => 'universe_versions',
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
            'entity_class' => 'mapster\\V1\\Rest\\UniverseVersions\\UniverseVersionsEntity',
            'collection_class' => 'mapster\\V1\\Rest\\UniverseVersions\\UniverseVersionsCollection',
            'service_name' => 'universe_versions',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'mapster\\V1\\Rest\\Entities\\Controller' => 'HalJson',
            'mapster\\V1\\Rest\\Universes\\Controller' => 'HalJson',
            'mapster\\V1\\Rest\\UniverseVersions\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'mapster\\V1\\Rest\\Entities\\Controller' => array(
                0 => 'application/vnd.mapster.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'mapster\\V1\\Rest\\Universes\\Controller' => array(
                0 => 'application/vnd.mapster.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'mapster\\V1\\Rest\\UniverseVersions\\Controller' => array(
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
            'mapster\\V1\\Rest\\Universes\\Controller' => array(
                0 => 'application/vnd.mapster.v1+json',
                1 => 'application/json',
            ),
            'mapster\\V1\\Rest\\UniverseVersions\\Controller' => array(
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
            'mapster\\V1\\Rest\\Universes\\UniversesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'mapster.rest.universes',
                'route_identifier_name' => 'universes_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'mapster\\V1\\Rest\\Universes\\UniversesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'mapster.rest.universes',
                'route_identifier_name' => 'universes_id',
                'is_collection' => true,
            ),
            'mapster\\V1\\Rest\\UniverseVersions\\UniverseVersionsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'mapster.rest.universe-versions',
                'route_identifier_name' => 'universe_versions_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'mapster\\V1\\Rest\\UniverseVersions\\UniverseVersionsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'mapster.rest.universe-versions',
                'route_identifier_name' => 'universe_versions_id',
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
                'table_service' => 'mapster\\V1\\Rest\\Entities\\EntitiesResource\\Table',
            ),
            'mapster\\V1\\Rest\\Universes\\UniversesResource' => array(
                'adapter_name' => 'mapster',
                'table_name' => 'universes',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'mapster\\V1\\Rest\\Universes\\Controller',
                'entity_identifier_name' => 'id',
            ),
            'mapster\\V1\\Rest\\UniverseVersions\\UniverseVersionsResource' => array(
                'adapter_name' => 'mapster',
                'table_name' => 'universe_versions',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'mapster\\V1\\Rest\\UniverseVersions\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'mapster\\V1\\Rest\\UniverseVersions\\UniverseVersionsResource\\Table',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'mapster\\V1\\Rest\\Entities\\Controller' => array(
            'input_filter' => 'mapster\\V1\\Rest\\Entities\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'mapster\\V1\\Rest\\Entities\\Validator' => array(
            0 => array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                        'options' => array(),
                    ),
                ),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
                'description' => 'The name of the entity',
            ),
        ),
    ),
);
