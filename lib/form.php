
  <form action="index.php" method="POST">

  <table width="90%" border="1"> 
  <tr>
  <td width="25%" valign="top">
    <h3>Class</h3> 

    <input type="radio" id="cleric" name="class" value="cleric">
    <label for="cleric">Cleric</label><br>

    <input type="radio" id="druid" name="class" value="druid">
    <label for="druid">Druid</label><br>


    <input type="radio" id="fighter" name="class" value="fighter" checked="checked">
    <label for="fighter">Fighter</label><br>

    <input type="radio" id="paladin" name="class" value="paladin">
    <label for="paladin">Paladin</label><br>

    <input type="radio" id="ranger" name="class" value="ranger">
    <label for="ranger">Ranger</label><br>

    <input type="radio" id="magicuser" name="class" value="magicuser">
    <label for="magicuser">Magic User</label><br>

    <input type="radio" id="illusionist" name="class" value="illusionist">
    <label for="illusionist">Illusionist</label><br>


    <input type="radio" id="thief" name="class" value="thief">
    <label for="thief">Thief</label><br>

    <input type="radio" id="assassin" name="class" value="assassin">
    <label for="assassin">Assassin</label><br>

  <br>
  </td>

  <td width="25%" valign="top">
    <h3>Race</h3>
    <input type="radio" id="human" name="race" value="human" checked="checked">
    <label for="human">Human</label><br>

    <input type="radio" id="dwarf" name="race" value="dwarf">
    <label for="dwarf">Dwarf</label><br>
      
    <input type="radio" id="elf" name="race" value="elf">
    <label for="elf">Elf</label><br>
      
    <input type="radio" id="gnome" name="race" value="gnome">
    <label for="gnome">Gnome</label><br>
      
    <input type="radio" id="half-elf" name="race" value="half-elf">
    <label for="half-elf">Half Elf</label><br>

    <input type="radio" id="halfling" name="race" value="halfling">
    <label for="halfling">Halfling</label><br>
      
    <input type="radio" id="half-orc" name="race" value="half-orc">
    <label for="half-orc">Half Orc</label><br>
    
      
      
    <h3>Gender</h3> 
    <input type="radio" id="male" name="gender" value="male" checked="checked">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>

  <br>
  </td>

  <td width="25%" valign="top">
    <h3>Alignment</h3>
    <input type="radio" id="lg" name="alignment" value="lg">
    <label for="lg">Lawful Good</label><br>
    <input type="radio" id="ng" name="alignment" value="ng">
    <label for="ng">Neutral Good</label><br>
    <input type="radio" id="cg" name="alignment" value="cg">
    <label for="cg">Chaotic Good</label><br>

    <input type="radio" id="ln" name="alignment" value="ln">
    <label for="ln">Lawful Neutral</label><br>
    <input type="radio" id="tn" name="alignment" value="tn" checked="checked">
    <label for="tn">True Neutral</label><br>
    <input type="radio" id="cn" name="alignment" value="cn">
    <label for="cn">Chaotic Neutral</label><br>

    <input type="radio" id="le" name="alignment" value="le">
    <label for="le">Lawful Evil</label><br>
    <input type="radio" id="ne" name="alignment" value="ne">
    <label for="ne">Neutral Evil</label><br>
    <input type="radio" id="ce" name="alignment" value="ce">
    <label for="ce">Chaotic Evil</label><br>
  
  <br>
  </td>

  <td width="25%" valign="top">
  <?php
    if ( isset($_POST['class']) ){  
      $class      = $_POST['class'];
      $gender     = $_POST['gender'];
      $race       = $_POST['race'];
      $alignment  = $_POST['alignment'];
      $character  = new Character($class, $mins, $race, $gender, $alignment );
      $character->print_character();
    }
  ?>
  </td>

  </tr>

  <tr >
  <td colspan="4" align="center" valign="top">
  <br>
  <input type="submit" value="Create!">
  </td>

  </tr>

  </table>
  </form>
</body>
</html>

