Feature: HAL API
  In order to ensure the API follows the HAL standard
  As a developer
  I want to test the HAL responses

  Scenario: Retrieve a single resource
    Given I send a GET request to "/api/resource/1"
    Then the response status code should be 200
    And the response should be in JSON
    And the response should contain a "_links" section
    And the response should contain a "self" link in "_links"
    And the "self" link should point to "/api/resource/1"

  Scenario: Retrieve a collection of resources
    Given I send a GET request to "/api/resources"
    Then the response status code should be 200
    And the response should be in JSON
    And the response should contain an "_embedded" section
    And the "_embedded" section should contain "resources"
    And each resource in "resources" should contain a "_links" section
    And each resource should contain a "self" link in "_links"

  Scenario: Verify pagination links in a collection
    Given I send a GET request to "/api/resources?page=2"
    Then the response status code should be 200
    And the response should be in JSON
    And the response should contain a "_links" section
    And the "_links" section should contain "self", "first", "prev", "next", and "last" links

  Scenario: Check embedded resources
    Given I send a GET request to "/api/resource/1"
    Then the response status code should be 200
    And the response should be in JSON
    And the response should contain an "_embedded" section
    And the "_embedded" section should contain "related"
    And each item in "related" should contain a "_links" section
    And each item should contain a "self" link in "_links"