# Changelog

All notable changes to `EnumHelper` will be documented in this file.

## 1.0.2 - 2022-01-20

- Added `CasesIndexedByName` trait, providing a `casesIndexedByName()` method to return an associative array of cases with the case name as the index, rather than an enumerated array that is returned by `cases()`.

## 1.0.1 - 2021-12-08

- Added `EnumValidatableCase` trait, providing an `isValidCase()` method to validate a string value against the set of case names defined for an enum. 

## 1.0.0 - 2021-12-07

- Initial release

  Created `EnumValidatableCase` trait, providing a `fromName()` method that allows a string value which matches an enum case to be used to create an instance of that enum.
