<?php

namespace App\Http;


class Route
{
    private $name;
    private $pattern;
    private $methods;
    private $handler;
    private $tokens;

    public function __construct($name, $pattern, $handler,array $methods = [], array $token = [])
    {
        $this->name = $name;
        $this->pattern = $pattern;
        $this->methods = $methods;
        $this->handler = $handler;
        $this->tokens = $token;
    }

    public function match(Request $request)
    {
        if($this->methods && !in_array($request->getTypeRequest(),$this->methods,true)){
            return null;
        }
        $matches=[];
        $countParams=0;
        $url = $request->getUri();
        preg_match_all('/\{[\w+]*\}/',$this->pattern,$match,PREG_OFFSET_CAPTURE);
        foreach ($match as $matcharray){
            $countParams = count($matcharray);
        }
        for ($i=0;$i<$countParams;$i++){
            $param = substr($request->getUri(),$match[0][0][1]);
            $length =strpos($param,'/');
            if($length === false){
                $length = strlen($param);
            }
            $param = substr($param,0,$length);
            $this->pattern=str_replace($match[0][0][0],$param,$this->pattern);
            preg_match_all('/\{[\w+]*\}/',$this->pattern,$match,PREG_OFFSET_CAPTURE);
        }
        $this->pattern = preg_replace('/\//','\/',$this->pattern);
        if(preg_match("/^".$this->pattern."$/",$request->getUri())){
            return [
                'name'=>$this->name,
                'handler'=>$this->handler,
            ];
        }
        return null;
    }

    public function getHandler(){
        return $this->handler;
    }

}