<?php use tests\codeception\rest\FunctionalTester;

/** @var \Codeception\Scenario $scenario */
$I = new FunctionalTester($scenario);
$I->wantTo('test to obtain a token');

$I->sendPOST('/v1/user/login', ['username' => 'erau', 'password' => 'password_0']);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('tUu1qHcde0diwUol3xeI-18MuHkkprQI');