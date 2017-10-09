<!DOCTYPE html>
<html>
<head>
	<title>Full Text Search</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<style type="text/css">
		
		body{

			padding: 50px;

		}
		.shad{
			box-shadow: 0 0 10px #696969;

		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-offset-3 col-xs-6">
				<form id="form" method="POST" action="">
					<div class="form-group">
	    				<label for="query">Query:</label>
						<input id="query" type="text" name="query" class="form-control">
					</div>
					<div class="form-group">
						<input id="btn" type="submit" name="search" value="Search" class="btn btn-default">
					</div>
				</form>
			</div>
			
		</div>
		<div id="res" class="row" style="display: none; ">
			<div class="col-xs-12" style="padding: 100px;">
				<table class="table shad">
					<thead style="text-align: center;">
					<tr>
						<th>Id</th>
						<th>Title</th>
						<th>Description</th>
					</tr>
					</thead>
					<tbody id="tbod" style="text-align: left;">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		
		$(document).ready(function(){

			$("#form").submit(function(event){

				event.preventDefault();

				var searchquery = $("#query").val();

				$.ajax({
					type:'POST',
					url:'http://localhost/fulltext/index.php/search',
					data:{'query':searchquery},
					dataType:'json',
					success: function(res) {
						if (res)
						{
							console.log(res.result);
							var txt="";

							$.each(res.result,function(key,val){

								txt=txt + "<tr>";
								
								$.each(val,function(x,x_val){
									txt = txt + "<td>" + x_val + "</td>";
						
								});	
								txt = txt + "</tr>"; 

							});
							$("#tbod").html(txt);	
							$("#res").show();
								
						}
					}
				});

			});

		});
	</script>
</body>
</html>