<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    use ApiTrait;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $completed = $request->get('completed') ? (boolean) $request->get('completed') : null;
        $todos     = Todo::where('user_id', $this->user->id)
            ->where(function ($query) use ($completed) {
                if ($completed) {
                    $query->where('completed', $completed);
                }
            })
            ->orderBy($request->get('order', 'created_at'), $request->get('direction', 'desc'))
            ->paginate(15)
            ->withQueryString();

        return view('todolist', ['todos' => $todos]);
    }

    public function store(TodoRequest $request)
    {
        $todo = Todo::create([
                                 'title'       => $request->input('title'),
                                 'description' => $request->input('description', ''),
                                 'completed'   => $request->input('completed', false),
                                 'user_id'     => $this->user->id,
                             ]);
        $this->returnSuccess('success', $todo);
    }


    public function update(string $todo_id, TodoRequest $request)
    {
        $todo = Todo::where('id', $todo_id)->where('user_id', $this->user->id)->firstOrFail();
        $todo->update($request->only(['title', 'description', 'completed']));
        $todo->save();

        return $this->returnSuccess('success', $todo);
    }

    public function destroy(string $todo_id)
    {
        $todo = Todo::where('id', $todo_id)->where('user_id', $this->user->id)->firstOrFail();
        $todo->delete();

        return $this->returnSuccess('success');
    }
}
