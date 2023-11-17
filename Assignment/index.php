<?php

        // Include Request and Response classes

        $url = 'https://api.exoclick.com/v2/login';

        $params = array(
                'api_token'  => 'tokenhere'
            );

        // Create a new Request object
        $request = new Request($url, 'POST', $params);

        // Send the request
        $request->send();

        // Get the Response object
        $response = $request->getResponse();

        if($response->getStatusCode() == 200) {

            // Retrieve the session token details
            $token = $response->getBodyDecoded();

            print_r($token);
        }
        else {

            echo $response->getStatusCode() . PHP_EOL;
            echo $response->getReasonPhrase() . PHP_EOL;
            echo $response->getBody() . PHP_EOL;
        }
    ?>