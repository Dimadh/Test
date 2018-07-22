<?php

print "<table>\n";
print "<tr><th>Id</th><th>Name</th><th>Email</th><th>Region</th><th>City</th><th>District</th></tr>\n";
foreach ($listUser as $user) {
    print "<tr><td>$user[id]</td><td>$user[login]</td><td>$user[email]</td><td>$user[region]</td><td>$user[city]</td><td>$user[district]</td></tr>\n";
}
print "</table>";