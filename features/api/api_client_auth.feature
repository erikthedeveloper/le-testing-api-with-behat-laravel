Feature: API Client Authentication
  In order to sleep well at night
  As an API Client
  I need to know that my muffins are protected by some form of authentication

  Scenario: Attempting restricted actions without any credentials
    When I send a POST request to "test/auth"
    Then the response code should be 401

  Scenario: Attempting restricted actions with invalid credentials
    Given I set header "username" with value "muffinlover101"
    And I set header "password" with value "invalidpassword"
    When I send a POST request to "test/auth"
    Then the response code should be 401

  Scenario: Attempting restricted actions with valid credentials
    Given I set header "username" with value "muffinlover101"
    And I set header "password" with value "ilovemuffinz"
    When I send a POST request to "test/auth"
    Then the response code should be 200