<div class="col-md-6">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Список пользователей</h3>
            {% if users.total_pages > 1 %}
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="/admin/users">«</a></li>
                {% if users.before != users.current %}
                    <li><a href="/admin/users?page={{ users.before }}">{{ users.before }}</a></li>
                {% endif %}
                <li class="active"><a>{{ users.current }}</a></li>
                {% if users.next != users.current %}
                    <li><a href="/admin/users?page={{ users.next }}">{{ users.next }}</a></li>
                {% endif %}
                <li><a href="/admin/users?page={{ users.last }}">»</a></li>
            </ul>
            {% endif %}
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Имя</th>
                        <th style="width: 40px">Статус</th>
                        <th style="width: 40px">Тип</th>
                    </tr>
                </thead>
                <tbody>
                    {% for user in users.items %}
                        <tr>
                            <td>{{ user.id }}</td>
                            <td><a href="#" onclick="admin.transport('getuser',{ id: {{ user.id }} },admin.setContent)">{{ user.firstname }}</a></td>
                            <td>{{ statusCheck(user.status) }}</td>
                            <td>{{ user.role }}</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-6 edit_page"></div>