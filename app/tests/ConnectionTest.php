<?php
test('mysql', function () {
    $retorno = db('mysql')->query("select now() as agora")->getResult();
    expect($retorno)->toBeArray();
});
test('postgres', function () {
    $retorno = db('postgres')->query("select now()  as agora")->getResult();
    expect($retorno)->toBeArray();
});
test('sqlite', function () {
    $retorno = db('sqlite')->query("select datetime() as agora")->getResult();
    expect($retorno)->toBeArray();
});