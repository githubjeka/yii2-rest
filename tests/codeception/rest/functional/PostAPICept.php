<?php use tests\codeception\rest\FunctionalTester;

/** @var \Codeception\Scenario $scenario */
$I = new FunctionalTester($scenario);
$token = '?access-token=tUu1qHcde0diwUol3xeI-18MuHkkprQI';
$I->wantTo('ensure that posts access only for auth users');

$I->sendGET('/v1/posts');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();

$I->wantTo('create post via API');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPOST(
    '/v1/posts' . $token,
    ['title' => 'My first post', 'content' => 'There are many words....', 'status' => 2]
);
$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['title' => 'My first post']);

$I->wantTo('get my post');
$I->sendGET('/v1/posts' . $token . '&title=My first post');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['title' => 'My first post', 'id' => 1, 'author' => ['username' => 'erau']]);

$I->wantTo('update my post to draft');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPUT('/v1/posts/1' . $token, ['title' => 'My second post']);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['title' => 'My second post']);