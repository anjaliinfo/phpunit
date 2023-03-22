<?php

namespace AnjaliShrivastavaI\TestProject;

use PHPUnit\Framework\TestCase; 

        class testClass{
          public static $attribute = "test attribute";
        }

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

     public function testArrayHasKey()
    {   $user = new User(18, 'Neena');
        $array  = array('sss' => 'geeksForgeeks');
        $test = $user->arrayHasKey($array);
        // assert function to test whether 'geek' is a key of array
        $this->assertArrayHasKey('geek', $test, "Array doesn't contains the key");
    }

    public function testNegativeTestcaseForAssertEquals(){
        $user = new User(18, 'Neena');
        $expected = "geeks";
        $actual = $user->negativeTestcaseForAssertEquals('Geeks');
        $this->assertEquals(
            $expected,
            $actual,
            "actual value is not equals to expected"
        );
    }


    public function testExpectNameActualName() {
      $user = new User(18, 'Teena');
      $name = $user->tellName();
       $this->expectOutputString($name);
        print 'Neena';
    }

    public function testNegativeTestcaseForAssertStringContainsStringIgnoringCase()
    {
        $testString = "testfortest";
        $substring = "testing"; 
        // assert function to test whether 'testing' is a substring of testString ignoring case-sensitivity
        $this->assertStringContainsStringIgnoringCase($substring, $testString, "testString doesn't contains 'testing' as substring") ;
    }

    public function testNegativeTestcaseForArrayNotHasKey()
    {
        // array to be tested
        $array  = array('tests' => 'geeksForgeeks', );
        // assert function to test whether 'geeks' is a key of array
        $this->assertArrayNotHasKey('tests', $array, "Array  contains 'tests' as key");
    }
    
    //assertNotEqualsCanonicalizing() is the inverse of this assertion and takes the same arguments.
    public function testFailure(): void {
        $this->assertEqualsCanonicalizing([3, 2, 1], [2, 3, 0, 1]);
    } 
        
    //Reports an error identified by $message if the two variables $expected and $actual are not equal.

    // Differences in casing are ignored for the comparison of $expected and $actual.
    public function testStringIngCase(): void
    {
        $this->assertEqualsIgnoringCase('test', 'BAR');
    }

   //Reports an error identified by $message if the absolute difference between $expected and $actual is greater than $delta.
    public function testDelta(){
        $this->assertEqualsWithDelta(1.0, 1.5, 0.1);
    } 

   //Reports an error identified by $message if the sizes of $actual and $expected are not the same.
    public function testSameSize(){
        $this->assertSameSize([1,2,4,7], [2,3]);
    }

    public function testGreaterThanOrEqual(){
        $this->assertGreaterThanOrEqual(2, 1);
    }

    public function testLessThanOrEqual(){
        $this->assertLessThanOrEqual(1, 2);
    }

    public function testIsArrayNull()
    {
        $this->assertIsArray(null);
    }
    
    public function testFloat(){
        $this->assertIsFloat(4);

    }
     
    public function testNumeric(){
        $this->assertIsNumeric(null);
    }

    public function testObject(){
        $this->assertIsObject(null);
    }
    
    public function testIsPrefix(){
        $this->assertStringStartsWith('pre', 'prefix');
    }
    
    public function testIsSuffix(){
        $this->assertStringEndsWith('o', 'foo');
    }
    
    public function testMatchRegularExpressions(){
       $this->assertMatchesRegularExpression('/foo/', 'bar');
    }

    public function testFormat(){
        $this->assertStringMatchesFormat('%i', 'foo');
    }
    
    public function testJson(){
      $this->assertJson('not-a-json-string');
    }
}
