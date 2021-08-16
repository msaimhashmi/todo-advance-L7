<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function RawSqlQuery()
    {
        // For insert record
        // DB::insert('insert into users (name,email,password)
        // values(?,?,?)', ['Saim', 'saim@gmail.com', 'pass']);
        // return redirect()->back();

        // For update record
        // DB::update('update users set name = ? where id = 1', ['M Saim Hashmii']);

        // For delete record
        DB::delete('delete from users where id=3');

        // For view record
        $users = DB::select('select * from users');
        return $users;

        
    }
}
