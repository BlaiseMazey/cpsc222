#!/usr/bin/perl
$count = 0;
open (FILE, "/var/log/auth.log") or exit 1;
while (<FILE>)
{
if ($_ =~ /sudo:/)
{
$count ++;
}
}
close (FILE);
print $count;
