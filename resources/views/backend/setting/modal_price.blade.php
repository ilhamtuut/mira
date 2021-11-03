  <div class="modal fade" id="responsive-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="title-modal"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('setting.update') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Value</label>
                        <input id="value" type="text" name="amount" class="form-control" placeholder="Value">
                        <input id="id" type="text" name="id" class="form-control hidden">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Security Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Security Password">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-light-success">Submit</button>
                  <button type="button" class="btn btn-light-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
  </div>