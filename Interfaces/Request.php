<?php
namespace App\Interfaces;

interface Request{
    public function getBodyRequest();

    public function getHeader();

    public function getTypeRequest();

    public function getUri();

    public function getHostName();

}