<div>
    <input type="text" wire:model="newTodo" placeholder="Add a new todo" class="p-2 border rounded">
    <button wire:click="addTodo" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Add</button>

    <ul class="mt-4">
        @foreach ($todos as $todo)
            <li class="flex items-center space-x-4">
                <input type="checkbox" wire:click="toggleCompleted({{ $todo->id }})" @if($todo->completed) checked @endif>
                <span class="{{ $todo->completed ? 'line-through text-gray-400' : '' }}">{{ $todo->title }}</span>
                <button wire:click="deleteTodo({{ $todo->id }})" class="text-red-500">Delete</button>
            </li>
        @endforeach
    </ul>
</div>
