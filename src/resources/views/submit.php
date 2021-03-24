<?php
use Illuminate\Support\Facades\DB;

$users = DB::table('users')->get();

var_dump($users);


