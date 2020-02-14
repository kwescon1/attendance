$(".add-field").click(function(e) {

	let number = $("#number").val();

	let field = `
		<tr>
           	<td>
         		<div class="form-group">
                	<input type="text" class="form-control" name ="course_code[]" required  placeholder="Code" style="width:30%;">
           		</div>
          	</td>
         	<td>
         		<div class="form-group">
                	<input type="text" class="form-control" name ="course_name[]" required placeholder="Name" style="width:50%;">
           		</div>
         	</td> 
   
         </tr>`;

    for(var i=1; i<=number; i++) {
    	$('.fields').append(field);
    }

  

});

