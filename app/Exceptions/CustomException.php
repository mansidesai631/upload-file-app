<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class CustomException extends Exception
{
    public function report()
    {
        Log::info("File size must be 10mb");
    }
    public function render()
    {
        return redirect()->back()->withErrors(['File size must be <= 10MB']);
    }
}
