<div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('todo.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col-12">
                        <label for="todoName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="todoName" name="name" value="">
                    </div>
                    <div class="col-12">
                        <label class="col-sm-2 col-form-labe" for="todoStatus">Select</label>
                        <div class="col-sm-12">
                            <select class="form-select" aria-label="Default select example" id="todoStatus"
                                name="status" >
                                <option value="in progress">In Progress</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="todoKeinginan" class=" col-form-label">Textarea</label>
                        <div class="col-12">
                            <textarea class="form-control" style="height: 100px" id="todoKeinginan" name="keinginan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

            </form>

        </div>
    </div>
</div>
