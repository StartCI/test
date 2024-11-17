<?php

test('create table',function(){
    $dbs = ['mysql','postgres','sqlite'];
    foreach($dbs as $db){
        $db = db($db);
        
    }
});
