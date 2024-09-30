--TEST--
GH-16131: Can use wrong driver in connection string with driver subclass
--EXTENSIONS--
pdo
pdo_mysql
pdo_sqlite
--FILE--
<?php

// XXX: The fact we need two specific drivers makes this test annoying,
// since we need two real drivers (or it gives a diff error for missing)
// can it be done better?
$db = new Pdo\Mysql('sqlite::memory:');
var_dump($db->getAttribute(PDO::ATTR_DRIVER_NAME));
--EXPECTF--
Fatal error: Uncaught PDOException: Pdo\%s::connect() cannot be called when connecting to the "%s" driver, either Pdo\%s::connect() or PDO::connect() must be called instead in %s:%d
Stack trace:
#0 %s(%d): PDO->__construct('%s')
#1 {main}
  thrown in %s on line %d
