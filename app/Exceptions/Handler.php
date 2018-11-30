<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;


class Handler extends ExceptionHandler
{
    
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if ($exception instanceof ModelNotFoundException) {

            $modelo = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("No existe el Id especificado para {$modelo}", 404);
        }

        if ($exception instanceof ValidationException) {

            return $this->convertValidationExceptionToResponse($exception, $request);

        }

        if ($exception instanceof NotFoundHttpException) {

            return $this->errorResponse("No se encontro la Url especificada", 404);

        }

        if ($exception instanceof MethodNotAllowedHttpException) {

            return $this->errorResponse("El metodo especificado en la peticion no es valido", 405);

        }


        if ($exception instanceof HttpException) {

            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());

        }

        if (config('app.debug')) {
           return parent::render($request, $exception);       
        }

        return $this->errorResponse('Falla Inesperada, intente mas tarde', 500);

  
    }


        /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        return $this->errorResponse($errors, 422);

    }

}
