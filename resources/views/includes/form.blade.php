<form class="container" method="post" action="{{ route('tasks.store') }}">
    @csrf
    <div class="row shadow p-3 rounded">
        <div class="col-md-6">
            <div class="form-group">
                <label for="task" class="my-2 h4">Task: </label>
                <input type="text" class="form-control" id="task" name="task" required>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-start justify-content-between">
            <div class="form-group">
                <div>
                    <label for="name" class="my-2 h4">Priority: </label>
                </div>
                <div class="d-flex">
                    <div class="form-check-inline d-flex flex-nowrap">
                        <label class="form-check-label">
                            High
                            <input class="form-check-input" type='radio' name='priority' value='high' required>
                        </label>
                    </div>
                    <div class="form-check-inline d-flex flex-nowrap">
                        <label class="form-check-label">
                            Medium
                            <input class="form-check-input" type='radio' name='priority' value='medium' required>
                        </label>
                    </div>
                    <div class="form-check-inline d-flex flex-nowrap">
                        <label class="form-check-label">
                            Low
                            <input class="form-check-input" type='radio' name='priority' value='low' required>
                        </label>
                    </div>
                </div>
            </div>
            <input class="align-self-center btn btn-outline-primary" type="submit" value="Submit" name="submit">
        </div>
    </div>
</form>
