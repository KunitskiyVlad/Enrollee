<?php
class Result
{
private $class;
private $handler;
private $params;

public function __construct($handler, $params = [])
{
$this->handler = $handler;
$this->params = $params;
$this->parseMethod();
}

public function call()
{
if (!empty($this->class)) {

$object = new $this->class;
$handler = $this->handler;
return $object->$handler('test');
} else {
$handler = $this->handler;
return $handler();
}

}

private function parseMethod()
{
if (is_string($this->handler)) {
$pos = strpos($this->handler, '@');
if ($pos !==false) {
$this->class = '\App\Controller\\'.substr($this->handler, 0, $pos);
$this->handler = substr($this->handler,$pos+1);
}

}
}
}