<?php


namespace Glagola;


class CrossProductIterator implements \Iterator
{
    /** @var \Iterator[] */
    private $input;
    
    public function __construct(array $input)
    {
        $this->input = $input;
    }
    
    
    /**
     * Return the current element
     * @link  http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        $res = [];
        /** @var \Iterator $item */
        foreach ($this->input as $item) {
            $res [] = $item->current();
        }
        
        return $res;
    }
    
    /**
     * Move forward to next element
     * @link  http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $count = count($this->input);
        $last = $count - 1;
        
        $this->input[$last]->next();
        
        for ($i = $last; $i > 0; --$i) {
            if ($this->input[$i]->valid()) {
                break;
            }
            
            $this->input[$i]->rewind();
            $this->input[$i - 1]->next();
        }
    }
    
    /**
     * Return the key of the current element
     * @link  http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        $res = [];
        
        foreach ($this->input as $item) {
            $res [] = $item->key();
        }
        
        return $res;
    }
    
    /**
     * Checks if current position is valid
     * @link  http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        foreach ($this->input as $item) {
            if (!$item->valid()) {
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * Rewind the Iterator to the first element
     * @link  http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        foreach ($this->input as $item) {
            $item->rewind();
        }
    }
}