<div class="modal fade bd-example-modal-lg" id="delete_question_m" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning!!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="controller/delete_question.php" method="post">
       <div class="modal-body">
          <h5>Are you sure you want to delete this question?</h5>
           <input type="hidden" name="q_id" id="q_id" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </div>
  </form>
  </div>
</div> 
</div>

<!-- Small modal -->
