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
        'Home' => [
            'path' => '/',
            'method' => 'get',
            'name' => 'API Home',
            'description' => 'API Home',
            'tags' => ['home'],
            'response' => 'message',
            'namespace' => 'Home',
        ],
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
    ],
];
