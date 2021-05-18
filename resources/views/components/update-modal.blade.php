<div class="modal fade" id="update-modal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="{{ route('update') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Изменить задачу</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" name="update-id" id="update-id" hidden>
                <div class="form-group">
                    <label for="update-title">Заголовок</label>
                    <input type="text" class="form-control" name="update-title" id="update-title" minlength="1" maxlength="20" required>
                </div>
                <div class="form-group">
                    <label for="update-description">Описание</label>
                    <textarea class="form-control" id="update-description" name="update-description" minlength="1" maxlength="255" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="update-deadline">Дата завершения</label>
                    <input type="datetime-local" class="form-control" name="update-deadline" id="update-deadline" required>
                </div>
                <div class="form-group">
                    <label for="update-priority">Приоритет</label>
                    <select class="form-control" id="update-priority" name="update-priority">
                        @foreach($priorities as $priority)
                            <option value="{{$priority['id']}}">{{$priority['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="update-responsible">Ответственный</label>
                    <select class="form-control" id="update-responsible" name="update-responsible">
                        @if(isset($subordinates))
                            @foreach($subordinates as $user)
                                <option value="{{$user['id']}}">{{$user['name']}} {{$user['surname']}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="update-status">Статус</label>
                    <select class="form-control" id="update-status" name="update-status">
                        @foreach($statuses as $status)
                            <option value="{{$status['id']}}">{{$status['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
