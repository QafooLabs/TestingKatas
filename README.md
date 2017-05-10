# Workshop Testing Kata Setup

Please make sure that you have a working setup of:

* PHP 5.3 (or newer)
* Run "composer.phar install"

# Katas

You can find different katas in the `katas/` directory. A good first pick is
`katas/string_calculator.md`.

# Rules

The basic rule is to complete the Katas in a test driven way:

1. Write a new test – the test should fail.

2. Write code to fulfil the test case. Do not anticipate future problems just
   yet.

3. The test should succeed. Commit.

4. Feel free to refactor the code or tests while all tests are green. (Commit
   afterwards..

5. Repeat from 1) until all requirements are fulfilled

You can optionally follow these additional rules:

## Baby steps

As an additional rule to teach you focus you can set yourself a timer (2
minutes for example). If you do not have all green tests after this time revert
all local changes (`git reset --hard`). Only if your tests are green again
after the given "baby step" you are allowed to commit.

# Object Calisthenics

1. At maximum one level of indentation per method.

2. Don’t use else.

3. Wrap out primitves and strings (unless required by the kata itself).

4. First class collections. Wrap any collection in a typed collection object.

5. At maximum one object access operator per line (excluding `$this->`).

6. Never abbreviate.

7. No class with more than 50 LOC, no package (namespace) with more than 10
   classes.

8. No class with more than two instance variables (properties).

