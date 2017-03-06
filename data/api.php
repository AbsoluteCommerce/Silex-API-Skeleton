<?php
use Absolute\SilexApi\Generator\GeneratorConfig;

return [
    GeneratorConfig::API_VERSION => '0.1.0',
    GeneratorConfig::API_NAME => 'Acme WebService',
    GeneratorConfig::API_DESCRIPTION => 'Welcome to the Acme WebService!',
    GeneratorConfig::API_EMAIL => 'info@api.acme.com',
    
    GeneratorConfig::NAMESPACE_RESOURCE => 'Acme\\WebService\\Resource\\',
    GeneratorConfig::GENERATION_DIR => __DIR__ . '/../generation',
    GeneratorConfig::RESOURCE_DIR => __DIR__ . '/../src/Resource',
    
    GeneratorConfig::RESOURCES => [
        'TestGet' => [
            'path' => '/test',
            'method' => 'get',
            'name' => 'Test GET',
            'description' => 'Test endpoint for GET requests',
            'tags' => ['test'],
            'response' => 'message',
            'namespace' => 'Test',
        ],
        'TestPost' => [
            'path' => '/test',
            'method' => 'post',
            'name' => 'Test POST',
            'description' => 'Test endpoint for POST requests',
            'tags' => ['test'],
            'response' => 'message',
            'namespace' => 'Test',
        ],
        'TestPut' => [
            'path' => '/test',
            'method' => 'put',
            'name' => 'Test PUT',
            'description' => 'Test endpoint for PUT requests',
            'tags' => ['test'],
            'response' => 'message',
            'namespace' => 'Test',
        ],
        'TestPatch' => [
            'path' => '/test',
            'method' => 'patch',
            'name' => 'Test PATCH',
            'description' => 'Test endpoint for PATCH requests',
            'tags' => ['test'],
            'response' => 'message',
            'namespace' => 'Test',
        ],
        'TestDelete' => [
            'path' => '/test',
            'method' => 'delete',
            'name' => 'Test DELETE',
            'description' => 'Test endpoint for DELETE requests',
            'tags' => ['test'],
            'response' => 'message',
            'namespace' => 'Test',
        ],
        'Home' => [
            'path' => '/',
            'method' => 'get',
            'name' => 'API Home',
            'description' => 'API Home',
            'tags' => ['home'],
            'response' => 'message',
            'namespace' => 'Home',
        ],
        'CustomerGet' => [
            'path' => '/customers/{customerId}',
            'method' => 'get',
            'name' => 'Get Customer',
            'description' => 'Retrieve information about a Customer',
            'tags' => ['customer'],
            'params' => [
                'customerId' => [
                    'field' => 'customerId',
                    'description' => 'ID of Customer',
                    'required' => true,
                    'type' => 'string'
                ]
            ],
            'response' => 'customer',
            'namespace' => 'Customer',
        ],
        'CustomerFind' => [
            'path' => '/customers',
            'method' => 'get',
            'name' => 'Find Customers',
            'description' => 'Search for a Customer',
            'tags' => ['customer'],
            'queries' => [
                'id' => [
                    'field' => 'filter[id]',
                    'description' => 'ID of Customer',
                    'required' => false,
                    'type' => 'string'
                ],
                'givenName' => [
                    'field' => 'filter[givenName]',
                    'description' => 'Given name of Customer',
                    'required' => false,
                    'type' => 'string'
                ],
                'familyName' => [
                    'field' => 'filter[familyName]',
                    'description' => 'Family name of Customer',
                    'required' => false,
                    'type' => 'string'
                ],
            ],
            'response' => 'customer[]',
            'namespace' => 'Customer',
        ],
        'CustomerCreate' => [
            'path' => '/customers',
            'method' => 'post',
            'name' => 'Create Customer',
            'description' => 'Create a new Customer',
            'tags' => ['customer'],
            'body' => 'customer',
            'response' => 'customer',
            'namespace' => 'Customer',
        ],
        'CustomerUpdate' => [
            'path' => '/customers/{customerId}',
            'method' => 'patch',
            'name' => 'Update Customer',
            'description' => 'Update an existing Customer',
            'tags' => ['customer'],
            'params' => [
                'customerId' => [
                    'field' => 'customerId',
                    'description' => 'ID of Customer',
                    'required' => true,
                    'type' => 'string'
                ]
            ],
            'body' => 'customer',
            'response' => 'customer',
            'namespace' => 'Customer',
        ],
        'CustomerDelete' => [
            'path' => '/customers/{customerId}',
            'method' => 'delete',
            'name' => 'Delete Customer',
            'description' => 'Delete an existing Customer',
            'tags' => ['customer'],
            'params' => [
                'customerId' => [
                    'field' => 'customerId',
                    'description' => 'ID of Customer',
                    'required' => true,
                    'type' => 'string'
                ]
            ],
            'response' => null,
            'namespace' => 'Customer',
        ],
    ],
    GeneratorConfig::MODELS => [
        'message' => [
            'properties' => [
                'value' => [
                    'type' => 'string',
                    'example' => 'An Example Message',
                ]
            ],
        ],
        'customer' => [
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'example' => '12345',
                ],
                'givenName' => [
                    'type' => 'string',
                    'example' => 'Joe',
                ],
                'familyName' => [
                    'type' => 'string',
                    'example' => 'Bloggs',
                ],
                'email' => [
                    'type' => 'string',
                    'example' => 'joe.bloggs@email.com',
                ],
            ],
        ],
    ],
];
