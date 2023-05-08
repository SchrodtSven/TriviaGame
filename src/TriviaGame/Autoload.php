<?php

declare(strict_types=1);
/**
 * Auto loading for current project 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-04
 */


namespace SchrodtSven\TriviaGame;


class Autoload
{

    /**
     * Namespace prefix for project files
     */
    public const VENDOR = 'SchrodtSven\TriviaGame';

    /**
     * Prefix to strip from fully qualified namespace to map to directories
     */
    private const MIMI =  'SchrodtSven\\';

    /**
     * Lib prefix
     */
    public const LIB_PREFIX = 'src/';

    /**
     * Separator for namespaces
     */
    public const NAMESPACE_SEPARATOR ='\\';

    /**
     * Main app configuration
     */
    public const MAIN_CFG = 'src/TriviaGame/Application/Internal/main_cfg.php';

    /**
     * Registering AL
     *
     * @return void
     */
    public function registerAutoloader()
    {
        /**
         * Registering project specific auto loading
         */
        spl_autoload_register(function ($className) {
            
            // Check if namespace of class to be instantiated belongs to us
            if (str_starts_with($className,  self::VENDOR)) {
                
                $filePathClass = str_replace(self::MIMI, '', $className);
                //replace separator for namespaces with directory separator
                $file = self::LIB_PREFIX . str_replace(
                        self::NAMESPACE_SEPARATOR, 
                        \DIRECTORY_SEPARATOR, 
                        $filePathClass
                    ) . '.php';
             
                // Check if destination class file exists  and include it, 
                // if not so - __do not throw__ \E*, because of AL chain!
                // @see https://www.php-fig.org/psr/psr-4/#2-specification : 
                // "4. Autoloader implementations *MUST NOT* throw exceptions,
                // MUST NOT raise errors of any level, and SHOULD NOT return a value."
                
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        });
    }

    public function __construct()
    {
        // workaround for current PHP Development server
        if(str_ends_with(getcwd(), 'public')) {
            chdir(('../'));    
        }

    }
}

// Running auto loader
(new Autoload())->registerAutoloader();


