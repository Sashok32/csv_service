<?php


namespace widgets;

/**
 * @param array $attributes like ['Name', 'Email',...]
 *
 */
class Sort
{

    private $attributes;
    private $sorting;

    public function __construct(array $attributes = []) {
        $this->attributes = $attributes;
        $this->sorting = $_GET['sort'] ?? '';
    }

    public function sortBy(){
        return $this->sorting;
    }

    /**
     * @return array (sort links)
     */
    public function viewSort(){

         $view = [];

         foreach ($this->attributes as $attr) {
                $route = !empty($_GET['route']) ? 'route='.$_GET['route'].'&' : '';
                $sort = (!empty($this->sorting) && $this->sorting == $attr) ? '-'.$attr : $attr;
                $view[] = "<a class='sort-link' href='?{$route}sort={$sort}'>{$attr}</a>";
         }

        return $view;
    }

}
