<div class="modal fade" id="create-modal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="{{ route('create') }}">
            @csrf
            @if(isset($subordinates))
                <div class="modal-header">
                    <h5 class="modal-title">Создать задачу</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="task-title">Заголовок</label>
                        <input type="text" class="form-control" name="task-title" id="task-title" minlength="1" maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label for="task-description">Описание</label>
                        <textarea class="form-control" id="task-description" name="task-description" minlength="1" maxlength="255" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="task-deadline">Дата завершения</label>
                        <input type="datetime-local" class="form-control" name="task-deadline" id="task-deadline" required>
                    </div>
                    <div class="form-group">
                        <label for="task-priority">Приоритет</label>
                        <select class="form-control" id="task-priority" name="task-priority">
                            @foreach($priorities as $priority)
                                <option value="{{$priority['id']}}">{{$priority['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="task-responsible">Ответственный</label>
                        <select class="form-control" id="task-responsible" name="task-responsible">
                            @foreach($subordinates as $user)
                                <option value="{{$user['id']}}">{{$user['name']}} {{$user['surname']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            @else
                <div class="modal-header">
                    <h5 class="modal-title">У вас нет подчиненных</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>
