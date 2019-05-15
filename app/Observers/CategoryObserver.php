<?php

namespace App\Observers;

use App\Category;

class CategoryObserver
{

    public function deleting(Category $category)
    {
        $category->posts()->delete();
    }
}
