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

`int` - The total number of rows.

**Example:**

```
$instance = new CSVUtility( './assets/contacts.csv' );

echo $instance->total();
```

***

### `getData()`

Returns the data (rows) in the provided CSV as associative arrays.

**Parameters:**

None

**Returns:**

`array` - Associative arrays of data from CSV file.

**Example:**

```
$instance = new CSVUtility( './assets/contacts.csv' );

print_r($instance->getData());

// [ 'name' => 'Bob', 'age' => 22, 'job' => 'developer' ], 1 => [ 'name' => 'Susan', 'age' => 45, 'job' => 'teacher' ] ]

```

***
