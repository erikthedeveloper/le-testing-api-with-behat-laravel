Feature: /test
  In order to USE THE API
  As a developer
  I need to be able to USE THE API

  Scenario: test.hello
    When I send a GET request to "/test/hello"
    Then the response code should be 200
    And the response should contain json:
      """
      { "message": "Hello World!" }
      """

  Scenario: test.items.index - Get a List of Items
    When I send a GET request to "/test/items"
    Then the response json should have a "items" key
    And the response json's "items" key should be of type "array"
    And the response json should have a "total_results" key
    And the response json should have a "page" key
    And the response should contain json:
    """
    {
    "page": 1
    }
    """

  Scenario: test.items.index - Get a List of Items Utilizing Pagination

  Scenario: test.items.index - Get a List of Items Utilizing Search Parameters

  Scenario: Page not found
    When I send a GET request to "/test/some-invalid-url"
    Then the response code should be 404
    And the response should contain json:
    """
    { "message": "URI test/some-invalid-url not found." }
    """