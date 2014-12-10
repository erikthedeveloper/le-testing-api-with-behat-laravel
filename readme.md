## A Learning Experiment by [Erik Aybar](http://erikaybar.name)

- Using [Behat](http://docs.behat.org/en/v2.5/) in the context of testing a RESTful JSON API
    - Using Behat's WebApiContext
    - Using Factories for test/seed data via [Factory Muffin](https://factory-muffin.thephpleague.com/usage/examples/) (Thinks Rail's `factory_girl`, but for PHP)
    - Enabling test/seed data to be dynamically generated from within Behat features and available for HTTP requests.
        - Boot tests
        - Declare some data
        - Issue HTTP Request
        - Seeded Data is Available, Processed, etc...
        - Keep this relatively fast...
- Building said RESTful JSON API with Laravel 4.x
- and so on....

## Example Behat Test Output

![Sample Behat Test Output](https://cloud.githubusercontent.com/assets/1240178/5377001/57c7b0b2-803a-11e4-8db4-3283f6c26fd9.png)