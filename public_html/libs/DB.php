<?php

class DB {

    protected static $connection;

    /**
     * 
     * @return ADOconnection
     */
    public static function get_connection() {
        if (!static::$connection) {
            static::$connection = ADONewConnection('mysqli');
            static::$connection->Connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            static::$connection->Execute("set names 'utf8'");
            static::$connection->SetFetchMode(ADODB_FETCH_ASSOC);
            static::$connection->debug = DEBUG_MODE;
        }
        return static::$connection;
       
    }

}
