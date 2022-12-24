# Phpunit Installation Writing & Running Test Cases      

 <b>Here are the Steps to test using php unit test cases :</b>

 1. Install Composer 

  Get composer from   https://getcomposer.org/download/  
  
 2. Phpunit Installation 

 i. Open the Command Prompt and run following commands:

     mkdir test-project
     cd test-project
     composer init
     
  ii.  Fill the details as required in prompt for composer.
   
 iii. When the prompt asks Would you like to define your dev dependencies (require-dev) interactively [yes]?, press enter to accept. Then type in phpunit/phpunit to install PHPUnit as a dev-dependency. 
   
   iv. Accept the other defaults  and generated composer.json file looks like this -
   
           {
            "name": "anjali.shrivastava_i/test-project",
            "description": "php unit testing sample project",
            "require": {
                "phpunit/phpunit": "^9.5"
            },
            "autoload": {
                "psr-4": {
                    "AnjaliShrivastavaI\\TestProject\\": "src/"
                }
            },
            "authors": [
                {
                    "name": "Anjali"
                }
            ]
        }
        
        
        
 v. Phpunit docs https://phpunit.readthedocs.io/en/9.5/installation.html#
   
 vi.  Writing phpunit cases 
   
      a. Create a test class named after that class.
      b. If class is User , test class will be UserTest.
      c.The test class inherits PHPUnit\Framework\TestCase class.
      d. Individual tests on the class are public methods named with test as a prefix. 
      e. A popular convention is to have all tests in a tests directory, and all source code in the src directory.

  vii. Phpunit Test example User class
       <?php

          namespace AnjaliShrivastavaI\TestProject;

          use InvalidArgumentException;

          class User 
          {
              public int $age;
              public array $favorite_movies = [];
              public string $name;

              /**
               * @param int $age
               * @param string $name
               */
              public function __construct(int $age, string $name)
              {
                  $this->age = $age;
                  $this->name = $name;
              }

              public function tellName(): string
              {
                  return "My name is " . $this->name . ".";
              }

              public function tellAge(): string
              {
                  return "I am " . $this->age . " years old.";
              }

              public function addFavoriteMovie(string $movie): bool
              {
                  $this->favorite_movies[] = $movie;

                  return true;
              }

              public function removeFavoriteMovie(string $movie): bool
              {
                  if (!in_array($movie, $this->favorite_movies)) throw new InvalidArgumentException("Unknown movie: " . $movie);

                  unset($this->favorite_movies[array_search($movie, $this->favorite_movies)]);

                  return true;
              }
          }
          
  viii. Create a test class UserTest.
  
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
  
   
  # viii. Running phpunit test cases   
  
  In ubuntu - 
  
    $ ./vendor/bin/phpunit --verbose tests/UserTest.php

  In windows - 
  
    phpunit ../../tests/UserTest.php  

   ![image](https://user-images.githubusercontent.com/98171488/209448363-1162ab96-26ea-4ba7-82c0-4934f88ef4ed.png)

  
 
 
 To see list of assertions -  https://phpunit.readthedocs.io/en/9.5/assertions.html#appendixes-assertions
   
   
        



  
 



