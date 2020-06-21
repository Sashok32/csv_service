<?php


namespace widgets;

/**
 * @param array $attributes like ['Name', 'Email',...]
 *
 */
class Filter
{

    private $attributes;
    private $attribute;
    private $query;

    public function __construct(array $attributes = []) {
        $this->attributes = $attributes;
        if (!empty($_GET['filter']) && is_array($_GET['filter'])) {
            $this->attribute = key($_GET['filter']);
            $this->query = $_GET['filter'][$this->attribute];
        }
    }

    public function filterWhere(){
        if (!empty($_GET['filter']) && is_array($_GET['filter'])) {
            if ($this->attribute == 'Gender') {
                return " WHERE {$this->attribute} = '{$this->query}' ";
            } else {
                return " WHERE {$this->attribute} LIKE '%{$this->query}%' ";
            }
        }
    }

    /**
     * @return array
     */
    public function viewFilters(){

         $view = [];

        $route = !empty($_GET['route']) ? 'route='.$_GET['route'].'&' : '';
        foreach ($this->attributes as $attr) {

                $defaultValue = $attr == $this->attribute ? $this->query : '';
            if ($attr == 'Gender') {
                $html = "<div class='dropdown'><button class='btn btn-outline-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Choose</button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                              <a class='dropdown-item' href='?{$route}filter[{$attr}]=Male'>Male</a>
                              <a class='dropdown-item' href='?{$route}filter[{$attr}]=Female'>Female</a>
                          </div></div>";
            } else {
                $html = "<div class='input-group'>
                    <div class='input-group-prepend'>
                        <div class='input-group-text'>
                            <a class='filter-link' href='?{$route}filter[{$attr}]='>filter</a>
                        </div>
                    </div>
                    <input class='form-control filter' value='{$defaultValue}'>
                </div>";
            }
            $view[] = $html;
         }
        return $view;
    }

}
