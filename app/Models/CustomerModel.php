<?php
/**
 * Created by Ahmad Nakouzi.
 * User: ahmad-nakouzi
 * Date: 6/8/18
 * Time: 11:46 PM
 */

class CustomerModel extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    protected $table = 'customer';
}