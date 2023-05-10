<?php

declare(strict_types=1);
/**
 * Entity class for TriviaGame categories
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-10
 */

namespace SchrodtSven\TriviaGame\Entity;

class Category
{
    
    
    private array|false $interfaces = [];

    private array $valid = [
                            [9] => 'General Knowledge',
                            [10] => 'Entertainment: Books',
                            [11] => 'Entertainment: Film',
                            [12] => 'Entertainment: Music',
                            [13] => 'Entertainment: Musicals & Theatres',
                            [14] => 'Entertainment: Television',
                            [15] => 'Entertainment: Video Games',
                            [16] => 'Entertainment: Board Games',
                            [17] => 'Science & Nature',
                            [18] => 'Science: Computers',
                            [19] => 'Science: Mathematics',
                            [20] => 'Mythology',
                            [21] => 'Sports',
                            [22] => 'Geography',
                            [23] => 'History',
                            [24] => 'Politics',
                            [25] => 'Art',
                            [26] => 'Celebrities',
                            [27] => 'Animals',
                            [28] => 'Vehicles',
                            [29] => 'Entertainment: Comics',
                            [30] => 'Science: Gadgets',
                            [31] => 'Entertainment: Japanese Anime & Manga',
                            [32] => 'Entertainment: Cartoon & Animations'
                        ];
    

    public function __construct(private string $name = '', private int $index = 0)
    {
                            
    }
    
    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return string
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * Set the value of id
     *
     * @param string $id
     *
     * @return self
     */
    public function setIndex(int $index): self
    {
        $this->index = $index;

        return $this;
    }
}