# phalcon-cli-boilerplate 

### Features
* working examples of usage
* easy and clear to setup
* handler for missing command
* custom DI example

### example of usage

``` php phalcon invalid:task --option --param=value``` - this will trigger the default task. No registered task with given name

``` php phalcon task --param=value -option ``` - example of registered task (no namespace)

``` php phalcon ns:task --param=value -option ``` - example of registered task with namespace

### Requirements

* php 7
* phalcon extension for php

_Note_: On Ubuntu, this can be run like ```  ./phalcon command --args ```
