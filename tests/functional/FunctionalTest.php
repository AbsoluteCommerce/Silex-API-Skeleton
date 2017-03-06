<?php
use Silex\Application;
use Silex\WebTestCase;
use Symfony\Component\Yaml\Yaml;
use Absolute\SilexApi\Config;
use Absolute\SilexApi\SilexApi;

class FunctionalTest extends WebTestCase
{
    /**
     * @inheritdoc
     */
    public function createApplication()
    {
        // initialise Silex
        $app = new Application;
        unset($app['exception_handler']);
        
        // initialise Absolute SilexApi
        $config = new Config([
            Config::DEBUG => true,
        ]);
        SilexApi::init($app, $config);

        return $app;
    }

    /**
     * @param string $uri
     * @param string $method
     * @param null|string $content
     * @param array $parameters
     * @param null|string|array $expectedResponse
     * @throws \Exception
     * 
     * @test
     * @dataProvider provideRoutes
     */
    public function testRoutes($uri, $method, $content, array $parameters, $expectedResponse)
    {
        $client = $this->createClient();
        $client->request($method, $uri, $parameters, [], [], $content, true);
        $response = $client->getResponse();
        
        $responseContent = $response->getContent();
        if ($responseContent === '') {
            $this->assertEquals(null, $expectedResponse);
        } else {
            $data = json_decode($responseContent, true);
            if (!is_array($data)) {
                throw new \Exception(sprintf('Invalid response: %s', $responseContent));
            }
            
            $this->assertEquals($expectedResponse, $data);
        }
    }

    /**
     * @return array
     */
    public function provideRoutes()
    {
        $dataDir = __DIR__ . DIRECTORY_SEPARATOR . 'test-cases';

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $dataDir,
                RecursiveDirectoryIterator::SKIP_DOTS
            )
        );

        $tests = [];
        foreach ($iterator as $_path => $_dir) {
            if ($_dir->isDir()) {
                continue;
            }

            $_shortPath = str_replace($dataDir, '', $_path);
            $_data = Yaml::parse(file_get_contents($_path));
            
            $_request = isset($_data['request']) ? $_data['request'] : [];
            $_response = isset($_data['response']) ? $_data['response'] : [];
            
            $tests[$_shortPath] = [
                'uri' => isset($_request['uri']) ? $_request['uri'] : null,
                'method' => isset($_request['method']) ? $_request['method'] : null,
                'content' => isset($_request['content']) ? json_encode($_request['content']) : null,
                'parameters' => isset($_request['parameters']) ? $_request['parameters'] : [],
                'response' => isset($_response['content']) ? $_response['content'] : null,
            ];
        }

        return $tests;
    }
}
