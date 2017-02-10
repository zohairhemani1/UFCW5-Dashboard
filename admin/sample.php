<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>jQuery Get Selected Option Value</title>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
var filterTable = function(item) {
  // Get the value of the select box
  var val = item.val();
  
 // Show all the rows
  $('tbody tr').show();
  
  // If there is a value hide all the rows except the ones with a data-year of that value
  if(val) {
    $('tbody tr').not($('tbody tr[data-year="' + val + '"]')).hide();
  }
}


$('select').on('change', function(e){
  // On change fire function
  filterTable($(this));
});

// Fire function on load
filterTable($('select'));
</script>
</head> 
<body>
<select>
    <option value="">Please Select</option>
    <option selected>1997</option>
    <option>1998</option>
    <option>1999</option>
</select>
<table>
    <thead>
      <tr>
          <th>Year</th>
          <th>Version</th>
          <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <tr data-year="1999">
          <td>1999</td>
          <td>Some version Number</td>
          <td>Some Name</td>
      </tr>
      <tr data-year="1997">
          <td>1997</td>
          <td>Some version Number</td>
          <td>Some Name</td>
      </tr>
      <tr data-year="1999">
          <td>1999</td>
          <td>Some version Number</td>
          <td>Some Name</td>
      </tr>
      <tr data-year="1998">
          <td>1998</td>
          <td>Some version Number</td>
          <td>Some Name</td>
      </tr>
    </tbody>
</table>
</body>
</html>