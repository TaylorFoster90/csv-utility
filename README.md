# CSV Utility

A class that parses CSV files and gives you the options to:

- View the data as associative arrays.
- Manipulate / modify the data and use it to: display it on the front end, insert it into your database, create a new CSV, and more!

## Example Usage

```
$contacts = new CSVUtility( '/assets/files/new-hires.csv' );

echo $contacts->total();

print_r($contacts->getData());
```


## Available Methods

### `total()`

Returns the total number of rows in the provided CSV. NOTE: This count will not include the first row of the CSV (the headers).

**Parameters:**

None

**Returns:**

`int` - Returns the total number of rows of data.

**Example:**

```
$instance = new CSVUtility( './assets/contacts.csv' );

echo $instance->total();
```

***

### `getHeaders()`

Returns the headers (the keys in the data) of the provided CSV.

**Parameters:**

None

**Returns:**

`array` - Returns the headers of the provided CSV

**Example:**

```
$instance = new CSVUtility( './assets/contacts.csv' );

print_r($instance->getHeaders());

// [ 0 => 'name', 1 => 'age', 2 => 'job']

```

***

### `getData()`

Returns the data (rows) in the provided CSV as associative arrays.

**Parameters:**

None

**Returns:**

`array` - Returns associative arrays of data from CSV file.

**Example:**

```
$instance = new CSVUtility( './assets/contacts.csv' );

print_r($instance->getData());

// [ 0 => ['name' => 'Bob', 'age' => 22, 'job' => 'developer' ], 1 => [ 'name' => 'Susan', 'age' => 45, 'job' => 'teacher' ] ]

```

***

### `removeIfExists( string $key, string $value )`

Removes data from the instance based on key value matches.

**Parameters:**

`$key` - `string` - The key of the value being searched for.

`$value` - `string` - The value to search for.

**Returns:**

`$this` - Returns instance.

**Example:**

```
$instance = new CSVUtility( './assets/contacts.csv' );

print_r($instance->getData());

// [ 0 => ['name' => 'Bob', 'age' => 22, 'job' => 'developer' ], 1 => [ 'name' => 'Susan', 'age' => 45, 'job' => 'teacher' ] ]

$instance->removeIfExists('name', 'Bob');

print_r($instance->getData());

// [ 0 => [ 'name' => 'Susan', 'age' => 45, 'job' => 'teacher' ] ]

```

***

### `renameKeys( array $oldToNew, bool $changeHeaders )`

Rename the keys in the data without compromising original index structure.

**Parameters:**

`$oldToNew` - `array` - An associative array, the key must be the current key in the data and the value is what you'd like to rename the key to.

`$changeHeaders` - `bool` - If true, also changes the array that stores the original headers of the uploaded CSV file. Default is `true`.

**Returns:**

`$this` - Returns instance.

**Example:**

```
$instance = new CSVUtility( './assets/contacts.csv' );

$oldToNew = [
  'job' => 'occupation',
  'name' => 'first_name',
];

print_r($instance->getData());

// [ 0 => ['name' => 'Bob', 'age' => 22, 'job' => 'developer' ], 1 => [ 'name' => 'Susan', 'age' => 45, 'job' => 'teacher' ] ]

$instance->renameKeys( $oldToNew );

print_r($instance->getData());
print_r($instance->getHeaders());

// [ 0 => ['first_name' => 'Bob', 'age' => 22, 'occupation' => 'developer' ], 1 => [ 'first_name' => 'Susan', 'age' => 45, 'occupation' => 'teacher' ] ]
// [ 0 => 'first_name', 1 => 'age', 2 => 'occupation' ]

```

***

## Connecting To Your Database

Currently, CSVUtility only supports `MySQL` connections. Please ensure your web sever supports `MySQL`.

### Opening A Connection

In order to connect CSVUtility to your database you need to follow these steps.

1) Use the `openConnection` method to open your connection to your database.

2) Set the name of the table that the CSV data should point to.

3) Set the names of the columns and data types for the table.

** Example: **
```
$instance = new CSVUtility( './assets/contacts.csv' );

$instance->openConnection( $host, $username, $password, $database )
  ->setTable( 'contacts' )
  ->setColumns( [ 'name' => 's', 'age' => 'i', 'job' => 's' ] );

```
