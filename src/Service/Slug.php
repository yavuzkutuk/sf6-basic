<?php

namespace App\Service;

class Slug
{
    private $delimiter = '-';

    public function slugify(string $text)
    {
        $slug = strip_tags($text);
        $slug = preg_replace('/Ç/', 'C', $slug);
        $slug = preg_replace('/ç/', 'c', $slug);
        $slug = preg_replace('/è|é|ê|ë/', 'e', $slug);
        $slug = preg_replace('/È|É|Ê|Ë/', 'E', $slug);
        $slug = preg_replace('/à|á|â|ã|ä|å/', 'a', $slug);
        $slug = preg_replace('/@|À|Á|Â|Ã|Ä|Å/', 'A', $slug);
        $slug = preg_replace('/ì|í|î|ï/', 'i', $slug);
        $slug = preg_replace('/Ì|Í|Î|Ï/', 'I', $slug);
        $slug = preg_replace('/ð|ò|ó|ô|õ|ö/', 'o', $slug);
        $slug = preg_replace('/Ò|Ó|Ô|Õ|Ö/', 'O', $slug);
        $slug = preg_replace('/ù|ú|û|ü/', 'u', $slug);
        $slug = preg_replace('/Ù|Ú|Û|Ü/', 'U', $slug);
        $slug = preg_replace('/ý|ÿ/', 'y', $slug);
        $slug = preg_replace('/Ý/', 'Y', $slug);
        $slug = preg_replace("/([^a-zA-Z0-9\/_|+ -])/", '', $slug);
        $slug = trim($slug, '-');
        $slug = strtolower($slug);
        $slug = preg_replace("/[\/_|+ -]+/", $this->delimiter, $slug);
        $slug = preg_replace('~-+~', '-', $slug); // Remove duplicate -
        return $slug;
    }
}
