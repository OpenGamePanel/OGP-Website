<?php
require_once 'includes/api_functions.php';
$functions = get_function_args("all");
?>
<html>
<body>
<form method=POST action="test_api.php">
<select name="method" onchange="this.form.submit()">
<?php
$methods = array('POST', 'GET');
foreach($methods as $method)
{
	$is_selected = (isset($_POST['method']) and $_POST['method'] == $method)?"selected":"";
	echo "<option value='$method' $is_selected>Method $method</option>";
}
?>
</select>
<br>
<select name="function" onchange="this.form.submit()">
<option value="">Select</option>
<?php
foreach($functions as $key => $value)
{
	$selected = (isset($_POST['function']) and $key == $_POST['function'])?"selected":"";
	echo "<option value='$key' $selected>$key</option>\n";
}
?>
</select>
</form>
<?php
if(isset($_POST['function']))
{
	$get_req = $_POST['method'] == 'POST'? "?".$_POST['function']:"";
?>
<form method='<?php echo $_POST['method']; ?>' action="ogp_api.php<?php echo $get_req; ?>" target="_blank">
<?php
if($_POST['method'] == 'GET')
	echo "<input type=hidden name='$_POST[function]'>";
?>
<table>
<?php
$inputs = $functions["$_POST[function]"];
foreach($inputs as $input => $mandatory)
{
	$is_mandatory = $mandatory?"":" (optional)";
	echo "<tr><td>". strtoupper($input) ."$is_mandatory : </td><td><input type=text name='$input'></td></tr>\n";
}
?>
<tr><td><input type=submit ></td></tr>
</table>
</form>
</body>
</html>
<?php
}
?>
