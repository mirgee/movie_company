<?php
$a = 'userRepository';
$b = 'taskRepository';
preg_match('/(\w+)Repository$/', $a, $m);
echo $m[0] . ' ' . $m[1];
