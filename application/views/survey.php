<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>

<div>
<table>
	<tr>
	<td>Question
		<input type="text" name="question[]" id="q1"/>
	</td>
	</tr>
	<tr>
	<td>Answer Type
		<select id="a1">
		   <option value="1">text box</option>
		</select>
	</td>
	</tr>
	<tr><td style="text-align:center;">
	<input type="button" value="Add" onclick="addForm(1)" />
	</td></tr>
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function addForm(a){
	
	var question = $('#q1').val();
	var answer = $('#a1').val();
$.ajax({
    url: 'survey/addquestion',
    dataType: 'json',
    type: 'POST',
    data:{ question: question, answer: answer },
    success: function( data, textStatus, jQxhr ){
        console.log(data);
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
});
}
</script>
</body>
</html>
