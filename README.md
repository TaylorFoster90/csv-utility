# CSV Utility

## Example Usage

```

$contacts = new CSVUtility( '/assets/files/new-hires.csv' );

echo $contacts->total();

print_r($contacts->getHeaders());

print_r($contacts->getData());


```

## Methods

| Method | Params | Returns |
| --- | --- | --- |
| `total()` |  | `int` total number of rows in the CSV. (Does Not Include Headers) |
| `getHeaders()` |  | `array` the headers from the CSV. |
| `getData()` |  | `array` the data from the CSV. |
