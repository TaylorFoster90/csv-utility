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
--------------

Returns the total number of rows in the provided CSV. NOTE: This count will not include the first row of the CSV (the headers).

**Parameters:**

**Returns:**
`int` - The total number of rows.

**Example:**
```
$instance = new CSVUtility( './assets/contacts.csv' );

echo $instance->total();
```
