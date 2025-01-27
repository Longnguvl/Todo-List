<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;
use App\Mail\TodoCreated;
use Illuminate\Support\Facades\Mail;

class TodoList extends Component
{
    public $todos;
    public $newTodo = '';

    public function mount()
    {
        $this->todos = Todo::where('user_id', auth()->id())->get();
    }

    public function addTodo()
    {
        $this->validate([
            'newTodo' => 'required|string|max:255',
        ]);

        $todo = Todo::create([
            'title' => $this->newTodo,
            'completed' => false,
            'user_id' => auth()->id(),
        ]);

        // Send email notification
        Mail::to(auth()->user()->email)->send(new TodoCreated($todo));

        $this->todos->prepend($todo);
        $this->newTodo = '';
    }

    public function toggleCompleted($todoId)
    {
        $todo = Todo::find($todoId);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function deleteTodo($todoId)
    {
        $todo = Todo::find($todoId);
        $todo->delete();

        $this->todos = Todo::where('user_id', auth()->id())->get();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
