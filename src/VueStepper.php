<?php

namespace Octagonent\VueStepper;

use Laravel\Nova\ResourceTool;

class VueStepper extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Vue Stepper';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'vue-stepper';
    }

    public function currentStep($step)
    {
        return $this->withMeta(['currentStep' => $step]);
    }

    public function steps($steps)
    {
        return $this->withMeta(array('steps' => $steps));
    }
}
