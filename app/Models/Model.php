<?php

/**
 * Created by Ahmad Nakouzi.
 * User: ahmad-nakouzi
 * Date: 6/8/18
 * Time: 11:38 PM
 */
abstract class Model
{

    private $connection;

    /**
     * @var array
     */
    protected $fillable;

    /**
     * @var string
     */
    protected $table;

    /**
     * Model constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->connection = mysqli_connect(host, username, password, database);
        if (mysqli_error($this->connection))
            throw new Exception("Error Connecting to database");
    }

    final private function close()
    {
        mysqli_close($this->connection);
    }

    /**
     * return array
     */
    final public function get()
    {
        return [];
    }

    /**
     * return array
     */
    final public function first()
    {
        $first = true;
        $args = "";
        foreach ($this->fillable as $fill) {
            if ($first) {
                $first = false;
                $args = $fill;
            } else {
                $args .= ',$fill';
            }
        }
        $query = 'select $args from $table limit 1';
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    /**
     * return boolean
     */
    final public function update()
    {

    }

    /**
     * return boolean
     */
    final public function delete()
    {

    }
}