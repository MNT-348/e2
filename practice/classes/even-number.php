<?php

namespace HES;

class EvenNumber extends Number
{
    # Subclasses can overwrite their superclasses
    public function isValid()
    {
        # They can also invoke methods from their superclasses using `parent::`
        return parent::isValid() and $this->num % 2 == 0;
    }
}