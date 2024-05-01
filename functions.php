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
    return $_SERVER['REQUEST_URI'] === $page ? 'transition-colors duration-300 transform rounded-lg bg-gray-800 text-white' : 'text-gray-500 transition-colors duration-300 transform rounded-lg hover:bg-gray-800 hover:text-white';

}