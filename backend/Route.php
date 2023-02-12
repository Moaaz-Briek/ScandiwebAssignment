<?php
class Route
{
    private static array $handlers;
    private static $notFoundHandler;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';


    public static function get(string $path, $handler): void
    {
        (new Route)->addHandler(self::METHOD_GET, $path, $handler);
    }

    public static function post(string $path, $handler) : void
    {
        (new Route)->addHandler(self::METHOD_POST, $path, $handler);
    }

    private function addHandler(string $method, string $path, $handler): void
    {
        self::$handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }

    public static function addNotFoundHandler($handler): void
    {
        self::$notFoundHandler = $handler;
    }

    public static function run(): void
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];
        $callback = null;
        foreach (self::$handlers as $handler)
        {
            if($handler['path'] === $requestPath && $method === $handler['method']) {
                $callback = $handler['handler'];
            }
        }
        if(!$callback){
            header("HTTP/1.0 404 NOT FOUND");
            if(!empty(self::$notFoundHandler)){
                $callback = self::$notFoundHandler;
            }
        }
        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }
};