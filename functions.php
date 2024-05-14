<?php


function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "<pre>";

    die();
}

function isCurrent($page)
{
    return $_SERVER['REQUEST_URI'] === $page ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium transiton-color duration-200' : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium transiton-color duration-200';

}

function isEmpty($input)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        return empty(trim($_POST[$input])) ? 'border-red-500 border-2 ' : 'border-gray-500';

    }

}