<?php

namespace App;

use App\Plugins\QformLibrary\Quform\Element\Container\Quform_Element_Container_Iterator;
use Illuminate\Database\Eloquent\Model;
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