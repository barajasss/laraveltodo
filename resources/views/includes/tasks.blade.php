<div class="d-flex justify-content-between align-items-baseline">
    <h4 class="my-3 task__heading">Tasks</h4>
</div>
<div class="d-flex tabs">
    <a href="{{ request()->url() }}"
        class="flex-fill tabs__btn {{ isset(request()->query()['completed']) ? '' : 'active' }}">Active</a>
    <a href="{{ request()->url() }}?completed=true"
        class="flex-fill tabs__btn {{ isset(request()->query()['completed']) ? 'active' : '' }}">Completed</a>
</div>

{{-- option to delete all completed posts --}}
@if (isset(request()->query()['completed']) && count($tasks))
    <form class="d-flex justify-content-end" method="POST" action="{{ route('tasks.destroy') }}">
        @csrf
        @method('DELETE')
        <input type='HIDDEN' name="completed" value="true">
        <button class="btn btn-danger btn-sm">Clear All</button>
    </form>
@endif

<div class="container">
    <div class="row task">
        @forelse ($tasks as $index => $task)
            <div class="shadow task__item">
                <div class="task__item__tag {{ $task->priority }}">{{ $task->priorityInfo() }}</div>
                <p>{{ $index + 1 }}. {{ $task->task }}</p>
                @if (!$task->completed)
                    <form class="actions" method="post" action="{{ route('tasks.update', $task->id) }}">
                        @csrf
                        @method('PATCH')
                        <input type='hidden' name='completed' value="true">
                        <button class="btn btn-primary btn-sm">Mark as Done</button>
                    </form>
                @endif
            </div>
        @empty
            <div class="p-0 py-1">
                @if (isset(request()->query()['completed']))
                    No Completed tasks
                @else
                    No active tasks. Create some new tasks.
                @endif
            </div>
        @endforelse
    </div>
</div>
