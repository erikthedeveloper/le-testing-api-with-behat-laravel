Feature: API Resource: Muffins - Delicious Muffins.
  In order to DO MUFFINS STUFF
  As a developer
  I need to be able to DO MUFFINS STUFF

  Background:
    Given there are 27 "Muffin"s
    And the "Muffin" with id 3 has attributes:
    """
    {
    "title": "Chocolate Bliss"
    }
    """

  Scenario: muffins.show Get a listing of muffins!
    When I send a GET request to "/muffins"
    Then the response should contain json:
    """
    {
    "page": 1,
    "per_page": 25,
    "total": 27
    }
    """
    And the response json's "items" key should be of type "array"

  Scenario: muffins.show Get a listing of muffins (w/ pagination and query string goodness)!
    When I send a GET request to "/muffins?page=2&per_page=10"
    Then the response should contain json:
    """
    {
    "page": 2,
    "per_page": 10,
    "total": 27
    }
    """
    And the response json's "items" key should be of type "array"

  Scenario: muffins.get Get a single muffin!
    When I send a GET request to "/muffins/3"
    Then the response should contain json:
    """
    {
    "id": 3,
    "title": "Chocolate Bliss"
    }
    """
    And the response json should have a "description" key
    And the response json should have a "directions" key
    And the response json should have a "image" key
    And the response json should have a "calories" key

  Scenario: muffins.destroy Destroy a muffin!
    When I send a DELETE request to "/muffins/3"
    Then the response should contain json:
    """
    {
    "deleted": true
    }
    """
    When I send a GET request to "/muffins/3"
    Then the response code should be 404
    When I send a DELETE request to "/muffins/3"
    Then the response code should be 404