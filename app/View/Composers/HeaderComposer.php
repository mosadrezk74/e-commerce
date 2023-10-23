<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class HeaderComposer {
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('categories', Category::all())
            ->with('cart', request()->cookie('prods'));
    }
}
