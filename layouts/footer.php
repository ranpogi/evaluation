
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script>
    	$(document).ready(function(){
    		$('#add_question').click(function(){
    			$('#add_question_modal').modal('show');
    		})
    		$('table').DataTable();

    		$('.update_question').click(function(){
    			let u_id = $(this).attr('id');
    			console.log(u_id);
    			$.ajax({
    				url:'ajax-calls/question_update.php',
    				method:'post',
    				data:{id:u_id},
    				success:function(data){
    					$('#update_question_content').html(data);
    					$('#update_question_m').modal('show');
    				},
    				error:function(err){
    					console.log(err);
    				}
    			})
    		})
            $('.delete_question').click(function(){
                let d_id = $(this).attr('id');
                console.log(d_id);
                $.ajax({
                    url:'ajax-calls/question_delete.php',
                    method:'post',
                    data:{id:d_id},
                    dataType:'JSON',
                    success:function(data){
                         $('#q_id').val(data.id);
                         $('#delete_question_m').modal('show');
                    },
                    error:function(err){
                        console.log(err);
                    }
                })

            })
    	})
    </script>
  </body>
</html>