<?php declare(strict_types=1);

// ClericTest.php

require_once dirname(__DIR__) . '/lib/character.php';
require_once dirname(__DIR__) . '/lib/mins.php';

use PHPUnit\Framework\TestCase;

final class ClericTest extends TestCase
{
  public function testCanBeCreated(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "cleric";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'cg';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertInstanceOf(Character::class, $character);
  }


  public function testSetAttributes(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "cleric";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'cg';
    $character  = new Character($class, $mins, $race, $gender, $alignment);

    $this->assertEquals('cleric',   $character->class);
    $this->assertEquals('human',    $character->race);
    $this->assertEquals('female',   $character->gender);
  }

  public function testSetClericStats(): void
  {
    require dirname(__DIR__) . '/lib/mins.php';
    $class      = "cleric";
    $race       = 'human';
    $gender     = 'female';
    $alignment  = 'cg';
    $character  = new Character($class, $mins, $race, $gender, $alignment);
    
    $this->assertGreaterThan(5,   $character->stats['strength']);
    $this->assertGreaterThan(5,   $character->stats['intelligence']);
    $this->assertGreaterThan(8,   $character->stats['wisdom']);
    $this->assertGreaterThan(2,   $character->stats['dexterity']);
    $this->assertGreaterThan(5,   $character->stats['constitution']);
    $this->assertGreaterThan(5,   $character->stats['charisma']);
  }


}
