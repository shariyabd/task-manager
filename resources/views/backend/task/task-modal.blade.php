<!-- Modal -->
<div class="modal fade" id="addTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Task </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('task.store') }}" method="POST" id="taskForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title :</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="assignee">Assignee</label>
                                <input type="text" name="assignee" id="assignee" class="form-control w-100">
                            </div>
                            @error('assignee')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="deadline_date">Deadline Date</label>
                                <input type="date" name="deadline_date" id="deadline_date" class="form-control">
                            </div>
                            @error('deadline_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="deadline_time">Deadline Time</label>
                                <input type="time" name="deadline_time" id="deadline_time" class="form-control">
                            </div>
                            @error('deadline_time')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="priority">Priority</label>
                                <input type="text" name="priority" id="priority" class="form-control">
                            </div>
                            @error('priority')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            {{-- <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" id="status" cols="30" rows="10" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                @php
                                    use App\Models\Category;
                                    $categories = Category::all();
                                @endphp
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select Task Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
