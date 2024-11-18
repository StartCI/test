<?php

test('create table', function () {
    $dbs = ['mysql', 'postgres', 'sqlite'];
    foreach ($dbs as $db) {
        $db = db($db);
        $db->query("drop table if exists user_cnames");
        $db->query("drop table if exists users");
        $db->table('users')->create([
            'name' => 'text',
            'age' => 'integer',
            'email' => 'text',
            'password' => 'text',
        ]);
        $db->table('user_cnames')->create([
            'user' => 'users.id',
            'name' => 'text'
        ]);
        $tables = $db->listTables();
        expect($tables)->toContain('users');
        expect($tables)->toContain('user_cnames');
        $fields_users = $db->getFieldNames('users');
        expect($fields_users)->toContain('id');
        expect($fields_users)->toContain('created_at');
        expect($fields_users)->toContain('updated_at');
        $fields_cnames = $db->getFieldNames('user_cnames');
        expect($fields_cnames)->toContain('id');
        expect($fields_cnames)->toContain('created_at');
        expect($fields_cnames)->toContain('updated_at');
    }
});