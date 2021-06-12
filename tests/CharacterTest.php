<?php declare(strict_types=1);

require dirname(__DIR__) . '/lib/character.php';
require dirname(__DIR__) . '/lib/prefs.php';
require dirname(__DIR__) . '/lib/mins.php';

use PHPUnit\Framework\TestCase;

final class CharacterTest extends TestCase
{
  public function testCanBeCreated(): void
  {
    require dirname(__DIR__) . '/lib/prefs.php';
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "Paladin";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $prefs, $mins, $race, $gender, $name);

    $this->assertInstanceOf(Character::class, $character);
  }


  public function testSetAttributes(): void
  {
    require dirname(__DIR__) . '/lib/prefs.php';
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "Paladin";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $prefs, $mins, $race, $gender, $name);

    $this->assertEquals('Sally',    $character->name);
    $this->assertEquals('Paladin',  $character->class);
    $this->assertEquals('human',    $character->race);
    $this->assertEquals('female',   $character->gender);
  }

  public function testSetPaladinStats(): void
  {
    require dirname(__DIR__) . '/lib/prefs.php';
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "Paladin";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $prefs, $mins, $race, $gender, $name);

    $this->assertGreaterThan(11,  $character->stats['Strength']);
    $this->assertGreaterThan(8,   $character->stats['Intelligence']);
    $this->assertGreaterThan(12,  $character->stats['Wisdom']);
    $this->assertGreaterThan(5,   $character->stats['Dexterity']);
    $this->assertGreaterThan(8,   $character->stats['Constitution']);
    $this->assertGreaterThan(16,  $character->stats['Charisma']);
  }


  public function testSetClericStats(): void
  {
    require dirname(__DIR__) . '/lib/prefs.php';
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "Cleric";
    $mode       = 'short';  // $mode can currently be 'full' or 'short'
    $name       = "Sally";
    $race       = 'human';
    $gender     = 'female';
    $character  = new Character($class, $prefs, $mins, $race, $gender, $name);

    $this->assertGreaterThan(5,  $character->stats['Strength']);
    $this->assertGreaterThan(5,  $character->stats['Intelligence']);
    $this->assertGreaterThan(8,  $character->stats['Wisdom']);
    $this->assertGreaterThan(2,  $character->stats['Dexterity']);
    $this->assertGreaterThan(5,  $character->stats['Constitution']);
    $this->assertGreaterThan(5,  $character->stats['Charisma']);
  }

}

?>

