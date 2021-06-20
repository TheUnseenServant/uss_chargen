#!/usr/bin/env perl

# new_test.pl


## Notes
#   Move into the tests directory
#   Usage:
#     ./new_test.pl -f ThiefTest.php -o thief -n ranger
#
#   Takes the ThiefTest.php file as a base, and changes all
#     instances of Thief and thief to Ranger and ranger.
#     Writes the RangerTest.php file.

use strict;
use warnings;
use Getopt::Long;

my %args;
my $file;
my $old_string;
my $new_string;

GetOptions(
  "file=s"        => \$file,
  "old_string=s"  => \$old_string,
  "new_string=s"  => \$new_string,
);

if ( $file and $old_string and $new_string ){
  my $old_string_title  = ucfirst($old_string);
  my $new_string_title  = ucfirst($new_string);
  my $new_file_name     = $new_string_title . "Test.php";
  open my $out_fh, '>', $new_file_name or die $!;
  open my $in_fh, '<', $file or die $!;

  while ( <$in_fh> ){
    s/$old_string_title/$new_string_title/g;
    s/$old_string/$new_string/g;
    print $out_fh $_;
  }
  print "Wrote $new_file_name.\n";
  close($in_fh);
  close($out_fh);
};
