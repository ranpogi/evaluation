<div class="modal fade bd-example-modal-lg" id="add_question_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./controller/question_db.php" method="post">
       <div class="modal-body">
        <div class="row">
          <div class="col col-md-6">
            <div class="form-group">
              <select name="category" id="category" class="form-control" required="">
                <option value=""></option>
                <option value="English Proficiency">English Proficiency</option>
                <option value="IQ Test">IQ Test</option>
                <option value="Digital Marketing">Digital Marketing</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Question</label>
              <textarea name="question" rows="3" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col">
            <h4>Choices</h4>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <input type="text" name="choices[]" class="form-control" placeholder="Choice A">
          </div>
          <div class="col">
            <input type="text" name="choices[]" class="form-control" placeholder="Choice B">
          </div>
        </div>
         <div class="row mt-3">
          <div class="col">
            <input type="text" name="choices[]" class="form-control" placeholder="Choice C">
          </div>
          <div class="col">
            <input type="text" name="choices[]" class="form-control" placeholder="Choice D">
          </div>
        </div>
         <div class="row mt-3 mb-3 justify-content-center">
          <div class="col col-md-6">
            <input type="text" name="final_answer" class="form-control" placeholder="Final Answer">
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
  </div>
</div>
</div>
<!-- Small modal -->
