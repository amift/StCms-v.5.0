<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Список типов</h3>
        <div class="box-tools">
            <button class="btn btn-primary btn-sm" onclick="admin.transport('addtype',{},admin.setContent)">Добавить тип</button>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Наименование</th>
                    <th style="width: 40px">Тип</th>
                    <th style="width: 40px">Статуы</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                <tr>
                    <td>{{ item.id }}</td>
                    <td><a href="#" onclick="admin.transport('edittype',{id:{{ item.id }}}, admin.setContent)">{{ item.name }}</a></td>
                    <td>{{ item.ident }}</td>
                    <td>{{ statusCheck(item.status) }}</td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>