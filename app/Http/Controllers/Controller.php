<?php

namespace App\Http\Controllers;

class Controller
{
    public function isUser($model)
    {
        if (auth()->id() !== $model->user_id) {
            return redirect()->route('boxes.index');
        }
    }
}
