<?php

declare(strict_types=1);
/**
 * Class for inspecting given data (structure) with regard to:
 * 
 *  - type
 *  - min. / max values
 *  - instance of
 *   
 *  
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-09
 */

namespace SchrodtSven\TriviaGame\Type;

use SchrodtSven\TriviaGame\Application\Internal\Dry\TypeMeta as DryTypeMeta;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Entity\Datum;
use SchrodtSven\TriviaGame\Application\Internal\Dry\TypeMeta;

class DataInspector
{
    use TypeMeta;
    private Datum $datum;
    
    public function __construct(private mixed $data = null)
    {
        $this->datum = $this->autoDetect($data);
    }

    public function autoDetect(mixed $data, ?Datum $datum = null): Datum
    {
        if(is_null($datum)) $datum = new Datum();
        $datum->setType($this->matchTypeFromValue($data));
        $datum->setValue($data);
        if($datum->getType() === 'object') {
            $datum->setClass($data::class);
            $datum->setInterfaces(class_implements($data));
        }
        return $datum;
    }

    /**
     * Get the value of datum
     *
     * @return Datum
     */
    public function getDatum(): Datum
    {
        return $this->datum;
    }

    /**
     * Set the value of datum
     *
     * @param Datum $datum
     *
     * @return self
     */
    public function setDatum(Datum $datum): self
    {
        $this->datum = $datum;

        return $this;
    }
}