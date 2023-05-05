<?php
declare(strict_types=1);
/**
 * Client abstracting from HTTP protocol to consume open trivia database
 *
 *
 * @TODO DI-Container 4 cfg
 *
 * @FIXME reacting on http status   !== HttpProtocol::STATUS_ _OK
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2023-05-04
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 */

namespace SchrodtSven\TriviaGame\Communication;

class ApiClient
{
    // API return codes 
    public const RETURN_CODES  = [
          0, //  Success Returned results successfully.
          1, //  No Results Could not return results. The API doesn't have enough questions for your query. (Ex. Asking for 50 Questions in a Category that only has 20.)
          2, //  Invalid Parameter Contains an invalid parameter. Arguements passed in aren't valid. (Ex. Amount = Five)
          3, //  Token Not Found Session Token does not exist.
          4, //  Token Empty Session Token has returned all possible questions for the specified query. Resetting the Token is necessary.
    ];

    // Encoding types
    public const ENCODING_TYPES = [
        'urlLegacy', 'url3986', 'base64'
    ];
    
}