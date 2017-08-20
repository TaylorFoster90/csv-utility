# CSV Utility

## Example Usage(s)

```

$contacts = new CSVUtility( '/assets/files/new-hires.csv' );

echo $contacts->total();

print_r($contacts->getHeaders());

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
