<?php

namespace App\Plugins\QformLibrary\Quform\Form;

use App\Plugins\QformLibrary\Quform\Element\Container\Quform_Element_Container_Iterator;
use App\Plugins\QformLibrary\Quform\Element\Quform_Element_Container;
use App\Plugins\QformLibrary\Quform\Quform_Form;
/**
 * @copyright Copyright (c) 2009-2018 ThemeCatcher (http://www.themecatcher.net)
 */

use RecursiveIteratorIterator;
use RecursiveArrayIterator;
use RecursiveIterator;


class Quform_Form_Iterator extends RecursiveArrayIterator implements RecursiveIterator
{
    public function __construct(Quform_Form $form)
    {


        parent::__construct($form->getPages());
    }

    public function hasChildren()
    {
        return $this->current() instanceof Quform_Element_Container;
    }

    public function getChildren()
    {
        return new Quform_Element_Container_Iterator($this->current());
    }
}