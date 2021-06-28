<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Exceptions\NotAuthorizedException;
/**
 * Parses and verifies the doc comments for files.
 *
 * PHP version 7.4
 *
 * @category  PHP
 * @package   None
 * @author    Miles Selim <milesbalata@gmail.com>
 * @copyright 2021-2021 Laravel Mock
 * @license   BSD Licence
 * @link      Posts request
 */
class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->check() === false) {
            return false;
        }
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'title' => 'required|min:4|max:200',
        'content' => 'required|min:4|max:200'
        ];
    }
    /**
     * Throw and redirect if user is not authorized
     *
     * @return \Exception
     */
    protected function failedAuthorization()
    {
        $exception = new NotAuthorizedException('This action is unauthorized.', 403);
        throw $exception->redirectTo("login");
    }
}
