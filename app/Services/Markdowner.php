<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2019/1/12
 * Time: 下午9:36
 */

namespace App\Services;


use Michelf\MarkdownExtra;
use Michelf\SmartyPants;

class Markdowner
{

    public function toHTML($text){
        $text = $this->preTransformText($text);
        $text = MarkdownExtra::defaultTransform($text);
        $text = SmartyPants::defaultTransform($text);
        $text = $this->postTransformText($text);
        return $text;
    }

    public function preTransformText($text){
        return $text;
    }

    public function postTransformText($text){
        return $text;
    }
}