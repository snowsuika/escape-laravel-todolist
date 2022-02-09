<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Todo List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form id="create" method="post">
                標題: <input type="text" name="title" value="">
                描述: <input type="text" name="description" value="">
                <button id="createBtn" onclick="addTodo()">新增</button>
            </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed">
                        <thead>
                        <tr>
                            <th>標題</th>
                            <th>描述</th>
                            <th>狀態</th>
                            <th>動作</th>
                            <th>建立時間</th>
                            <th>更新時間</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($todos as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->completed ? '完成' : '未完成' }}</td>
                                <td>
                                    <button id="updateStatusBtn"
                                            onclick="updateStatus('{{ $task->id }}', '{{ $task->completed }}')">
                                        標示{{ $task->completed ? '未完成' : '完成' }}</button>
                                    <button id="deleteTodoBtn" onclick="deleteTodo('{{ $task->id }}')">刪除</button>
                                </td>
                                <td>{{ $task->created_at }}</td>
                                <td>{{ $task->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        function addTodo() {
            const form = document.getElementById('create');
            const formData = new FormData(form);
            axios.post('{{ route('todolist.create') }}', formData)
                .then(function (response) {
                    console.log(response);
                    window.location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function updateStatus(todo_id, current_status) {
            axios.put('{{ route('todolist.update', '') }}/' + todo_id, {
                completed: current_status === '1' ? '0' : '1'
            })
                .then(function (response) {
                    console.log(response);
                    window.location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function deleteTodo(todo_id) {
            axios.delete('{{ route('todolist.delete', '') }}/' + todo_id)
                .then(function (response) {
                    console.log(response);
                    window.location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    </script>
</x-app-layout>
