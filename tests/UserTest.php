<?php

namespace AnjaliShrivastavaI\TestProject;

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase {

    public function testClassConstructor() {
        $user = new User(23, 'Anjali');
        $this->assertSame('Anjali', $user->name);
        $this->assertSame(23, $user->age);
        $this->assertEmpty($user->favorite_movies);
    }

    public function testTellName() {
        $user = new User(18, 'Seema');

        $this->assertIsString($user->tellName());
        $this->assertStringContainsStringIgnoringCase('Seema', $user->tellName());
    }

    public function testTellAge() {
        $user = new User(18, 'Raina');

        $this->assertIsString($user->tellAge());
        $this->assertStringContainsStringIgnoringCase('18', $user->tellAge());
    }

    public function testAddFavoriteMovie() {
        $user = new User(18, 'Sima');

        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertContains('Avengers', $user->favorite_movies);
        $this->assertCount(1, $user->favorite_movies);
    }

    public function testRemoveFavoriteMovie() {
        $user = new User(18, 'Neena');

        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertTrue($user->addFavoriteMovie('Justice League'));

        $this->assertTrue($user->removeFavoriteMovie('Avengers'));
        $this->assertNotContains('Avengers', $user->favorite_movies);
        $this->assertCount(1, $user->favorite_movies);
    }

} 
