<?php
namespace App\HTTP;
class Request implements App\interfaces\Request
{
    const method =['POST','GET','PUT','PATCH','DELETE'];
    public $get;
    public $post;
    public $cookie;
    public $session;
    public $file;
    public $uri;
    public $host;
    public $requestMethod;

    function __construct($get = [], $post = [], $file = [])
    {
        $this->init($get, $post, $file);
    }

    public function getHeader(array $get)
{
    $this->get = $get;
    return $this;
}

    public function getBodyRequest()
{
    $this->post = file_get_contents('php://input');
    return $this->post;

}

    public function getTypeRequest()
{

    $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    return $this->requestMethod;
}

    public function init(array $get = [], array $post = [], $file = [], array $cookie = [], array $session = [])
{
    $this->get = $get;
    $this->post = $post;
    $this->cookie = $cookie;
    $this->session = $session;
    $this->file = $file;
}

    public function getUri()
{
    $this->uri = $_SERVER['REQUEST_URI'];
    return $this->uri;
}

    public function parseBody(array $body = [])
{
    $request = clone $this;
    $request->post = $body;
    return $request;
}

    public function parseQuery(array $get = [])
{
    $request = clone $this;
    $request->get = $get;
    return $request;
}

    public function parseCookie(array $cookie = [])
{
    $request = clone $this;
    $request->cookie = $cookie;
    return $request;
}

    public function parseSession(array $session = [])
{
    $request = clone $this;
    $request->session = $session;
    return $request;
}

    public function parseFiles(array $files = [])
{
    $request = clone $this;
    $request->file = $files;
    return $request;
}

    public function setRequestMethod(string $method)
{
    $request = clone $this;
    $method = strtoupper($method);
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(in_array($method,self::method)){
            $this->requestMethod =$method;
        }
        else{
            $this->requestMethod='POST';
        }
        return $request;
    } else{
        $this->requestMethod='GET';
        return $request;
    }

}

    public static function FactoryRequest(array $get = [], array $body = [], array $cookie = [], array $session = [], array $file = [])
{
    return self::MakeFactory($get, $body, $cookie, $session, $file);
}

    private static function MakeFactory(array $get = [], array $body = [], array $cookie = [], array $session = [], array $file = [])
{
    $request = new Request();

    $query = !empty($get) ? $get : $_GET;
    $bodyContent = !empty($body) ? $body : $_POST;
    $cookies = !empty($cookie) ? $cookie : $_COOKIE;
    $sessions = !empty($session) ? $session : $_SESSION;
    $files = !empty($file) ? $file : $_FILES;
    return $request->parseQuery($query)->parseBody($bodyContent)->parseCookie($cookies)->parseSession($sessions)->parseFiles($files);
}
}