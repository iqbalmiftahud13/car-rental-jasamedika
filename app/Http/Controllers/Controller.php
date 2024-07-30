<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($result, $code = 200, $message = 'Success.')
    {
        $response = [
            'code' => $code,
            'success' => true,
            'messages' => $message,
            'data' => $result,
        ];

        return response()->json($response, $code);
    }

    /**
     * Error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($errorMessages = [], $code = 404)
    {
        $response = [
            'code' => 404,
            'success' => false,
            'messages' => '',
            'data' => NULL
        ];

        if (!empty($errorMessages)) {
            if (is_array($errorMessages)) {
                foreach ($errorMessages as $item) {
                    if (is_array($item)) {
                        $response['messages'] .= implode(' ', $item);
                    } else {
                        if (strlen($response['messages']) > 0) {
                            $response['messages'] .= ' ';
                        }
                        $response['messages'] .= $item;
                    }
                }
            } else {
                $response['messages'] = $errorMessages;
            }
        }

        return response()->json($response, $code);
    }
}
